<?php

namespace App\RexRepository;

use App\Listing;

class RexRepository implements CRMInterface
{
	public function getAllListings()
	{
		return 'All listings';
	}

	public function getListing( $id )
	{
		$listing = Listing::findOrFail($id);
		return $listing;
	}

	public function syncListings()
	{
		Listing::create([
			'id' => 1,
			'title' => 'test',
			'address' => 'test address',
			'price' => 300000
		]);
	}
}