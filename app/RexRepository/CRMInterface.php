<?php

namespace App\RexRepository;


interface CRMInterface
{
	public function getAllListings();
	public function getListing($id);
	public function syncListings();
}