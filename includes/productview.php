<?php

class ProductView{

	public function render($oProduct){
		$sHTML = '';

		$sHTML = '<div>
		<img class="productImage" src="assets/images/'.$oProduct->photo.'" />
		<p class="productTitle">'.$oProduct->name.'</h1>
		<p>$'.number_format($oProduct->price,2).'</p>
		<a href="#">Add to cart</a>
		<p>'.$oProduct->desc.'</p>
		</div>';

		return $sHTML;
	}

}

?>