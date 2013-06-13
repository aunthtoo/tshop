<?php

	require_once("db.php");

	class Customer{
		private $iCustomerID;
		private $sFirstName;
		private $sLastName;
		private $sEmail;
		private $sPhone;
		private $sAddress;
		private $sPassword;

		public function __construct(){
			$this->iCustomerID = 0;
			$this->sFirstName = "";
			$this->sLastName = "";
			$this->sEmail = "";
			$this->sPhone = "";
			$this->sAddress = "";
			$this->sPassword = "";
		}

		public function save(){
			$oDatabase = new Database();

			if($this->iCustomerID == 0){

				$sSQL = "INSERT INTO tbcustomer (firstname, lastname, email, phone, deliveryaddress, password)
				VALUES ('".$this->sFirstName."',
					'".$this->sLastName."',
					'".$this->sEmail."',
					'".$this->sPhone."',
					'".$this->sAddress."',
					'".$this->sPassword."')";
			
				// check if data is accepted into database
				$bResult = $oDatabase->query($sSQL);
				if($bResult == true){
					$this->iCustomerID = $oDatabase->get_insert_id(); // insert ID from db into object
				}else{
					die($sSQL." has failed");
				}

			}//else{update}

			$oDatabase->close();

		}

		public function __set($sProperty,$value){

			switch($sProperty){
				case "firstname":
					$this->sFirstName = $value;
					break;
				case "lastname":
					$this->sLastName = $value;
					break;
				case "email":
					$this->sEmail = $value;
					break;
				case "phone":
					$this->sPhone = $value;
					break;
				case "address":
					$this->sAddress = $value;
					break;
				case "password":
					$this->sPassword = $value;
					break;
				default:
					die($sProperty." is not allowed to write to");
			}

		}

	}

	// --- TESTING --- //

	/*
	$oCustomer = new Customer();
	$oCustomer->firstname = "Jono";
	$oCustomer->lastname = "B";
	$oCustomer->email = "jonob@gmail.com";
	$oCustomer->phone = "096783456";
	$oCustomer->address = "62 Giddy St, Remuera, Auckland";
	$oCustomer->password = "12345";

	$oCustomer->save();

	echo "<pre>";
	print_r($oCustomer);
	echo "</pre>";
	*/

?>