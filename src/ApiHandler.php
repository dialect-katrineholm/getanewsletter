<?php
namespace Dialect\Getanewsletter;
use GuzzleHttp\Client;
class ApiHandler{

	private $resource;
	private $id;
	function __construct($resource, $id) {
		$this->resource = $resource;
		$this->id = $id;
	}

	public function get(){
		$client = new Client();
			$response = $client->get(config("getanewsletter.url").$this->resource.$this->id, [
			"headers" => ["Authorization" => "Token ".config("getanewsletter.api_token")]
		]);
		return json_decode($response->getBody());

	}

	public function post($data){
		$client = new Client();
		$response = $client->post(config("getanewsletter.url").$this->resource, [
			"json" => $data,
			"headers" => [
				"Content-Type" => "application/json",
				"Authorization" => "Token ".config("getanewsletter.api_token")
			]
		]);

		return json_decode($response->getBody());
	}

	public function put($data){
		if(!$this->id) throw new \Exception("Missing resource id.");
		$client = new Client();
		$response = $client->put(config("getanewsletter.url").$this->resource.$this->id."/", [
			"json" => $data,
			"headers" => [
				"Content-Type" => "application/json",
				"Authorization" => "Token ".config("getanewsletter.api_token")
			]
		]);

		return json_decode($response->getBody());
	}

	public function delete(){
		if(!$this->id) throw new \Exception("Missing resource id.");
		$client = new Client();
		$response = $client->delete(config("getanewsletter.url").$this->resource.$this->id."/", [
			"headers" => [
				"Content-Type" => "application/json",
				"Authorization" => "Token ".config("getanewsletter.api_token")
			]
		]);

		return json_decode($response->getBody());
	}
}