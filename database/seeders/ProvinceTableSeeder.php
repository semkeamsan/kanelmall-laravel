<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $value) {
            $model =  Province::create([
                'id' => $value['id']
            ]);
            $model->translations()->create([
                'locale'  => 'km',
                'name'    => $value['km'],
            ]);
            $model->translations()->create([
                'locale'  => 'en',
                'name'    => $value['en'],
            ]);
        }
    }
    public function data()
    {
        return [
            [
                'id'   => '1',
                'en'   => 'Banteay Meanchey',
                'km'   => 'បន្ទាយមានជ័យ',

            ],
            [
                'id'   => '2',
                'en'   => 'Battambang',
                'km'   => 'បាត់ដំបង',

            ],
            [
                'id'   => '3',
                'en'   => 'Kampong Cham',
                'km'   => 'កំពង់ចាម',

            ],
            [
                'id'   => '4',
                'en'   => 'Kampong Chhnang',
                'km'   => 'កំពង់ឆ្នាំង',

            ],
            [
                'id'   => '5',
                'en'   => 'Kampong Speu',
                'km'   => 'កំពង់ស្ពឺ',

            ],
            [
                'id'   => '6',
                'en'   => 'Kampong Thom',
                'km'   => 'កំពង់ធំ',

            ],
            [
                'id'   => '7',
                'en'   => 'Kampot',
                'km'   => 'កំពត',

            ],
            [
                'id'   => '8',
                'en'   => 'Kandal',
                'km'   => 'កណ្តាល',

            ],
            [
                'id'   => '9',
                'en'   => 'Koh Kong',
                'km'   => 'កោះកុង',

            ],
            [
                'id'   => '10',
                'en'   => 'Kratie',
                'km'   => 'ខេត្តក្រចេះ',

            ],
            [
                'id'   => '11',
                'en'   => 'Mondul Kiri',
                'km'   => 'មណ្ឌលគិរី',

            ],
            [
                'id'   => '12',
                'en'   => 'Phnom Penh',
                'km'   => 'រាជធានីភ្នំពេញ',

            ],
            [
                'id'   => '13',
                'en'   => 'Preah Vihear',
                'km'   => 'ព្រះវិហារ',

            ],
            [
                'id'   => '14',
                'en'   => 'Prey Veng',
                'km'   => 'ព្រៃវែង',

            ],
            [
                'id'   => '15',
                'en'   => 'Pursat',
                'km'   => 'ពោធិសាត់',

            ],
            [
                'id'   => '16',
                'en'   => 'Ratanak Kiri',
                'km'   => 'រតនគិរី',

            ],
            [
                'id'   => '17',
                'en'   => 'Siemreap',
                'km'   => 'សៀមរាប',

            ],
            [
                'id'   => '18',
                'en'   => 'Preah Sihanouk',
                'km'   => 'ព្រះសីហនុ',

            ],
            [
                'id'   => '19',
                'en'   => 'Stung Treng',
                'km'   => 'ស្ទឹងត្រែង',

            ],
            [
                'id'   => '20',
                'en'   => 'Svay Rieng',
                'km'   => 'ស្វាយយិង',

            ],
            [
                'id'   => '21',
                'en'   => 'Takeo',
                'km'   => 'តាកែវ',

            ],
            [
                'id'   => '22',
                'en'   => 'Oddar Meanchey',
                'km'   => 'ឧត្តរមានជ័យ',

            ],
            [
                'id'   => '23',
                'en'   => 'Kep',
                'km'   => 'កែប',

            ],
            [
                'id'   => '24',
                'en'   => 'Pailin',
                'km'   => 'ប៉ៃលិន',

            ],
            [
                'id'   => '25',
                'en'   => 'Tboung Khmum',
                'km'   => 'ត្បូងឃ្មុំ',

            ],
        ];
    }
}
