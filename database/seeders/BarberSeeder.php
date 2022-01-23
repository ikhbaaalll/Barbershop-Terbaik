<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Capster;
use App\Models\Facility;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Barber::factory()->count(6)->create()->each(function ($barber) {
        //     Capster::factory()->count(rand(3, 6))->for($barber)->create()
        //         ->each(function ($capster) use ($barber) {
        //             Order::factory()->for($barber)->for($capster)->count(rand(1, 3))->create();
        //         });
        //     Service::factory()->count(rand(3, 5))->for($barber)->create();
        //     Facility::factory()->count(rand(3, 5))->for($barber)->create();
        // });

        $barbers = [
            'Vanman Premium Barbershop' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'AC',
                    'Pijat Leher'
                ],
                'price' => 40_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/1.png'),
                'address' => 'Jl. Gajah Mada No.89 E, Tj. Agung Raya, Kec. Tj. Karang Tim., Kota Bandar Lampung, Lampung 35125'
            ],
            'Afzl Barbershop' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'Wi-Fi',
                    'Pijat Leher'
                ],
                'price' => 30_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/2.png'),
                'address' => 'Jl. Putri Balau No.4 A, Tj. Agung Raya, Kedamaian, Kota Bandar Lampung, Lampung 35128'
            ],
            'Barbershop Wijaya' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'Wi-Fi',
                    'Pijat Leher'
                ],
                'price' => 30_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/3.png'),
                'address' => 'Jl. Letjend Alamsyah Ratu Prawira Negara No.28, Metro, Kec. Metro Pusat, Kota Metro, Lampung 34121'
            ],
            'Moxie Barbershop' => [
                'facilities' => [
                    'Kamar mandi',
                    'tempat menunggu',
                    'barber dapat memberi saran potongan rambut sesuai bentuk muka pelanggan',
                    'Pijat Leher'
                ],
                'price' => 35_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/4.png'),
                'address' => 'Jalan Dokter Susilo No.97, Pahoman, Kec. Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35212'
            ],
            'Sultan Barbershop' => [
                'facilities' => [
                    'tempat menunggu',
                    'AC',
                    'Pomade'
                ],
                'price' => 25_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/5.jpg'),
                'address' => 'Jl. Hos chokrominoto,dpn masjid Rabiatul Aziz'
            ],
            'The Great Victor Rojas' => [
                'facilities' => [
                    'AC',
                    'TV'
                ],
                'price' => 40_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/6.png'),
                'address' => 'Jl. ZA. Pagar Alam, Gedong Meneng, Kec. Rajabasa, Kota Bandar Lampung, Lampung 35148'
            ],
            'Three Brothers Barbershop bdl' => [
                'facilities' => [
                    'Tempat menunggu',
                    'AC',
                    'Pijat Leher',
                    'Parkiran Luas',
                    'Lokasi Strategis'
                ],
                'price' => 40_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan'
                ],
                'photo' => asset('images/barbers/7.png'),
                'address' => 'Enggal, Kec. Tj. Karang Pusat, Kota Bandar Lampung, Lampung 35213'
            ],
            'Nobleman Barbershop' => [
                'facilities' => [
                    'Tempat menunggu',
                    'AC',
                    'Pijat Leher',
                    'TV',
                    'Minuman'
                ],
                'price' => 45_000,
                'treatment' => [
                    'Potong rambut sampai pewarnaan',
                    'Cuci Rambut',
                    'Pomade',
                    'Hair Tonic',
                    'Massage',
                    'Hot Towel'
                ],
                'photo' => asset('images/barbers/8.jpg'),
                'address' => 'Gatot Subroto no 7,Pahoman'
            ],
            'Classic Barbershop' => [
                'facilities' => [
                    'AC',
                    'Wi-Fi',
                    'Pomade',
                ],
                'price' => 60_000,
                'treatment' => [
                    'Cuci Rambut',
                    'Pomade',
                    'Hair Tonic',
                    'Massage',
                    'Hot Towel'
                ],
                'photo' => asset('images/barbers/9.jpg'),
                'address' => 'Jl. Flamboyan no 37,Tanjung Karang'
            ],
            'The Dandies' => [
                'facilities' => [
                    'Wi-Fi',
                    'Kopi',
                    'Cukur anak kecil'
                ],
                'price' => 35_000,
                'treatment' => [
                    'Cuci Rambut',
                    'Pomade',
                    'Hair Tonic',
                    'Massage',
                    'Hot Towel'
                ],
                'photo' => asset('images/barbers/10.jpg'),
                'address' => 'Cut nyakdin no 39,Palapa'
            ],
        ];

        foreach ($barbers as $key => $value) {
            $admin = User::create([
                'name' => $key,
                'email' => Str::slug($key, '.') . '@gmail.com',
                'password' => bcrypt('password'),
                'username' => Str::slug($key, '.'),
                'role' => User::ROLE_OWNER,
                'phone' => '081234567890'
            ]);

            $barber = Barber::create(
                [
                    'user_id' => $admin->id,
                    'name' => $key,
                    'address' => $value['address'],
                    'open' => '08:00',
                    'close' => '17:00',
                    'price' => $value['price'],
                    'photo' => $value['photo'],
                ]
            );

            foreach ($value['facilities'] as $val) {
                $barber->facilities()->create(['name' => $val]);
            }

            foreach ($value['treatment'] as $val) {
                $barber->services()->create(['name' => $val]);
            }

            Capster::factory()->for($barber)->count(rand(3, 5))->create();
        }
    }
}
