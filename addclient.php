<html>
<body>

<h1>Small Items Checkout - Add Client</h1>

<?php include("menu.php"); ?>

<form action = "addclient_db.php" method = "post">
  <label for="first_name">First Name:</label> 
    <input type="text" name="first_name" /><br />
  <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" /><br />
  <label for="psu_id">PSU ID:</label>
    <input type="text" name="psu_id" /><br />
  <label for="phone">Phone:</label>
    <input type="text" name="phone" /><br />
  <label for="email">Email:</label>
    <input type="text" name="email" /> <br />
  <label for="notes">Notes:</label>
    <textarea name = "notes" rows="5" cols="50" ></textarea><br/>
  <input type="submit" value="Add" />
</form>

</body>
</html>
