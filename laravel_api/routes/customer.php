<?php
Route::group(['prefix' => 'customer' , 'middleware' => 'customer'],function(){
	return "customer page !";
});