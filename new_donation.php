<html>
<head>
<style type="text/css">
label {
  display: inline-block;
  width: 140px;
  text-align: right;
  font-weight: bold;
}​
</style>
</head>
<body>
<?php

if(isset($_POST['submit_btn'])){
	$url = 'https://donationproject.herokuapp.com/register/';
	$data = array('name' => $_POST['name'],'type_of_donation' => $_POST['type_of_donation'],'amount' => $_POST['amount'],'mode' => $_POST['mode'],'date' => $_POST['date'],'cheque_no' => $_POST['cheque_no'],'bank' => $_POST['bank'],'branch' => $_POST['branch'],'receipt_no' => $_POST['receipt_no'],'email' => $_POST['email'],'mobile' => $_POST['mobile'],'whatsapp' => $_POST['whatsapp'],'address' => $_POST['address'],'pan_no' => $_POST['pan_no'],'date_of_birth' => $_POST['date_of_birth'],'occation' => $_POST['occation']);

	$options = array(
	  'http' => array(
	    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	    'method'  => 'POST',
	    'content' => http_build_query($data),
	  ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	/*echo $result;*/
	$arr = json_decode($result,true);
}
?>

<a href="donation_list.php">Back</a>
<h2 style="text-align:center">New Donation</h2>
<form method="post" style="margin-top:2%" action="index.php">

<div style="float:left;margin-left:16%">
  <label>Name:</label>
  <input type="text" name="name" placeholder="" required><br><br>
  <label>Type of donation:</label>
  <input type="text" name="type_of_donation" placeholder="" required><br><br>
  <label>Amount:</label>
  <input type="text" name="amount" placeholder="" required><br><br>
  <label>Date:</label>
  <input type="date" name="date" placeholder="" required><br><br>
  <label>Mode:</label>
  <input type="text" name="mode" placeholder="" required><br><br>
  <label>Cheque No.?/NEFT Ref.:</label>
  <input type="text" name="cheque_no" placeholder="" required><br><br>
  <label>Bank:</label>
  <input type="text" name="bank" placeholder="" required><br><br>
  <label>Branch:</label>
  <input type="text" name="branch" placeholder="" required><br><br>
</div>
<div style="float:right;margin-right:22%">
  <label>Receipt No.:</label>
  <input type="text" name="receipt_no" placeholder="" required><br><br>
  <label>Email:</label>
  <input type="text" name="email" placeholder="" required><br><br>
  <label>Mobile:</label>
  <input type="text" name="mobile" placeholder="" required><br><br>
  <label>Whatsapp:</label>
  <input type="text" name="whatsapp" placeholder="" required><br><br>
  <label>Address:</label>
  <input type="text" name="address" placeholder="" required><br><br>
  <label>PAN No.:</label>
  <input type="text" name="pan_no" placeholder="" required><br><br>
  <label>Date of birth:</label>
  <input type="date" name="date_of_birth" placeholder="" required><br><br>
  <label> Occation:</label>
  <input type="text" name="occation" placeholder="" required><br>
  <label> </label>
</div>
<div style="text-align:center">
  <input style="margin-top:30%;margin-left:5%" type="checkbox" name="send_sms" value="send_sms">Send delivery SMS<br><br>

  <button name="submit_btn" value="submit_btn" style="background-color:green;width:100px;height:30px;" type="submit">Submit</button>
</div>
</form>

</body>
</html>