<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::insert([
            [
                'name' => 'Nasi Uduk',
                'category' => 'Makanan',
                'description' => 'Nasi uduk gurih dengan bihun, orek tempe, telur, sambal kacang, dan kerupuk.',
                'price' => 15000,
                'image' => 'https://statik.tempo.co/data/2025/01/02/id_1366440/1366440_720.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasi Goreng',
                'category' => 'Makanan',
                'description' => 'Nasi goreng rempah dengan telur, ayam suwir, sayuran, dan kerupuk.',
                'price' => 17000,
                'image' => 'https://assets.unileversolutions.com/recipes-v3/258052-default.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasi Rames',
                'category' => 'Makanan',
                'description' => 'Nasi rames dengan lauk lengkap, sayur, sambal, dan kerupuk.',
                'price' => 18000,
                'image' => 'https://cdn.grid.id/crop/0x0:0x0/700x465/smart/filters:format(webp):quality(100)/photo/2023/05/16/resep-nasi-rames-udang-telur-puy-20230516023301.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Goreng',
                'category' => 'Makanan',
                'description' => 'Mie goreng spesial dengan telur, sayuran, ayam suwir, dan bawang goreng.',
                'price' => 16000,
                'image' => 'https://allofresh.id/blog/wp-content/uploads/2023/09/cara-membuat-mie-goreng-4-1-1536x1024.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mie Rebus',
                'category' => 'Makanan',
                'description' => 'Mie rebus hangat dengan kuah gurih, telur, sayuran, dan cabai rawit.',
                'price' => 15000,
                'image' => 'https://silamparitv.disway.id/upload/f931f2681c43340f8f5e164047aaa291.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Nasi Ayam',
                'category' => 'Paket Hemat',
                'description' => 'Nasi putih dengan ayam goreng, tahu, tempe, sambal, dan lalapan.',
                'price' => 25000,
                'image' => 'https://eorder-bppbj.jakarta.go.id/web/image/product.product/25457/image?unique=effae1d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Nasi Bebek',
                'category' => 'Paket Hemat',
                'description' => 'Nasi putih dengan bebek goreng, sambal hitam, lalapan, dan kremesan.',
                'price' => 28000,
                'image' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/2ac3f0d7-6c9e-4257-a9dc-6b08a9e01805_Go-Biz_20230613_020103.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Nasi Lele',
                'category' => 'Paket Hemat',
                'description' => 'Nasi putih dengan lele goreng, sambal terasi, tahu, tempe, dan lalapan.',
                'price' => 22000,
                'image' => 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/2260aac2-f357-444d-beb2-59dff748fcd7_Go-Biz_20211024_152144.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Manis',
                'category' => 'Minuman',
                'description' => 'Es teh manis segar untuk teman makan.',
                'price' => 5000,
                'image' => 'https://awsimages.detik.net.id/community/media/visual/2020/05/14/0af32d8b-36b7-4555-8e79-4fd54c98f795.jpeg?w=700&q=90',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Jeruk',
                'category' => 'Minuman',
                'description' => 'Es jeruk segar dengan rasa manis dan asam.',
                'price' => 7000,
                'image' => 'https://doktersehat.com/wp-content/uploads/2018/09/jus-jeruk.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Air Mineral',
                'category' => 'Minuman',
                'description' => 'Air mineral botol dingin.',
                'price' => 4000,
                'image' => 'https://foodstation.id/wp-content/uploads/2021/06/FS-Mineral-scaled.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}