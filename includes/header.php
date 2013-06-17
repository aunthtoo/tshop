<?php
require_once("menuview.php");
require_once("producttypemanager.php");

$oMV=new MenuView();
$oPTM=new ProductTypeManager();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>T Shop</title>
      <link href="assets/styles.css" rel="stylesheet" type="text/css" />
  </head>

  <body>

<div id="container">


	<div id="header">

		<a href="home.php" id="logo">T Online</a>

		<?php echo $oMV->render($oPTM->getAllProductTypes()); ?>

		<ul id="userNav">

			<li id="loginRegister">
				<a href="login.php">LOGIN / REGISTER</a>
			</li>

			<li id="cart">
				<a href="#">CART</a>
			</li>

		</ul>

		<div class="clear"></div>

	</div>


	<div id="content">