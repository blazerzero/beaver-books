<?php include "./header.php" ?>

<?php

$results = $mysqli->prepare("SELECT onid,dateposted,subject,coursenum,title,author,price,isbn,cond,contact,address,lat,lon from books ORDER BY dateposted DESC LIMIT $page_position, $item_per_page");
$results->execute(); //Execute prepared Query
$results->bind_result($onid, $dateposted, $subject, $coursenum, $title, $author, $price, $isbn, $cond, $contact, $address, $lat, $lng); //bind variables to prepared statement

$bookdata = array();
while($results->fetch()) {
  $bookdata[] = array("lat"=>$lat, "lng"=>$lng, "book"=>$title);
}

?>

<script type="text/javascript">
var data = "<?php echo json_encode($bookdata); ?>";
</script>
<script type="text/javascript" src="./locationpage.php"></script>

<?php include "./footer.php" ?>
