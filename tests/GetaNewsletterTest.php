<?php
use Tests\TestCase;
use Dialect\Getanewsletter\GetaNewsletter;
class GetaNewsletterTest extends TestCase
{

	public function setUp(){
	Parent::setUp();
	config(['getanewsletter.api_token' => "h8HRJxg6thoLGM/yWalcc4YzuZGXC0sFYGTdfMA13/ZEKkj1QONyfH1LO/ECMVnw2RVLmdQ1wZuOAPCpJ8Iy6Alwe0R79In0u7OLbrKxh6qIojjLpN2T3JcjR7GoeHZvSDO6T0ufLEG155WYBYePrKM4f0PgHJ1uL37ItZOskTuC2VKp1jWIU5uxp5M8rorWlxOhP7YlSQj+8B4OgKI/i2iWJ/9qeZXFTOfVIi2thbKNBfjbTE0RFQQe1sTeG+j"]);
	config(['getanewsletter.url' => "https://api.getanewsletter.com/v3"]);
	}


	/** @test */
	public function can_initiate_a_api_request(){
		$contacts = GetaNewsletter::contacts();
		$this->isInstanceOf("Dialect\GetaNewsletter\ApiHandler", $contacts);
	}
	/** @test */
	public function can_send_get_request(){
		$contacts = GetaNewsletter::contacts()->get();
		$this->assertNotEmpty($contacts);
	}

	/** @test */
	public function can_send_post_request(){
		$faker = Faker\Factory::create();
		$data = [
			"email" => $faker->email,
			"first_name" => $faker->firstName,
			"last_name" => $faker->lastName,

		];
		$contact = GetaNewsletter::contacts()->post($data);

		$this->assertEquals($data["email"], $contact->email);
	}

	/** @test */
	public function can_send_put_request(){
		$faker = Faker\Factory::create();
		$data = [
			"email" => $faker->email,
			"first_name" => $faker->firstName,
			"last_name" => $faker->lastName,

		];
		$contact = GetaNewsletter::contacts()->post($data);
		$first_name = $faker->firstName;
		$contact = GetaNewsletter::contacts($contact->email)->put(["first_name" => $first_name]);

		$this->assertEquals($first_name, $contact->first_name);
	}

	/** @test */
	public function can_send_delete_request(){
		$faker = Faker\Factory::create();
		$data = [
			"email" => $faker->email,
			"first_name" => $faker->firstName,
			"last_name" => $faker->lastName,

		];
		$contact = GetaNewsletter::contacts()->post($data);
		$first_name = $faker->firstName;
		$contact = GetaNewsletter::contacts($contact->email)->delete();

		$this->assertEmpty($contact);
	}
}