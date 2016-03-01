<!DOCTYPE html>
<?php include "./header.php" ?>
<?php include "./quicknav.php" ?>

<html>
  <head>
    <title>Search</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <script type="text/javascript" src="../server/server.js"></script>
  </head>
  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</h1></left>

    <ul class="navbar">
      <li><a href="./home.php">Home</a></li>
      <li><a href="./viewbooks.php">View Books</a></li>
      <li><a href="./booksell.php">Sell A Book</a></li>
      <li><a href="./locationpage.php">Books Near You</a></li>
      <li><a href="./about.html">About</a></li>
      <li style="float:right"><a href="./logout.php">Logout</a></li>
    </ul>

    <center><h1> Search Books </h1></center>

    <div class="ui divider"></div>

    <div class="textbody">
      <center><p>Here we will let the user search for the book they want,
      with multiple forms and options for how they want to search.
      The results will be displayed on the same page below these fields</p></center>
      <br>

      <div class="ui form">
        <div class="fields book">
          <div class="field">
            <label>Subject</label>
            <input type="text" id="subject" placeholder="e.g. MTH or math">
          </div>
          <div class="field">
            <label>Course Number</label>
            <input type="text" id="coursenum" placeholder="e.g. 111">
          </div>
          <div class="field">
            <label>Book Title</label>
            <input type="text" id="booktitle" placeholder="Book Title">
          </div>
          <div class="field">
            <label>Author</label>
            <input type="text" id="author" placeholder="Author">
          </div>
          <div class="field">
            <label>Price</label>
            <input type="text" id="price" placeholder="Price">
          </div>
          <div class="field">
            <label>ISBN Number</label>
            <input type="text" id="isbn" placeholder="ISBN">
          </div>
        </div>
        <button class="ui positive button" onclick="booksearch()">Search</button>
      </div>
    </div>
    <br>

    <script>
    function booksearch() {
      var subject = document.getElementById("subject").value;
      var coursenum = document.getElementById("coursenum").value;
      var booktitle = document.getElementById("booktitle").value;
      var author = document.getElementById("author").value;
      var price = document.getElementById("price").value;
      var isbn = document.getElementById("isbn").value;
      for (var i = 0; i < books.length; i++) {
        if (subject == books[i].subject) {/*display book*/}
        if (coursenum == books[i].coursenum) {/*display book ONLY IF the book is not already being displayed*/}
        if (booktitle == books[i].booktitle) {/*display book ONLY IF the book is not already being displayed*/}
        if (author == books[i].author) {/*display book ONLY IF the book is not already being displayed*/}
        if (price == books[i].price) {/*display book ONLY IF the book is not already being displayed*/}
        if (isbn == books[i].isbn) {/*display book ONLY IF the book is not already being displayed*/}
      }
    }
    </script>

  </body>
</html>
