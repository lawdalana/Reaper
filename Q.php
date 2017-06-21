<?php
$host = "localhost";
$username = "root";
$password = "";
$tablename = "test";
$connection = mysqli_connect( $host, $username, $password, $tablename);
$sql = "select ID,FirstName,LastName,ItemID from profile where Firstname like '%".$_POST['search']."%'";
// $sql = "select id,username,title,fav from result where title like '%F%'";
// AND updated > date("2017-05-20")
// AND published="N"
// AND chapter>=28
// order by result_value desc';
$result = mysqli_query($connection, $sql);
$output = "<h4 alias='center'> Search Result</h4>";
if(mysqli_num_rows($result)>0){
  $output .= "<table class='table table-bordered'
        <tr>
          <th>ID</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>ItemID</th>
        </tr>
  ";
  while($tmp = mysqli_fetch_assoc($result)) {
    $output.="<tr><td>".$tmp["ID"]."</td><td>".$tmp["FirstName"]."</td><td>".$tmp["LastName"]."</td><td>".$tmp["ItemID"]."</td></tr>";
}
    $output.="</table>";
    echo $output;
}
else{
  echo "Data not found<br>";
}
?>
