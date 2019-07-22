<?php

namespace App\RexRepository;


interface CRMInterface
{
	public function queryAPI();
	public function syncAllListings();
}