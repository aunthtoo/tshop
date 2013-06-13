<?php
	require_once("includes/header.php");
	require_once("includes/form.php");
	require_once("includes/customer.php");

	//print_r($_POST);
	$oForm = new Form();


	if(isset($_POST["submit"])){
		$oForm->data = $_POST;
		$oForm->checkRequired("firstname");
		$oForm->checkRequired("lastname");
		$oForm->checkRequired("email");
		$oForm->checkRequired("phone");
		$oForm->checkRequired("address");
		$oForm->checkRequired("password");


		$oCustomer = new Customer(); // create new customer

		$oCustomer->firstname = $_POST["firstname"];
		$oCustomer->lastname = $_POST["lastname"];
		$oCustomer->email = $_POST["email"];
		$oCustomer->phone = $_POST["phone"];
		$oCustomer->address = $_POST["address"];
		$oCustomer->password = $_POST["password"];
		$oCustomer->save();

		//redirect

	}
	

	$oForm->makeInput("firstname","First name");
	$oForm->makeInput("lastname","Last Name");
	$oForm->makeInput("email","Email");
	$oForm->makeInput("phone","Phone");
	$oForm->makeTextArea("address","Address");
	$oForm->makePasswordInput("password","Password");
	$oForm->makeSubmit("submit","Register!");


?>
	
	<h1>Register</h1>
	
	<?php 
	 echo $oForm->html;
	?>

<?php
	require_once("includes/footer.php");
?>