<?php
$host = "localhost";
$username = "root";
$password = 1234;
$tablename = "test";
$connection = mysqli_connect($host, $username, $password, $tablename);
// $sql = "select id, username, title, fav from result where title like '%".$_POST['search']."%'";
$sql = "select title, fav, chapter, visitor_all, visitor, id, username
from result
where title like '%".$_POST['search']."%'
AND DATEDIFF(NOW(),updated)<=30
AND published=\"N\"
AND chapter>=28
order by result_value desc, fav desc";
$result = mysqli_query($connection, $sql);
$output = "<h4 alias='center'> Search Result</h4>";
if(mysqli_num_rows($result)>0){
  $output .= "<table class='table'
        <tr>
          <th>Username</th>
          <th>Title</th>
          <th>Fav</th>
          <th>Chapter</th>
          <th>Visitor_All</th>
          <th>Visitor</th>
          <th>Choose</th>
        </tr>
  ";
  while($tmp = mysqli_fetch_assoc($result)) {
    // Href Link
    $linkMyid = "https://my.dek-d.com/".$tmp["username"];
    $linkNovel = $linkMyid."/story/view.php?id=".$tmp["id"];

    // Data String show novel detail in html format
    $output.="<tr class='statusNovel'><td class='itemUser'><a target='_blank' href='".$linkMyid."'>". $tmp["username"] ."</a></td>".
    "<td class='itemtitle'><a target='_blank' href='".$linkNovel."'>". $tmp["title"] ."</a></td>".
    "<td class='showstat'>". $tmp["fav"]. "</td>".
    "<td class='showstat'>". $tmp["chapter"]. "</td>".
    "<td class='showstat'>". $tmp["visitor_all"]. "</td>".
    "<td class='showstat'>". $tmp["visitor"]. "</td>".

    // Create button
    "<td class='button-state'>".
    "<div class='btn-group' role='group'>".
      "<button type='button' class='btn btn-success glyphicon glyphicon-thumbs-up' id='good'></button>".
      "<button type='button' class='btn btn-warning glyphicon glyphicon-time' id='wait'></button>".
      "<button type='button' class='btn btn-danger glyphicon glyphicon-thumbs-down' id='bad'></button>".
    "</div></td></tr>";
}
    $output.="</table>";
    echo $output;
}
else{
  echo "Data not found<br>";
}
?>
