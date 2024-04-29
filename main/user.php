<?php
$title = "users";
include('navfixed.php');
include('../connect.php');

// Fetch user data
$result = $db->prepare("SELECT * FROM user ORDER BY id DESC");
$result->execute();
$rowcount = $result->rowCount(); // Correcting typo: rowCount()

?>

<div class="container">
    <div class="page-header">
        <h1>Users</h1>
        <ul class="breadcrumb">
            <li><a href="admin.php">Dashboard</a></li>
            <li class="active">Users</li>
            <li><a href="admin.php" class="btn btn-success btn-large"><i class="icon icon-circle-arrow-left icon-large"></i> Back</a></li>
        <li><a rel="facebox" href="adduser.php" class="btn btn-info btn-large"><i class="icon-plus-sign icon-large"></i> Add User</a></li>
        </ul>
    </div>

    <div class="header-buttons">
        
    </div>

    <div class="search-container">
        <input type="text" name="filter" id="filter" placeholder="Search user..." autocomplete="off" />
    </div>

    <div class="users-count">
        Total Number of users: <span style="color:green; font-weight:bold; font-size:22px;"><?php echo $rowcount; ?></span>
    </div>

    <table class="table table-bordered" id="resultTable" data-responsive="table">
        <thead>
            <tr>
                <th width="17%">User Name</th>
                <th width="10%">Contact</th>
                <th width="20%">Other Names</th>
                <th width="9%">Position</th>
                <th width="17%">Id number</th>
                <th width="9%">Edit</th>
                <th width="14%">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr class="record">
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['contact']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['position']); ?></td>
                    <td><?php echo htmlspecialchars($row['idno']); ?></td>
                    <td><a title="Click To Edit user" rel="facebox" href="edituser.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit</a></td>
                    <td><a href="#" id="<?php echo $row['id']; ?>" class="delbutton btn btn-danger btn-mini" title="Click To Delete"><i class="icon-trash"></i> Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="js/jquery.js"></script>
<script>
$(function() {
    $(".delbutton").click(function() {
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        
        if (confirm("Are you sure you want to delete? There is NO undo!")) {
            $.ajax({
                type: "GET",
                url: "deleteuser.php",
                data: info,
                success: function() {
                    // Handle success, if needed
                },
                error: function(xhr, status, error) {
                    // Handle error, if needed
                    console.error(xhr.responseText);
                }
            });
            
            $(this).closest("tr").fadeOut("slow", function() {
                $(this).remove();
            });
        }
        return false;
    });
});
</script>

<?php include('footer.php'); ?>
</body>
</html>
