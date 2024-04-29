<form action="savepharmacy.php" method="POST">
  <label for="pharmacy-name">Pharmacy Name</label>
  <input type="text" id="pharmacy-name" name="name" placeholder="Pharmacy Name" value="" autocomplete="off" required />

  <label for="physical-address">Physical Address</label>
  <input type="text" id="physical-address" name="address" placeholder="Address" value="" autocomplete="off" required />

  <label for="phone">Phone</label>
  <input type="text" id="phone" name="telephone" placeholder="Telephone" value="" autocomplete="off" required />

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Email" value="" autocomplete="off" required />

  <label for="slogan">Slogan</label>
  <input type="text" id="slogan" name="slogan" placeholder="Slogan" value="" autocomplete="off" required />

  <button class="btn btn-success" style="border-radius: 3px; width: 98%;">Save</button>
</form>
