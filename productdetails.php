<?php
	require_once("includes/header.php");
	require_once("includes/productview.php");
	require_once("includes/product.php");

	$oPV = new ProductView();
	$oProduct = new Product();
	$iCurrentProductID = 0;
	if(isset($_GET[productID])){
		$iCurrentProductID = $_GET[productID];
	}
	$oProduct->load($iCurrentProductID);



	// writes the code to display product details
	echo $oPV->render($oProduct);


	

	require_once("includes/footer.php");
?>