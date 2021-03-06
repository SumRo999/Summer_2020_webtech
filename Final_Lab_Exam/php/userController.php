<?php 
	session_start();
	require_once('../php/session_header.php');
	require_once('../service/userService.php');


	//add user
	if(isset($_POST['create'])){
		$id             = $_POST['id'];
		$authorname 	= $_POST['authorname'];
		$contactnumber 	= $_POST['contactnumber'];
		$username 	    = $_POST['username'];
		$password 	    = $_POST['password'];

		if(empty($id) ||empty($authorname) || empty($contactnumber) ||empty($username) || empty($password)){
			header('location: ../views/register.php?error=null_value');
		}else{

			$author = [
				'id'=>$id,
				'authorname'=>$authorname,
				'contactnumber'=>$contactnumber,
				'username'=> $username,
				'password'=> $password
			];

			$status = insert($author);

			if($status){
				header('location: ../views/all_author.php?success=done');
			}else{
				header('location: ../views/create.php?error=db_error');
			}
		}
	}

	//update author
	if(isset($_POST['edit'])){

		$authorname 	= $_POST['authorname'];
		$contactnumber 	= $_POST['contactnumber'];
		$username 	    = $_POST['username'];
		$password 	    = $_POST['password'];
		$id             = $_POST['id'];

		if(empty($id) ||empty($authorname) || empty($contactnumber) ||empty($username) || empty($password)){
			header('location: ../views/edit.php?id={$id}');
		}else{
			
			$author = [
				'id'=> $id,
				'authorname'=>$authorname,
				'contactnumber'=>$contactnumber,
				'username'=> $username,
				'password'=> $password
			];

			$status = update($author);

			if($status){
				header('location: ../views/all_author.php?success=done');
			}else{
				header('location: ../views/edit.php?id={$id}');
			}
		}
	}

?>