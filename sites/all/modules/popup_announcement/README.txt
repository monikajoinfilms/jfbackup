
CONTENTS OF THIS FILE
---------------------

 * Overview
 * Features
 * Requirements
 * Configure page
 * Plans


OVERVIEW
--------

The module provides a pop-up announcement in the overlay which 
will appear for the site visitor on the first, second and fifth visit to the 
site (customable).
Very useful solution for interaction and communication with site visitors.

If interval between http requests is more than one hour, these are two 
different visits.


FEATURES
--------

The announcement may be with html.
The announcement will appear on the overlay.
Announcement added to the site as a block - it make possible to use flexible 
visibility settings to define pages where announcement will appear.
On the configure page it is possible to define, on which visit the 
announcement will appear. By default on the first, second and fifth visit.
After 90 days records about visits become old and automatically are removed 
from the database.


REQUIREMENTS
------------

Session api module (http://drupal.org/project/session_api)
This is small and very usefull module that often required when you interact 
with site visitors.


CONFIGURE PAGE
--------------

/admin/structure/block/manage/popup_announcement/popup_announcement/configure


PLANS
-----

Add button to erase all records about visitors - it will be useful if
text of the announcement is changed and we need to show it for all
visitors (even for those who have already seen it).
Add field on the configure page to define the time after which records 
about visits will be deleted.
Add field on the configure page to define the time after which next 
http request will be considered as a new visit.
Add button to display for visitors checkbox in announcement "Do not show
this announcement for me again".
Make possible for user to edit announcement text with text editor.
Add field on the configure page to define the delay time fadeOut animation.
Add support and list of themes for overlay.
Add support and list of animations for overlay.
