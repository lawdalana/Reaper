<?php
echo "https://my.dek-d.com/";


$linkMyid = "https://my.dek-d.com/".$tmp["username"];
$linkNovel = $linkMyid."/story/view.php?id=".$tmp["id"]
$output.="<tr><td alias='center' href='".$linkMyid."'>".$tmp["username"]."</td><td>".
"<span class='titleNovel' href='".$linkNovel."'>".$tmp["title"].
"</span><button alias='right'>Choose</button></td><td>.
$tmp["fav"]."</td><td>".
$tmp["chapter"]."</td><td>".
$tmp["visitor_all"]."</td><td>".
$tmp["visitor"]."</td></tr>";
