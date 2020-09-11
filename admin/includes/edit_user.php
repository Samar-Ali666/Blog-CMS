<?php

if (isset($_GET['edit_user'])) {
	
	 $the_user_id = $_GET['edit_user'];

	 $query = "SELECT * FROM users WHERE user_id = {$the_user_id} ";
	 $select_user_query =  mysqli_query($connection, $query);

	 while ($row = mysqli_fetch_assoc($select_user_query)) {
	 	
	 	$user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
	 }
}

if (isset($_POST['edit_user'])) {
	
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];
	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];

	$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

	$query = "UPDATE users SET ";
	$query .= "user_firstname = '{$user_firstname}', ";
	$query .= "user_lastname = '{$user_lastname}', ";
	$query .= "user_role = '{$user_role}', ";
	$query .= "username = '{$username}', ";
	$query .= "user_email = '{$user_email}', ";
	$query .= "user_password = '{$user_password}' ";
	$query .= "WHERE user_id = {$the_user_id}";

	$edit_user_query = mysqli_query($connection, $query);
	confirmQuery($edit_user_query);
}


?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
	</div>
	<div class="form-group">
		<label for="post_status">Lastname</label>
		<input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
	</div>
	<div class="form-group">
		<select name="user_role" id="">
			<option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
			<option value='admin'>admin</option>
			<option value='subscriber'>subscriber</option>
		</select>
	</div>
	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">
	</div> -->
	<div class="form-group">
		<label for="post_tags">Username</label>
		<input type="text" class="form-control" value="<?php echo $username ?>" name="username">
	</div>
	<div class="form-group">
		<label for="post_content">Email</label>
		<input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email"></input>
	</div>
	<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" class="form-control" value="<?php echo $user_password ?>" name="user_password"></input>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
	</div>
</form>