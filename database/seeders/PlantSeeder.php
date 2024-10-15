<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Varen',
                'description' => 'De varen is een groep van ongeveer 10.560 bekende nog levende soorten vaatplanten.',
                'price' => '19.99',
                'deliverytime' => '4',
                'light' => 'Veel',
                'water' => 'Veel',
                'weight' => '1.09',
                'height' => '16.80',
                'width' => '4.70',
                'amount' => '7',
                'color' => 'Blauw',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Gras',
                'description' => 'Gras is een belangrijke familie van monocot planten, graslanden bedekken ongeveer 20% van de aardse vegetatie.',
                'price' => '6.49',
                'deliverytime' => '2',
                'light' => 'Weinig',
                'water' => 'Gemiddeld',
                'weight' => '9.80',
                'height' => '1',
                'width' => '26.8',
                'amount' => '70',
                'color' => 'Zilver',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Bamboe',
                'description' => 'Bamboe is een snelgroeiend gras in de familie Poaceae.',
                'price' => '13.99',
                'deliverytime' => '6',
                'light' => 'Gemiddeld',
                'water' => 'Veel',
                'weight' => '35.9',
                'height' => '20.2',
                'width' => '12.4',
                'amount' => '1',
                'color' => 'Donker zalm',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Klimop',
                'description' => 'Klimop is een geslacht van 12-15 soorten klimmende of kruipende altijd groenblijvende houtige planten.',
                'price' => '15.49',
                'deliverytime' => '9',
                'light' => 'Veel',
                'water' => 'Weinig',
                'weight' => '9',
                'height' => '0.8',
                'width' => '14.6',
                'amount' => '9',
                'color' => 'Ivoor',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Aloe Vera',
                'description' => 'Aloë vera is een succulente plantensoort die vermoedelijk afkomstig is uit het Arabische schiereiland.',
                'price' => '9.99',
                'deliverytime' => '12',
                'light' => 'Heel veel',
                'water' => 'Veel',
                'weight' => '8.9',
                'height' => '32.63',
                'width' => '9',
                'amount' => '92',
                'color' => 'Goud',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Ficus',
                'description' => 'Ficus is een geslacht van ongeveer 850 soorten houtige bomen, struiken en klimplanten in de familie Moraceae.',
                'price' => '15.79',
                'deliverytime' => '1',
                'light' => 'Heel weinig',
                'water' => 'Heel weinig',
                'weight' => '9',
                'height' => '3.2',
                'width' => '13.14',
                'amount' => '2',
                'color' => 'Sneeuw',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Geranium',
                'description' => 'Geranium is een geslacht van 422 soorten vaste planten die voorkomen in gematigde streken van de wereld.',
                'price' => '13.29',
                'deliverytime' => '4',
                'light' => 'Weinig',
                'water' => 'Veel',
                'weight' => '6.3',
                'height' => '1.29',
                'width' => '7.4',
                'amount' => '14',
                'color' => 'Antique wit',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Olijfboom',
                'description' => 'De olijfboom, Olea europaea, is een kleine boom in de familie Oleaceae.',
                'price' => '20.49',
                'deliverytime' => '4',
                'light' => 'Veel',
                'water' => 'Veel',
                'weight' => '10.5',
                'height' => '12.3',
                'width' => '30',
                'amount' => '17',
                'color' => 'Zeegroen',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Chrysant',
                'description' => 'De chrysant, oftewel Chrysanthemum, is een geslacht van kruidachtige, overblijvende planten.',
                'price' => '11.99',
                'deliverytime' => '2',
                'light' => 'Weinig',
                'water' => 'Weinig',
                'weight' => '5.3',
                'height' => '4.1',
                'width' => '2.4',
                'amount' => '12',
                'color' => 'Zand bruin',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Spar',
                'description' => 'De spar, of Fijnspar, is een groenblijvende naaldboom in het geslacht Picea.',
                'price' => '16.29',
                'deliverytime' => '4',
                'light' => 'Veel',
                'water' => 'Gemiddeld',
                'weight' => '12.50',
                'height' => '12.50',
                'width' => '30',
                'amount' => '9',
                'color' => 'Donker paars',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Palmboom',
                'description' => 'De palmboom is een boom die behoort tot de familie van de palmen.',
                'price' => '149.99',
                'deliverytime' => '7',
                'light' => 'Veel',
                'water' => 'Veel',
                'weight' => '40.00',
                'height' => '1.80',
                'width' => '14.50',
                'amount' => '21',
                'color' => 'Fel roze',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Azalea',
                'description' => 'De azalea is een geslacht van bloeiende planten uit de heidefamilie.',
                'price' => '15.79',
                'deliverytime' => '5',
                'light' => 'Gemiddeld',
                'water' => 'Weinig',
                'weight' => '8',
                'height' => '9',
                'width' => '1',
                'amount' => '9',
                'color' => 'Middernacht blauw',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ],
            [
                'name' => 'Cactus',
                'description' => 'De cactus is een lid van de familie Cactaceae.',
                'price' => '18.99',
                'deliverytime' => '1',
                'light' => 'Heel Veel',
                'water' => 'Heel Weinig',
                'weight' => '5.45',
                'height' => '0.45',
                'width' => '0.50',
                'amount' => '5',
                'color' => 'Geel groen',
                'image' => 'https://as1.ftcdn.net/v2/jpg/00/82/09/38/500_F_82093850_KGABJZijejnFxFXYao7kfksuk5CtZxxj.jpg',
                'created_at' => '2022-11-25',
                'updated_at' => '2022-11-25'
            ]
        ];
        DB::table('plants')->Insert($data);
    }
}
