<?php include "./header.php" ?>
<?php date_default_timezone_set("America/Los_Angeles") ?>

<?php

$date = new DateTime();



// mysql_query("INSERT INTO books (onid, dateposted) VALUES ('weisborj','Today hi')");

if ($sql = $mysqli->prepare("INSERT INTO books (onid, dateposted, subject, coursenum, title, author, price, isbn, cond, contact, address, lat, lng) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)")) {
  $sql->bind_param("sssisssssssdd", $onid, $dateposted, $subject, $coursenum, $title, $author, $price, $isbn, $condition, $contact, $address, $lat, $lng);

  // for($i =0; $i< 400; $i++){
  //   $stringy = 1;
  //   $onid = "weisborj";
  //   $dateposted = "+";
  //   $subject = $stringy;
  //   $coursenum = "+";
  //   $title = "+";
  //   $author= "+";
  //   $price= "+";
  //   $isbn= "+";
  //   $condition= "+";
  //   $contact= "+";
  //   $address= "+";
  //   $stringy++;
  //   $sql->execute();
  // }




  $onid = $_POST["onid"];
  $dateposted = $date->format('m-d-Y');
  $subject = $_POST["subject"];
  $coursenum = $_POST["coursenum"];
  $title = $_POST["title"];
  $author = $_POST["author"];
  $price = $_POST["price"];
  $isbn = $_POST["isbn"];
  $condition = $_POST["cond"];

  $contact = $_POST["contact"];
  $address = $_POST["address"];



  $sql->execute();
  $sql->close();
}

else printf("Error: %s\n", $mysqli->error);

if ($sql = $mysqli->prepare("INSERT IGNORE INTO users (onid) VALUES (?)")) {
  $sql->bind_param("s", $onid);

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
