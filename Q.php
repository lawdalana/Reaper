<?php
$host = "localhost";
$username = "root";
$password = "1234";
$tablename = "test";
$connection = mysqli_connect($servername, $username, $password, $tabfelename);
// $sql = "select id,username,title,fav from result where title like '%".$_POST['search']."%'";
$sql = "select id,username,title,fav from result where title like '%F%'";
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
          <th>Username</th>
          <th>Title</th>
          <th>Fav</th>
        </tr>
  ";
  while($tmp = mysqli_fetch_assoc($result)) {
    $output.="<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["title"]."</td><td>".$row["fav"]."</td></tr>".
}
    $output.="</table>";
    echo $output;
}
else{
  echo "Data not found<br>"
}
?>
