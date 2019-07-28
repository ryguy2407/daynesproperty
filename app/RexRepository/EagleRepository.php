<?php namespace App\RexRepository;

use App\Http\Controllers\ListingsController;
use GuzzleHttp\Client;

class EagleRepository implements CRMInterface {

	public $listingsController;
	public $client;

	public function __construct(ListingsController $listingsController, Client $client)
	{
		$this->listingsController = $listingsController;
		$this->client = $client;
	}

	public function queryAPI($offset = 0)
	{
		$token = $this->authenticate();

		$query = $this->client->get('https://www.eagleagent.com.au/api/v2/properties', [
			'headers' => [
				'Content-Type' => 'application/vnd.api+json',
				'Authorization' => $token->data->attributes->token
			],
			'query' => [

			]
		]);
		return $query;
	}

	public function syncAllListings()
	{
		$result = $this->queryAPI();
		dd($result->getBody()->getContents());
	}

	private function authenticate()
	{
		$response = $this->client->post('https://www.eagleagent.com.au/api/v2/sessions', [
			'headers' => [
				'Content-Type' => 'application/vnd.api+json'
			],
			'json' => [
				'data' => [
					'type' => 'sessions',
					'attributes' => [
						'email' => env('EAGLE_EMAIL'),
						'password' => env('EAGLE_PASSWORD'),
					]
				]
			]
		]);
		return json_decode($response->getBody()->getContents());
	}
}
