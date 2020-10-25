<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use WithFaker;

    /**
     * Create order view test
     *
     * @return void
     */
    public function testCreate()
    {
        $this->withoutMiddleware('check_location');
        $product = Product::query()->inRandomOrder()->first();

        $response = $this->get('/order/create/' . $product->id);

        $response->assertViewHas('product', $product);
    }

    /**
     * Store order test
     *
     * @return void
     */
    public function testStore()
    {
        $this->withoutMiddleware('check_location');
        $product_id = Product::query()->inRandomOrder()->first()->id;

        $data = [
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'shipping_address_1' => $this->faker->address,
            'shipping_address_2' => $this->faker->address,
            'shipping_address_3' => $this->faker->address,
            'city' => $this->faker->city,
            'country_code' => $this->faker->countryCode,
            'zip_postal_code' => $this->faker->postcode,
            'quantity' => $this->faker->numberBetween(1, 10),
        ];

        $response = $this->put('/order/store/' . $product_id, $data);

        $response->assertRedirect('/');

        unset($data['quantity']);
        $this->assertDatabaseHas('orders', $data);
    }

    /**
     * Store order validation test
     *
     * @return void
     */
    public function testStoreValidation()
    {
        $request = new OrderStoreRequest();

        $data = [
            'email' => $this->faker->word,
            'phone_number' => $this->faker->phoneNumber,
            'shipping_address_1' => $this->faker->address,
            'shipping_address_2' => $this->faker->address,
            'shipping_address_3' => $this->faker->address,
            'city' => $this->faker->city,
            'country_code' => $this->faker->words(2),
            'zip_postal_code' => $this->faker->words(2),
            'quantity' => 0,
        ];

        $validator = Validator::make($data, $request->rules());

        $this->assertFalse($validator->passes());
    }
}
