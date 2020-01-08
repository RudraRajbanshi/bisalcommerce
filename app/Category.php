<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	   //protected $table = 'ourcategories';

	public function messages()
	{
		return [
		'category_name.required' => 'A title is required',
		'category_description.required'  => 'A message is required',
		];
	}

	public function products()
	{
		return $this->hasMany('\App\Product');
	}
}
