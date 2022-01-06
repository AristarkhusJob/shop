<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Meja Kantor',
                'description' => 'Meja berbahan kayu jati asli berwarna coklat',
                'price' => '500000',
                'stock' => '4',
                'image' => 'dHNwyZiNar0CLeHLbt1f02cvfONDiLMVaog5jjcU.jpg',
                'tempImage' => 'dHNwyZiNar0CLeHLbt1f02cvfONDiLMVaog5jjcU.jpg'
            ],
            [
                'name' => 'Lemari Baju',
                'description' => 'Lemari berbahan kayu jati dan alumunium berwarna putih',
                'price' => '899000',
                'stock' => '3',
                'image' => 'n3lMmiNdveNTNyVV4UFY0d8Rv6OHSbEWaQUM5OLZ.jpg',
                'tempImage' => 'dHNwyZiNar0CLeHLbt1f02cvfONDiLMVaog5jjcU.jpg'
            ],
            [
                'name' => 'Kursi',
                'description' => 'Kursi berbahan kayu jati asli dan berbahan premium',
                'price' => '399000',
                'stock' => '7',
                'image' => 'DipQYu7SFYHWR4ohdbIIpgdyGPWwj1G8HQzI2cyc.jpg',
                'tempImage' => 'dHNwyZiNar0CLeHLbt1f02cvfONDiLMVaog5jjcU.jpg'
            ],
            [
                'name' => 'Spring Bed',
                'description' => 'Berbahan premium berwarna putih',
                'price' => '2399000',
                'stock' => '2',
                'image' => 'Kd5CO9gy1uWBy4NmPtydsjqKixU7xQwXXUD9epzn.jpg',
                'tempImage' => 'dHNwyZiNar0CLeHLbt1f02cvfONDiLMVaog5jjcU.jpg'
            ],
        ];

        \DB::table('products')->insert($products);
    }
}
