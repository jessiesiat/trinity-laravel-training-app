<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	protected $table = 'students';

	protected $dates = ['enrolled'];

	public function department() 
	{
		return $this->belongsTo(Department::class);
	}

}