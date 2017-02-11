<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

/*tr:nth-child(even) {
    background-color: #dddddd;
}*/
</style>	
</head>
<body>

<a href="index.php">Back</a><br><br>

<button style="background-color:green;color:white;width:200px;height:35px;" onClick="location.href='new_donation.php'">New Donation</button>
<br><br>

<?php
$url_donors = 'https://donationproject.herokuapp.com/get_all_donors/';
$options_donors = array(
  'http' => array(
    /*'header'  => array(
                  'LOGGED-IN: 1',
                ),*/
    'method'  => 'GET',
  ),
);
$context_donors = stream_context_create($options_donors);
$output_donors = file_get_contents($url_donors, false,$context_donors);
/*echo $output_donors;*/
$arr_donors = json_decode($output_donors,true);
/*echo $arr_donors[0]['results'][0]['name'];*/
?>

<table>
  <tr>
    <th>Name</th>
    <th>Date</th>
    <th>Type Of Donation</th>
    <th>Amount</th>
    <th>Cheque No.</th>
    <th>Bank</th>
    <th>Branch</th>
    <th>Receipt No.</th>
    <th>Pan No.</th>
    <th>Occation</th>
  </tr>

<?php 
for ($x = 0; $x < count($arr_donors[0]['results']); $x++) { 

?>

  <tr>
    <td><?php echo $arr_donors[0]['results'][$x]['name']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['date']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['type_of_donation']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['amount']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['cheque_no']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['bank']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['branch']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['receipt_no']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['pan_no']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['occation']; ?></td> 
  </tr>

<?php  } 
?>
  
</table>

</body>
</html>