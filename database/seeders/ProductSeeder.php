<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          DB::table('products')->insert([
            [
            'name'=>'LG mobile',
            'price'=>'10000',
            'description'=>'A smartphone with 4gb ram and much more feature',
            'category'=>'mobile',
            'gallery'=>'https://www.lg.com/us/mobile-phones/wing-5g/assets/images/product/hero-medium.jpg',
            ],
            [
            'name'=>'Oppo mobile',
            'price'=>'8000',
            'description'=>'A smartphone with 8gb ram and much more feature',
            'category'=>'mobile',
            'gallery'=>'https://izoleapv4-prod-assets.izoleap.com/izoleap_m_31/pims/cp_img/A6-5G-6-SLASH-256-IW_1.webp',
            ],
            [
            'name'=>'Samsung TV',
            'price'=>'10000',
            'description'=>'A smartTV with 4gb ram and much more feature',
            'category'=>'TV',
            'gallery'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZdF1CicsvAiftaownSJfmwXUSYw3piTcXrGGz4SqARw&s=10',
        ],
        [
            'name'=>'Vivo mobile',
            'price'=>'10000',
            'description'=>'A smartphone with 4gb ram and much more feature',
            'category'=>'mobile',
            'gallery'=>'https://exstatic-in.vivo.com/Oz84QB3Wo0uns8j1/in/1770895476998/d2b66f6b8d9e1caeee2eb282c749318e.png_w860-h860.webp',
        ],
        [
            'name'=>'LG TV',
            'price'=>'10000',
            'description'=>'A smartphone with 4gb ram and much more feature',
            'category'=>'TV',
            'gallery'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHU5FoFaqSAGi2E3pCpBZ6MUUcq4WBtjsC5Po0H9fNEew9BJe9J6CA-GEk&s=10',
        ]
          ]);
    }
}
