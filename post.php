<?php include "./header.php" ?>

<?php

if ($sql = $mysqli->prepare("INSERT INTO books (onid, subject, coursenum, title, author, price, isbn, condition, contact, address) VALUES (?,?,?,?,?,?,?,?,?,?)")) {
  $sql->bind_param("ssisssssss", $onid, $subject, $coursenum, $title, $author, $price, $isbn, $condition, $contact, $address);

  $onid = "habibelo";
  $subject = $_POST["subject"];
  $coursenum = $_POST["coursenum"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $price = $_POST["price"];
  $condition = $_POST["condition"];
  $contact = $_POST["contact"];
  $address = $_POST["address"];

  $sql->execute();
  $sql->close();
}

else printf("Error: %s\n", $mysqli->error);

header("Location: viewbooks.php");

?>
