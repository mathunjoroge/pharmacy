<?php
include('../connect.php');

// Fetch pharmacy details
$result = $db->query("SELECT * FROM pharmacy_details LIMIT 1");
$row = $result->fetch();
$name = $row['pharmacy_name'];
$address = $row['location'];
$phone = $row['contact'];
$slogan = $row['slogan'];
$email = $row['email'];
?>

<form action="saveeditpharmacy.php" method="POST">
  <label for="pharmacy-name">Pharmacy Name</label>
  <input type="text" id="pharmacy-name" name="name" value="<?php echo $name; ?>" placeholder="Pharmacy Name" autocomplete="off" required />

  <label for="physical-address">Physical Address</label>
  <input type="text" id="physical-address" name="address" value="<?php echo $address; ?>" placeholder="Physical Address" autocomplete="off" required />

  <label for="phone">Phone</label>
  <input type="text" id="phone" name="telephone" value="<?php echo $phone; ?>" placeholder="Phone" autocomplete="off" required />

  <label for="email">Email</label>
  <input type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="Email" autocomplete="off" required />

  <label for="slogan">Slogan</label>
  <input type="text" id="slogan" name="slogan" value="<?php echo $slogan; ?>" placeholder="Slogan" autocomplete="off" required />

  <button class="btn btn-success" style="border-radius: 3px; width: 98%;">Save</button>
</form>
