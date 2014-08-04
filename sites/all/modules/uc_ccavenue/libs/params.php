
<form method="post" action="checkout.php">
	<table>
		<tr>
			<td>Merchant Id : </td><td><input type="text" name="Merchant_Id" value=""></td>
		</tr>
		<tr>
			<td>Amount : </td><td><input type="text" name="Amount" value="10.00"></td>
		</tr>
		<tr>
			<td>Order Id : </td><td><input type="text" name="Order_Id" value="test_r1234"></td>
		</tr>
		<tr>
			<td>Redirect URL : </td><td><input type="text" name="Redirect_Url" value="redirecturl.php"></td>
		</tr>

		The Billing details of the customer have to be mandatorily sent via the below mentioned parameters. Please note this has to be authentic data else the transaction would be rejected by the risk team.

		<tr>
			<td>Bill Name : </td><td><input type="text" name="billing_cust_name" value="test"></td>
		</tr>
		<tr>
			<td>Bill Address : </td><td><input type="text" name="billing_cust_address" value="testtesttesttest"></td>
		</tr>
		<tr>
			<td>Bill Country : </td><td><input type="text" name="billing_cust_country" value="test"></td>
		</tr>
		<tr>
			<td>Bill State : </td><td><input type="text" name="billing_cust_state" value="test"></td>
		</tr>
		<tr>
			<td>Bill City : </td><td><input type="text" name="billing_city" value="test"></td>
		</tr>
		<tr>
			<td>Bill Zip : </td><td><input type="text" name="billing_zip" value="400064"></td>
		</tr>
		<tr>
			<td>Bill Tel : </td><td><input type="text" name="billing_cust_tel" value="test"></td>
		</tr>
		<tr>
			<td>Bill Email : </td><td><input type="text" name="billing_cust_email" value="test"></td>
		</tr>
		<tr>
			<td>Ship Name : </td><td><input type="text" name="delivery_cust_name" value="test"></td>
		</tr>
		<tr>
			<td>Ship Address : </td><td><input type="text" name="delivery_cust_address" value="test"></td>
		</tr>
		<tr>
			<td>Ship Country : </td><td><input type="text" name="delivery_cust_country" value="test"></td>
		</tr>
		<tr>
			<td>Ship State : </td><td><input type="text" name="delivery_cust_state" value="test"></td>
		</tr>
		<tr>
			<td>delivery city : </td><td><input type="text" name="delivery_city" value="test"></td>
		</tr>
		<tr>
			<td>Ship Zip : </td><td><input type="text" name="delivery_zip" value="400064"></td>
		</tr>
		<tr>
			<td>Ship Tel : </td><td><input type="text" name="delivery_cust_tel" value="654564465"></td>
		</tr>
		<tr>
			<td>Delivery Notes : </td><td><input type="text" name="delivery_cust_notes" value="test"></td>
		</tr>
		 <tr>
			<td>PayType: [dummy values, please contact service@ccavenue.com for actual bank short codes]: </td><td><input type="text" name="payType" value=""></td>
		</tr>
		<tr>
			<td>Billing Page Heading : </td><td><input type="text" name="billingPageHeading" value=""></td>
		</tr>
	
		
		
</td>

			</tr>

		
		<tr>
			<td colspan='2' align='center'>
				<INPUT TYPE="submit" value="submit">
			</td>
		</tr>
	</table>
</form>
