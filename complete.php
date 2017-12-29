<?php 
$conn = mysqli_connect('localhost','root','','cms');

?>



<?php
	
	/**
	 * // <!-- SHOWING DATABASE TABLE -->
	 */
	function showDataBaseTable($edit = "default"){

		global $conn;

		$query = "SELECT * FROM ajax ORDER BY id DESC";
		$result = mysqli_query($conn, $query);
		?>

		<table>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php
			while($rows = mysqli_fetch_assoc($result)){
				?>
				<tr>
					<?php if($edit != $rows['id']){ ?>
						<td><?php echo $rows['name']; ?></td>
						<td><?php echo $rows['email']; ?></td>
						<td><button id="edit" name = "edit" onclick="editUser(this.value)" value="<?php echo $rows['id']; ?>">Edit</button></td>
					<?php } elseif ($edit == $rows['id']) { ?>
					<!-- <form id="editUserForm" name="editUserForm" onsubmit="applyEdit(this.value)" value="<?php echo $rows['id']; ?>"> -->
						<td><input type="text" id="editName<?php echo $rows['id']; ?>" value= "<?php echo $rows['name']; ?>"</td>
						<td><input type="text" id="editEmail<?php echo $rows['id']; ?>" value= "<?php echo $rows['email']; ?>"</td>
						<td><button onclick="applyEdit(<?php echo $rows['id']; ?>)" id="applyEdit" value="applyEdit">Apply Edit</button></td>
						<!--<td><button id="applyEdit" name="applyEdit" <?php // onsubmit="applyEdit(this.value)" ?> value="<?php echo $rows['id']; ?>">Apply Edit</button></td>-->
					<!-- </form> -->
					<?php } ?>
					<!-- <td><button id="edit" name = "edit" onclick="editUser(this.value)" value="<?php echo $rows['id']; ?>">Edit</button></td> -->
					<td><button id="delete" name="delete" onclick="delUser(this.value)" value="<?php echo $rows['id']; ?>">Delete</button></td>
				</tr>
				<?php
			}
			?>
		</table>
		<?php
	}

	/*
		Starting if Condetion
	 */
	
	// Case: Posting to Database
	if(isset($_POST['name']) && !empty(trim($_POST['name'])) && isset($_POST['email']) && !isset($_POST['apply'])){
		// var_dump($_POST);
		$name = mysqli_escape_string($conn, $_POST['name'] );
		$email = mysqli_escape_string($conn, $_POST['email']);
		
		// POST Query
		$query = "INSERT INTO `ajax` (`name`,`email`) VALUES ('".$name."' , '".$email."')";
		$result = mysqli_query($conn, $query);

		$msg = "Successfully Added User: $name with Email: $email.";
		?>
		<div class="msg">
			POSTING<br>
			<?php echo $msg; ?>
		</div>

		<?php
		showDataBaseTable();

	}

	// Case: Deleting from Database 
	elseif(isset($_POST) && isset($_POST['delValue'])){

		$query = "DELETE FROM `ajax` WHERE id = '" . $_POST['delValue'] . "'";
		// echo $query;
		$result = mysqli_query($conn, $query);
		
		$msg = "DELETING";
		?>
		<div class="msg">
			<?php echo $msg; ?>
		</div>
		
		
		<?php
		showDataBaseTable();

	}

	// Case: Editing Database 
	elseif(isset($_POST) && isset($_POST['edit'])){

		
		
		$msg = "EDITING " . $_POST['edit'];
		?>
		<div class="msg">
			<?php echo $msg; ?>
		</div>
		
		
		<?php
		showDataBaseTable($edit = $_POST['edit']);

	}

	// Case: Applying Edits
	elseif(isset($_POST['apply']) && $_POST['apply'] = "applyEdit"){
		// var_dump($_POST);
		$msg = "APPLYING ";
		?>
		<div class="msg">
			<?php echo $msg; ?>
		</div>
		
		<?php

		$query = "UPDATE `ajax` SET name = '".$_POST['name']."', email = '".$_POST['email']."' WHERE id = '".$_POST['id']."'";

		// echo $query;
		$result = mysqli_query($conn, $query);
		

		showDataBaseTable();
	}

	// Case: Default View "GETTING DATA"
	else {

		echo "<div class='msg'>GETTING</div>";

		showDataBaseTable();

	}

?>