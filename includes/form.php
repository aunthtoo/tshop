<?php

class Form{
	private $sHTML;
	private $aData;
	private $aErrors;

	public function __construct(){
		$this->sHTML = '<form action="" method="post"><fieldset>';
		$this->aData = array();
		$this->aErrors = array();
	}

	public function makeInput($sControlName,$sLabel){

		$sData = "";
		// if data exists, put it into sData and use it for the value
		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]);
		}

		$sErrors = "";
		// if there is an error under this controlname
		if(isset($this->aErrors[$sControlName])){
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabel.'</label>
		<input type="text" name="'.$sControlName.'" value="'.$sData.'" />
		<div class="error">'.$sErrors.'</div>';
	}

	public function makePasswordInput($sControlName,$sLabel){

		$sErrors = "";
		// if there is an error under this controlname
		if(isset($this->aErrors[$sControlName])){
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabel.'</label>
		<input type="password" name="'.$sControlName.'" />
		<div class="error">'.$sErrors.'</div>';
	}

	public function makeTextArea($sControlName,$sLabel){
		$sData = "";
		// if data exists, put it into sData and use it for the value
		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]);
		}

		$sErrors = "";
		// if there is an error under this controlname
		if(isset($this->aErrors[$sControlName])){
			$sErrors = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '<label for="'.$sControlName.'">'.$sLabel.'</label>
		<textarea type="text" name="'.$sControlName.'" col="10" rows="20">'.$sData.'</textarea>
		<div class="error">'.$sErrors.'</div>';
	}

	public function makeSubmit($sControlName,$sLabel){
		$this->sHTML .= '<input type="submit" name="'.$sControlName.'" value="'.$sLabel.'" />';
	}

	public function checkRequired($sControlName){
		$sData = "";

		// if data has this controlname, trim it
		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]);
		}

		// if the trimmed string length is 0, create a new row in the errors array
		if(strlen($sData)==0){
			$this->aErrors[$sControlName] = "* Required";
		}

	}

	public function __get($sProperty){
		switch($sProperty){
			case "html":
				return $this->sHTML.'</fieldset></form>';
				break;
			case "valid":
				if(count($this->aErrors) == 0){
					return true;
				}else{
					return false;
				}
				break;
			default:
				die($sProperty." is not allowed to be read from");
		}
	}

	public function __set($sProperty,$value){
		switch($sProperty){
			case "data": // data from post array entered into $this->aData array
				$this->aData = $value;
				break;
			default:
				die($sProperty." is not allowed to write to");
		}
	}

}

?>