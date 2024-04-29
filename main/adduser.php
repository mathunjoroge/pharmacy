<form action="saveuser.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add user</h4></center>
<hr>
<div class="container-fluid">
<label>Username : </label><input type="text" style="width:265px; height:30px;" name="name" placeholder="Full Name" Required/><br>

<label>password : </label><input type="text" style="width:265px; height:30px;" name="pass" placeholder="password"/><br>
<label>Contact : </label><input type="text" style="width:265px; height:30px;" name="cont" placeholder="contact"/><br>
<label></label><input type="hidden" style="width:265px; height:30px;" name="other" placeholder="other names"/><br>
<label>position </label><select type="text" style="width:265px; height:30px;" name="pos"><option><option>cashier</option><option>pharmacist</option><option>admin</option></select><br>
<label>Id number </label><input type="text" style="width:265px; height:30px;" name="idno" placeholder="Id Number"/><br>
<button class="btn btn-success  btn-large" style="width: 18em;" align="center"><i class="icon icon-save icon-large"></i> Save</button>
</div>

</form>