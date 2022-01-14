<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $value) {
            $model = new District;
            $model->id = $value['id'];
            $model->province_id = $value['province_id'];
            $model->save();

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
                'id'          => '102',
                'en'          => 'Mongkol Borei',
                'km'          => 'មង្គលបុរី',
                'province_id' => '1',

            ],
            [
                'id'          => '103',
                'en'          => 'Phnum Srok',
                'km'          => 'ភ្នំស្រុក',
                'province_id' => '1',

            ],
            [
                'id'          => '104',
                'en'          => 'Preah Netr Preah',
                'km'          => 'ព្រះនេត្រព្រះ',
                'province_id' => '1',

            ],
            [
                'id'          => '105',
                'en'          => 'Ou Chrov',
                'km'          => 'អូរជ្រៅ',
                'province_id' => '1',

            ],
            [
                'id'          => '106',
                'en'          => 'Serei Saophoan',
                'km'          => 'ក្រុងសិរីសោភ័ណ',
                'province_id' => '1',

            ],
            [
                'id'          => '107',
                'en'          => 'Thma Puok',
                'km'          => 'ថ្មពួក',
                'province_id' => '1',

            ],
            [
                'id'          => '108',
                'en'          => 'Svay Chek',
                'km'          => 'ស្វាយចេក',
                'province_id' => '1',

            ],
            [
                'id'          => '109',
                'en'          => 'Malai',
                'km'          => 'ម៉ាឡៃ',
                'province_id' => '1',

            ],
            [
                'id'          => '110',
                'en'          => 'Paoy Paet',
                'km'          => 'ក្រុងប៉ោយប៉ែត',
                'province_id' => '1',

            ],
            [
                'id'          => '201',
                'en'          => 'Banan',
                'km'          => 'បាណន់',
                'province_id' => '2',

            ],
            [
                'id'          => '202',
                'en'          => 'Thma Koul',
                'km'          => 'ថ្មគោល',
                'province_id' => '2',

            ],
            [
                'id'          => '203',
                'en'          => 'Battambang',
                'km'          => 'ក្រុងបាត់ដំបង',
                'province_id' => '2',

            ],
            [
                'id'          => '204',
                'en'          => 'Bavel',
                'km'          => 'បវេល',
                'province_id' => '2',

            ],
            [
                'id'          => '205',
                'en'          => 'Aek Phnum',
                'km'          => 'ឯកភ្នំ',
                'province_id' => '2',

            ],
            [
                'id'          => '206',
                'en'          => 'Moung Ruessei',
                'km'          => 'មោងឫស្សី',
                'province_id' => '2',

            ],
            [
                'id'          => '207',
                'en'          => 'Rotonak Mondol',
                'km'          => 'រតនមណ្ឌល',
                'province_id' => '2',

            ],
            [
                'id'          => '208',
                'en'          => 'Sangkae',
                'km'          => 'សង្កែ',
                'province_id' => '2',

            ],
            [
                'id'          => '209',
                'en'          => 'Samlout',
                'km'          => 'សំឡូត',
                'province_id' => '2',

            ],
            [
                'id'          => '210',
                'en'          => 'Sampov Lun',
                'km'          => 'សំពៅលូន',
                'province_id' => '2',

            ],
            [
                'id'          => '211',
                'en'          => 'Phnum Proek',
                'km'          => 'ភ្នំព្រឹក',
                'province_id' => '2',

            ],
            [
                'id'          => '212',
                'en'          => 'Kamrieng',
                'km'          => 'កំរៀង',
                'province_id' => '2',

            ],
            [
                'id'          => '213',
                'en'          => 'Koas Krala',
                'km'          => 'គាស់ក្រឡ',
                'province_id' => '2',

            ],
            [
                'id'          => '214',
                'en'          => 'Rukh Kiri',
                'km'          => 'រុក្ខគីរី',
                'province_id' => '2',

            ],
            [
                'id'          => '301',
                'en'          => 'Batheay',
                'km'          => 'បាធាយ',
                'province_id' => '3',

            ],
            [
                'id'          => '302',
                'en'          => 'Chamkar Leu',
                'km'          => 'ចំការលើ',
                'province_id' => '3',

            ],
            [
                'id'          => '303',
                'en'          => 'Cheung Prey',
                'km'          => 'ជើងព្រៃ',
                'province_id' => '3',

            ],
            [
                'id'          => '305',
                'en'          => 'Kampong Cham',
                'km'          => 'ក្រុងកំពង់ចាម',
                'province_id' => '3',

            ],
            [
                'id'          => '306',
                'en'          => 'Kampong Siem',
                'km'          => 'កំពង់សៀម',
                'province_id' => '3',

            ],
            [
                'id'          => '307',
                'en'          => 'Kang Meas',
                'km'          => 'កងមាស',
                'province_id' => '3',

            ],
            [
                'id'          => '308',
                'en'          => 'Kaoh Soutin',
                'km'          => 'កោះសូទិន',
                'province_id' => '3',

            ],
            [
                'id'          => '313',
                'en'          => 'Prey Chhor',
                'km'          => 'ព្រៃឈរ',
                'province_id' => '3',

            ],
            [
                'id'          => '314',
                'en'          => 'Srei Santhor',
                'km'          => 'ស្រីសន្ធរ',
                'province_id' => '3',

            ],
            [
                'id'          => '315',
                'en'          => 'Stueng Trang',
                'km'          => 'ស្ទឹងត្រង់',
                'province_id' => '3',

            ],
            [
                'id'          => '401',
                'en'          => 'Baribour',
                'km'          => 'បរិបូណ៌ ',
                'province_id' => '4',

            ],
            [
                'id'          => '402',
                'en'          => 'Chol Kiri',
                'km'          => 'ជលគិរី ',
                'province_id' => '4',

            ],
            [
                'id'          => '403',
                'en'          => 'Kampong Chhnang',
                'km'          => 'ក្រុងកំពង់ឆ្នាំង ',
                'province_id' => '4',

            ],
            [
                'id'          => '404',
                'en'          => 'Kampong Leaeng',
                'km'          => 'កំពង់លែង ',
                'province_id' => '4',

            ],
            [
                'id'          => '405',
                'en'          => 'Kampong Tralach',
                'km'          => 'កំពង់ត្រឡាច ',
                'province_id' => '4',

            ],
            [
                'id'          => '406',
                'en'          => 'Rolea Bier',
                'km'          => 'រលាប្អៀរ ',
                'province_id' => '4',

            ],
            [
                'id'          => '407',
                'en'          => 'Sameakki Mean Chey',
                'km'          => 'សាមគ្គីមានជ័យ ',
                'province_id' => '4',

            ],
            [
                'id'          => '408',
                'en'          => 'Tuek Phos',
                'km'          => 'ទឹកផុស ',
                'province_id' => '4',

            ],
            [
                'id'          => '501',
                'en'          => 'Basedth',
                'km'          => 'បរសេដ្ឋ ',
                'province_id' => '5',

            ],
            [
                'id'          => '502',
                'en'          => 'Chbar Mon',
                'km'          => 'ក្រុងច្បារមន ',
                'province_id' => '5',

            ],
            [
                'id'          => '503',
                'en'          => 'Kong Pisei',
                'km'          => 'គងពិសី ',
                'province_id' => '5',

            ],
            [
                'id'          => '504',
                'en'          => 'Aoral',
                'km'          => 'ឱរ៉ាល់ ',
                'province_id' => '5',

            ],
            [
                'id'          => '505',
                'en'          => 'Odongk',
                'km'          => 'ឧដុង្គ ',
                'province_id' => '5',

            ],
            [
                'id'          => '506',
                'en'          => 'Phnum Sruoch',
                'km'          => 'ភ្នំស្រួច ',
                'province_id' => '5',

            ],
            [
                'id'          => '507',
                'en'          => 'Samraong Tong',
                'km'          => 'សំរោងទង ',
                'province_id' => '5',

            ],
            [
                'id'          => '508',
                'en'          => 'Thpong',
                'km'          => 'ថ្ពង ',
                'province_id' => '5',

            ],
            [
                'id'          => '601',
                'en'          => 'Baray',
                'km'          => 'បារាយណ៍ ',
                'province_id' => '6',

            ],
            [
                'id'          => '602',
                'en'          => 'Kampong Svay',
                'km'          => 'កំពង់ស្វាយ ',
                'province_id' => '6',

            ],
            [
                'id'          => '603',
                'en'          => 'Stueng Saen',
                'km'          => 'ក្រុងស្ទឹងសែន ',
                'province_id' => '6',

            ],
            [
                'id'          => '604',
                'en'          => 'Prasat Ballangk',
                'km'          => 'ប្រាសាទបល្ល័ង្ក ',
                'province_id' => '6',

            ],
            [
                'id'          => '605',
                'en'          => 'Prasat Sambour',
                'km'          => 'ប្រាសាទសម្បូរ ',
                'province_id' => '6',

            ],
            [
                'id'          => '606',
                'en'          => 'Sandan',
                'km'          => 'សណ្ដាន់ ',
                'province_id' => '6',

            ],
            [
                'id'          => '607',
                'en'          => 'Santuk',
                'km'          => 'សន្ទុក ',
                'province_id' => '6',

            ],
            [
                'id'          => '608',
                'en'          => 'Stoung',
                'km'          => 'ស្ទោង ',
                'province_id' => '6',

            ],
            [
                'id'          => '701',
                'en'          => 'Angkor Chey',
                'km'          => 'អង្គរជ័យ ',
                'province_id' => '7',

            ],
            [
                'id'          => '702',
                'en'          => 'Banteay Meas',
                'km'          => 'បន្ទាយមាស ',
                'province_id' => '7',

            ],
            [
                'id'          => '703',
                'en'          => 'Chhuk',
                'km'          => 'ឈូក ',
                'province_id' => '7',

            ],
            [
                'id'          => '704',
                'en'          => 'Chum Kiri',
                'km'          => 'ជុំគិរី ',
                'province_id' => '7',

            ],
            [
                'id'          => '705',
                'en'          => 'Dang Tong',
                'km'          => 'ដងទង់ ',
                'province_id' => '7',

            ],
            [
                'id'          => '706',
                'en'          => 'Kampong Trach',
                'km'          => 'កំពង់ត្រាច ',
                'province_id' => '7',

            ],
            [
                'id'          => '707',
                'en'          => 'Tuek Chhou',
                'km'          => '​ទឹក​ឈូ (អតីត ស្រុកកំពត) ',
                'province_id' => '7',

            ],
            [
                'id'          => '708',
                'en'          => 'Kampot',
                'km'          => 'ក្រុង​កំពត (អតីត កំពង់បាយ) ',
                'province_id' => '7',

            ],
            [
                'id'          => '801',
                'en'          => 'Kandal Stueng',
                'km'          => 'កណ្ដាលស្ទឹង ',
                'province_id' => '8',

            ],
            [
                'id'          => '802',
                'en'          => 'Kien Svay',
                'km'          => 'កៀនស្វាយ ',
                'province_id' => '8',

            ],
            [
                'id'          => '803',
                'en'          => 'Khsach Kandal',
                'km'          => 'ខ្សាច់កណ្ដាល ',
                'province_id' => '8',

            ],
            [
                'id'          => '804',
                'en'          => 'Kaoh Thum',
                'km'          => 'កោះធំ ',
                'province_id' => '8',

            ],
            [
                'id'          => '805',
                'en'          => 'Leuk Daek',
                'km'          => 'លើកដែក ',
                'province_id' => '8',

            ],
            [
                'id'          => '806',
                'en'          => 'Lvea Aem',
                'km'          => 'ល្វាឯម ',
                'province_id' => '8',

            ],
            [
                'id'          => '807',
                'en'          => 'Mukh Kampul',
                'km'          => 'មុខកំពូល ',
                'province_id' => '8',

            ],
            [
                'id'          => '808',
                'en'          => 'Angk Snuol',
                'km'          => 'អង្គស្នួល ',
                'province_id' => '8',

            ],
            [
                'id'          => '809',
                'en'          => 'Ponhea Lueu',
                'km'          => 'ពញាឮ ',
                'province_id' => '8',

            ],
            [
                'id'          => '810',
                'en'          => 'Sang',
                'km'          => 'ស្អាង ',
                'province_id' => '8',

            ],
            [
                'id'          => '811',
                'en'          => 'Ta Khmau',
                'km'          => 'ក្រុងតាខ្មៅ ',
                'province_id' => '8',

            ],
            [
                'id'          => '901',
                'en'          => 'Botum Sakor',
                'km'          => 'បទុមសាគរ ',
                'province_id' => '9',

            ],
            [
                'id'          => '902',
                'en'          => 'Kiri Sakor',
                'km'          => 'គិរីសាគរ ',
                'province_id' => '9',

            ],
            [
                'id'          => '903',
                'en'          => 'Kaoh Kong',
                'km'          => 'កោះកុង ',
                'province_id' => '9',

            ],
            [
                'id'          => '904',
                'en'          => 'Khemara Phoumin',
                'km'          => 'ក្រុងខេមរភូមិន្ទ (អតីត ស្មាច់មានជ័យ) ',
                'province_id' => '9',

            ],
            [
                'id'          => '905',
                'en'          => 'Mondol Seima',
                'km'          => 'មណ្ឌលសីមា ',
                'province_id' => '9',

            ],
            [
                'id'          => '906',
                'en'          => 'Srae Ambel',
                'km'          => 'ស្រែអំបិល ',
                'province_id' => '9',

            ],
            [
                'id'          => '907',
                'en'          => 'Thma Bang',
                'km'          => 'ថ្មបាំង ',
                'province_id' => '9',

            ],
            [
                'id'          => '1001',
                'en'          => 'Chhloung',
                'km'          => 'ឆ្លូង ',
                'province_id' => '10',

            ],
            [
                'id'          => '1002',
                'en'          => 'Kracheh',
                'km'          => 'ក្រុងក្រចេះ ',
                'province_id' => '10',

            ],
            [
                'id'          => '1003',
                'en'          => 'Prek Prasab',
                'km'          => 'ព្រែកប្រសព្វ ',
                'province_id' => '10',

            ],
            [
                'id'          => '1004',
                'en'          => 'Sambour',
                'km'          => 'សម្បូរ ',
                'province_id' => '10',

            ],
            [
                'id'          => '1005',
                'en'          => 'Snuol',
                'km'          => 'ស្នួល ',
                'province_id' => '10',

            ],
            [
                'id'          => '1006',
                'en'          => 'Chetr Borei',
                'km'          => 'ចិត្របុរី ',
                'province_id' => '10',

            ],
            [
                'id'          => '1101',
                'en'          => 'Kaev Seima',
                'km'          => 'កែវសីមា ',
                'province_id' => '11',

            ],
            [
                'id'          => '1102',
                'en'          => 'Kaoh Nheaek',
                'km'          => 'កោះញែក ',
                'province_id' => '11',

            ],
            [
                'id'          => '1103',
                'en'          => 'Ou Reang',
                'km'          => 'អូររាំង ',
                'province_id' => '11',

            ],
            [
                'id'          => '1104',
                'en'          => 'Pech Chreada',
                'km'          => 'ពេជ្រាដា ',
                'province_id' => '11',

            ],
            [
                'id'          => '1105',
                'en'          => 'Saen Monourom',
                'km'          => 'ក្រុងសែនមនោរម្យ ',
                'province_id' => '11',

            ],
            [
                'id'          => '1201',
                'en'          => 'Chamkar Mon',
                'km'          => 'ចំការមន',
                'province_id' => '12',

            ],
            [
                'id'          => '1202',
                'en'          => 'Doun Penh',
                'km'          => 'ដូនពេញ',
                'province_id' => '12',

            ],
            [
                'id'          => '1203',
                'en'          => 'Prampir Meakkakra',
                'km'          => 'ប្រាំពីរមករា',
                'province_id' => '12',

            ],
            [
                'id'          => '1204',
                'en'          => 'Tuol Kouk',
                'km'          => 'ទួលគោក',
                'province_id' => '12',

            ],
            [
                'id'          => '1205',
                'en'          => 'Dangkao',
                'km'          => 'ដង្កោ',
                'province_id' => '12',

            ],
            [
                'id'          => '1206',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ',
                'province_id' => '12',

            ],
            [
                'id'          => '1207',
                'en'          => 'Russey Keo',
                'km'          => 'ឫស្សីកែវ',
                'province_id' => '12',

            ],
            [
                'id'          => '1208',
                'en'          => 'Saensokh',
                'km'          => 'សែនសុខ',
                'province_id' => '12',

            ],
            [
                'id'          => '1209',
                'en'          => 'Pur SenChey',
                'km'          => 'ពោធិ៍សែនជ័យ',
                'province_id' => '12',

            ],
            [
                'id'          => '1210',
                'en'          => 'Chraoy Chongvar',
                'km'          => 'ជ្រោយចង្វា',
                'province_id' => '12',

            ],
            [
                'id'          => '1211',
                'en'          => 'Praek Pnov',
                'km'          => 'ព្រែកព្នៅ',
                'province_id' => '12',

            ],
            [
                'id'          => '1212',
                'en'          => 'Chbar Ampov',
                'km'          => 'ច្បារអំពៅ',
                'province_id' => '12',

            ],
            [
                'id'          => '1301',
                'en'          => 'Chey Saen',
                'km'          => '​ជ័យសែន ',
                'province_id' => '13',

            ],
            [
                'id'          => '1302',
                'en'          => 'Chhaeb',
                'km'          => '​ឆែប ',
                'province_id' => '13',

            ],
            [
                'id'          => '1303',
                'en'          => 'Choam Ksant',
                'km'          => 'ជាំក្សាន្ត​ ',
                'province_id' => '13',

            ],
            [
                'id'          => '1304',
                'en'          => 'Kuleaen',
                'km'          => 'គូលែន​ ',
                'province_id' => '13',

            ],
            [
                'id'          => '1305',
                'en'          => 'Rovieng',
                'km'          => 'រវៀង​ ',
                'province_id' => '13',

            ],
            [
                'id'          => '1306',
                'en'          => 'Sangkum Thmei',
                'km'          => 'សង្គមថ្មី​ ',
                'province_id' => '13',

            ],
            [
                'id'          => '1307',
                'en'          => 'Tbaeng Mean Chey',
                'km'          => '​ត្បែងមានជ័យ ',
                'province_id' => '13',

            ],
            [
                'id'          => '1308',
                'en'          => 'Preah Vihear',
                'km'          => 'ព្រះវិហារ',
                'province_id' => '13',

            ],
            [
                'id'          => '1401',
                'en'          => 'Ba Phnum',
                'km'          => 'បាភ្នំ​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1402',
                'en'          => 'Kamchay Mear',
                'km'          => 'កំចាយមារ​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1403',
                'en'          => 'Kampong Trabaek',
                'km'          => 'កំពង់ត្របែក​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1404',
                'en'          => 'Kanhchriech',
                'km'          => '​កញ្ជ្រៀច ',
                'province_id' => '14',

            ],
            [
                'id'          => '1405',
                'en'          => 'Me Sang',
                'km'          => 'មេសាង​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1406',
                'en'          => 'Peam Chor',
                'km'          => 'ពាមជរ​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1407',
                'en'          => 'Peam Ro',
                'km'          => '​ពាមរ​ក៏ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1408',
                'en'          => 'Pea Reang',
                'km'          => '​ពារាំង ',
                'province_id' => '14',

            ],
            [
                'id'          => '1409',
                'en'          => 'Preah Sdach',
                'km'          => '​ព្រះស្ដេច ',
                'province_id' => '14',

            ],
            [
                'id'          => '1410',
                'en'          => 'Prey Veng',
                'km'          => '​ក្រុងព្រៃវែង ',
                'province_id' => '14',

            ],
            [
                'id'          => '1411',
                'en'          => 'Pur Rieng',
                'km'          => 'ពោធិ៍រៀង ',
                'province_id' => '14',

            ],
            [
                'id'          => '1412',
                'en'          => 'Sithor Kandal',
                'km'          => 'ស៊ីធរកណ្ដាល​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1413',
                'en'          => 'Svay Antor',
                'km'          => '​ស្វាយអន្ទរ​ ',
                'province_id' => '14',

            ],
            [
                'id'          => '1501',
                'en'          => 'Bakan',
                'km'          => 'បាកាន ',
                'province_id' => '15',

            ],
            [
                'id'          => '1502',
                'en'          => 'Kandieng',
                'km'          => 'កណ្តៀង ',
                'province_id' => '15',

            ],
            [
                'id'          => '1503',
                'en'          => 'Krakor',
                'km'          => 'ក្រគរ ',
                'province_id' => '15',

            ],
            [
                'id'          => '1504',
                'en'          => 'Phnum Kravanh',
                'km'          => 'ភ្នំក្រវាញ ',
                'province_id' => '15',

            ],
            [
                'id'          => '1505',
                'en'          => 'Pursat',
                'km'          => 'ក្រុងពោធិ៍សាត់ (អតីត សំពៅមាស) ',
                'province_id' => '15',

            ],
            [
                'id'          => '1506',
                'en'          => 'Veal Veaeng',
                'km'          => 'វាលវែង ',
                'province_id' => '15',

            ],
            [
                'id'          => '1601',
                'en'          => 'Andoung Meas',
                'km'          => 'អណ្តូងមាស ',
                'province_id' => '16',

            ],
            [
                'id'          => '1602',
                'en'          => 'Ban Lung',
                'km'          => 'ក្រុងបានលុង ',
                'province_id' => '16',

            ],
            [
                'id'          => '1603',
                'en'          => 'Bar Kaev',
                'km'          => 'បរកែវ ',
                'province_id' => '16',

            ],
            [
                'id'          => '1604',
                'en'          => 'Koun Mom',
                'km'          => 'កូនមុំ ',
                'province_id' => '16',

            ],
            [
                'id'          => '1605',
                'en'          => 'Lumphat',
                'km'          => 'លំផាត់ ',
                'province_id' => '16',

            ],
            [
                'id'          => '1606',
                'en'          => 'Ou Chum',
                'km'          => 'អូរជុំ ',
                'province_id' => '16',

            ],
            [
                'id'          => '1607',
                'en'          => 'Ou Ya Dav',
                'km'          => 'អូរយ៉ាដាវ ',
                'province_id' => '16',

            ],
            [
                'id'          => '1608',
                'en'          => 'Ta Veaeng',
                'km'          => 'តាវែង ',
                'province_id' => '16',

            ],
            [
                'id'          => '1609',
                'en'          => 'Veun Sai',
                'km'          => 'វើនសៃ ',
                'province_id' => '16',

            ],
            [
                'id'          => '1701',
                'en'          => 'Angkor Chum',
                'km'          => 'អង្គរជុំ',
                'province_id' => '17',

            ],
            [
                'id'          => '1702',
                'en'          => 'Angkor Thum',
                'km'          => 'អង្គរធំ',
                'province_id' => '17',

            ],
            [
                'id'          => '1703',
                'en'          => 'Banteay Srei',
                'km'          => 'បន្ទាយស្រី',
                'province_id' => '17',

            ],
            [
                'id'          => '1704',
                'en'          => 'Chi Kraeng',
                'km'          => 'ជីក្រែង',
                'province_id' => '17',

            ],
            [
                'id'          => '1706',
                'en'          => 'Kralanh',
                'km'          => 'ក្រឡាញ់',
                'province_id' => '17',

            ],
            [
                'id'          => '1707',
                'en'          => 'Puok',
                'km'          => 'ពួក',
                'province_id' => '17',

            ],
            [
                'id'          => '1709',
                'en'          => 'Prasat Bakong',
                'km'          => 'ប្រាសាទបាគង',
                'province_id' => '17',

            ],
            [
                'id'          => '1710',
                'en'          => 'Siem Reap',
                'km'          => 'ក្រុងសៀមរាប',
                'province_id' => '17',

            ],
            [
                'id'          => '1711',
                'en'          => 'Soutr Nikom',
                'km'          => 'សូទ្រនិគម',
                'province_id' => '17',

            ],
            [
                'id'          => '1712',
                'en'          => 'Srei Snam',
                'km'          => 'ស្រីស្នំ',
                'province_id' => '17',

            ],
            [
                'id'          => '1713',
                'en'          => 'Svay Leu',
                'km'          => 'ស្វាយលើ',
                'province_id' => '17',

            ],
            [
                'id'          => '1714',
                'en'          => 'Varin',
                'km'          => 'វ៉ារិន',
                'province_id' => '17',

            ],
            [
                'id'          => '1801',
                'en'          => 'Preah Sihanouk',
                'km'          => 'ក្រុងព្រះសីហនុ (អតីត មិត្តភាព) ',
                'province_id' => '18',

            ],
            [
                'id'          => '1802',
                'en'          => 'Prey Nob',
                'km'          => 'ព្រៃនប់ ',
                'province_id' => '18',

            ],
            [
                'id'          => '1803',
                'en'          => 'Stueng Hav',
                'km'          => 'ស្ទឹងហាវ ',
                'province_id' => '18',

            ],
            [
                'id'          => '1804',
                'en'          => 'Kampong Seila',
                'km'          => 'កំពង់សិលា ',
                'province_id' => '18',

            ],
            [
                'id'          => '1901',
                'en'          => 'Sesan',
                'km'          => 'សេសាន ',
                'province_id' => '19',

            ],
            [
                'id'          => '1902',
                'en'          => 'Siem Bouk',
                'km'          => 'សៀមបូក ',
                'province_id' => '19',

            ],
            [
                'id'          => '1903',
                'en'          => 'Siem Pang',
                'km'          => 'សៀមប៉ាង ',
                'province_id' => '19',

            ],
            [
                'id'          => '1904',
                'en'          => 'Stueng Traeng',
                'km'          => 'ក្រុងស្ទឹងត្រែង ',
                'province_id' => '19',

            ],
            [
                'id'          => '1905',
                'en'          => 'Thala Barivat',
                'km'          => 'ថាឡាបរិវ៉ាត់ ',
                'province_id' => '19',

            ],
            [
                'id'          => '2001',
                'en'          => 'Chantrea',
                'km'          => 'ចន្ទ្រា ',
                'province_id' => '20',

            ],
            [
                'id'          => '2002',
                'en'          => 'Kampong Rou',
                'km'          => 'កំពង់រោទិ៍ ',
                'province_id' => '20',

            ],
            [
                'id'          => '2003',
                'en'          => 'Rumduol',
                'km'          => 'រំដួល ',
                'province_id' => '20',

            ],
            [
                'id'          => '2004',
                'en'          => 'Romeas Haek',
                'km'          => 'រមាសហែក ',
                'province_id' => '20',

            ],
            [
                'id'          => '2005',
                'en'          => 'Svay Chrum',
                'km'          => 'ស្វាយជ្រំ ',
                'province_id' => '20',

            ],
            [
                'id'          => '2006',
                'en'          => 'Svay Rieng',
                'km'          => 'ក្រុងស្វាយរៀង ',
                'province_id' => '20',

            ],
            [
                'id'          => '2007',
                'en'          => 'Svay Teab',
                'km'          => 'ស្វាយទាប ',
                'province_id' => '20',

            ],
            [
                'id'          => '2008',
                'en'          => 'Bavet',
                'km'          => 'ក្រុងបាវិត ',
                'province_id' => '20',

            ],
            [
                'id'          => '2101',
                'en'          => 'Angkor Borei',
                'km'          => 'អង្គរបុរី ',
                'province_id' => '21',

            ],
            [
                'id'          => '2102',
                'en'          => 'Bati',
                'km'          => 'បាទី ',
                'province_id' => '21',

            ],
            [
                'id'          => '2103',
                'en'          => 'Borei Cholsar',
                'km'          => 'បូរីជលសារ ',
                'province_id' => '21',

            ],
            [
                'id'          => '2104',
                'en'          => 'Kiri Vong',
                'km'          => 'គីរីវង់ ',
                'province_id' => '21',

            ],
            [
                'id'          => '2105',
                'en'          => 'Kaoh Andaet',
                'km'          => 'កោះអណ្ដែត ',
                'province_id' => '21',

            ],
            [
                'id'          => '2106',
                'en'          => 'Prey Kabbas',
                'km'          => 'ព្រៃកប្បាស ',
                'province_id' => '21',

            ],
            [
                'id'          => '2107',
                'en'          => 'Samraong',
                'km'          => 'សំរោង ',
                'province_id' => '21',

            ],
            [
                'id'          => '2108',
                'en'          => 'Doun Kaev',
                'km'          => 'ក្រុងដូនកែវ ',
                'province_id' => '21',

            ],
            [
                'id'          => '2109',
                'en'          => 'Tram Kak',
                'km'          => 'ត្រាំកក់ ',
                'province_id' => '21',

            ],
            [
                'id'          => '2110',
                'en'          => 'Treang',
                'km'          => 'ទ្រាំង ',
                'province_id' => '21',

            ],
            [
                'id'          => '2201',
                'en'          => 'Anlong Veaeng',
                'km'          => 'អន្លង់វែង',
                'province_id' => '22',

            ],
            [
                'id'          => '2202',
                'en'          => 'Banteay Ampil',
                'km'          => 'បន្ទាយអំពិល',
                'province_id' => '22',

            ],
            [
                'id'          => '2203',
                'en'          => 'Chong Kal',
                'km'          => 'ចុងកាល់',
                'province_id' => '22',

            ],
            [
                'id'          => '2204',
                'en'          => 'Samraong',
                'km'          => 'ក្រុងសំរោង',
                'province_id' => '22',

            ],
            [
                'id'          => '2205',
                'en'          => 'Trapeang Prasat',
                'km'          => 'ត្រពាំងប្រាសាទ',
                'province_id' => '22',

            ],
            [
                'id'          => '2301',
                'en'          => 'Damnak Changaeur',
                'km'          => 'ដំណាក់ចង្អើរ ',
                'province_id' => '23',

            ],
            [
                'id'          => '2302',
                'en'          => 'Kaeb',
                'km'          => 'ក្រុងកែប ',
                'province_id' => '23',

            ],
            [
                'id'          => '2401',
                'en'          => 'Pailin',
                'km'          => 'ប៉ៃលិន​',
                'province_id' => '24',

            ],
            [
                'id'          => '2402',
                'en'          => 'Sala Krau',
                'km'          => 'សាលាក្រៅ ',
                'province_id' => '24',

            ],
            [
                'id'          => '2501',
                'en'          => 'Dambae',
                'km'          => 'ដំបែ ',
                'province_id' => '25',

            ],
            [
                'id'          => '2502',
                'en'          => 'Krouch Chhmar',
                'km'          => 'ក្រូចឆ្មារ ',
                'province_id' => '25',

            ],
            [
                'id'          => '2503',
                'en'          => 'Memot',
                'km'          => 'មេមត់ ',
                'province_id' => '25',

            ],
            [
                'id'          => '2504',
                'en'          => 'Ou Reang Ov',
                'km'          => 'អូររាំងឪ ',
                'province_id' => '25',

            ],
            [
                'id'          => '2505',
                'en'          => 'Ponhea Kraek',
                'km'          => 'ពញាក្រែក ',
                'province_id' => '25',

            ],
            [
                'id'          => '2506',
                'en'          => 'Suong',
                'km'          => 'ក្រុងសួង',
                'province_id' => '25',

            ],
            [
                'id'          => '2507',
                'en'          => 'Tboung Khmum',
                'km'          => 'ត្បូងឃ្មុំ ',
                'province_id' => '25',

            ],
        ];
    }
}
