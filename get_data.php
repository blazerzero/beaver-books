<?php include "./header.php" ?>

<?php
$bookdata = array();

if ($result = $mysqli->query("select onid,dateposted,subject,coursenum,title,author,price,isbn,cond,contact,address,lat,lng from books")) {
  while ($obj = $result->fetch_object()) {
    //echo $obj->lat . " " . $obj->lng . " " . $obj->title;
    $bookdata[] = array($obj->lat, $obj->lng, $obj->title);
    echo $bookdata[sizeof($bookdata) - 1][0] . ", " . $bookdata[sizeof($bookdata) - 1][1] . ", " . $bookdata[sizeof($bookdata) - 1][2];
  }
  $points = json_encode($bookdata);
}

echo $points;
?>

<?php include "./footer.php" ?>
