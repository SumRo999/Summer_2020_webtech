<?php 
	session_start();
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');


	//add company
	if(isset($_POST['create'])){
		$id 	= $_POST['id'];
		$company_name 	= $_POST['company_name'];
		$profile_description = $_POST['profile_description'];
		$industry 	= $_POST['industry'];
		$company_website 	= $_POST['company_website'];
		$company_logo = $_POST['company_logo'];
		$user_account_id 	= $_POST['user_account_id'];

		if(empty($id) || empty($company_name) || empty($profile_description) || empty($industry) || empty($company_website) || empty($company_logo) || empty($user_account_id)){
			header('location: ../views/create_company.php?error=null_value');
		}else{
			if(empty(getByID($id)['id']))
			{
				$user = [
					'id'=>$id,
					'company_name'=>$company_name,
					'profile_description'=>$profile_description,
					'industry'=>$industry,
					'company_website'=>$company_website,
					'company_logo'=>$company_logo,
					'user_account_id'=>$user_account_id
				];

				$status = insert($user);

				if($status){
					header('location: ../views/all_company.php?success=done');
				}else{
					header('location: ../views/create_company.php?error=db_error');
				}
			}
			else
				header('location: ../views/create_company.php?error=i');

		}
	}

	//update company
	if(isset($_POST['edit']))
	{

		$id 	= $_POST['id'];
		$company_name 	= $_POST['company_name'];
		$profile_description = $_POST['profile_description'];
		$industry 	= $_POST['industry'];
		$company_website 	= $_POST['company_website'];
		$company_logo = $_POST['company_logo'];
		$user_account_id 	= $_POST['user_account_id'];

		if(empty($id) || empty($company_name) || empty($profile_description) || empty($industry) || empty($company_website) || empty($company_logo) || empty($user_account_id))
		{
			header('location: ../views/edit_company.php?id={$id}');
		}
		else
		{
				$user = [
					'id'=>$id,
					'company_name'=>$company_name,
					'profile_description'=>$profile_description,
					'industry'=>$industry,
					'company_website'=>$company_website,
					'company_logo'=>$company_logo,
					'user_account_id'=>$user_account_id
				         ];

				$status = update($user);

				if($status)
				{
					header('location: ../views/all_company.php?success=done');
				}
				else
				{
					header('location: ../views/edit_company.php?id={$id}');
				}
			
		}
	}


	//delete company
	if(isset($_POST['yes']))
	{
		$id = $_POST['id'];
		$status = delete($id);

		if($status){
			header('location: ../views/all_company.php?success=done');
		}
	}
	elseif(isset($_POST['no']))
	{
		header('location: ../views/all_company.php?');
	}

?>