<?php include "./header.php" ?>

<?php

/*function IsChecked($chkname,$value) {
  if(!empty($_POST[$chkname])) {
    foreach($_POST[$chkname] as $chkval) {
      if($chkval == $value) return true;
    }
  }
  return false;
}*/

if ($sql = $mysqli->prepare("INSERT INTO books (onid, subject, coursenum, title, author, price, isbn, cond, contact, address) VALUES (?,?,?,?,?,?,?,?,?,?)")) {
  $sql->bind_param("ssisssssss", $onid, $subject, $coursenum, $title, $author, $price, $isbn, $condition, $contact, $address);

  $onid = htmlspecialchars(checkAuth(false));
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

php include "./footer.php"

header("Location: viewbooks.php");
exit();
?>
