<?php

if(isset($_POST['create_user'])){
	$username=$_POST['username'];
	$user_firstname=$_POST['user_firstname'];
	$user_lastname=$_POST['user_lastname'];
	$user_email=$_POST['user_email'];
	$user_image=$_FILES['user_image']['name'];
	$user_image_temp=$_FILES['user_image']['tmp_name'];
	$user_password=$_POST['user_password'];
	$user_role=$_POST['user_role'];

	move_uploaded_file($user_image_temp, "../images/$user_image");

	$query="INSERT INTO users(username, user_firstname, user_lastname, user_image, user_email, user_password, user_role)";
	$query .="VALUES('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_image}','{$user_email}', '{$user_password}', '{$user_role}')";

	$create_user_query=mysqli_query($connection,$query);
	confirm($create_user_query);

	echo "User created: " . " " . "<a href='users.php'>View Users</a>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>
	<select name="user_role">
		<option value="admin">admin</option>
		<option value="subscriber">subscriber</option>
	</select>
	<div class="form-group">
		<label for="user_image">User Image</label>
		<input type="file" name="user_image">
	</div>
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
	</div>
</form>