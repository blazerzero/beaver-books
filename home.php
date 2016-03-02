<!DOCTYPE html>

<?php include "./header.php" ?>
<?php include "./quicknav.php" ?>

<?php
	if (checkAuth(true) != "") {
?>

<html>
  <head>
    <title>BeaverBooks</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
		<script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="../server/server.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  </head>
  <body>
    <br><br>
    <left class="sitename"> BEAVERBOOKS </left>

    <div>
      <ul class="navbar">
        <li class="active"><a href="./home.php">Home</a></li>
				<li><a href="./viewbooks.php">View Books</a></li>
        <li><a href="./booksell.php">Sell A Book</a></li>
        <li><a href="./locationpage.php">Books Near You</a></li>
        <li><a href="./about.html">About</a></li>
        <li style="float:right"><a href="./logout.php">Logout</a></li>
      </ul>

			<div class="ui divider"></div>

			<center><div>
	      <p>
	        <style>
	          p {
	            font-size: 16px;
	            margin: 0 300 0 300;
	          }
	        </style>
	        Beaverbooks is a free to use Book Bazaar, where students can trade
	      and sell their used textbooks at fair prices and greater convenience.
	      Login now to experience the fairness and convenience that students deserve!</p>
	      <br>
	    </div></center>

	    <h2 class="ui horizontal divider header">Creators</h2>
	    <br>
	    <center>
	      <h3>Julian Weisbord</h3>
	      <h3>Bradley Imai</h3>
	      <h3>Omeed Habibelahian</h3>
	      <h3>Brennan Giles</h3>
	      <h3>Benny Wick</h3>
	      <h3>Andrew Davis</h3>
	    </center>

			<script>
			if ($(window).scrollTop() > 150) {
				$("#quicknav").removeClass("off");
				$("#quicknav").addClass("on");
			}
			else {
				$("#quicknav").removeClass("on");
				$("#quicknav").addClass("off");
			}
			</script>

    </div>
  </body>
</html>

<?php } ?>
<?php include "./footer.php" ?>
