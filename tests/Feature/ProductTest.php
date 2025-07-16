<?php

namespace Tests\Feature;

use App\Models\products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    private $user;
    private $headers = [];
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $token = $this->user->createToken('test-token')->plainTextToken;

        $this->headers =  [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$token,
        ];
    }

    public function test_create_product()
    {
        $response = $this->withHeaders($this->headers)->post('/api/products', [
            'name' => 'Test Product',
            'description' => 'Test Product',
            'price' => 1000,
        ]);
        $response->assertStatus(422);
       // $this->assertEquals(1,products::query()->count());
    }

    public function test_create_product_without_name()
    {
        $image = UploadedFile::fake()->image('image.jpg');
        $response = $this->withHeaders($this->headers)->post('/api/products', [
            'description' => 'Test Product',
            'price' => 1000,
            'image' => $image,
        ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name']);

    }
}
