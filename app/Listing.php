<?php

namespace App;

use App\RexRepository\CRMInterface;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
	protected $guarded = ['id'];

	public function getImagesAttribute($value)
	{
		return unserialize($value);
	}
}
