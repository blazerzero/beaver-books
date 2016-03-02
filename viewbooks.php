<!DOCTYPE html>
<?php include "./header.php" ?>
<?php include "./quicknav.php" ?>

<html>
  <head>
    <title>View Books</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>

  </head>
  <body>
    <br><br>
    <left class="sitename">BEAVERBOOKS</left>

    <ul class="navbar">
      <li><a href="./home.php">Home</a></li>
      <li class="active"><a href="./viewbooks.php">View Books</a></li>
      <li><a href="./booksell.php">Sell A Book</a></li>
      <li><a href="./locationpage.php">Books Near You</a></li>
      <li><a href="./about.html">About</a></li>
      <li style="float:right"><a href="./logout.php">Logout</a></li>
    </ul>

    <center><h1> View Books </h1></center>

    <div class="ui divider"></div>

		<div class="ui relaxed grid books">
		<!--	<script>
			var prices = [35, 30, 45, 60];
			var dates = [13, 13, 13, 9];
			var i = 0;
    </script> -->
			<div class="four column row">
				<?php
        $sql = "SELECT onid, subject, coursenum, title, author, price, isbn, condition, description, phone, email, facebook FROM books";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
				<div class="column">
					<div class="ui card books" data-content="Edit" data-variation="basic">
						<div class="content">
							<div class="header"> <?php echo htmlspecialchars($row["subject"]) . " " . htmlspecialchars($row["coursenum"]) ?> </div>
              <div class="header"> Title: <?php echo htmlspecialchars($row["title"]) ?> </div>
              <div class="header"> Author: <?php echo htmlspecialchars($row["author"]) ?> </div>
							<div class="meta">
								<span class="date">Posted: March 1, 2016 by <?php echo htmlspecialchars($row["onid"]) ?></span>
							</div>

							<h3>$<?php echo htmlspecialchars($row["price"]) ?> </h3>
						</div>
            <div class="extra content">
              Contact Info
              <div class="ui divider"></div>
              <div class="content">
                <p>
                  <i class="phone icon square" style="zoom:150%"></i>
                  <?php echo htmlspecialchars($row["phone"]) ?>
                </p>
                <p>
                  <i class="mail icon square" style="zoom:150%"></i>
                  <?php echo htmlspecialchars($row["email"]) ?>
                </p>
                <p>
                  <i class="facebook icon square" style="zoom:150%"></i>
                  <?php echo htmlspecialchars($row["facebook"]) ?>
                </p>
              </div>
            </div>
						<div class="extra content" style="margin:auto">
              <button class="ui basic blue button">Edit</button>
              <button class="ui basic red button" id="delete">Delete</button>
						</div>
					</div>
				</div>
				<?php }
        else echo "No Books";
        ?>
			</div>
		</div>

		<br>

  </body>
</html>

<?php include "./footer.php" ?>
