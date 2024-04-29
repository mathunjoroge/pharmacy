<?php
    include('../connect.php');
    $id = $_GET['id'];
    $result = $db->prepare("SELECT * FROM user WHERE id= :id");
    $result->bindParam(':id', $id);
    $result->execute();
    for ($i = 0; $row = $result->fetch(); $i++) {
?>
<form action="saveedituser.php" method="post">
    <h4 style="text-align: center;">Edit User</h4>
    <hr>

    <input type="hidden" name="memi" value="<?php echo $id; ?>" />
    <label>Username: </label><input type="text" name="a" value="<?php echo $row['username']; ?>" required/><br>
    <label>Password: </label><input type="password" name="b" value="" /><br>
    <label>Contact: </label><input type="text" name="c" value="<?php echo $row['contact']; ?>" required/><br>
    <input type="hidden" name="d" value="<?php echo $row['name']; ?>" required/><br>
    <label>Position: </label>
    <select name="e">
        <option></option>
        <option>Pharmacist</option>
        <option>Cashier</option>
        <option>Admin</option>
    </select><br>
    <label>ID Number: </label><input type="text" name="f" value="<?php echo $row['idno']; ?>" /><br>

    <button class="btn btn-success" style="display: block; margin: 0 auto; width: 100%;"><i>Save Changes</i></button>
</form>


<?php
    }
?>
