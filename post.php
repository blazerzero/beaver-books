<?php include "./header.php" ?>

<?php

$date = time();

if ($sql = $mysqli->prepare("INSERT INTO books (onid, dateposted, subject, coursenum, title, author, price, isbn, cond, contact, address) VALUES (?,?,?,?,?,?,?,?,?,?,?)")) {
  $sql->bind_param("ssisssssss", $onid, $dateposted, $subject, $coursenum, $title, $author, $price, $isbn, $condition, $contact, $address);

  $onid = htmlspecialchars(checkAuth(false));
  $dateposted = date("m-d-Y",$date);
  $subject = $_POST["subject"];
  $coursenum = $_POST["coursenum"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $price = $_POST["price"];
  $isbn = $_POST["isbn"];
  $condition = "Excellent";

  $contact = $_POST["contact"];
  $address = $_POST["address"];


  $sql->execute();
  $sql->close();
}

else printf("Error: %s\n", $mysqli->error);

?>

<html>
  <head>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <title>Book Posted</title>
  </head>
  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</left>

    <div class="ui divider"></div>
    <center><div style="margin:2em 2em 2em 2em; font-size:20px">
      <p>Your book has been posted successfully</p>
      <a href="./viewbooks.php">Return to Book Viewer</a>
    </div></center>
  </body>
</html>

<?php include "./footer.php" ?>
