<?php

namespace App\RexRepository;

use App\Http\Controllers\ListingsController;
use GuzzleHttp\Client;

class RexRepository implements CRMInterface
{
	public $listingsController;

	public function __construct(ListingsController $listingsController)
	{
		$this->listingsController = $listingsController;
	}

	/**
	 * Query the Rex API
	 *
	 * @param int $offset
	 *
	 * @return mixed
	 */
	public function queryAPI($offset = 0)
	{
		$token = $this->authenticate();

		$client = new Client();
		$response = $client->request( 'GET', 'https://api.rexsoftware.com/rex.php', [
			'query' => [
				'method' => 'PublishedListings::search',
				'args' => [
					'criteria' => [
						1 => [
							'name'  => 'listing.system_publication_status',
							'value' => 'published',
						],
						2 => [
							'name' => 'listing.system_listing_state',
							"type" => "!=",
							"value" => "withdrawn"
						],
						3 => [
							'name' => 'property.property_category_id',
							"type" => "!=",
							"value" => "commercial"
						]
					],
					'extra_options' => [
						'extra_fields' => [
							0 => 'images',
							1 => 'advert_internet'
						],
					],
					'limit' => 20,
					'offset' => $offset,
					'order_by' => [
						'system_ctime' => 'asc',
					],
				],
				'token'  => $token->result,
			]
		]);
		$resArray = json_decode($response->getBody()->getContents());
		return $resArray;
	}

	/**
	 * Syncs all published listings
	 *
	 * @param int $offset
	 *
	 * @return mixed
	 */
	public function syncAllListings($offset = 0)
	{
		$limit = 20;
		$result = $this->queryAPI($offset)->result->rows;
		$count = count($result);
		// Keep running until all listings are saved into DB
		if($count == $limit) {
			$offset += $limit;
			foreach($result as $listing) {
				$this->listingsController->store($listing);
			}
			$this->syncAllListings($offset);
		}
		return $result;
	}

	/**
	 * Authenticates the rex request with a unique token
	 *
	 * @return mixed
	 */
	private function authenticate()
	{
		$client = new Client();
		$response = $client->request('GET', 'https://api.rexsoftware.com/rex.php', [
			'query' => [
				'method' => 'Authentication::login',
				'args' => [
					'email' => env('REX_EMAIL'),
					'password' => env('REX_PASSWORD'),
					'application' => 'rex'
				]
			]
		]);
		return json_decode($response->getBody()->getContents());
	}
}