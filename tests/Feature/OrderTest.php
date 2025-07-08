<?php

namespace Tests\Feature;

use App\Models\orders;
use App\Models\products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_make_order(): void
    {
        $user = User::factory()->create(); // dummy user
        $token = $user->createToken('api-token')->plainTextToken;
        $product = products::query()->create([
            'user_id' => $user->id,
            'name'=>'t-shirt',
            'description'=>'t-shirt info',
            'price'=>100,
        ]);


        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/orders',[
                'payment'=>'bank',
                'data'=>[
                    [
                        'product_id'=>$product->id,
                        'quantity'=>2,
                    ]
                ]
            ]);
       $response->assertStatus(200);
       $this->assertEquals(1,orders::query()->count());
    }


    public function test_make_order_without_payment()
    {
        $user = User::factory()->create(); // dummy user
        $token = $user->createToken('api-token')->plainTextToken;
        $product = products::query()->create([
            'user_id' => $user->id,
            'name'=>'t-shirt',
            'description'=>'t-shirt info',
            'price'=>100,
        ]);


        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->postJson('/api/orders',[
                'data'=>[
                    [
                        'product_id'=>$product->id,
                        'quantity'=>2,
                    ]
                ]
            ]);
        //$response->assertStatus(422);
        $response->assertJsonValidationErrors(['payment']);
    }
}
