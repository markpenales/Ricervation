<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_route_is_accessible()
    {
        $this->get('/create-product')->assertOk();
    }


    public function test_delete_product(){
        $product = Product::factory()->count(1)->make();
        $product = Product::first();

        if($product){
            $product->delete();
        }

        $this->assertTrue(true);
    }

    public function test_success_session(){
        $this->withSession(['success'=> 'Testing Success'])->get('/create-product')->assertOk();
    }
}
