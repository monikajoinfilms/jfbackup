(function ($) {

  Drupal.behaviors.addGMapMultiLocation = {
    attach: function (context, mapSettings) {

      if (typeof(google) != 'object') {
        // When not connected to Internet.
        return;
      }
      // Create map as a global, see [#1954876].
      // As we can have multiple maps on the same page, this is now an array.
      maps = [];
      var imageExt = '.png';

      for (var m in mapSettings) {

        if (!mapSettings[m] || !mapSettings[m].ip_geoloc_locations) {
          continue;
        }
        // Load the settings for map m.
        var locations     = mapSettings[m].ip_geoloc_locations;
        var visitorMarker = mapSettings[m].ip_geoloc_multi_location_visitor_marker;
        var mapOptions    = mapSettings[m].ip_geoloc_multi_location_map_options;
        var centerOption  = mapSettings[m].ip_geoloc_multi_location_center_option;
        var use_gps       = mapSettings[m].ip_geoloc_multi_location_visitor_location_gps;
        var markerDirname = mapSettings[m].ip_geoloc_multi_location_marker_directory;
        var markerWidth   = mapSettings[m].ip_geoloc_multi_location_marker_width;
        var markerHeight  = mapSettings[m].ip_geoloc_multi_location_marker_height;
        var markerAnchor  = mapSettings[m].ip_geoloc_multi_location_marker_anchor;
        var markerColor   = mapSettings[m].ip_geoloc_multi_location_marker_default_color;

        if (!mapOptions) {
          alert(Drupal.t('Syntax error in Google map options.'));
        }

        var mapDiv = document.getElementById(mapSettings[m].ip_geoloc_multi_location_map_div);
        maps[m] = new google.maps.Map(mapDiv, mapOptions);

        // A map must have a type, a zoom and a center or nothing will show.
        if (!maps[m].getMapTypeId()) {
          maps[m].setMapTypeId(google.maps.MapTypeId.ROADMAP);
        }
        if (!maps[m].getZoom()) {
          maps[m].setZoom(1);
        }
        if (centerOption !== 1 || locations.length === 0) {
          // If no center override option was specified or as a fallback where
          // the user declines to share their location, we set the center based
          // on the mapOptions. Without a center there won't be a map!
          maps[m].setCenter(new google.maps.LatLng(
            mapOptions.centerLat ? mapOptions.centerLat : 0,
            mapOptions.centerLng ? mapOptions.centerLng : 0));
        }

        if (visitorMarker || centerOption === 2) {
          // Retrieve visitor's location, fall back on supplied location, if not found.
          if (use_gps) {
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(handleMapCenterAndVisitorMarker1, handlePositionError, {enableHighAccuracy: true});
            }
            else if (typeof(geo_position_js) == 'object' && geo_position_js.init()) {
              // Use the unified API.
              geo_position_js.getCurrentPosition(handleMapCenterAndVisitorMarker1, handlePositionError, {enableHighAccuracy: true});
            }
          }
          else {
            // Use supplied visitor lat/lng to center and set marker.
            var latLng = mapSettings[m].ip_geoloc_multi_location_center_latlng;
            if (latLng) {
              handleMapCenterAndVisitorMarker2(latLng[0], latLng[1]);
            }
          }
        }

        var shadowImage = null;
        var defaultPinImage = !markerColor ? null : new google.maps.MarkerImage(
          markerDirname + '/' + markerColor + imageExt,
          new google.maps.Size(markerWidth, markerHeight),
          // Origin.
          new google.maps.Point(0, 0),
          // Anchor.
          new google.maps.Point((markerWidth / 2), markerAnchor));

        var center = null;
        for (var key in locations) {
          var br = locations[key].balloon_text.indexOf('<br/>');
          var mouseOverText = (br > 0) ? locations[key].balloon_text.substring(0, br) : locations[key].balloon_text.trim();
          if (mouseOverText.length === 0) {
            mouseOverText = Drupal.t('Location #@i', { '@i': parseInt(key) + 1});
          }

          var position = new google.maps.LatLng(locations[key].latitude, locations[key].longitude);
          if (!center && centerOption === 1) {
            // If requested center map on the first location, if any.
            maps[m].setCenter(position);
            center = position;
          }
          var pinImage = defaultPinImage;
          if (locations[key].marker_color) {
            pinImage = new google.maps.MarkerImage(
              markerDirname + '/' + locations[key].marker_color + imageExt,
              new google.maps.Size(markerWidth, markerHeight),
              // Origin.
              new google.maps.Point(0, 0),
              // Anchor.
              new google.maps.Point((markerWidth / 2), markerAnchor));
          }
          var marker = new google.maps.Marker({ map: maps[m], icon: pinImage, shadow: shadowImage, position: position, title: mouseOverText });

          var balloonText = '<div class="balloon">' + locations[key].balloon_text + '</div>';

          addMarkerBalloon(maps[m], marker, balloonText);
        }
      }

      function handleMapCenterAndVisitorMarker1(visitorPosition) {
        handleMapCenterAndVisitorMarker2(visitorPosition.coords.latitude, visitorPosition.coords.longitude);
      }

      // Center all maps and add the special visitor marker on all maps too.
      function handleMapCenterAndVisitorMarker2(latitude, longitude) {
        var visitorPosition = new google.maps.LatLng(latitude, longitude);
        for (var m in maps) {
          if (mapSettings[m].ip_geoloc_multi_location_center_option === 2) {
            maps[m].setCenter(visitorPosition);
          }
          if (mapSettings[m].ip_geoloc_multi_location_visitor_marker) {
            showSpecialMarker(m, visitorPosition, Drupal.t('Your approximate location (' + latitude + ', ' + longitude + ')'));
          }
        }
      }

      function addMarkerBalloon(map, marker, infoText) {
        google.maps.event.addListener(marker, 'click', function(event) {
          new google.maps.InfoWindow({
            content: infoText,
            position: event.latLng,
            // See [#1777664].
            maxWidth: 200
          }).open(map);
        });
      }

      function showSpecialMarker(m, position, mouseOverText) {
        var specialMarker;
        var visitorMarker = mapSettings[m].ip_geoloc_multi_location_visitor_marker;
        if (visitorMarker === true) {
          specialMarker = new google.maps.Marker({ map: maps[m], position: position, title: mouseOverText });
        }
        else {
          // Interpret value of visitorMarker as the marker RGB color, for
          // instance "00FF00" is bright green.
          var pinColor = visitorMarker;
          // Use a standard character like "x", or for a dot use "%E2%80%A2".
          var pinChar = "%E2%80%A2";
          // Black.
          var textColor = "000000";
          // Note: cannot use https: here...
          var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=" + pinChar + "|" + pinColor + "|" + textColor,
            new google.maps.Size(21, 34), new google.maps.Point(0, 0), new google.maps.Point(10, 34));
          specialMarker = new google.maps.Marker({ map: maps[m], icon: pinImage, shadow: shadowImage, position: position, title: mouseOverText });
        }
        addMarkerBalloon(maps[m], specialMarker, mouseOverText);
      }

      // Fall back on IP address lookup, for instance when user declined to share location (error 1)
      function handlePositionError(error) {
        //alert(Drupal.t('IPGV&M multi-location map: getCurrentPosition() returned error !code', {'!code': error.code}));
        var latLng = mapSettings[m].ip_geoloc_multi_location_center_latlng;
        if (latLng) {
          handleMapCenterAndVisitorMarker2(latLng[0], latLng[1]);
        }
      }
    }
  }
})(jQuery);
