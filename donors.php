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
    <th>Email</th>
    <th>Mobile</th>
    <th>Address</th>
    <th>Date Of Birth</th>
    <th>Email and SMS</th>
  </tr>

<?php 
for ($x = 0; $x < count($arr_donors[0]['results']); $x++) { 

?>

  <tr>
    <td><?php echo $arr_donors[0]['results'][$x]['name']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['email']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['mobile']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['address']; ?></td>
    <td><?php echo $arr_donors[0]['results'][$x]['date_of_birth']; ?></td>

    <td>
    <form method="post" action="donors.php">
     <input type="hidden" value="<?php echo $arr_donors[0]['results'][$x]['email']; ?>"></input>
     <input type="hidden" value="<?php echo $arr_donors[0]['results'][$x]['mobile']; ?>"></input>
     <button type="submit" style="background-color:green;color:white;width:150px;height:35px;">Email and SMS</button>
    </form>
    </td>
  </tr>

<?php  } 
?>
  
</table>


</body>
</html>



