<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $query = "SELECT * FROM users";
        $select_posts=mysqli_query($connection, $query);
        while($row=mysqli_fetch_assoc($select_posts)){
            $user_id=$row['user_id'];
            $username=$row['username'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_role=$row['user_role'];
            echo "<tr><td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td><img width='100' src='../images/{$user_image}' alt='image'></td>";
            echo "<td>{$user_role}</td>";
            echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php 
if(isset($_GET['change_to_admin'])){
    $the_user_id=$_GET['change_to_admin'];
    $query="UPDATE users SET user_role='admin' WHERE user_id={$the_user_id}";
    $admin_query=mysqli_query($connection, $query);
    header("Location: users.php");
}

if(isset($_GET['change_to_subscriber'])){
    $the_user_id=$_GET['change_to_subscriber'];
    $query="UPDATE users SET user_role='subscriber' WHERE user_id={$the_user_id}";
    $subscriber_query=mysqli_query($connection, $query);
    header("Location: users.php");
}

if(isset($_GET['delete'])){
    $delete_user_id=$_GET['delete'];
    $query="DELETE FROM users WHERE user_id={$delete_user_id}";
    $delete_query=mysqli_query($connection, $query);
    header("Location: users.php");
}
?>