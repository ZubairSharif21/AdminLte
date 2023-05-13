<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=20;$i++){
            $product=new product();
            $product->title='ProductTitle';
            $product->image='url/image';
            $product->description='description';
            $product->price=1000;
            $product->save();
        }
    }
}
