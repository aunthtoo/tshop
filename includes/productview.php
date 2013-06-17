<?php

class ProductView{

	public function render($oProduct){
		$sHTML = '';

		$sHTML = '<div class="productdetails">
			<img class="productImage" src="assets/images/'.$oProduct->photo.'" />
			<div>
				<h2 class="productTitle">'.$oProduct->name.'</h2>
				<p>$'.number_format($oProduct->price,2).'</p>
				<p><a href="#">Add to cart</a></p>
				<p>'.$oProduct->desc.'</p>
			</div>
		</div>';

		return $sHTML;
	}

}

?>