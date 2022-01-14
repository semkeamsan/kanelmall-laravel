<?php

namespace Database\Seeders;
use App\Models\Commune;
use Illuminate\Database\Seeder;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $value) {
            $model =  new Commune();
            $model->id = $value['id'];
            $model->district_id = $value['district_id'];
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
        return  [
            [
                'id'          => '10201',
                'en'          => 'Banteay Neang',
                'km'          => 'បន្ទាយនាង',
                'district_id' => '102'
            ],
            [
                'id'          => '10202',
                'en'          => 'Bat Trang',
                'km'          => 'បត់ត្រង់',
                'district_id' => '102'
            ],
            [
                'id'          => '10203',
                'en'          => 'Chamnaom',
                'km'          => 'ចំណោម',
                'district_id' => '102'
            ],
            [
                'id'          => '10204',
                'en'          => 'Kouk Ballangk',
                'km'          => 'បល្គ័ង្គ',
                'district_id' => '102'
            ],
            [
                'id'          => '10205',
                'en'          => 'Koy Maeng',
                'km'          => 'គយម៉ែង',
                'district_id' => '102'
            ],
            [
                'id'          => '10206',
                'en'          => 'Ou Prasat',
                'km'          => 'អូរប្រាសាទ',
                'district_id' => '102'
            ],
            [
                'id'          => '10207',
                'en'          => 'Phnum Touch',
                'km'          => 'ភ្នំតូច',
                'district_id' => '102'
            ],
            [
                'id'          => '10208',
                'en'          => 'Rohat Tuek',
                'km'          => 'រហាត់ទឹក',
                'district_id' => '102'
            ],
            [
                'id'          => '10209',
                'en'          => 'Ruessei Kraok',
                'km'          => 'ឬស្សីក្រោក',
                'district_id' => '102'
            ],
            [
                'id'          => '10210',
                'en'          => 'Sambuor',
                'km'          => 'សំបួរ',
                'district_id' => '102'
            ],
            [
                'id'          => '10211',
                'en'          => 'Soea',
                'km'          => 'សឿ',
                'district_id' => '102'
            ],
            [
                'id'          => '10212',
                'en'          => 'Srah Reang',
                'km'          => 'ស្រះរាំង',
                'district_id' => '102'
            ],
            [
                'id'          => '10213',
                'en'          => 'Ta Lam',
                'km'          => 'តាឡំ',
                'district_id' => '102'
            ],
            [
                'id'          => '10301',
                'en'          => 'Nam Tau',
                'km'          => 'ណាំតៅ',
                'district_id' => '103'
            ],
            [
                'id'          => '10302',
                'en'          => 'Poy Char',
                'km'          => 'ប៉ោយចារ',
                'district_id' => '103'
            ],
            [
                'id'          => '10303',
                'en'          => 'Ponley',
                'km'          => 'ពន្លៃ',
                'district_id' => '103'
            ],
            [
                'id'          => '10304',
                'en'          => 'Spean Sraeng',
                'km'          => 'ស្ពានស្រែង',
                'district_id' => '103'
            ],
            [
                'id'          => '10305',
                'en'          => 'Srah Chik',
                'km'          => 'ស្រះជីក',
                'district_id' => '103'
            ],
            [
                'id'          => '10306',
                'en'          => 'Phnum Dei',
                'km'          => 'ភ្នំដី',
                'district_id' => '103'
            ],
            [
                'id'          => '10401',
                'en'          => 'Chnuor Mean Chey',
                'km'          => 'ឈ្នួរមានជ័យ',
                'district_id' => '104'
            ],
            [
                'id'          => '10402',
                'en'          => 'Chob Vari',
                'km'          => 'ជប់វ៉ារី',
                'district_id' => '104'
            ],
            [
                'id'          => '10403',
                'en'          => 'Phnum Lieb',
                'km'          => 'ភ្នំលៀប',
                'district_id' => '104'
            ],
            [
                'id'          => '10404',
                'en'          => 'Prasat',
                'km'          => 'ប្រាសាទ',
                'district_id' => '104'
            ],
            [
                'id'          => '10405',
                'en'          => 'Preak Netr Preah',
                'km'          => 'ព្រះនេត្រព្រះ',
                'district_id' => '104'
            ],
            [
                'id'          => '10406',
                'en'          => 'Rohal',
                'km'          => 'រហាល',
                'district_id' => '104'
            ],
            [
                'id'          => '10407',
                'en'          => 'Tean Kam',
                'km'          => 'ទានកាំ',
                'district_id' => '104'
            ],
            [
                'id'          => '10408',
                'en'          => 'Tuek Chour',
                'km'          => 'ទឹកជោរ',
                'district_id' => '104'
            ],
            [
                'id'          => '10409',
                'en'          => 'Bos Sbov',
                'km'          => 'បុស្បូវ',
                'district_id' => '104'
            ],
            [
                'id'          => '10501',
                'en'          => 'Changha',
                'km'          => 'ចង្ហា',
                'district_id' => '105'
            ],
            [
                'id'          => '10502',
                'en'          => 'Koub',
                'km'          => 'កូប',
                'district_id' => '105'
            ],
            [
                'id'          => '10503',
                'en'          => 'Kuttasat',
                'km'          => 'គុត្តសត',
                'district_id' => '105'
            ],
            [
                'id'          => '10505',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '105'
            ],
            [
                'id'          => '10506',
                'en'          => 'Souphi',
                'km'          => 'សូភី',
                'district_id' => '105'
            ],
            [
                'id'          => '10507',
                'en'          => 'Soengh',
                'km'          => 'សឹង្ហ',
                'district_id' => '105'
            ],
            [
                'id'          => '10509',
                'en'          => 'Ou Beichoan',
                'km'          => 'អូរបីជាន់',
                'district_id' => '105'
            ],
            [
                'id'          => '10602',
                'en'          => 'Kampong Svay',
                'km'          => 'កំពង់ស្វាយ',
                'district_id' => '106'
            ],
            [
                'id'          => '10603',
                'en'          => 'Kaoh Pong Satv',
                'km'          => 'កោះពងសត្វ',
                'district_id' => '106'
            ],
            [
                'id'          => '10604',
                'en'          => 'Mkak',
                'km'          => 'ម្កាក់',
                'district_id' => '106'
            ],
            [
                'id'          => '10605',
                'en'          => 'Ou Ambel',
                'km'          => 'អូរអំបិល',
                'district_id' => '106'
            ],
            [
                'id'          => '10606',
                'en'          => 'Phniet',
                'km'          => 'ភ្នៀត',
                'district_id' => '106'
            ],
            [
                'id'          => '10607',
                'en'          => 'Preah Ponlea',
                'km'          => 'ព្រះពន្លា',
                'district_id' => '106'
            ],
            [
                'id'          => '10608',
                'en'          => 'Tuek Thla',
                'km'          => 'ទឹកថ្លា',
                'district_id' => '106'
            ],
            [
                'id'          => '10701',
                'en'          => 'Banteay Chhmar',
                'km'          => 'បន្ទាយឆ្មារ',
                'district_id' => '107'
            ],
            [
                'id'          => '10702',
                'en'          => 'Kouk Romiet',
                'km'          => 'គោករមៀត',
                'district_id' => '107'
            ],
            [
                'id'          => '10703',
                'en'          => 'Phum Thmei',
                'km'          => 'ភូមិថ្នី',
                'district_id' => '107'
            ],
            [
                'id'          => '10704',
                'en'          => 'Thma Puok',
                'km'          => 'ថ្មពួក',
                'district_id' => '107'
            ],
            [
                'id'          => '10705',
                'en'          => 'Kouk Kakthen',
                'km'          => 'គោកកឋិន',
                'district_id' => '107'
            ],
            [
                'id'          => '10706',
                'en'          => 'Kumru',
                'km'          => 'គំរូ',
                'district_id' => '107'
            ],
            [
                'id'          => '10801',
                'en'          => 'Phkoam',
                'km'          => 'ផ្គាំ',
                'district_id' => '108'
            ],
            [
                'id'          => '10802',
                'en'          => 'Sarongk',
                'km'          => 'សារង្គ',
                'district_id' => '108'
            ],
            [
                'id'          => '10803',
                'en'          => 'Sla Kram',
                'km'          => 'ស្លក្រាម',
                'district_id' => '108'
            ],
            [
                'id'          => '10804',
                'en'          => 'Svay Chek',
                'km'          => 'ស្វាយចេក',
                'district_id' => '108'
            ],
            [
                'id'          => '10805',
                'en'          => 'Ta Baen',
                'km'          => 'តាបែន',
                'district_id' => '108'
            ],
            [
                'id'          => '10806',
                'en'          => 'Ta Phou',
                'km'          => 'តាផូ',
                'district_id' => '108'
            ],
            [
                'id'          => '10807',
                'en'          => 'Treas',
                'km'          => 'ទ្រាស',
                'district_id' => '108'
            ],
            [
                'id'          => '10808',
                'en'          => 'Roluos',
                'km'          => 'រលួស',
                'district_id' => '108'
            ],
            [
                'id'          => '10901',
                'en'          => 'Boeng Beng',
                'km'          => 'បឹងបេង',
                'district_id' => '109'
            ],
            [
                'id'          => '10902',
                'en'          => 'Malai',
                'km'          => 'ម៉ាឡៃ',
                'district_id' => '109'
            ],
            [
                'id'          => '10903',
                'en'          => 'Ou Sampoar',
                'km'          => 'អូរសំព័រ',
                'district_id' => '109'
            ],
            [
                'id'          => '10904',
                'en'          => 'Ou Sralau',
                'km'          => 'អូរស្រឡៅ',
                'district_id' => '109'
            ],
            [
                'id'          => '10905',
                'en'          => 'Tuol Pongro',
                'km'          => 'ទួលពង្រ',
                'district_id' => '109'
            ],
            [
                'id'          => '10906',
                'en'          => 'Ta Kong',
                'km'          => 'តាគង់',
                'district_id' => '109'
            ],
            [
                'id'          => '11001',
                'en'          => 'Nimitt',
                'km'          => 'និមិត្ត',
                'district_id' => '110'
            ],
            [
                'id'          => '11002',
                'en'          => 'Paoy Paet',
                'km'          => 'ប៉ោយប៉ែត',
                'district_id' => '110'
            ],
            [
                'id'          => '11003',
                'en'          => 'Phsar Kandal',
                'km'          => 'ផ្សារកណ្តាល',
                'district_id' => '110'
            ],
            [
                'id'          => '20101',
                'en'          => 'Kantueu Muoy',
                'km'          => 'កន្ទឺ១',
                'district_id' => '201'
            ],
            [
                'id'          => '20102',
                'en'          => 'Kantueu Pir',
                'km'          => 'កន្ទឺ២',
                'district_id' => '201'
            ],
            [
                'id'          => '20103',
                'en'          => 'Bay Damram',
                'km'          => 'បាយដំរាំ',
                'district_id' => '201'
            ],
            [
                'id'          => '20104',
                'en'          => 'Chheu Teal',
                'km'          => 'ឈើទាល',
                'district_id' => '201'
            ],
            [
                'id'          => '20105',
                'en'          => 'Chaeng Mean Chey',
                'km'          => 'ចែងមានជ័យ',
                'district_id' => '201'
            ],
            [
                'id'          => '20106',
                'en'          => 'Phnum Sampov',
                'km'          => 'ភ្នំសំពៅ',
                'district_id' => '201'
            ],
            [
                'id'          => '20107',
                'en'          => 'Snoeng',
                'km'          => 'ស្នឺង',
                'district_id' => '201'
            ],
            [
                'id'          => '20108',
                'en'          => 'Ta Kream',
                'km'          => 'តាគ្រាម',
                'district_id' => '201'
            ],
            [
                'id'          => '20201',
                'en'          => 'Ta Pung',
                'km'          => 'តាពូង',
                'district_id' => '202'
            ],
            [
                'id'          => '20202',
                'en'          => 'Ta Meun',
                'km'          => 'តាម៉ឺន',
                'district_id' => '202'
            ],
            [
                'id'          => '20203',
                'en'          => 'Ou Ta Ki',
                'km'          => 'អូរតាគី',
                'district_id' => '202'
            ],
            [
                'id'          => '20204',
                'en'          => 'Chrey',
                'km'          => 'ជ្រៃ',
                'district_id' => '202'
            ],
            [
                'id'          => '20205',
                'en'          => 'Anlong Run',
                'km'          => 'អន្លង់រុន',
                'district_id' => '202'
            ],
            [
                'id'          => '20206',
                'en'          => 'Chrouy Sdau',
                'km'          => 'ជ្រោយស្តៅ',
                'district_id' => '202'
            ],
            [
                'id'          => '20207',
                'en'          => 'Boeng Pring',
                'km'          => 'បឹងព្រីង',
                'district_id' => '202'
            ],
            [
                'id'          => '20208',
                'en'          => 'Kouk Khmum',
                'km'          => 'គោកឃ្មុំ',
                'district_id' => '202'
            ],
            [
                'id'          => '20209',
                'en'          => 'Bansay Traeng',
                'km'          => 'បន្សាយត្រែង',
                'district_id' => '202'
            ],
            [
                'id'          => '20210',
                'en'          => 'Rung Chrey',
                'km'          => 'រូងជ្រៃ',
                'district_id' => '202'
            ],
            [
                'id'          => '20301',
                'en'          => 'Tuol Ta Ek',
                'km'          => 'ទួលតាឯក',
                'district_id' => '203'
            ],
            [
                'id'          => '20302',
                'en'          => 'Prek Preah Sdach',
                'km'          => 'ព្រែកព្រះស្តេច',
                'district_id' => '203'
            ],
            [
                'id'          => '20303',
                'en'          => 'Rottanak',
                'km'          => 'រតនៈ',
                'district_id' => '203'
            ],
            [
                'id'          => '20304',
                'en'          => 'Chomkar Somraong',
                'km'          => 'ចំការសំរោង',
                'district_id' => '203'
            ],
            [
                'id'          => '20305',
                'en'          => 'Sla Ket',
                'km'          => 'ស្លាកែត',
                'district_id' => '203'
            ],
            [
                'id'          => '20306',
                'en'          => 'Kdol Doun Teav',
                'km'          => 'ក្តុលដូនទាវ',
                'district_id' => '203'
            ],
            [
                'id'          => '20307',
                'en'          => 'OMal',
                'km'          => 'អូរម៉ាល់',
                'district_id' => '203'
            ],
            [
                'id'          => '20308',
                'en'          => 'wat Kor',
                'km'          => 'វត្តគរ',
                'district_id' => '203'
            ],
            [
                'id'          => '20309',
                'en'          => 'Ou Char',
                'km'          => 'អូរចារ',
                'district_id' => '203'
            ],
            [
                'id'          => '20310',
                'en'          => 'Svay Por',
                'km'          => 'ស្វាយប៉ោ',
                'district_id' => '203'
            ],
            [
                'id'          => '20401',
                'en'          => 'Bavel',
                'km'          => 'បវេល',
                'district_id' => '204'
            ],
            [
                'id'          => '20402',
                'en'          => 'Khnach Romeas',
                'km'          => 'ខ្នាចរមាស',
                'district_id' => '204'
            ],
            [
                'id'          => '20403',
                'en'          => 'Lvea',
                'km'          => 'ល្វា',
                'district_id' => '204'
            ],
            [
                'id'          => '20404',
                'en'          => 'Prey Khpos',
                'km'          => 'ព្រៃខ្ពស់',
                'district_id' => '204'
            ],
            [
                'id'          => '20405',
                'en'          => 'Ampil Pram Daeum',
                'km'          => 'អំពិលប្រាំដើម',
                'district_id' => '204'
            ],
            [
                'id'          => '20406',
                'en'          => 'Kdol Ta Haen',
                'km'          => 'ក្តុលតាហែន',
                'district_id' => '204'
            ],
            [
                'id'          => '20407',
                'en'          => 'Khlaeng Meas',
                'km'          => 'ឃ្លាំងមាស',
                'district_id' => '204'
            ],
            [
                'id'          => '20408',
                'en'          => 'Boeung Pram',
                'km'          => 'បឹងប្រាំ',
                'district_id' => '204'
            ],
            [
                'id'          => '20501',
                'en'          => 'Preaek Norint',
                'km'          => 'ព្រែកនរិន្ទ',
                'district_id' => '205'
            ],
            [
                'id'          => '20502',
                'en'          => 'Samraong Knong',
                'km'          => 'សំរោងក្នុង',
                'district_id' => '205'
            ],
            [
                'id'          => '20503',
                'en'          => 'Preaek Khpob',
                'km'          => 'ព្រែកខ្ពប',
                'district_id' => '205'
            ],
            [
                'id'          => '20504',
                'en'          => 'Preaek Luong',
                'km'          => 'ព្រែកហ្លួង',
                'district_id' => '205'
            ],
            [
                'id'          => '20505',
                'en'          => 'Peam Aek',
                'km'          => 'ពាមឯក',
                'district_id' => '205'
            ],
            [
                'id'          => '20506',
                'en'          => 'Prey Chas',
                'km'          => 'ព្រៃចាស់',
                'district_id' => '205'
            ],
            [
                'id'          => '20507',
                'en'          => 'Kaoh Chiveang',
                'km'          => 'កោះជីវាំង',
                'district_id' => '205'
            ],
            [
                'id'          => '20601',
                'en'          => 'Moung',
                'km'          => 'មោង',
                'district_id' => '206'
            ],
            [
                'id'          => '20602',
                'en'          => 'Kear',
                'km'          => 'គារ',
                'district_id' => '206'
            ],
            [
                'id'          => '20603',
                'en'          => 'Prey Svay',
                'km'          => 'ព្រៃស្វាយ',
                'district_id' => '206'
            ],
            [
                'id'          => '20604',
                'en'          => 'Ruessei Krang',
                'km'          => 'ឬស្សីក្រាំង',
                'district_id' => '206'
            ],
            [
                'id'          => '20605',
                'en'          => 'Chrey',
                'km'          => 'ជ្រៃ',
                'district_id' => '206'
            ],
            [
                'id'          => '20606',
                'en'          => 'Ta Loas',
                'km'          => 'តាលាស់',
                'district_id' => '206'
            ],
            [
                'id'          => '20607',
                'en'          => 'Kakaoh',
                'km'          => 'កកោះ',
                'district_id' => '206'
            ],
            [
                'id'          => '20608',
                'en'          => 'Prey Touch',
                'km'          => 'ព្រៃតូច',
                'district_id' => '206'
            ],
            [
                'id'          => '20609',
                'en'          => 'Robas Mongkol',
                'km'          => 'របស់មង្គល',
                'district_id' => '206'
            ],
            [
                'id'          => '20701',
                'en'          => 'Sdau',
                'km'          => 'ស្តៅ',
                'district_id' => '207'
            ],
            [
                'id'          => '20702',
                'en'          => 'Andaeuk Haeb',
                'km'          => 'អណ្តើបហែប',
                'district_id' => '207'
            ],
            [
                'id'          => '20703',
                'en'          => 'Phlov Meas',
                'km'          => 'ផ្លូវមាស',
                'district_id' => '207'
            ],
            [
                'id'          => '20704',
                'en'          => 'Traeng',
                'km'          => 'ត្រែង',
                'district_id' => '207'
            ],
            [
                'id'          => '20705',
                'en'          => 'Reaksmei Songha',
                'km'          => 'រស្មីសង្ហារ',
                'district_id' => '207'
            ],
            [
                'id'          => '20801',
                'en'          => 'Anlong Vil',
                'km'          => 'អន្លង់វិល',
                'district_id' => '208'
            ],
            [
                'id'          => '20802',
                'en'          => 'Norea',
                'km'          => 'នរា',
                'district_id' => '208'
            ],
            [
                'id'          => '20803',
                'en'          => 'Ta Pon',
                'km'          => 'តាប៉ុន',
                'district_id' => '208'
            ],
            [
                'id'          => '20804',
                'en'          => 'Roka',
                'km'          => 'រកា',
                'district_id' => '208'
            ],
            [
                'id'          => '20805',
                'en'          => 'Kampong Preah',
                'km'          => 'កំពង់ព្រះ',
                'district_id' => '208'
            ],
            [
                'id'          => '20806',
                'en'          => 'Kampong Prieng',
                'km'          => 'កំពង់ព្រៀង',
                'district_id' => '208'
            ],
            [
                'id'          => '20807',
                'en'          => 'Reang Kesei',
                'km'          => 'រាំងកេសី',
                'district_id' => '208'
            ],
            [
                'id'          => '20808',
                'en'          => 'Ou Dambang Muoy',
                'km'          => 'អូរដំបង១',
                'district_id' => '208'
            ],
            [
                'id'          => '20809',
                'en'          => 'Ou Dambang Pir',
                'km'          => 'អូរដំបង២',
                'district_id' => '208'
            ],
            [
                'id'          => '20810',
                'en'          => 'Vaot Ta Muem',
                'km'          => 'វត្តតាមិម',
                'district_id' => '208'
            ],
            [
                'id'          => '20901',
                'en'          => 'Ta Taok',
                'km'          => 'តាតោក',
                'district_id' => '209'
            ],
            [
                'id'          => '20902',
                'en'          => 'Kampong Lpov',
                'km'          => 'កំពង់ល្ពៅ',
                'district_id' => '209'
            ],
            [
                'id'          => '20903',
                'en'          => 'Ou Samril',
                'km'          => 'អូរសំរិល',
                'district_id' => '209'
            ],
            [
                'id'          => '20904',
                'en'          => 'Sung',
                'km'          => 'ស៊ុង',
                'district_id' => '209'
            ],
            [
                'id'          => '20905',
                'en'          => 'Samlout',
                'km'          => 'សំឡូត',
                'district_id' => '209'
            ],
            [
                'id'          => '20906',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ',
                'district_id' => '209'
            ],
            [
                'id'          => '20907',
                'en'          => 'Ta Sanh',
                'km'          => 'តាសាញ',
                'district_id' => '209'
            ],
            [
                'id'          => '21001',
                'en'          => 'Sampov Lun',
                'km'          => 'សំពៅលូន',
                'district_id' => '210'
            ],
            [
                'id'          => '21002',
                'en'          => 'Angkor Ban',
                'km'          => 'អង្គរបាន',
                'district_id' => '210'
            ],
            [
                'id'          => '21003',
                'en'          => 'Ta Sda',
                'km'          => 'តាស្តា',
                'district_id' => '210'
            ],
            [
                'id'          => '21004',
                'en'          => 'Santepheap',
                'km'          => 'សន្តិភាព',
                'district_id' => '210'
            ],
            [
                'id'          => '21005',
                'en'          => 'Serei Mean Chey',
                'km'          => 'សិរីមានជ័យ',
                'district_id' => '210'
            ],
            [
                'id'          => '21006',
                'en'          => 'Chrey Seima',
                'km'          => 'ជ្រៃសីមា',
                'district_id' => '210'
            ],
            [
                'id'          => '21101',
                'en'          => 'Phnum Proek',
                'km'          => 'ភ្នំព្រឹក',
                'district_id' => '211'
            ],
            [
                'id'          => '21102',
                'en'          => 'Pech Chenda',
                'km'          => 'ពេជ្រចិន្តា',
                'district_id' => '211'
            ],
            [
                'id'          => '21103',
                'en'          => 'Bour',
                'km'          => 'បួរ',
                'district_id' => '211'
            ],
            [
                'id'          => '21104',
                'en'          => 'Barang Thleak',
                'km'          => 'បារាំងធ្លាក់',
                'district_id' => '211'
            ],
            [
                'id'          => '21105',
                'en'          => 'Ou Rumduol',
                'km'          => 'អូររំដួល',
                'district_id' => '211'
            ],
            [
                'id'          => '21201',
                'en'          => 'Kamrieng',
                'km'          => 'កំរៀង',
                'district_id' => '212'
            ],
            [
                'id'          => '21202',
                'en'          => 'Boeng Reang',
                'km'          => 'បឹងរាំង',
                'district_id' => '212'
            ],
            [
                'id'          => '21203',
                'en'          => 'Ou Da',
                'km'          => 'អូរដា',
                'district_id' => '212'
            ],
            [
                'id'          => '21204',
                'en'          => 'Trang',
                'km'          => 'ត្រាង',
                'district_id' => '212'
            ],
            [
                'id'          => '21205',
                'en'          => 'Ta Saen',
                'km'          => 'តាសែន',
                'district_id' => '212'
            ],
            [
                'id'          => '21206',
                'en'          => 'Ta Krei',
                'km'          => 'តាក្រី',
                'district_id' => '212'
            ],
            [
                'id'          => '21301',
                'en'          => 'Thipakdei',
                'km'          => 'ធិបតី',
                'district_id' => '213'
            ],
            [
                'id'          => '21302',
                'en'          => 'Kaos Krala',
                'km'          => 'គាស់ក្រឡ',
                'district_id' => '213'
            ],
            [
                'id'          => '21303',
                'en'          => 'Hab',
                'km'          => 'ហប់',
                'district_id' => '213'
            ],
            [
                'id'          => '21304',
                'en'          => 'Preah Phos',
                'km'          => 'ព្រះផុស',
                'district_id' => '213'
            ],
            [
                'id'          => '21305',
                'en'          => 'Doun Ba',
                'km'          => 'ដូនបា',
                'district_id' => '213'
            ],
            [
                'id'          => '21306',
                'en'          => 'Chhnal Moan',
                'km'          => 'ឆ្នាល់មាន់',
                'district_id' => '213'
            ],
            [
                'id'          => '21401',
                'en'          => 'Preaek Chik',
                'km'          => 'ព្រែកជីក',
                'district_id' => '214'
            ],
            [
                'id'          => '21402',
                'en'          => 'Prey Tralach',
                'km'          => 'ព្រៃត្រឡាច',
                'district_id' => '214'
            ],
            [
                'id'          => '21403',
                'en'          => 'Mukh Reah',
                'km'          => 'មុខរាហ៍',
                'district_id' => '214'
            ],
            [
                'id'          => '21404',
                'en'          => 'Sdok Pravoek',
                'km'          => 'ស្តុកប្រវឹក',
                'district_id' => '214'
            ],
            [
                'id'          => '21405',
                'en'          => 'Basak',
                'km'          => 'បាសាក់',
                'district_id' => '214'
            ],
            [
                'id'          => '30101',
                'en'          => 'Batheay',
                'km'          => 'បាធាយ',
                'district_id' => '301'
            ],
            [
                'id'          => '30102',
                'en'          => 'Chbar Ampov',
                'km'          => 'ច្បារអំពៅ',
                'district_id' => '301'
            ],
            [
                'id'          => '30103',
                'en'          => 'Chealea',
                'km'          => 'ជាលា',
                'district_id' => '301'
            ],
            [
                'id'          => '30104',
                'en'          => 'Cheung Prey',
                'km'          => 'ជើងព្រៃ',
                'district_id' => '301'
            ],
            [
                'id'          => '30105',
                'en'          => 'Me Pring',
                'km'          => 'មេព្រីង',
                'district_id' => '301'
            ],
            [
                'id'          => '30106',
                'en'          => 'Phav',
                'km'          => 'ផ្អាវ',
                'district_id' => '301'
            ],
            [
                'id'          => '30107',
                'en'          => 'Sambour',
                'km'          => 'សំបូរ',
                'district_id' => '301'
            ],
            [
                'id'          => '30108',
                'en'          => 'Sandaek',
                'km'          => 'សណ្តែក',
                'district_id' => '301'
            ],
            [
                'id'          => '30109',
                'en'          => 'Tang Krang',
                'km'          => 'តាំងក្រាំង',
                'district_id' => '301'
            ],
            [
                'id'          => '30110',
                'en'          => 'Tang Krasang',
                'km'          => 'តាំងក្រសាំង',
                'district_id' => '301'
            ],
            [
                'id'          => '30111',
                'en'          => 'Trab',
                'km'          => 'ត្រប់',
                'district_id' => '301'
            ],
            [
                'id'          => '30112',
                'en'          => 'Tumnob',
                'km'          => 'ទំនប់',
                'district_id' => '301'
            ],
            [
                'id'          => '30201',
                'en'          => 'Bos Khnor',
                'km'          => 'បុសខ្នុរ',
                'district_id' => '302'
            ],
            [
                'id'          => '30202',
                'en'          => 'Chamkar Andoung',
                'km'          => 'ចំការអណ្តូង',
                'district_id' => '302'
            ],
            [
                'id'          => '30203',
                'en'          => 'Cheyyou',
                'km'          => 'ជយោ',
                'district_id' => '302'
            ],
            [
                'id'          => '30204',
                'en'          => 'Lvea Leu',
                'km'          => 'ល្វាលើ',
                'district_id' => '302'
            ],
            [
                'id'          => '30205',
                'en'          => 'Spueu',
                'km'          => 'ស្ពឺ',
                'district_id' => '302'
            ],
            [
                'id'          => '30206',
                'en'          => 'Svay Teab',
                'km'          => 'ស្វាយទាប',
                'district_id' => '302'
            ],
            [
                'id'          => '30207',
                'en'          => 'Ta Ong',
                'km'          => 'តាអុង',
                'district_id' => '302'
            ],
            [
                'id'          => '30208',
                'en'          => 'Ta Prok',
                'km'          => 'តាប្រុក',
                'district_id' => '302'
            ],
            [
                'id'          => '30301',
                'en'          => 'Khnor Dambang',
                'km'          => 'ខ្នុរដំបង',
                'district_id' => '303'
            ],
            [
                'id'          => '30302',
                'en'          => 'Kouk Rovieng',
                'km'          => 'គោករវៀង',
                'district_id' => '303'
            ],
            [
                'id'          => '30303',
                'en'          => 'Pdau Chum',
                'km'          => 'ផ្តៅជុំ',
                'district_id' => '303'
            ],
            [
                'id'          => '30304',
                'en'          => 'Prey Char',
                'km'          => 'ព្រៃចារ',
                'district_id' => '303'
            ],
            [
                'id'          => '30305',
                'en'          => 'Pring Chrum',
                'km'          => 'ព្រីងជ្រុំ',
                'district_id' => '303'
            ],
            [
                'id'          => '30306',
                'en'          => 'Sampong Chey',
                'km'          => 'សំពងជ័យ',
                'district_id' => '303'
            ],
            [
                'id'          => '30307',
                'en'          => 'Sdaeung Chey',
                'km'          => 'ស្តើងជ័យ',
                'district_id' => '303'
            ],
            [
                'id'          => '30308',
                'en'          => 'Soutib',
                'km'          => 'សូទិព្វ',
                'district_id' => '303'
            ],
            [
                'id'          => '30309',
                'en'          => 'Sramar',
                'km'          => 'ស្រម៉រ',
                'district_id' => '303'
            ],
            [
                'id'          => '30310',
                'en'          => 'Trapeang Kor',
                'km'          => 'ត្រពាំងគរ',
                'district_id' => '303'
            ],
            [
                'id'          => '30501',
                'en'          => 'Boeng Kok',
                'km'          => 'បឹងកុក',
                'district_id' => '305'
            ],
            [
                'id'          => '30502',
                'en'          => 'Kampong Cham',
                'km'          => 'កំពង់ចាម',
                'district_id' => '305'
            ],
            [
                'id'          => '30503',
                'en'          => 'Sambuor Meas',
                'km'          => 'សំបួរមាស',
                'district_id' => '305'
            ],
            [
                'id'          => '30504',
                'en'          => 'Veal Vong',
                'km'          => 'វាលវង់',
                'district_id' => '305'
            ],
            [
                'id'          => '30601',
                'en'          => 'Ampil',
                'km'          => 'អំពិល',
                'district_id' => '306'
            ],
            [
                'id'          => '30602',
                'en'          => 'Hanchey',
                'km'          => 'ហាន់ជ័យ',
                'district_id' => '306'
            ],
            [
                'id'          => '30603',
                'en'          => 'Kien Chrey',
                'km'          => 'កៀនជ្រៃ',
                'district_id' => '306'
            ],
            [
                'id'          => '30604',
                'en'          => 'Kokor',
                'km'          => 'គគរ',
                'district_id' => '306'
            ],
            [
                'id'          => '30605',
                'en'          => 'Kaoh Mitt',
                'km'          => 'កោះមិត្ត',
                'district_id' => '306'
            ],
            [
                'id'          => '30606',
                'en'          => 'Kaoh Roka',
                'km'          => 'កោះរកា',
                'district_id' => '306'
            ],
            [
                'id'          => '30607',
                'en'          => 'Kaoh Samraong',
                'km'          => 'កោះសំរោង',
                'district_id' => '306'
            ],
            [
                'id'          => '30608',
                'en'          => 'Kaoh Tontuem',
                'km'          => 'កោះទន្ទឹម',
                'district_id' => '306'
            ],
            [
                'id'          => '30609',
                'en'          => 'Krala',
                'km'          => 'ក្រឡា',
                'district_id' => '306'
            ],
            [
                'id'          => '30610',
                'en'          => 'Ou Svay',
                'km'          => 'អូរស្វាយ',
                'district_id' => '306'
            ],
            [
                'id'          => '30611',
                'en'          => 'Roang',
                'km'          => 'រអាង',
                'district_id' => '306'
            ],
            [
                'id'          => '30612',
                'en'          => 'Rumchek',
                'km'          => 'រំចេក',
                'district_id' => '306'
            ],
            [
                'id'          => '30613',
                'en'          => 'Srak',
                'km'          => 'ស្រក',
                'district_id' => '306'
            ],
            [
                'id'          => '30614',
                'en'          => 'Trean',
                'km'          => 'ទ្រាន',
                'district_id' => '306'
            ],
            [
                'id'          => '30615',
                'en'          => 'Vihear Thum',
                'km'          => 'វិហារធំ',
                'district_id' => '306'
            ],
            [
                'id'          => '30701',
                'en'          => 'Angkor Ban',
                'km'          => 'អង្គរមាស',
                'district_id' => '307'
            ],
            [
                'id'          => '30702',
                'en'          => 'Kang Ta Noeng',
                'km'          => 'កងតាណឹង',
                'district_id' => '307'
            ],
            [
                'id'          => '30703',
                'en'          => 'Khchau',
                'km'          => 'ខ្ចៅ',
                'district_id' => '307'
            ],
            [
                'id'          => '30704',
                'en'          => 'Peam Chi Kang',
                'km'          => 'ពាមជីកង',
                'district_id' => '307'
            ],
            [
                'id'          => '30705',
                'en'          => 'Preaek Koy',
                'km'          => 'ព្រែកកុយ',
                'district_id' => '307'
            ],
            [
                'id'          => '30706',
                'en'          => 'Preaek Krabau',
                'km'          => 'ព្រែកក្របៅ',
                'district_id' => '307'
            ],
            [
                'id'          => '30707',
                'en'          => 'Reay Pay',
                'km'          => 'រាយប៉ាយ',
                'district_id' => '307'
            ],
            [
                'id'          => '30708',
                'en'          => 'Roka Ar',
                'km'          => 'រកាអារ',
                'district_id' => '307'
            ],
            [
                'id'          => '30709',
                'en'          => 'Roka Koy',
                'km'          => 'រការគយ',
                'district_id' => '307'
            ],
            [
                'id'          => '30710',
                'en'          => 'Sdau',
                'km'          => 'ស្តៅ',
                'district_id' => '307'
            ],
            [
                'id'          => '30711',
                'en'          => 'Sour Kong',
                'km'          => 'សូរគង',
                'district_id' => '307'
            ],
            [
                'id'          => '30801',
                'en'          => 'Kampong Reab',
                'km'          => 'កំពង់រាប',
                'district_id' => '308'
            ],
            [
                'id'          => '30802',
                'en'          => 'Kaoh Sotin',
                'km'          => 'កោះសូទិន',
                'district_id' => '308'
            ],
            [
                'id'          => '30803',
                'en'          => 'Lve',
                'km'          => 'ល្វេ',
                'district_id' => '308'
            ],
            [
                'id'          => '30804',
                'en'          => 'Moha Leaph',
                'km'          => 'មហាលាភ',
                'district_id' => '308'
            ],
            [
                'id'          => '30805',
                'en'          => 'Moha Khnhoung',
                'km'          => 'មហាខ្ញូង',
                'district_id' => '308'
            ],
            [
                'id'          => '30806',
                'en'          => 'Peam Prathnuoh',
                'km'          => 'ពាមប្រធ្នោះ',
                'district_id' => '308'
            ],
            [
                'id'          => '30807',
                'en'          => 'Pongro',
                'km'          => 'ពង្រ',
                'district_id' => '308'
            ],
            [
                'id'          => '30808',
                'en'          => 'Preaek Ta Nong',
                'km'          => 'ព្រែកតានង់',
                'district_id' => '308'
            ],
            [
                'id'          => '31301',
                'en'          => 'Baray',
                'km'          => 'បារាយ',
                'district_id' => '313'
            ],
            [
                'id'          => '31302',
                'en'          => 'Boeng Nay',
                'km'          => 'បឹងណាយ',
                'district_id' => '313'
            ],
            [
                'id'          => '31303',
                'en'          => 'Chrey Vien',
                'km'          => 'ជ្រៃវៀន',
                'district_id' => '313'
            ],
            [
                'id'          => '31304',
                'en'          => 'Khvet Thum',
                'km'          => 'ខ្វិតធំ',
                'district_id' => '313'
            ],
            [
                'id'          => '31305',
                'en'          => 'Kor',
                'km'          => 'គរ',
                'district_id' => '313'
            ],
            [
                'id'          => '31306',
                'en'          => 'Krouch',
                'km'          => 'ក្រូច',
                'district_id' => '313'
            ],
            [
                'id'          => '31307',
                'en'          => 'Lvea',
                'km'          => 'ល្វា',
                'district_id' => '313'
            ],
            [
                'id'          => '31308',
                'en'          => 'Mien',
                'km'          => 'មៀន',
                'district_id' => '313'
            ],
            [
                'id'          => '31309',
                'en'          => 'Prey Chhor',
                'km'          => 'ព្រៃឈរ',
                'district_id' => '313'
            ],
            [
                'id'          => '31310',
                'en'          => 'Sour Saen',
                'km'          => 'សូរ្យសែន',
                'district_id' => '313'
            ],
            [
                'id'          => '31311',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '313'
            ],
            [
                'id'          => '31312',
                'en'          => 'Sragnae',
                'km'          => 'ស្រង៉ែ',
                'district_id' => '313'
            ],
            [
                'id'          => '31313',
                'en'          => 'Thma Pun',
                'km'          => 'ថ្មពូន',
                'district_id' => '313'
            ],
            [
                'id'          => '31314',
                'en'          => 'Tong Rong',
                'km'          => 'តុតរ៉ុង',
                'district_id' => '313'
            ],
            [
                'id'          => '31315',
                'en'          => 'Trapeang Preah',
                'km'          => 'ត្រពាំងព្រះ',
                'district_id' => '313'
            ],
            [
                'id'          => '31401',
                'en'          => 'Baray',
                'km'          => 'បារាយណ៍',
                'district_id' => '314'
            ],
            [
                'id'          => '31402',
                'en'          => 'Chi Bal',
                'km'          => 'ជីបាល',
                'district_id' => '314'
            ],
            [
                'id'          => '31403',
                'en'          => 'Khnar Sa',
                'km'          => 'ខ្នារស',
                'district_id' => '314'
            ],
            [
                'id'          => '31404',
                'en'          => 'Kaoh Andaet',
                'km'          => 'កោះអណ្តែត',
                'district_id' => '314'
            ],
            [
                'id'          => '31405',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ',
                'district_id' => '314'
            ],
            [
                'id'          => '31406',
                'en'          => 'Phteah Kandal',
                'km'          => 'ផ្ទះកណ្តាល',
                'district_id' => '314'
            ],
            [
                'id'          => '31407',
                'en'          => 'Pram Yam',
                'km'          => 'ប្រាំយ៉ាម',
                'district_id' => '314'
            ],
            [
                'id'          => '31408',
                'en'          => 'Preaek Dambouk',
                'km'          => 'ព្រែកដំបូក',
                'district_id' => '314'
            ],
            [
                'id'          => '31409',
                'en'          => 'Preaek Pou',
                'km'          => 'ព្រែកពោធិ',
                'district_id' => '314'
            ],
            [
                'id'          => '31410',
                'en'          => 'Preaek Rumdeng',
                'km'          => 'ព្រែករំដេង',
                'district_id' => '314'
            ],
            [
                'id'          => '31411',
                'en'          => 'Ruessei Srok',
                'km'          => 'ឬស្សីស្រុក',
                'district_id' => '314'
            ],
            [
                'id'          => '31412',
                'en'          => 'Svay Pou',
                'km'          => 'ស្វាយពោធិ',
                'district_id' => '314'
            ],
            [
                'id'          => '31413',
                'en'          => 'Svay Khsach Phnum',
                'km'          => 'ស្វាយសាច់ភ្នំ',
                'district_id' => '314'
            ],
            [
                'id'          => '31414',
                'en'          => 'Tong Tralach',
                'km'          => 'ទងត្រឡាច',
                'district_id' => '314'
            ],
            [
                'id'          => '31501',
                'en'          => 'Areaks Tnot',
                'km'          => 'អារក្សត្នោត',
                'district_id' => '315'
            ],
            [
                'id'          => '31503',
                'en'          => 'Dang Kdar',
                'km'          => 'ដងក្តារ',
                'district_id' => '315'
            ],
            [
                'id'          => '31504',
                'en'          => 'Khpob Ta Nguon',
                'km'          => 'ខ្ពបតាងួន',
                'district_id' => '315'
            ],
            [
                'id'          => '31505',
                'en'          => 'Me Sar Chrey',
                'km'          => 'មេសរជ្រៃ',
                'district_id' => '315'
            ],
            [
                'id'          => '31506',
                'en'          => 'Ou Mlu',
                'km'          => 'អូរម្លូរ',
                'district_id' => '315'
            ],
            [
                'id'          => '31507',
                'en'          => 'Peam Kaoh Snar',
                'km'          => 'ពាមកោះស្នា',
                'district_id' => '315'
            ],
            [
                'id'          => '31508',
                'en'          => 'Preah Andoung',
                'km'          => 'ព្រះអណ្តូង',
                'district_id' => '315'
            ],
            [
                'id'          => '31509',
                'en'          => 'Preaek Bak',
                'km'          => 'ព្រែកបាក់',
                'district_id' => '315'
            ],
            [
                'id'          => '31510',
                'en'          => 'Preak Kak',
                'km'          => 'ព្រែកកាក់',
                'district_id' => '315'
            ],
            [
                'id'          => '31512',
                'en'          => 'Soupheas',
                'km'          => 'សូភាស',
                'district_id' => '315'
            ],
            [
                'id'          => '31513',
                'en'          => 'Tuol Preah Khleang',
                'km'          => 'ទួលព្រះឃ្លាំង',
                'district_id' => '315'
            ],
            [
                'id'          => '31514',
                'en'          => 'Tuol Sambuor',
                'km'          => 'ទួលសំបូរ',
                'district_id' => '315'
            ],
            [
                'id'          => '40101',
                'en'          => 'Anhchanh Rung',
                'km'          => 'អញ្ចាញរូង',
                'district_id' => '401'
            ],
            [
                'id'          => '40102',
                'en'          => 'Chhnok Tru',
                'km'          => 'ឆ្នូកទ្រូ',
                'district_id' => '401'
            ],
            [
                'id'          => '40103',
                'en'          => 'Chak',
                'km'          => 'ចក',
                'district_id' => '401'
            ],
            [
                'id'          => '40104',
                'en'          => 'Khon Rang',
                'km'          => 'ខុងរ៉ុង',
                'district_id' => '401'
            ],
            [
                'id'          => '40105',
                'en'          => 'Kampong Preah Kokir',
                'km'          => 'កំពង់ព្រះគគីរ',
                'district_id' => '401'
            ],
            [
                'id'          => '40106',
                'en'          => 'Melum',
                'km'          => 'មេលំ',
                'district_id' => '401'
            ],
            [
                'id'          => '40107',
                'en'          => 'Phsar',
                'km'          => 'ផ្សារ',
                'district_id' => '401'
            ],
            [
                'id'          => '40108',
                'en'          => 'Pech Changvar',
                'km'          => 'ពេជចង្វារ',
                'district_id' => '401'
            ],
            [
                'id'          => '40109',
                'en'          => 'Popel',
                'km'          => 'ពពេល',
                'district_id' => '401'
            ],
            [
                'id'          => '40110',
                'en'          => 'Ponley',
                'km'          => 'ពន្លៃ',
                'district_id' => '401'
            ],
            [
                'id'          => '40111',
                'en'          => 'Trapeang Chan',
                'km'          => 'ត្រពាំងចាន់',
                'district_id' => '401'
            ],
            [
                'id'          => '40201',
                'en'          => 'Chol Sar',
                'km'          => 'ជលសា',
                'district_id' => '402'
            ],
            [
                'id'          => '40202',
                'en'          => 'Kaoh Thkov',
                'km'          => 'កោះថ្កូវ',
                'district_id' => '402'
            ],
            [
                'id'          => '40203',
                'en'          => 'Kampong Ous',
                'km'          => 'កំពង់អុស',
                'district_id' => '402'
            ],
            [
                'id'          => '40204',
                'en'          => 'Peam Chhkaok',
                'km'          => 'ពាមឆ្កោក',
                'district_id' => '402'
            ],
            [
                'id'          => '40205',
                'en'          => 'Prey Kri',
                'km'          => 'ព្រៃគ្រី',
                'district_id' => '402'
            ],
            [
                'id'          => '40301',
                'en'          => 'Phsar Chhnang',
                'km'          => 'ផ្សារឆ្នាំង',
                'district_id' => '403'
            ],
            [
                'id'          => '40302',
                'en'          => 'Kampong Chhnang',
                'km'          => 'កំពង់ឆ្នាំង',
                'district_id' => '403'
            ],
            [
                'id'          => '40303',
                'en'          => 'Ber',
                'km'          => 'ប្អេរ',
                'district_id' => '403'
            ],
            [
                'id'          => '40304',
                'en'          => 'Khsam',
                'km'          => 'ខ្សាម',
                'district_id' => '403'
            ],
            [
                'id'          => '40401',
                'en'          => 'Chranouk',
                'km'          => 'ច្រណូក',
                'district_id' => '404'
            ],
            [
                'id'          => '40402',
                'en'          => 'Dar',
                'km'          => 'ដារ',
                'district_id' => '404'
            ],
            [
                'id'          => '40403',
                'en'          => 'Kampong Hau',
                'km'          => 'កំពង់ហៅ',
                'district_id' => '404'
            ],
            [
                'id'          => '40404',
                'en'          => 'Phlov Tuk',
                'km'          => 'ផ្លូវទូក',
                'district_id' => '404'
            ],
            [
                'id'          => '40405',
                'en'          => 'Pou',
                'km'          => 'ពោធិ៍',
                'district_id' => '404'
            ],
            [
                'id'          => '40406',
                'en'          => 'Pralay Meas',
                'km'          => 'ប្រឡាយមាស',
                'district_id' => '404'
            ],
            [
                'id'          => '40407',
                'en'          => 'Samraong Saen',
                'km'          => 'សំរោងសែន',
                'district_id' => '404'
            ],
            [
                'id'          => '40408',
                'en'          => 'Svay Rumpear',
                'km'          => 'ស្វាយរំពារ',
                'district_id' => '404'
            ],
            [
                'id'          => '40409',
                'en'          => 'Trangel',
                'km'          => 'ត្រងិល',
                'district_id' => '404'
            ],
            [
                'id'          => '40501',
                'en'          => 'Ampil Tuek',
                'km'          => 'អំពិលទឹក',
                'district_id' => '405'
            ],
            [
                'id'          => '40502',
                'en'          => 'Chhuk Sa',
                'km'          => 'ឈូកស',
                'district_id' => '405'
            ],
            [
                'id'          => '40503',
                'en'          => 'Chres',
                'km'          => 'ច្រេស',
                'district_id' => '405'
            ],
            [
                'id'          => '40504',
                'en'          => 'Kampong Tralach',
                'km'          => 'កំពង់ត្រឡាច',
                'district_id' => '405'
            ],
            [
                'id'          => '40505',
                'en'          => 'Longveaek',
                'km'          => 'លង្វែក',
                'district_id' => '405'
            ],
            [
                'id'          => '40506',
                'en'          => 'Ou Ruessei',
                'km'          => 'អូរឬស្សី',
                'district_id' => '405'
            ],
            [
                'id'          => '40507',
                'en'          => 'Peani',
                'km'          => 'ពានី',
                'district_id' => '405'
            ],
            [
                'id'          => '40508',
                'en'          => 'Saeb',
                'km'          => 'សែប',
                'district_id' => '405'
            ],
            [
                'id'          => '40509',
                'en'          => 'Ta Ches',
                'km'          => 'តាជេស',
                'district_id' => '405'
            ],
            [
                'id'          => '40510',
                'en'          => 'Thma Edth',
                'km'          => 'ថ្មឥដ្ឋ',
                'district_id' => '405'
            ],
            [
                'id'          => '40601',
                'en'          => 'Andoung Snay',
                'km'          => 'អណ្តូងស្នាយ',
                'district_id' => '406'
            ],
            [
                'id'          => '40602',
                'en'          => 'Banteay Preal',
                'km'          => 'បន្ទាយព្រាល',
                'district_id' => '406'
            ],
            [
                'id'          => '40603',
                'en'          => 'Cheung Kreav',
                'km'          => 'ជើងគ្រាវ',
                'district_id' => '406'
            ],
            [
                'id'          => '40604',
                'en'          => 'Chrey Bak',
                'km'          => 'ជ្រៃបាក់',
                'district_id' => '406'
            ],
            [
                'id'          => '40605',
                'en'          => 'Kouk Banteay',
                'km'          => 'គោកបន្ទាយ',
                'district_id' => '406'
            ],
            [
                'id'          => '40606',
                'en'          => 'Krang Leav',
                'km'          => 'ក្រាំងលាវ',
                'district_id' => '406'
            ],
            [
                'id'          => '40607',
                'en'          => 'Pongro',
                'km'          => 'ពង្រ',
                'district_id' => '406'
            ],
            [
                'id'          => '40608',
                'en'          => 'Prasnoeb',
                'km'          => 'ប្រស្នឹប',
                'district_id' => '406'
            ],
            [
                'id'          => '40609',
                'en'          => 'Prey Mul',
                'km'          => 'ព្រៃមូល',
                'district_id' => '406'
            ],
            [
                'id'          => '40610',
                'en'          => 'Rolea Bier',
                'km'          => 'រលាប្អៀរ',
                'district_id' => '406'
            ],
            [
                'id'          => '40611',
                'en'          => 'Srae Thmei',
                'km'          => 'ស្រែថ្មី',
                'district_id' => '406'
            ],
            [
                'id'          => '40612',
                'en'          => 'Svay Chrum',
                'km'          => 'ស្វាយជ្រុំ',
                'district_id' => '406'
            ],
            [
                'id'          => '40613',
                'en'          => 'Tuek Hout',
                'km'          => 'ទឹកហូត',
                'district_id' => '406'
            ],
            [
                'id'          => '40701',
                'en'          => 'Chhean Laeung',
                'km'          => 'ឈានឡើង',
                'district_id' => '407'
            ],
            [
                'id'          => '40702',
                'en'          => 'Khnar Chhmar',
                'km'          => 'ខ្នារឆ្មារ',
                'district_id' => '407'
            ],
            [
                'id'          => '40703',
                'en'          => 'Krang Lvea',
                'km'          => 'ក្រាំងលាវ',
                'district_id' => '407'
            ],
            [
                'id'          => '40704',
                'en'          => 'Peam',
                'km'          => 'ពាម',
                'district_id' => '407'
            ],
            [
                'id'          => '40705',
                'en'          => 'Sedthei',
                'km'          => 'សេដ្ឋី',
                'district_id' => '407'
            ],
            [
                'id'          => '40706',
                'en'          => 'Svay',
                'km'          => 'ស្វាយ',
                'district_id' => '407'
            ],
            [
                'id'          => '40707',
                'en'          => 'Svay Chuk',
                'km'          => 'ស្វាយជុក',
                'district_id' => '407'
            ],
            [
                'id'          => '40708',
                'en'          => 'Tbaeng Khpos',
                'km'          => 'ត្បែងខ្ពស់',
                'district_id' => '407'
            ],
            [
                'id'          => '40709',
                'en'          => 'Thlok Vien',
                'km'          => 'ធ្លកវៀន',
                'district_id' => '407'
            ],
            [
                'id'          => '40801',
                'en'          => 'Akphivoadth',
                'km'          => 'អភិវឌ្ឍន៍',
                'district_id' => '408'
            ],
            [
                'id'          => '40802',
                'en'          => 'Chieb',
                'km'          => 'ជៀប',
                'district_id' => '408'
            ],
            [
                'id'          => '40803',
                'en'          => 'Chaong Maong',
                'km'          => 'ចោងម៉ោង',
                'district_id' => '408'
            ],
            [
                'id'          => '40804',
                'en'          => 'Kbal Tuek',
                'km'          => 'ក្បាលទឹក',
                'district_id' => '408'
            ],
            [
                'id'          => '40805',
                'en'          => 'Khlong Popok',
                'km'          => 'ខ្លងពពក',
                'district_id' => '408'
            ],
            [
                'id'          => '40806',
                'en'          => 'Krang Skear',
                'km'          => 'ក្រាំងស្គារ',
                'district_id' => '408'
            ],
            [
                'id'          => '40807',
                'en'          => 'Tang Krasang',
                'km'          => 'តាំងក្រសាំង',
                'district_id' => '408'
            ],
            [
                'id'          => '40808',
                'en'          => 'Tuol Khpos',
                'km'          => 'ទួលខ្ពស់',
                'district_id' => '408'
            ],
            [
                'id'          => '50101',
                'en'          => 'Basedth',
                'km'          => 'បរសេដ្ឋ',
                'district_id' => '501'
            ],
            [
                'id'          => '50102',
                'en'          => 'Kat Phluk',
                'km'          => 'កាត់ភ្លុត',
                'district_id' => '501'
            ],
            [
                'id'          => '50103',
                'en'          => 'Nitean',
                'km'          => 'និទាន',
                'district_id' => '501'
            ],
            [
                'id'          => '50104',
                'en'          => 'Pheakdei',
                'km'          => 'ភក្តី',
                'district_id' => '501'
            ],
            [
                'id'          => '50105',
                'en'          => 'Pheari Mean Chey',
                'km'          => 'ការីមានជ័យ',
                'district_id' => '501'
            ],
            [
                'id'          => '50106',
                'en'          => 'Phong',
                'km'          => 'ផុង',
                'district_id' => '501'
            ],
            [
                'id'          => '50107',
                'en'          => 'Pou Angkrang',
                'km'          => 'ពោធិ៍អង្រ្កង',
                'district_id' => '501'
            ],
            [
                'id'          => '50108',
                'en'          => 'Pou Chamraeun',
                'km'          => 'ពោធិ៍ចំរើន',
                'district_id' => '501'
            ],
            [
                'id'          => '50109',
                'en'          => 'Pou Mreal',
                'km'          => 'ពោធិ៍ម្រាល',
                'district_id' => '501'
            ],
            [
                'id'          => '50110',
                'en'          => 'Svay Chacheb',
                'km'          => 'ស្វាយចចិប',
                'district_id' => '501'
            ],
            [
                'id'          => '50111',
                'en'          => 'Tuol Ampil',
                'km'          => 'ទួលអំពិល',
                'district_id' => '501'
            ],
            [
                'id'          => '50112',
                'en'          => 'Tuol Sala',
                'km'          => 'ទួលសាលា',
                'district_id' => '501'
            ],
            [
                'id'          => '50113',
                'en'          => 'Kak',
                'km'          => 'កក់',
                'district_id' => '501'
            ],
            [
                'id'          => '50114',
                'en'          => 'Svay Rumpear',
                'km'          => 'ស្វាយរំពារ',
                'district_id' => '501'
            ],
            [
                'id'          => '50115',
                'en'          => 'Preah Khae',
                'km'          => 'ព្រះខែ',
                'district_id' => '501'
            ],
            [
                'id'          => '50201',
                'en'          => 'Chbar Mon',
                'km'          => 'ច្បារមន',
                'district_id' => '502'
            ],
            [
                'id'          => '50202',
                'en'          => 'Kandaol Dom',
                'km'          => 'កណ្តោលដុំ',
                'district_id' => '502'
            ],
            [
                'id'          => '50203',
                'en'          => 'Rokar Thum',
                'km'          => 'រការធំ',
                'district_id' => '502'
            ],
            [
                'id'          => '50204',
                'en'          => 'Sopoar Tep',
                'km'          => 'សុព័រទេព',
                'district_id' => '502'
            ],
            [
                'id'          => '50205',
                'en'          => 'Svay Kravan',
                'km'          => 'ស្វាយក្រវ៉ាន់',
                'district_id' => '502'
            ],
            [
                'id'          => '50301',
                'en'          => 'Angk Popel',
                'km'          => 'អង្គពពេល',
                'district_id' => '503'
            ],
            [
                'id'          => '50302',
                'en'          => 'Chongruk',
                'km'          => 'ជង្រុក',
                'district_id' => '503'
            ],
            [
                'id'          => '50303',
                'en'          => 'Moha Ruessei',
                'km'          => 'មហាឬស្សី',
                'district_id' => '503'
            ],
            [
                'id'          => '50304',
                'en'          => 'Pechr Muni',
                'km'          => 'ពេជ្រមុនី',
                'district_id' => '503'
            ],
            [
                'id'          => '50305',
                'en'          => 'Preah Nipean',
                'km'          => 'ព្រះនិពាន្វ',
                'district_id' => '503'
            ],
            [
                'id'          => '50306',
                'en'          => 'Prey Nheat',
                'km'          => 'ព្រៃញាតិ',
                'district_id' => '503'
            ],
            [
                'id'          => '50307',
                'en'          => 'Prey Vihear',
                'km'          => 'ព្រៃវិហារ',
                'district_id' => '503'
            ],
            [
                'id'          => '50308',
                'en'          => 'Roka Kaoh',
                'km'          => 'រកាកោះ',
                'district_id' => '503'
            ],
            [
                'id'          => '50309',
                'en'          => 'Sdok',
                'km'          => 'ស្តុក',
                'district_id' => '503'
            ],
            [
                'id'          => '50310',
                'en'          => 'Snam Krapeu',
                'km'          => 'ស្នំក្រពើ',
                'district_id' => '503'
            ],
            [
                'id'          => '50311',
                'en'          => 'Srang',
                'km'          => 'ស្រង់',
                'district_id' => '503'
            ],
            [
                'id'          => '50312',
                'en'          => 'Tuek Lak',
                'km'          => 'ទឹកល្អក់',
                'district_id' => '503'
            ],
            [
                'id'          => '50313',
                'en'          => 'Veal',
                'km'          => 'វាល',
                'district_id' => '503'
            ],
            [
                'id'          => '50401',
                'en'          => 'Haong Samnam',
                'km'          => 'ហោងសំណំ',
                'district_id' => '504'
            ],
            [
                'id'          => '50402',
                'en'          => 'Reaksmei Sameakki',
                'km'          => 'រស្មីសាមគ្គី',
                'district_id' => '504'
            ],
            [
                'id'          => '50403',
                'en'          => 'Trapeang Chour',
                'km'          => 'ត្រពាំងជោ',
                'district_id' => '504'
            ],
            [
                'id'          => '50404',
                'en'          => 'Sangkae Satob',
                'km'          => 'សង្កែសាទប',
                'district_id' => '504'
            ],
            [
                'id'          => '50405',
                'en'          => 'Ta Sal',
                'km'          => 'តាសាល',
                'district_id' => '504'
            ],
            [
                'id'          => '50501',
                'en'          => 'Chan Saen',
                'km'          => 'ចាន់សែន',
                'district_id' => '505'
            ],
            [
                'id'          => '50502',
                'en'          => 'Cheung Roas',
                'km'          => 'ជើងរាស់',
                'district_id' => '505'
            ],
            [
                'id'          => '50503',
                'en'          => 'Chumpu Proeks',
                'km'          => 'ជំពូព្រឹក្ស',
                'district_id' => '505'
            ],
            [
                'id'          => '50504',
                'en'          => 'Khsem Khsant',
                'km'          => 'ក្សេមក្សាន្ត',
                'district_id' => '505'
            ],
            [
                'id'          => '50505',
                'en'          => 'Krang Chek',
                'km'          => 'ក្រាំងចេក',
                'district_id' => '505'
            ],
            [
                'id'          => '50506',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ',
                'district_id' => '505'
            ],
            [
                'id'          => '50507',
                'en'          => 'Preah Srae',
                'km'          => 'ព្រះស្រែ',
                'district_id' => '505'
            ],
            [
                'id'          => '50508',
                'en'          => 'Prey Krasang',
                'km'          => 'ព្រៃក្រសាំង',
                'district_id' => '505'
            ],
            [
                'id'          => '50509',
                'en'          => 'Trach Tong',
                'km'          => 'ត្រាចទង',
                'district_id' => '505'
            ],
            [
                'id'          => '50510',
                'en'          => 'Veal Pong',
                'km'          => 'វាលពង់',
                'district_id' => '505'
            ],
            [
                'id'          => '50511',
                'en'          => 'Veang Chas',
                'km'          => 'វាំងចាស់',
                'district_id' => '505'
            ],
            [
                'id'          => '50512',
                'en'          => 'Yutth Sameakki',
                'km'          => 'យុទ្ធសាមគ្គី',
                'district_id' => '505'
            ],
            [
                'id'          => '50513',
                'en'          => 'Damnak Reang',
                'km'          => 'ដំណាក់រាំង',
                'district_id' => '505'
            ],
            [
                'id'          => '50514',
                'en'          => 'Peang Lvea',
                'km'          => 'ព្រៃល្វា',
                'district_id' => '505'
            ],
            [
                'id'          => '50515',
                'en'          => 'Phnom Touch',
                'km'          => 'ភ្នំតូច',
                'district_id' => '505'
            ],
            [
                'id'          => '50601',
                'en'          => 'Chambak',
                'km'          => 'ចំបក់',
                'district_id' => '506'
            ],
            [
                'id'          => '50602',
                'en'          => 'Choam Sangkae',
                'km'          => 'ជាំសង្កែ',
                'district_id' => '506'
            ],
            [
                'id'          => '50603',
                'en'          => 'Dambouk Rung',
                'km'          => 'ដំបូករូង',
                'district_id' => '506'
            ],
            [
                'id'          => '50604',
                'en'          => 'Kiri Voan',
                'km'          => 'គិរីវន្ត',
                'district_id' => '506'
            ],
            [
                'id'          => '50605',
                'en'          => 'Krang Dei Vay',
                'km'          => 'ក្រាំងដីវ៉ាយ',
                'district_id' => '506'
            ],
            [
                'id'          => '50606',
                'en'          => 'Moha Sang',
                'km'          => 'មហាសាំង',
                'district_id' => '506'
            ],
            [
                'id'          => '50607',
                'en'          => 'Ou',
                'km'          => 'អូរ',
                'district_id' => '506'
            ],
            [
                'id'          => '50608',
                'en'          => 'Prey Rumduol',
                'km'          => 'ព្រៃរំដួល',
                'district_id' => '506'
            ],
            [
                'id'          => '50609',
                'en'          => 'Prey Kmeng',
                'km'          => 'ព្រៃក្មេង',
                'district_id' => '506'
            ],
            [
                'id'          => '50610',
                'en'          => 'Tang Samraong',
                'km'          => 'តាំងសំរោង',
                'district_id' => '506'
            ],
            [
                'id'          => '50611',
                'en'          => 'Tang Sya',
                'km'          => 'តាំងស្យា',
                'district_id' => '506'
            ],
            [
                'id'          => '50613',
                'en'          => 'Traeng Trayueng',
                'km'          => 'ត្រែងត្រយឹង',
                'district_id' => '506'
            ],
            [
                'id'          => '50701',
                'en'          => 'Roleang Chak',
                'km'          => 'រំលាំងចក',
                'district_id' => '507'
            ],
            [
                'id'          => '50702',
                'en'          => 'Kahaeng',
                'km'          => 'កាហែង',
                'district_id' => '507'
            ],
            [
                'id'          => '50703',
                'en'          => 'Khtum Krang',
                'km'          => 'ខ្ទុំក្រាំង',
                'district_id' => '507'
            ],
            [
                'id'          => '50704',
                'en'          => 'Krang Ampil',
                'km'          => 'ក្រាំងអំពិល',
                'district_id' => '507'
            ],
            [
                'id'          => '50705',
                'en'          => 'Pneay',
                'km'          => 'ព្នាយ',
                'district_id' => '507'
            ],
            [
                'id'          => '50706',
                'en'          => 'Roleang Kreul',
                'km'          => 'រំលាំងគ្រើល',
                'district_id' => '507'
            ],
            [
                'id'          => '50707',
                'en'          => 'Samrong Tong',
                'km'          => 'សំរោងទង',
                'district_id' => '507'
            ],
            [
                'id'          => '50708',
                'en'          => 'Sambour',
                'km'          => 'សំបូរ',
                'district_id' => '507'
            ],
            [
                'id'          => '50709',
                'en'          => 'Saen Dei',
                'km'          => 'សែងដី',
                'district_id' => '507'
            ],
            [
                'id'          => '50710',
                'en'          => 'Skuh',
                'km'          => 'ស្គុះ',
                'district_id' => '507'
            ],
            [
                'id'          => '50711',
                'en'          => 'Tang Krouch',
                'km'          => 'តាំងក្រូច',
                'district_id' => '507'
            ],
            [
                'id'          => '50712',
                'en'          => 'Thummoda Ar',
                'km'          => 'ធម្មតាអរ',
                'district_id' => '507'
            ],
            [
                'id'          => '50713',
                'en'          => 'Trapeang Kong',
                'km'          => 'ត្រពាំងគង',
                'district_id' => '507'
            ],
            [
                'id'          => '50714',
                'en'          => 'Tumpoar Meas',
                'km'          => 'ទំព័រមាស',
                'district_id' => '507'
            ],
            [
                'id'          => '50715',
                'en'          => 'Voa Sar',
                'km'          => 'វល្លិសរ',
                'district_id' => '507'
            ],
            [
                'id'          => '50801',
                'en'          => 'Amleang',
                'km'          => 'អមលាំង',
                'district_id' => '508'
            ],
            [
                'id'          => '50802',
                'en'          => 'Monourom',
                'km'          => 'មនោរម្យ',
                'district_id' => '508'
            ],
            [
                'id'          => '50804',
                'en'          => 'Prambei Mum',
                'km'          => 'ប្រាំបីមុម',
                'district_id' => '508'
            ],
            [
                'id'          => '50805',
                'en'          => 'Rung Roeang',
                'km'          => 'រុងរឿង',
                'district_id' => '508'
            ],
            [
                'id'          => '50806',
                'en'          => 'Toap Mean',
                'km'          => 'ទ័ពមាន',
                'district_id' => '508'
            ],
            [
                'id'          => '50807',
                'en'          => 'Veal Pon',
                'km'          => 'វាលពន់',
                'district_id' => '508'
            ],
            [
                'id'          => '50808',
                'en'          => 'Yea Angk',
                'km'          => 'យាអង្គ',
                'district_id' => '508'
            ],
            [
                'id'          => '60101',
                'en'          => 'Bak Sna',
                'km'          => 'បាក់ស្នា',
                'district_id' => '601'
            ],
            [
                'id'          => '60102',
                'en'          => 'Ballangk',
                'km'          => 'បល័្លង្ក',
                'district_id' => '601'
            ],
            [
                'id'          => '60103',
                'en'          => 'Baray',
                'km'          => 'បារាយណ៍',
                'district_id' => '601'
            ],
            [
                'id'          => '60104',
                'en'          => 'Boeng',
                'km'          => 'បឹង',
                'district_id' => '601'
            ],
            [
                'id'          => '60105',
                'en'          => 'Chaeung Daeung',
                'km'          => 'ចើងដើង',
                'district_id' => '601'
            ],
            [
                'id'          => '60106',
                'en'          => 'Chraneang',
                'km'          => 'ច្រនាង',
                'district_id' => '601'
            ],
            [
                'id'          => '60107',
                'en'          => 'Chhuk Khsach',
                'km'          => 'ឈូកខ្សាច់',
                'district_id' => '601'
            ],
            [
                'id'          => '60108',
                'en'          => 'Chong Doung',
                'km'          => 'ចុងដូង',
                'district_id' => '601'
            ],
            [
                'id'          => '60109',
                'en'          => 'Chrolong',
                'km'          => 'ជ្រលង',
                'district_id' => '601'
            ],
            [
                'id'          => '60110',
                'en'          => 'Kokir Thum',
                'km'          => 'គគីធំ',
                'district_id' => '601'
            ],
            [
                'id'          => '60111',
                'en'          => 'Krava',
                'km'          => 'ក្រវ៉ា',
                'district_id' => '601'
            ],
            [
                'id'          => '60112',
                'en'          => 'Andoung Pou',
                'km'          => 'អណ្តូងពោធិ៍',
                'district_id' => '601'
            ],
            [
                'id'          => '60113',
                'en'          => 'Pongro',
                'km'          => 'ពង្រ',
                'district_id' => '601'
            ],
            [
                'id'          => '60114',
                'en'          => 'Sou Young',
                'km'          => 'សូយោង',
                'district_id' => '601'
            ],
            [
                'id'          => '60115',
                'en'          => 'Sralau',
                'km'          => 'ស្រឡៅ',
                'district_id' => '601'
            ],
            [
                'id'          => '60116',
                'en'          => 'Svay Phleung',
                'km'          => 'ស្វាយភ្លើង',
                'district_id' => '601'
            ],
            [
                'id'          => '60117',
                'en'          => 'Tnaot Chum',
                'km'          => 'ត្នោតជុំ',
                'district_id' => '601'
            ],
            [
                'id'          => '60118',
                'en'          => 'Triel',
                'km'          => 'ទ្រៀល',
                'district_id' => '601'
            ],
            [
                'id'          => '60201',
                'en'          => 'Chey',
                'km'          => 'ជ័យ',
                'district_id' => '602'
            ],
            [
                'id'          => '60202',
                'en'          => 'Damrei Slab',
                'km'          => 'ដំរីស្លាប់',
                'district_id' => '602'
            ],
            [
                'id'          => '60203',
                'en'          => 'Kampong Kou',
                'km'          => 'កំពង់គោ',
                'district_id' => '602'
            ],
            [
                'id'          => '60204',
                'en'          => 'Kampong Svay',
                'km'          => 'កំពង់ស្វាយ',
                'district_id' => '602'
            ],
            [
                'id'          => '60205',
                'en'          => 'Nipech',
                'km'          => 'នីពេជ',
                'district_id' => '602'
            ],
            [
                'id'          => '60206',
                'en'          => 'Phat Sanday',
                'km'          => 'ផាត់សណ្តាយ',
                'district_id' => '602'
            ],
            [
                'id'          => '60207',
                'en'          => 'San Kor',
                'km'          => 'សាន់គ',
                'district_id' => '602'
            ],
            [
                'id'          => '60208',
                'en'          => 'Tbaeng',
                'km'          => 'ត្បែង',
                'district_id' => '602'
            ],
            [
                'id'          => '60209',
                'en'          => 'Trapeang Ruessei',
                'km'          => 'ត្រពាំងឬស្សី',
                'district_id' => '602'
            ],
            [
                'id'          => '60210',
                'en'          => 'Kdei Doung',
                'km'          => 'ក្តីដូង',
                'district_id' => '602'
            ],
            [
                'id'          => '60211',
                'en'          => 'Prey Kuy',
                'km'          => 'ព្រៃគុយ',
                'district_id' => '602'
            ],
            [
                'id'          => '60301',
                'en'          => 'Damrei Choan Khla',
                'km'          => 'ដំរីជាន់ខ្លា',
                'district_id' => '603'
            ],
            [
                'id'          => '60302',
                'en'          => 'Kampong Thum',
                'km'          => 'កំពង់ធំ',
                'district_id' => '603'
            ],
            [
                'id'          => '60303',
                'en'          => 'Kampong Roteh',
                'km'          => 'កំពង់រទេះ',
                'district_id' => '603'
            ],
            [
                'id'          => '60304',
                'en'          => 'Ou Kanthor',
                'km'          => 'អូរកន្ធរ',
                'district_id' => '603'
            ],
            [
                'id'          => '60306',
                'en'          => 'Kampong Krabau',
                'km'          => 'កំពង់ក្របៅ',
                'district_id' => '603'
            ],
            [
                'id'          => '60308',
                'en'          => 'Prey Ta Hu',
                'km'          => 'ព្រៃតាហ៊ូ',
                'district_id' => '603'
            ],
            [
                'id'          => '60309',
                'en'          => 'Achar Leak',
                'km'          => 'អាចារ្យលាក់',
                'district_id' => '603'
            ],
            [
                'id'          => '60310',
                'en'          => 'Srayov',
                'km'          => 'ស្រយ៉ូវ',
                'district_id' => '603'
            ],
            [
                'id'          => '60401',
                'en'          => 'Doung',
                'km'          => 'ដូង',
                'district_id' => '604'
            ],
            [
                'id'          => '60402',
                'en'          => 'Kraya',
                'km'          => 'ក្រយា',
                'district_id' => '604'
            ],
            [
                'id'          => '60403',
                'en'          => 'Phan Nheum',
                'km'          => 'ផាន់ញើម',
                'district_id' => '604'
            ],
            [
                'id'          => '60404',
                'en'          => 'Sakream',
                'km'          => 'សាគ្រាម',
                'district_id' => '604'
            ],
            [
                'id'          => '60405',
                'en'          => 'Sala Visai',
                'km'          => 'សាលាវិស័យ',
                'district_id' => '604'
            ],
            [
                'id'          => '60406',
                'en'          => 'Sameakki',
                'km'          => 'សាមគ្គី',
                'district_id' => '604'
            ],
            [
                'id'          => '60407',
                'en'          => 'Tuol Kreul',
                'km'          => 'ទួលគ្រើល',
                'district_id' => '604'
            ],
            [
                'id'          => '60501',
                'en'          => 'Chhuk',
                'km'          => 'ឈូក',
                'district_id' => '605'
            ],
            [
                'id'          => '60502',
                'en'          => 'Koul',
                'km'          => 'គោល',
                'district_id' => '605'
            ],
            [
                'id'          => '60503',
                'en'          => 'Sambour',
                'km'          => 'សំបូរណ៍',
                'district_id' => '605'
            ],
            [
                'id'          => '60504',
                'en'          => 'Sraeung',
                'km'          => 'ស្រើង',
                'district_id' => '605'
            ],
            [
                'id'          => '60505',
                'en'          => 'Tang Krasau',
                'km'          => 'តាំងក្រសៅ',
                'district_id' => '605'
            ],
            [
                'id'          => '60601',
                'en'          => 'Chheu Teal',
                'km'          => 'ឈើទាល',
                'district_id' => '606'
            ],
            [
                'id'          => '60602',
                'en'          => 'Dang Kambet',
                'km'          => 'ដងកាំបិត',
                'district_id' => '606'
            ],
            [
                'id'          => '60603',
                'en'          => 'Klaeng',
                'km'          => 'ក្លែង',
                'district_id' => '606'
            ],
            [
                'id'          => '60604',
                'en'          => 'Mean Rith',
                'km'          => 'មានរិទ្ធ',
                'district_id' => '606'
            ],
            [
                'id'          => '60605',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ',
                'district_id' => '606'
            ],
            [
                'id'          => '60606',
                'en'          => 'Ngan',
                'km'          => 'ងន',
                'district_id' => '606'
            ],
            [
                'id'          => '60607',
                'en'          => 'Sandan',
                'km'          => 'សណ្តាន់',
                'district_id' => '606'
            ],
            [
                'id'          => '60608',
                'en'          => 'Sochet',
                'km'          => 'សុចិត្រ',
                'district_id' => '606'
            ],
            [
                'id'          => '60609',
                'en'          => 'Tum Ring',
                'km'          => 'ទំរីង',
                'district_id' => '606'
            ],
            [
                'id'          => '60701',
                'en'          => 'Boeng Lvea',
                'km'          => 'បឹងល្វា',
                'district_id' => '607'
            ],
            [
                'id'          => '60702',
                'en'          => 'Chroab',
                'km'          => 'ជ្រាប់',
                'district_id' => '607'
            ],
            [
                'id'          => '60703',
                'en'          => 'Kampong Thma',
                'km'          => 'កំពង់ថ្ម',
                'district_id' => '607'
            ],
            [
                'id'          => '60704',
                'en'          => 'Kakaoh',
                'km'          => 'កកោះ',
                'district_id' => '607'
            ],
            [
                'id'          => '60705',
                'en'          => 'Kraya',
                'km'          => 'ក្រយា',
                'district_id' => '607'
            ],
            [
                'id'          => '60706',
                'en'          => 'Pnov',
                'km'          => 'ព្នៅ',
                'district_id' => '607'
            ],
            [
                'id'          => '60707',
                'en'          => 'Prasat',
                'km'          => 'ប្រាសាទ',
                'district_id' => '607'
            ],
            [
                'id'          => '60708',
                'en'          => 'Tang Krasang',
                'km'          => 'តាំងក្រសាំង',
                'district_id' => '607'
            ],
            [
                'id'          => '60709',
                'en'          => 'Ti Pou',
                'km'          => 'ទីពោ',
                'district_id' => '607'
            ],
            [
                'id'          => '60710',
                'en'          => 'Tboung Krapeu',
                'km'          => 'ត្បូងក្រពើ',
                'district_id' => '607'
            ],
            [
                'id'          => '60801',
                'en'          => 'Banteay Stoung',
                'km'          => 'បន្ទាយស្ទោង',
                'district_id' => '608'
            ],
            [
                'id'          => '60802',
                'en'          => 'Chamna Kraom',
                'km'          => 'ចំណាក្រោម',
                'district_id' => '608'
            ],
            [
                'id'          => '60803',
                'en'          => 'Chamna Leu',
                'km'          => 'ចំណាលើ',
                'district_id' => '608'
            ],
            [
                'id'          => '60804',
                'en'          => 'Kampong Chen Cheung',
                'km'          => 'កំពង់ជើង',
                'district_id' => '608'
            ],
            [
                'id'          => '60805',
                'en'          => 'Kampong Chen Tboung',
                'km'          => 'កំពង់ត្បូង',
                'district_id' => '608'
            ],
            [
                'id'          => '60806',
                'en'          => 'Msa Krang',
                'km'          => 'ម្សាក្រង',
                'district_id' => '608'
            ],
            [
                'id'          => '60807',
                'en'          => 'Peam Bang',
                'km'          => 'ពាមបាង',
                'district_id' => '608'
            ],
            [
                'id'          => '60808',
                'en'          => 'Popok',
                'km'          => 'ពពក',
                'district_id' => '608'
            ],
            [
                'id'          => '60809',
                'en'          => 'Pralay',
                'km'          => 'ប្រឡាយ',
                'district_id' => '608'
            ],
            [
                'id'          => '60810',
                'en'          => 'Preah Damrei',
                'km'          => 'ព្រះដំរី',
                'district_id' => '608'
            ],
            [
                'id'          => '60811',
                'en'          => 'Rung Roeang',
                'km'          => 'រុងរឿង',
                'district_id' => '608'
            ],
            [
                'id'          => '60812',
                'en'          => 'Samprouch',
                'km'          => 'សំព្រោជ',
                'district_id' => '608'
            ],
            [
                'id'          => '60813',
                'en'          => 'Trea',
                'km'          => 'ទ្រា',
                'district_id' => '608'
            ],
            [
                'id'          => '70101',
                'en'          => 'Angk Phnum Touch',
                'km'          => 'អង្គភ្នំតូច',
                'district_id' => '701'
            ],
            [
                'id'          => '70102',
                'en'          => 'Ankor Chey',
                'km'          => 'អង្គជ័យ',
                'district_id' => '701'
            ],
            [
                'id'          => '70103',
                'en'          => 'Champei',
                'km'          => 'ចំប៉ី',
                'district_id' => '701'
            ],
            [
                'id'          => '70104',
                'en'          => 'Dambouk Khpos',
                'km'          => 'ដំបូកខ្ពស់',
                'district_id' => '701'
            ],
            [
                'id'          => '70105',
                'en'          => 'Dan Koum',
                'km'          => 'ដានគោម',
                'district_id' => '701'
            ],
            [
                'id'          => '70106',
                'en'          => 'Daeum Doung',
                'km'          => 'ដើមដូង',
                'district_id' => '701'
            ],
            [
                'id'          => '70107',
                'en'          => 'Mroum',
                'km'          => 'ម្រោម',
                'district_id' => '701'
            ],
            [
                'id'          => '70108',
                'en'          => 'Phnum Kong',
                'km'          => 'ភ្នំកុង',
                'district_id' => '701'
            ],
            [
                'id'          => '70109',
                'en'          => 'Praphnum',
                'km'          => 'ប្រភ្នំ',
                'district_id' => '701'
            ],
            [
                'id'          => '70110',
                'en'          => 'Samlanh',
                'km'          => 'សំឡាញ',
                'district_id' => '701'
            ],
            [
                'id'          => '70111',
                'en'          => 'Tani',
                'km'          => 'តានី',
                'district_id' => '701'
            ],
            [
                'id'          => '70201',
                'en'          => 'Banteay Meas Khang Kaeut',
                'km'          => 'បន្ទាយមាសខាងកើត',
                'district_id' => '702'
            ],
            [
                'id'          => '70202',
                'en'          => 'Banteay Meas Khang lech',
                'km'          => 'បន្ទាយមាសខាងលិច',
                'district_id' => '702'
            ],
            [
                'id'          => '70203',
                'en'          => 'Prey Tonle',
                'km'          => 'ព្រៃទន្លេ',
                'district_id' => '702'
            ],
            [
                'id'          => '70204',
                'en'          => 'Samraong Kraom',
                'km'          => 'សំរោងក្រោម',
                'district_id' => '702'
            ],
            [
                'id'          => '70205',
                'en'          => 'Samraong Leu',
                'km'          => 'សំរោងលើ',
                'district_id' => '702'
            ],
            [
                'id'          => '70206',
                'en'          => 'Sdach Kong Khang Cheung',
                'km'          => 'ស្តេចគង់ខាងជើង',
                'district_id' => '702'
            ],
            [
                'id'          => '70207',
                'en'          => 'Sdach Kong Khang lech',
                'km'          => 'ស្តេចគង់ខាងលិច',
                'district_id' => '702'
            ],
            [
                'id'          => '70208',
                'en'          => 'Sdach Kong Khang Tboung',
                'km'          => 'ស្តេចគង់ខាងត្បូង',
                'district_id' => '702'
            ],
            [
                'id'          => '70209',
                'en'          => 'Tnoat Chong Srang',
                'km'          => 'ត្នោតចុងស្រង់',
                'district_id' => '702'
            ],
            [
                'id'          => '70210',
                'en'          => 'Trapeang Sala Khang Kaeut',
                'km'          => 'ត្រពាំងសាលាខាងកើត',
                'district_id' => '702'
            ],
            [
                'id'          => '70211',
                'en'          => 'Trapeang Sala Khang Lech',
                'km'          => 'ត្រពាំងសាលាខាងលិច',
                'district_id' => '702'
            ],
            [
                'id'          => '70212',
                'en'          => 'Tuk Meas Khang Kaeut',
                'km'          => 'ទូកមាសខាងកើត',
                'district_id' => '702'
            ],
            [
                'id'          => '70213',
                'en'          => 'Tuk Meas Khang Lech',
                'km'          => 'ទូកមាសខាងលិច',
                'district_id' => '702'
            ],
            [
                'id'          => '70214',
                'en'          => 'Voat Angk Khang Cheung',
                'km'          => 'វត្តអង្គខាងជើង',
                'district_id' => '702'
            ],
            [
                'id'          => '70215',
                'en'          => 'Voat Angk Khang Tboung',
                'km'          => 'វត្តអង្គខាងត្បូង',
                'district_id' => '702'
            ],
            [
                'id'          => '70301',
                'en'          => 'Baniev',
                'km'          => 'បានៀវ',
                'district_id' => '703'
            ],
            [
                'id'          => '70302',
                'en'          => 'Takaen',
                'km'          => 'តាកែន',
                'district_id' => '703'
            ],
            [
                'id'          => '70303',
                'en'          => 'Boeng Nimol',
                'km'          => 'បឹងនិមល',
                'district_id' => '703'
            ],
            [
                'id'          => '70304',
                'en'          => 'Chhuk',
                'km'          => 'ឈូក',
                'district_id' => '703'
            ],
            [
                'id'          => '70305',
                'en'          => 'Doun Yay',
                'km'          => 'ដូនយ៉យ',
                'district_id' => '703'
            ],
            [
                'id'          => '70306',
                'en'          => 'Krang Sbov',
                'km'          => 'ក្រាំងស្បូវ',
                'district_id' => '703'
            ],
            [
                'id'          => '70307',
                'en'          => 'Krang Snay',
                'km'          => 'ក្រាំងស្នាយ',
                'district_id' => '703'
            ],
            [
                'id'          => '70308',
                'en'          => 'Lbaeuk',
                'km'          => 'ល្បើក',
                'district_id' => '703'
            ],
            [
                'id'          => '70309',
                'en'          => 'Trapeang Phleang',
                'km'          => 'ត្រពាំងភ្លាំង',
                'district_id' => '703'
            ],
            [
                'id'          => '70310',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ',
                'district_id' => '703'
            ],
            [
                'id'          => '70311',
                'en'          => 'Neareay',
                'km'          => 'នរាយណ៍',
                'district_id' => '703'
            ],
            [
                'id'          => '70312',
                'en'          => 'Satv Pong',
                'km'          => 'សត្វពង',
                'district_id' => '703'
            ],
            [
                'id'          => '70313',
                'en'          => 'Trapeang Bei',
                'km'          => 'ត្រពាំងបី',
                'district_id' => '703'
            ],
            [
                'id'          => '70314',
                'en'          => 'Tramaeng',
                'km'          => 'ត្រមែង',
                'district_id' => '703'
            ],
            [
                'id'          => '70315',
                'en'          => 'Dechou Akphivoadth',
                'km'          => 'តេជោអភិវឌ្ឍន៍',
                'district_id' => '703'
            ],
            [
                'id'          => '70401',
                'en'          => 'Chres',
                'km'          => 'ច្រេស',
                'district_id' => '704'
            ],
            [
                'id'          => '70402',
                'en'          => 'Chumpu Voan',
                'km'          => 'ជំពូវន្ត',
                'district_id' => '704'
            ],
            [
                'id'          => '70403',
                'en'          => 'Snay Anhchit',
                'km'          => 'ស្នាយអញ្ជិត',
                'district_id' => '704'
            ],
            [
                'id'          => '70404',
                'en'          => 'Srae Chaeng',
                'km'          => 'ស្រែចែង',
                'district_id' => '704'
            ],
            [
                'id'          => '70405',
                'en'          => 'Srae Knong',
                'km'          => 'ស្រែក្នុង',
                'district_id' => '704'
            ],
            [
                'id'          => '70406',
                'en'          => 'Srae Samraong',
                'km'          => 'ស្រែសំរោង',
                'district_id' => '704'
            ],
            [
                'id'          => '70407',
                'en'          => 'Trapeang Reang',
                'km'          => 'ត្រពាំងរាំង',
                'district_id' => '704'
            ],
            [
                'id'          => '70501',
                'en'          => 'Damnak Sokram',
                'km'          => 'ដំណាក់សុក្រំ',
                'district_id' => '705'
            ],
            [
                'id'          => '70502',
                'en'          => 'Dang Tong',
                'km'          => 'ដងទង់',
                'district_id' => '705'
            ],
            [
                'id'          => '70503',
                'en'          => 'Khcheay Khang Cheung',
                'km'          => 'ខ្ជាយខាងជើង',
                'district_id' => '705'
            ],
            [
                'id'          => '70504',
                'en'          => 'Khcheay Khang Tboung',
                'km'          => 'ខ្ជាយខាងត្បូង',
                'district_id' => '705'
            ],
            [
                'id'          => '70505',
                'en'          => 'Mean Ritth',
                'km'          => 'មានរិទ្ធិ',
                'district_id' => '705'
            ],
            [
                'id'          => '70506',
                'en'          => 'Srae Chea Khang Cheung',
                'km'          => 'ស្រែជាខាងជើង',
                'district_id' => '705'
            ],
            [
                'id'          => '70507',
                'en'          => 'Srae Chea Khang Tboung',
                'km'          => 'ស្រែជាខាងត្បូង',
                'district_id' => '705'
            ],
            [
                'id'          => '70508',
                'en'          => 'Totung',
                'km'          => 'ទទង់',
                'district_id' => '705'
            ],
            [
                'id'          => '70509',
                'en'          => 'Angk Romeas',
                'km'          => 'អគ្គរមាស',
                'district_id' => '705'
            ],
            [
                'id'          => '70510',
                'en'          => 'Lang',
                'km'          => 'ល្អាង',
                'district_id' => '705'
            ],
            [
                'id'          => '70601',
                'en'          => 'Boeng Sala Khang Cheung',
                'km'          => 'បឹងសាលាខាងជើង',
                'district_id' => '706'
            ],
            [
                'id'          => '70602',
                'en'          => 'Boeng Sala Khang Tboung',
                'km'          => 'បឹងសាលាខាងត្បូង',
                'district_id' => '706'
            ],
            [
                'id'          => '70603',
                'en'          => 'Damnak Kantuot Khang Cheung',
                'km'          => 'ដំណាក់កន្ទួតខាងជើង',
                'district_id' => '706'
            ],
            [
                'id'          => '70604',
                'en'          => 'Damnak Kantuot Khang Tboung',
                'km'          => 'ដំណាក់កន្ទួតខាងត្បូង',
                'district_id' => '706'
            ],
            [
                'id'          => '70605',
                'en'          => 'Kampong Trach Khang Kaeut',
                'km'          => 'កំពង់ត្រាតខាងកើត',
                'district_id' => '706'
            ],
            [
                'id'          => '70606',
                'en'          => 'Kampong Trach Khang Lech',
                'km'          => 'កំពង់ត្រាតខាងលិច',
                'district_id' => '706'
            ],
            [
                'id'          => '70607',
                'en'          => 'Prasat Phnom Khyang',
                'km'          => 'ប្រាសាទភ្នំខ្យង',
                'district_id' => '706'
            ],
            [
                'id'          => '70608',
                'en'          => 'Phnom Prasat',
                'km'          => 'ភ្នំប្រសាទ',
                'district_id' => '706'
            ],
            [
                'id'          => '70609',
                'en'          => 'Ang Sophy',
                'km'          => 'អង្គសុរភី',
                'district_id' => '706'
            ],
            [
                'id'          => '70612',
                'en'          => 'Preaek Kroes',
                'km'          => 'ព្រែកក្រឹស',
                'district_id' => '706'
            ],
            [
                'id'          => '70613',
                'en'          => 'Ruessei Srok Khang Kaeut',
                'km'          => 'ឬស្សីស្រុកខាងកើត',
                'district_id' => '706'
            ],
            [
                'id'          => '70614',
                'en'          => 'Ruessei Srok Khang Lech',
                'km'          => 'ឬស្សីស្រុកខាងលិច',
                'district_id' => '706'
            ],
            [
                'id'          => '70615',
                'en'          => 'Svay Tong Khang Cheung',
                'km'          => 'ឬស្សីស្រុកខាងជើង',
                'district_id' => '706'
            ],
            [
                'id'          => '70616',
                'en'          => 'Svay Tong Khang Tboung',
                'km'          => 'ឬស្សីស្រុកខាងត្បូង',
                'district_id' => '706'
            ],
            [
                'id'          => '70701',
                'en'          => 'Boeng Tuk',
                'km'          => 'បឹងទូក',
                'district_id' => '707'
            ],
            [
                'id'          => '70702',
                'en'          => 'Chum Kriel',
                'km'          => 'ជុំក្រៀល',
                'district_id' => '707'
            ],
            [
                'id'          => '70703',
                'en'          => 'Kampong Kraeng',
                'km'          => 'កំពង់គ្រែង',
                'district_id' => '707'
            ],
            [
                'id'          => '70704',
                'en'          => 'Kampong Samraong',
                'km'          => 'កំពង់សំរោង',
                'district_id' => '707'
            ],
            [
                'id'          => '70705',
                'en'          => 'Kandaol',
                'km'          => 'កណ្តាល',
                'district_id' => '707'
            ],
            [
                'id'          => '70707',
                'en'          => 'Kaoh Touch',
                'km'          => 'កោះតូច',
                'district_id' => '707'
            ],
            [
                'id'          => '70708',
                'en'          => 'Koun Satv',
                'km'          => 'កូនសត្វ',
                'district_id' => '707'
            ],
            [
                'id'          => '70709',
                'en'          => 'Makprang',
                'km'          => 'ម៉ាក់ប្រាំង',
                'district_id' => '707'
            ],
            [
                'id'          => '70711',
                'en'          => 'Preaek Tnoat',
                'km'          => 'ព្រែកត្នោត',
                'district_id' => '707'
            ],
            [
                'id'          => '70712',
                'en'          => 'Prey Khmum',
                'km'          => 'ព្រៃឃ្មុំ',
                'district_id' => '707'
            ],
            [
                'id'          => '70713',
                'en'          => 'Prey Thnang',
                'km'          => 'ព្រៃថ្នាំង',
                'district_id' => '707'
            ],
            [
                'id'          => '70715',
                'en'          => 'Stueng Kaev',
                'km'          => 'ស្ទឹងកែវ',
                'district_id' => '707'
            ],
            [
                'id'          => '70716',
                'en'          => 'Thmei',
                'km'          => 'ថ្មី',
                'district_id' => '707'
            ],
            [
                'id'          => '70717',
                'en'          => 'Trapeang Pring',
                'km'          => 'ត្រពាំងព្រីង',
                'district_id' => '707'
            ],
            [
                'id'          => '70718',
                'en'          => 'Trapeang Sangkae',
                'km'          => 'ត្រពាំងសង្កែ',
                'district_id' => '707'
            ],
            [
                'id'          => '70719',
                'en'          => 'Trapeang Thum',
                'km'          => 'ត្រពាំងធំ',
                'district_id' => '707'
            ],
            [
                'id'          => '70801',
                'en'          => 'Kampong Kandal',
                'km'          => 'កំពង់កណ្តាល',
                'district_id' => '708'
            ],
            [
                'id'          => '70802',
                'en'          => 'Krang Ampil',
                'km'          => 'ក្រាំងអំពិល',
                'district_id' => '708'
            ],
            [
                'id'          => '70803',
                'en'          => 'Kampong Bay',
                'km'          => 'កំពង់បាយ',
                'district_id' => '708'
            ],
            [
                'id'          => '70804',
                'en'          => 'Andoung Khmer',
                'km'          => 'អណ្តូងខ្មែរ',
                'district_id' => '708'
            ],
            [
                'id'          => '70805',
                'en'          => 'Traeuy Kaoh',
                'km'          => 'ត្រើយកោះ',
                'district_id' => '708'
            ],
            [
                'id'          => '80101',
                'en'          => 'Ampov Prey',
                'km'          => 'អំពៅព្រៃ',
                'district_id' => '801'
            ],
            [
                'id'          => '80102',
                'en'          => 'Anlong Romiet',
                'km'          => 'អន្លង់រមៀត',
                'district_id' => '801'
            ],
            [
                'id'          => '80103',
                'en'          => 'Barku',
                'km'          => 'បាគូ',
                'district_id' => '801'
            ],
            [
                'id'          => '80104',
                'en'          => 'Boeng Khyang',
                'km'          => 'បឹងខ្យាង',
                'district_id' => '801'
            ],
            [
                'id'          => '80105',
                'en'          => 'Cheung Kaeub',
                'km'          => 'ជើងកើប',
                'district_id' => '801'
            ],
            [
                'id'          => '80106',
                'en'          => 'Daeum Rues',
                'km'          => 'ដើមឬស',
                'district_id' => '801'
            ],
            [
                'id'          => '80107',
                'en'          => 'Kandaok',
                'km'          => 'កណ្តោក',
                'district_id' => '801'
            ],
            [
                'id'          => '80108',
                'en'          => 'Thmei',
                'km'          => 'ថ្មី',
                'district_id' => '801'
            ],
            [
                'id'          => '80109',
                'en'          => 'Kouk Trab',
                'km'          => 'គោកត្រប់',
                'district_id' => '801'
            ],
            [
                'id'          => '80113',
                'en'          => 'Preah Putth',
                'km'          => 'ព្រះពុទ្ធ',
                'district_id' => '801'
            ],
            [
                'id'          => '80115',
                'en'          => 'Preaek Roka',
                'km'          => 'ព្រែករការ',
                'district_id' => '801'
            ],
            [
                'id'          => '80116',
                'en'          => 'Preaek Slaeng',
                'km'          => 'ព្រែកស្លែង',
                'district_id' => '801'
            ],
            [
                'id'          => '80117',
                'en'          => 'Roka',
                'km'          => 'រកា',
                'district_id' => '801'
            ],
            [
                'id'          => '80118',
                'en'          => 'Roleang Kaen',
                'km'          => 'រលាំងកែន',
                'district_id' => '801'
            ],
            [
                'id'          => '80122',
                'en'          => 'Siem Reab',
                'km'          => 'សៀមរាប',
                'district_id' => '801'
            ],
            [
                'id'          => '80125',
                'en'          => 'Tbaeng',
                'km'          => 'ត្បែងទៀន',
                'district_id' => '801'
            ],
            [
                'id'          => '80127',
                'en'          => 'Trapeang Veaeng',
                'km'          => 'ត្រពាំងវែង',
                'district_id' => '801'
            ],
            [
                'id'          => '80128',
                'en'          => 'Trea',
                'km'          => 'ទ្រា',
                'district_id' => '801'
            ],
            [
                'id'          => '80201',
                'en'          => 'Banteay Daek',
                'km'          => 'បន្ទាយដែក',
                'district_id' => '802'
            ],
            [
                'id'          => '80202',
                'en'          => 'Chheu Teal',
                'km'          => 'ឈើទាល',
                'district_id' => '802'
            ],
            [
                'id'          => '80203',
                'en'          => 'Dei Edth',
                'km'          => 'ដីឥដ្ឋ',
                'district_id' => '802'
            ],
            [
                'id'          => '80204',
                'en'          => 'Kampong Svay',
                'km'          => 'កំពង់ស្វាយ',
                'district_id' => '802'
            ],
            [
                'id'          => '80206',
                'en'          => 'Kokir',
                'km'          => 'គគីរ',
                'district_id' => '802'
            ],
            [
                'id'          => '80207',
                'en'          => 'Kokir Thum',
                'km'          => 'គគីរធំ',
                'district_id' => '802'
            ],
            [
                'id'          => '80208',
                'en'          => 'Phum Thum',
                'km'          => 'ភូមិធំ',
                'district_id' => '802'
            ],
            [
                'id'          => '80211',
                'en'          => 'Samraong Thum',
                'km'          => 'សំរោងធំ',
                'district_id' => '802'
            ],
            [
                'id'          => '80301',
                'en'          => 'Bak Dav',
                'km'          => 'បាក់ដាវ',
                'district_id' => '803'
            ],
            [
                'id'          => '80302',
                'en'          => 'Chey Thum',
                'km'          => 'ជ័យធំ',
                'district_id' => '803'
            ],
            [
                'id'          => '80303',
                'en'          => 'Kampong Chamlang',
                'km'          => 'កំពង់ចំលង',
                'district_id' => '803'
            ],
            [
                'id'          => '80304',
                'en'          => 'Kaoh Chouram',
                'km'          => 'កោះចូរ៉ាម',
                'district_id' => '803'
            ],
            [
                'id'          => '80305',
                'en'          => 'Kaoh Oknha Tei',
                'km'          => 'កោះឧញ៉ាតី',
                'district_id' => '803'
            ],
            [
                'id'          => '80306',
                'en'          => 'Preah Prasab',
                'km'          => 'ព្រះប្រសប់',
                'district_id' => '803'
            ],
            [
                'id'          => '80307',
                'en'          => 'Preaek Ampil',
                'km'          => 'ព្រែកអំពិល',
                'district_id' => '803'
            ],
            [
                'id'          => '80308',
                'en'          => 'Preaek Luong',
                'km'          => 'ព្រែកលួង',
                'district_id' => '803'
            ],
            [
                'id'          => '80309',
                'en'          => 'Preaek Ta kov',
                'km'          => 'ព្រែកតាកូវ',
                'district_id' => '803'
            ],
            [
                'id'          => '80310',
                'en'          => 'Preaek Ta Meak',
                'km'          => 'ព្រែកតាម៉ាក់',
                'district_id' => '803'
            ],
            [
                'id'          => '80311',
                'en'          => 'Puk Ruessei',
                'km'          => 'ពុកឬស្សី',
                'district_id' => '803'
            ],
            [
                'id'          => '80312',
                'en'          => 'Roka Chonlueng',
                'km'          => 'រកាជន្លឹង',
                'district_id' => '803'
            ],
            [
                'id'          => '80313',
                'en'          => 'Sanlung',
                'km'          => 'សន្លុង',
                'district_id' => '803'
            ],
            [
                'id'          => '80314',
                'en'          => 'Sithor',
                'km'          => 'ស៊ីធរ',
                'district_id' => '803'
            ],
            [
                'id'          => '80315',
                'en'          => 'Svay Chrum',
                'km'          => 'ស្វាយជ្រុំ',
                'district_id' => '803'
            ],
            [
                'id'          => '80316',
                'en'          => 'Svay Romiet',
                'km'          => 'ស្វាយរមៀត',
                'district_id' => '803'
            ],
            [
                'id'          => '80317',
                'en'          => 'Ta Aek',
                'km'          => 'តាឯក',
                'district_id' => '803'
            ],
            [
                'id'          => '80318',
                'en'          => 'Vihear Suork',
                'km'          => 'វិហារសួគ៍',
                'district_id' => '803'
            ],
            [
                'id'          => '80401',
                'en'          => 'Chheu Kmau',
                'km'          => 'ឈើខ្មៅ',
                'district_id' => '804'
            ],
            [
                'id'          => '80402',
                'en'          => 'Chrouy Ta Kaev',
                'km'          => 'ជ្រោយតាកែវ',
                'district_id' => '804'
            ],
            [
                'id'          => '80403',
                'en'          => 'Kampong Kong',
                'km'          => 'កំពង់កុង',
                'district_id' => '804'
            ],
            [
                'id'          => '80404',
                'en'          => 'Kaoh Thum Ka',
                'km'          => 'កោះធំ ក',
                'district_id' => '804'
            ],
            [
                'id'          => '80405',
                'en'          => 'Kaoh Thum Kha',
                'km'          => 'កោះធំ ខ',
                'district_id' => '804'
            ],
            [
                'id'          => '80407',
                'en'          => 'Leuk Daek',
                'km'          => 'លើកដែក',
                'district_id' => '804'
            ],
            [
                'id'          => '80408',
                'en'          => 'Pouthi Ban',
                'km'          => 'ពោធិ៍បាន',
                'district_id' => '804'
            ],
            [
                'id'          => '80409',
                'en'          => 'Preaek Chrey',
                'km'          => 'ព្រែកជ្រៃ',
                'district_id' => '804'
            ],
            [
                'id'          => '80410',
                'en'          => 'Preaek Sdei',
                'km'          => 'ព្រែកស្តី',
                'district_id' => '804'
            ],
            [
                'id'          => '80411',
                'en'          => 'Preaek Thmei',
                'km'          => 'ព្រែកថ្មី',
                'district_id' => '804'
            ],
            [
                'id'          => '80412',
                'en'          => 'Sampeou Poun',
                'km'          => 'សំពៅលូន',
                'district_id' => '804'
            ],
            [
                'id'          => '80501',
                'en'          => 'Kampong Phnum',
                'km'          => 'កំពង់ភ្នំ',
                'district_id' => '805'
            ],
            [
                'id'          => '80502',
                'en'          => 'Kam Samnar',
                'km'          => 'ក្អមសំណ',
                'district_id' => '805'
            ],
            [
                'id'          => '80503',
                'en'          => 'Khpob Ateav',
                'km'          => 'ខ្ពបអាទាវ',
                'district_id' => '805'
            ],
            [
                'id'          => '80504',
                'en'          => 'Peam Reang',
                'km'          => 'ពាមរាំង',
                'district_id' => '805'
            ],
            [
                'id'          => '80505',
                'en'          => 'Preaek Dach',
                'km'          => 'ព្រែកដាច់',
                'district_id' => '805'
            ],
            [
                'id'          => '80506',
                'en'          => 'Preaek Tonloab',
                'km'          => 'ព្រែកទន្លាប់',
                'district_id' => '805'
            ],
            [
                'id'          => '80507',
                'en'          => 'Sandar',
                'km'          => 'សណ្តារ',
                'district_id' => '805'
            ],
            [
                'id'          => '80601',
                'en'          => 'Akreiy Ksatr',
                'km'          => 'អរិយក្សត្រ',
                'district_id' => '806'
            ],
            [
                'id'          => '80602',
                'en'          => 'Barong',
                'km'          => 'បារុង',
                'district_id' => '806'
            ],
            [
                'id'          => '80603',
                'en'          => 'Boeng Krum',
                'km'          => 'បឹងគ្រំ',
                'district_id' => '806'
            ],
            [
                'id'          => '80604',
                'en'          => 'Kaoh Kaev',
                'km'          => 'កោះកែវ',
                'district_id' => '806'
            ],
            [
                'id'          => '80605',
                'en'          => 'Kaoh Reah',
                'km'          => 'កោះរះ',
                'district_id' => '806'
            ],
            [
                'id'          => '80606',
                'en'          => 'Lvea Sar',
                'km'          => 'ល្វាសរ',
                'district_id' => '806'
            ],
            [
                'id'          => '80607',
                'en'          => 'Peam Oknha Ong',
                'km'          => 'ពាមឧញ៉ាអុង',
                'district_id' => '806'
            ],
            [
                'id'          => '80608',
                'en'          => 'Phum Thum',
                'km'          => 'ភ្នំធំ',
                'district_id' => '806'
            ],
            [
                'id'          => '80609',
                'en'          => 'Preaek Kmeng',
                'km'          => 'ព្រែកក្មេង',
                'district_id' => '806'
            ],
            [
                'id'          => '80610',
                'en'          => 'Preaek Rey',
                'km'          => 'ព្រែករៃ',
                'district_id' => '806'
            ],
            [
                'id'          => '80611',
                'en'          => 'Preaek Ruessei',
                'km'          => 'ព្រែកឬស្សី',
                'district_id' => '806'
            ],
            [
                'id'          => '80612',
                'en'          => 'Sambuor',
                'km'          => 'សំបួរ',
                'district_id' => '806'
            ],
            [
                'id'          => '80613',
                'en'          => 'Sarikakaev',
                'km'          => 'សារិកាកែវ',
                'district_id' => '806'
            ],
            [
                'id'          => '80614',
                'en'          => 'Thma Kor',
                'km'          => 'ថ្មគរ',
                'district_id' => '806'
            ],
            [
                'id'          => '80615',
                'en'          => 'Tuek Khleang',
                'km'          => 'ទឹកឃ្លាំង',
                'district_id' => '806'
            ],
            [
                'id'          => '80703',
                'en'          => 'Preaek Anhchanh',
                'km'          => 'ព្រែកអញ្ចាញ',
                'district_id' => '807'
            ],
            [
                'id'          => '80704',
                'en'          => 'Preaek Dambang',
                'km'          => 'ព្រែកដំបង',
                'district_id' => '807'
            ],
            [
                'id'          => '80707',
                'en'          => 'Roka Kong Ti Muoy',
                'km'          => 'រកាកោងទី១',
                'district_id' => '807'
            ],
            [
                'id'          => '80708',
                'en'          => 'Roka Kong Ti Pir',
                'km'          => 'រកាកោងទី២',
                'district_id' => '807'
            ],
            [
                'id'          => '80709',
                'en'          => 'Ruessei Chrouy',
                'km'          => 'ឬស្សីជ្រោយ',
                'district_id' => '807'
            ],
            [
                'id'          => '80710',
                'en'          => 'Sambuor Meas',
                'km'          => 'សំបួរមាស',
                'district_id' => '807'
            ],
            [
                'id'          => '80711',
                'en'          => 'Svay Ampear',
                'km'          => 'ស្វាយអំពារ',
                'district_id' => '807'
            ],
            [
                'id'          => '80801',
                'en'          => 'Baek Chan',
                'km'          => 'បែកចាន',
                'district_id' => '808'
            ],
            [
                'id'          => '80803',
                'en'          => 'Chhak Chheu Neang',
                'km'          => 'ឆក់ឈើនាង',
                'district_id' => '808'
            ],
            [
                'id'          => '80804',
                'en'          => 'Damnak Ampil',
                'km'          => 'ដំណាក់អំពិល',
                'district_id' => '808'
            ],
            [
                'id'          => '80807',
                'en'          => 'Krang Mkak',
                'km'          => 'ក្រាំងម្កាក់',
                'district_id' => '808'
            ],
            [
                'id'          => '80808',
                'en'          => 'Lumhach',
                'km'          => 'លំហាច',
                'district_id' => '808'
            ],
            [
                'id'          => '80809',
                'en'          => 'Mkak',
                'km'          => 'ម្កាក់',
                'district_id' => '808'
            ],
            [
                'id'          => '80811',
                'en'          => 'Peuk',
                'km'          => 'ពើក',
                'district_id' => '808'
            ],
            [
                'id'          => '80813',
                'en'          => 'Prey Puoch',
                'km'          => 'ព្រៃពួច',
                'district_id' => '808'
            ],
            [
                'id'          => '80814',
                'en'          => 'Samraong Leu',
                'km'          => 'សំរោងលើ',
                'district_id' => '808'
            ],
            [
                'id'          => '80816',
                'en'          => 'Tuol Prech',
                'km'          => 'ទូលពេជ្រេ',
                'district_id' => '808'
            ],
            [
                'id'          => '80901',
                'en'          => 'Chhveang',
                'km'          => 'ឈ្វាំង',
                'district_id' => '809'
            ],
            [
                'id'          => '80902',
                'en'          => 'Chrey Loas',
                'km'          => 'ជ្រៃលាស់',
                'district_id' => '809'
            ],
            [
                'id'          => '80903',
                'en'          => 'Kampong Luong',
                'km'          => 'កំពង់ហ្លួង',
                'district_id' => '809'
            ],
            [
                'id'          => '80904',
                'en'          => 'Kampong Os',
                'km'          => 'កំពង់អុស',
                'district_id' => '809'
            ],
            [
                'id'          => '80905',
                'en'          => 'Kaoh Chen',
                'km'          => 'កោះចិន',
                'district_id' => '809'
            ],
            [
                'id'          => '80906',
                'en'          => 'Phnum Bat',
                'km'          => 'ភ្នំបាត',
                'district_id' => '809'
            ],
            [
                'id'          => '80907',
                'en'          => 'Ponhea Lueu',
                'km'          => 'ពញាឮ',
                'district_id' => '809'
            ],
            [
                'id'          => '80910',
                'en'          => 'Preaek Ta Teaen',
                'km'          => 'ព្រែកតាទែន',
                'district_id' => '809'
            ],
            [
                'id'          => '80911',
                'en'          => 'Phsar Daek',
                'km'          => 'ផ្សារដែក',
                'district_id' => '809'
            ],
            [
                'id'          => '80913',
                'en'          => 'Tumnob Thum',
                'km'          => 'ទំនប់ធំ',
                'district_id' => '809'
            ],
            [
                'id'          => '80914',
                'en'          => 'Vihear Luong',
                'km'          => 'វិហារហ្លូង',
                'district_id' => '809'
            ],
            [
                'id'          => '81001',
                'en'          => 'Khpob',
                'km'          => 'ខ្ពប',
                'district_id' => '810'
            ],
            [
                'id'          => '81002',
                'en'          => 'Kaoh Anlong Chen',
                'km'          => 'កោះអន្លង់ចិន',
                'district_id' => '810'
            ],
            [
                'id'          => '81003',
                'en'          => 'Kaoh Khael',
                'km'          => 'កោះខែល',
                'district_id' => '810'
            ],
            [
                'id'          => '81004',
                'en'          => 'Kaoh Khsach Tonlea',
                'km'          => 'កោះខ្សាច់ទន្លា',
                'district_id' => '810'
            ],
            [
                'id'          => '81005',
                'en'          => 'Krang Yov',
                'km'          => 'ក្រាំងយ៉ូវ',
                'district_id' => '810'
            ],
            [
                'id'          => '81006',
                'en'          => 'Prasat',
                'km'          => 'ប្រាសាទ',
                'district_id' => '810'
            ],
            [
                'id'          => '81007',
                'en'          => 'Preaek Ambel',
                'km'          => 'ព្រែកអំបិល',
                'district_id' => '810'
            ],
            [
                'id'          => '81008',
                'en'          => 'Preaek Koy',
                'km'          => 'ព្រែកគយ',
                'district_id' => '810'
            ],
            [
                'id'          => '81009',
                'en'          => 'Roka Khpos',
                'km'          => 'រកាខ្ពស់',
                'district_id' => '810'
            ],
            [
                'id'          => '81010',
                'en'          => 'Sang Phnum',
                'km'          => 'ស្អាងភ្នំ',
                'district_id' => '810'
            ],
            [
                'id'          => '81011',
                'en'          => 'Setbou',
                'km'          => 'សិត្យូ',
                'district_id' => '810'
            ],
            [
                'id'          => '81012',
                'en'          => 'Svay Prateal',
                'km'          => 'ស្វាយប្រទាល',
                'district_id' => '810'
            ],
            [
                'id'          => '81013',
                'en'          => 'Svay Rolum',
                'km'          => 'ស្វាយរលំ',
                'district_id' => '810'
            ],
            [
                'id'          => '81014',
                'en'          => 'Ta Lon',
                'km'          => 'តាលន់',
                'district_id' => '810'
            ],
            [
                'id'          => '81015',
                'en'          => 'Traeuy Sla',
                'km'          => 'ត្រើយស្លា',
                'district_id' => '810'
            ],
            [
                'id'          => '81016',
                'en'          => 'Tuek Vil',
                'km'          => 'ទឹកវិល',
                'district_id' => '810'
            ],
            [
                'id'          => '81101',
                'en'          => 'Ta Kdol',
                'km'          => 'តាក្តុល',
                'district_id' => '811'
            ],
            [
                'id'          => '81102',
                'en'          => 'Prek Ruessey',
                'km'          => 'ព្រែកឬស្សី',
                'district_id' => '811'
            ],
            [
                'id'          => '81103',
                'en'          => 'Doeum Mien',
                'km'          => 'ដើមមៀន',
                'district_id' => '811'
            ],
            [
                'id'          => '81104',
                'en'          => 'Ta Khmao',
                'km'          => 'តាខ្មៅ',
                'district_id' => '811'
            ],
            [
                'id'          => '81105',
                'en'          => 'Prek Ho',
                'km'          => 'ព្រែកហូរ',
                'district_id' => '811'
            ],
            [
                'id'          => '81106',
                'en'          => 'Kampong Samnanh',
                'km'          => 'កំពង់សំណាញ់',
                'district_id' => '811'
            ],
            [
                'id'          => '90101',
                'en'          => 'Andoung Tuek',
                'km'          => 'អណ្តូងទឹក',
                'district_id' => '901'
            ],
            [
                'id'          => '90102',
                'en'          => 'Kandaol',
                'km'          => 'កណ្តោល',
                'district_id' => '901'
            ],
            [
                'id'          => '90103',
                'en'          => 'Ta Noun',
                'km'          => 'តានួន',
                'district_id' => '901'
            ],
            [
                'id'          => '90104',
                'en'          => 'Thma Sa',
                'km'          => 'ថ្មស',
                'district_id' => '901'
            ],
            [
                'id'          => '90201',
                'en'          => 'Kaoh Sdach',
                'km'          => 'កោះស្តេច',
                'district_id' => '902'
            ],
            [
                'id'          => '90202',
                'en'          => 'Phnhi Meas',
                'km'          => 'ភ្ញីមាស',
                'district_id' => '902'
            ],
            [
                'id'          => '90203',
                'en'          => 'Preaek Khsach',
                'km'          => 'ព្រែកខ្សាច់',
                'district_id' => '902'
            ],
            [
                'id'          => '90301',
                'en'          => 'Chrouy Pras',
                'km'          => 'ជ្រោយប្រស់',
                'district_id' => '903'
            ],
            [
                'id'          => '90302',
                'en'          => 'Kaoh Kapi',
                'km'          => 'កោះកាពិ',
                'district_id' => '903'
            ],
            [
                'id'          => '90303',
                'en'          => 'Ta Tai Kraom',
                'km'          => 'តាតៃក្រោម',
                'district_id' => '903'
            ],
            [
                'id'          => '90304',
                'en'          => 'Trapeang Rung',
                'km'          => 'ត្រពាំងរូង',
                'district_id' => '903'
            ],
            [
                'id'          => '90401',
                'en'          => 'Smach Mean Chey',
                'km'          => 'ស្មាច់មានជ័យ',
                'district_id' => '904'
            ],
            [
                'id'          => '90402',
                'en'          => 'Dang Tong',
                'km'          => 'ដងទង់',
                'district_id' => '904'
            ],
            [
                'id'          => '90403',
                'en'          => 'Stueng Veaeng',
                'km'          => 'ស្ទឹងវែង',
                'district_id' => '904'
            ],
            [
                'id'          => '90501',
                'en'          => 'Pak Khlang',
                'km'          => 'ប៉ាក់ខ្លង',
                'district_id' => '905'
            ],
            [
                'id'          => '90502',
                'en'          => 'Peam Krasaob',
                'km'          => 'ពាមក្រសោប',
                'district_id' => '905'
            ],
            [
                'id'          => '90503',
                'en'          => 'Tuol Kokir',
                'km'          => 'ទួលគគីរ',
                'district_id' => '905'
            ],
            [
                'id'          => '90601',
                'en'          => 'Boeng Preav',
                'km'          => 'បឹងព្រាវ',
                'district_id' => '906'
            ],
            [
                'id'          => '90602',
                'en'          => 'Chi Kha Kraom',
                'km'          => 'ជីខក្រោម',
                'district_id' => '906'
            ],
            [
                'id'          => '90603',
                'en'          => 'Chi kha Leu',
                'km'          => 'ជីខលើ',
                'district_id' => '906'
            ],
            [
                'id'          => '90604',
                'en'          => 'Chrouy Svay',
                'km'          => 'ជ្រោយស្វាយ',
                'district_id' => '906'
            ],
            [
                'id'          => '90605',
                'en'          => 'Dang Peaeng',
                'km'          => 'ដងពែក',
                'district_id' => '906'
            ],
            [
                'id'          => '90606',
                'en'          => 'Srae Ambel',
                'km'          => 'ស្រែអំបិល',
                'district_id' => '906'
            ],
            [
                'id'          => '90701',
                'en'          => 'Ta Tey Leu',
                'km'          => 'តាលៃរីល',
                'district_id' => '907'
            ],
            [
                'id'          => '90702',
                'en'          => 'Pralay',
                'km'          => 'ប្រឡាយ',
                'district_id' => '907'
            ],
            [
                'id'          => '90703',
                'en'          => 'Chumnoab',
                'km'          => 'ជំនាប់',
                'district_id' => '907'
            ],
            [
                'id'          => '90704',
                'en'          => 'Ruessei Chrum',
                'km'          => 'ឬស្សីជ្រំ',
                'district_id' => '907'
            ],
            [
                'id'          => '90705',
                'en'          => 'Chi Phat',
                'km'          => 'ជីផាត',
                'district_id' => '907'
            ],
            [
                'id'          => '90706',
                'en'          => 'Thma Doun Pov',
                'km'          => 'ថ្មដូនពៅ',
                'district_id' => '907'
            ],
            [
                'id'          => '100101',
                'en'          => 'Chhloung',
                'km'          => 'ឆ្លូង',
                'district_id' => '1001'
            ],
            [
                'id'          => '100102',
                'en'          => 'Damrei Phong',
                'km'          => 'ដំរីផុង',
                'district_id' => '1001'
            ],
            [
                'id'          => '100103',
                'en'          => 'Han Chey',
                'km'          => 'ហានជ័យ',
                'district_id' => '1001'
            ],
            [
                'id'          => '100104',
                'en'          => 'Kampong Damrei',
                'km'          => 'កំពង់ដំរី',
                'district_id' => '1001'
            ],
            [
                'id'          => '100105',
                'en'          => 'Kanhchor',
                'km'          => 'កញ្ជរ',
                'district_id' => '1001'
            ],
            [
                'id'          => '100106',
                'en'          => 'Khsach Andeth',
                'km'          => 'ខ្សាច់អណ្តែត',
                'district_id' => '1001'
            ],
            [
                'id'          => '100107',
                'en'          => 'Pongro',
                'km'          => 'ពង្រ',
                'district_id' => '1001'
            ],
            [
                'id'          => '100108',
                'en'          => 'Preaek Saman',
                'km'          => 'ព្រែកសាម៉ាន់',
                'district_id' => '1001'
            ],
            [
                'id'          => '100207',
                'en'          => 'Kaoh Trong',
                'km'          => 'កោះទ្រង់',
                'district_id' => '1002'
            ],
            [
                'id'          => '100208',
                'en'          => 'Krakor',
                'km'          => 'ក្រគរ',
                'district_id' => '1002'
            ],
            [
                'id'          => '100209',
                'en'          => 'Kracheh',
                'km'          => 'ក្រចេះ',
                'district_id' => '1002'
            ],
            [
                'id'          => '100210',
                'en'          => 'Ou Ruessei',
                'km'          => 'អូរឬស្សី',
                'district_id' => '1002'
            ],
            [
                'id'          => '100211',
                'en'          => 'Roka Kandal',
                'km'          => 'រការកណ្តាល',
                'district_id' => '1002'
            ],
            [
                'id'          => '100301',
                'en'          => 'ChambÃ¢k',
                'km'          => 'ចំបក់',
                'district_id' => '1003'
            ],
            [
                'id'          => '100302',
                'en'          => 'Chrouy Banteay',
                'km'          => 'ជ្រោយបន្ទាយ',
                'district_id' => '1003'
            ],
            [
                'id'          => '100303',
                'en'          => 'Kampong Kor',
                'km'          => 'កំពង់គរ',
                'district_id' => '1003'
            ],
            [
                'id'          => '100304',
                'en'          => 'Koh Ta Suy',
                'km'          => 'កោះតាស៊ុយ',
                'district_id' => '1003'
            ],
            [
                'id'          => '100305',
                'en'          => 'Preaek Prasab',
                'km'          => 'ព្រែកប្រសព្វ',
                'district_id' => '1003'
            ],
            [
                'id'          => '100306',
                'en'          => 'Russey Keo',
                'km'          => 'ឬស្សីកែវ',
                'district_id' => '1003'
            ],
            [
                'id'          => '100307',
                'en'          => 'Saob',
                'km'          => 'សោប',
                'district_id' => '1003'
            ],
            [
                'id'          => '100308',
                'en'          => 'Ta Mao',
                'km'          => 'តាម៉ៅ',
                'district_id' => '1003'
            ],
            [
                'id'          => '100401',
                'en'          => 'Boeng Char',
                'km'          => 'បឹងចារ',
                'district_id' => '1004'
            ],
            [
                'id'          => '100402',
                'en'          => 'Kampong Cham',
                'km'          => 'កំពង់ចាម',
                'district_id' => '1004'
            ],
            [
                'id'          => '100403',
                'en'          => 'Kbal Damrei',
                'km'          => 'ក្បាលដំរី',
                'district_id' => '1004'
            ],
            [
                'id'          => '100404',
                'en'          => 'Kaoh Khnhaer',
                'km'          => 'កោះខ្ញែរ',
                'district_id' => '1004'
            ],
            [
                'id'          => '100405',
                'en'          => 'Ou Krieng',
                'km'          => 'អូរគ្រៀង',
                'district_id' => '1004'
            ],
            [
                'id'          => '100406',
                'en'          => 'Roluos Mean Chey',
                'km'          => 'រលួសមានជ័យ',
                'district_id' => '1004'
            ],
            [
                'id'          => '100407',
                'en'          => 'Sambour',
                'km'          => 'សំបូរ',
                'district_id' => '1004'
            ],
            [
                'id'          => '100408',
                'en'          => 'Sandan',
                'km'          => 'សណ្តាន់',
                'district_id' => '1004'
            ],
            [
                'id'          => '100409',
                'en'          => 'Srae Chis',
                'km'          => 'ស្រែជិះ',
                'district_id' => '1004'
            ],
            [
                'id'          => '100410',
                'en'          => 'Voadthonak',
                'km'          => 'វឌ្ឍនៈ',
                'district_id' => '1004'
            ],
            [
                'id'          => '100501',
                'en'          => 'Khsuem',
                'km'          => 'ឃ្សឹម',
                'district_id' => '1005'
            ],
            [
                'id'          => '100502',
                'en'          => 'Pir Thnu',
                'km'          => 'ពីរធ្នូ',
                'district_id' => '1005'
            ],
            [
                'id'          => '100503',
                'en'          => 'Snuol',
                'km'          => 'ស្នួល',
                'district_id' => '1005'
            ],
            [
                'id'          => '100504',
                'en'          => 'Srae Char',
                'km'          => 'ស្រែចារ',
                'district_id' => '1005'
            ],
            [
                'id'          => '100505',
                'en'          => 'Svay Chreah',
                'km'          => 'ស្វាយជ្រះ',
                'district_id' => '1005'
            ],
            [
                'id'          => '100601',
                'en'          => 'Bos Leav',
                'km'          => 'បុសលាវ',
                'district_id' => '1006'
            ],
            [
                'id'          => '100602',
                'en'          => 'Changkrang',
                'km'          => 'ចង្រ្កង់',
                'district_id' => '1006'
            ],
            [
                'id'          => '100603',
                'en'          => 'Dar',
                'km'          => 'ដា',
                'district_id' => '1006'
            ],
            [
                'id'          => '100604',
                'en'          => 'Kantuot',
                'km'          => 'កន្ទួត',
                'district_id' => '1006'
            ],
            [
                'id'          => '100605',
                'en'          => 'Kou Loab',
                'km'          => 'គោលាប់',
                'district_id' => '1006'
            ],
            [
                'id'          => '100606',
                'en'          => 'Kaoh Chraeng',
                'km'          => 'កោះច្រែង',
                'district_id' => '1006'
            ],
            [
                'id'          => '100607',
                'en'          => 'Sambok',
                'km'          => 'សំបុក',
                'district_id' => '1006'
            ],
            [
                'id'          => '100608',
                'en'          => 'Thma Andaeuk',
                'km'          => 'ថ្មអណ្តើក',
                'district_id' => '1006'
            ],
            [
                'id'          => '100609',
                'en'          => 'Thma Kreae',
                'km'          => 'ថ្មគ្រែ',
                'district_id' => '1006'
            ],
            [
                'id'          => '100610',
                'en'          => 'Thmei',
                'km'          => 'ថ្មី',
                'district_id' => '1006'
            ],
            [
                'id'          => '110101',
                'en'          => 'Chong Phlah',
                'km'          => 'ចុងផ្លាស់',
                'district_id' => '1101'
            ],
            [
                'id'          => '110102',
                'en'          => 'Memang',
                'km'          => 'មេម៉ង',
                'district_id' => '1101'
            ],
            [
                'id'          => '110103',
                'en'          => 'Srae Chhuk',
                'km'          => 'ស្រែឈូក',
                'district_id' => '1101'
            ],
            [
                'id'          => '110104',
                'en'          => 'Srae Khtum',
                'km'          => 'ស្រែខ្ទុម',
                'district_id' => '1101'
            ],
            [
                'id'          => '110105',
                'en'          => 'Srae Preah',
                'km'          => 'ស្រែព្រះ',
                'district_id' => '1101'
            ],
            [
                'id'          => '110201',
                'en'          => 'Nang Khi Lik',
                'km'          => 'ណងឃីលិក',
                'district_id' => '1102'
            ],
            [
                'id'          => '110202',
                'en'          => 'A Buon Leu',
                'km'          => 'អបួ​នលី',
                'district_id' => '1102'
            ],
            [
                'id'          => '110203',
                'en'          => 'Roya',
                'km'          => 'រយ៉',
                'district_id' => '1102'
            ],
            [
                'id'          => '110204',
                'en'          => 'Sokh Sant',
                'km'          => 'សុខសាន្ត',
                'district_id' => '1102'
            ],
            [
                'id'          => '110205',
                'en'          => 'Srae Huy',
                'km'          => 'ស្រែហ៊ុយ',
                'district_id' => '1102'
            ],
            [
                'id'          => '110206',
                'en'          => 'Srae Sangkum',
                'km'          => 'ស្រែសង្គម',
                'district_id' => '1102'
            ],
            [
                'id'          => '110301',
                'en'          => 'Dak Dam',
                'km'          => 'ដាក់ដាំ',
                'district_id' => '1103'
            ],
            [
                'id'          => '110302',
                'en'          => 'Saen Monourom',
                'km'          => 'សែនមនោរម្យ',
                'district_id' => '1103'
            ],
            [
                'id'          => '110401',
                'en'          => 'Krang Teh',
                'km'          => 'ក្រង់តេះ',
                'district_id' => '1104'
            ],
            [
                'id'          => '110402',
                'en'          => 'Pu Chrey',
                'km'          => 'ពូជ្រៃ',
                'district_id' => '1104'
            ],
            [
                'id'          => '110403',
                'en'          => 'Srae Ampum',
                'km'          => 'ស្រែអំពូម',
                'district_id' => '1104'
            ],
            [
                'id'          => '110404',
                'en'          => 'Bu Sra',
                'km'          => 'ប៊ូស្រា',
                'district_id' => '1104'
            ],
            [
                'id'          => '110501',
                'en'          => 'Monourom',
                'km'          => 'មនោរម្យ',
                'district_id' => '1105'
            ],
            [
                'id'          => '110502',
                'en'          => 'Sokh Dom',
                'km'          => 'សុខដុម',
                'district_id' => '1105'
            ],
            [
                'id'          => '110503',
                'en'          => 'Spean Mean Chey',
                'km'          => 'ស្ពានមានជ័យ',
                'district_id' => '1105'
            ],
            [
                'id'          => '110504',
                'en'          => 'Romonea',
                'km'          => 'រមនា',
                'district_id' => '1105'
            ],
            [
                'id'          => '120101',
                'en'          => 'Tonle Basak',
                'km'          => 'ទន្លេបាសាក់',
                'district_id' => '1201'
            ],
            [
                'id'          => '120102',
                'en'          => 'Boeng Keng Kang Ti Muoy',
                'km'          => 'បឹងកេងកងទី១',
                'district_id' => '1201'
            ],
            [
                'id'          => '120103',
                'en'          => 'Boeng Keng Kang Ti Pir',
                'km'          => 'បឹងកេងកងទី២',
                'district_id' => '1201'
            ],
            [
                'id'          => '120104',
                'en'          => 'Boeng Keng Kang Ti Bei',
                'km'          => 'បឹងកេងកងទី៣',
                'district_id' => '1201'
            ],
            [
                'id'          => '120105',
                'en'          => 'Olympic',
                'km'          => 'អូឡាំពិច',
                'district_id' => '1201'
            ],
            [
                'id'          => '120106',
                'en'          => 'Tuol Svay Prey Ti Muoy',
                'km'          => 'ទូលស្វាយព្រៃទី១',
                'district_id' => '1201'
            ],
            [
                'id'          => '120107',
                'en'          => 'Tuol Svay Prey Ti Pir',
                'km'          => 'ទូលស្វាយព្រៃទី២',
                'district_id' => '1201'
            ],
            [
                'id'          => '120108',
                'en'          => 'Tumnob Tuek',
                'km'          => 'ទំនប់ទឹក',
                'district_id' => '1201'
            ],
            [
                'id'          => '120109',
                'en'          => 'Tuol Tumpung Ti Pir',
                'km'          => 'ទូលទំពូងទី២',
                'district_id' => '1201'
            ],
            [
                'id'          => '120110',
                'en'          => 'Tuol Tumpung Ti Muoy',
                'km'          => 'ទូលទំពូងទី១',
                'district_id' => '1201'
            ],
            [
                'id'          => '120111',
                'en'          => 'Boeng Trabaek',
                'km'          => 'បឹងត្របែក',
                'district_id' => '1201'
            ],
            [
                'id'          => '120112',
                'en'          => 'Phsar Daeum Thkov',
                'km'          => 'ផ្សារដើមថ្កូវ',
                'district_id' => '1201'
            ],
            [
                'id'          => '120201',
                'en'          => 'Phsar Thmei Ti Muoy',
                'km'          => 'ផ្សារថ្មីទី១',
                'district_id' => '1202'
            ],
            [
                'id'          => '120202',
                'en'          => 'Phsar Thmei Ti Pir',
                'km'          => 'ផ្សារថ្មីទី២',
                'district_id' => '1202'
            ],
            [
                'id'          => '120203',
                'en'          => 'Phsar Thmei Ti Bei',
                'km'          => 'ផ្សារថ្មីទី៣',
                'district_id' => '1202'
            ],
            [
                'id'          => '120204',
                'en'          => 'Boeng Reang',
                'km'          => 'បឹងរាំង',
                'district_id' => '1202'
            ],
            [
                'id'          => '120205',
                'en'          => 'Phsar Kandal Ti Muoy',
                'km'          => 'ផ្សារកណ្តាល១',
                'district_id' => '1202'
            ],
            [
                'id'          => '120206',
                'en'          => 'Phsar Kandal Ti Pir',
                'km'          => 'ផ្សារកណ្តាល២',
                'district_id' => '1202'
            ],
            [
                'id'          => '120207',
                'en'          => 'Chakto Mukh',
                'km'          => 'ចតុមុខ',
                'district_id' => '1202'
            ],
            [
                'id'          => '120208',
                'en'          => 'Chey Chummeah',
                'km'          => 'ជ័យជំនះ',
                'district_id' => '1202'
            ],
            [
                'id'          => '120209',
                'en'          => 'Phsar Chas',
                'km'          => 'ផ្សារចាស់',
                'district_id' => '1202'
            ],
            [
                'id'          => '120210',
                'en'          => 'Srah Chak',
                'km'          => 'ស្រះចក',
                'district_id' => '1202'
            ],
            [
                'id'          => '120211',
                'en'          => 'Voat Phnum',
                'km'          => 'វត្តភ្នំ',
                'district_id' => '1202'
            ],
            [
                'id'          => '120301',
                'en'          => 'Ou Ruessei Ti Muoy',
                'km'          => 'អូរឬស្សី១',
                'district_id' => '1203'
            ],
            [
                'id'          => '120302',
                'en'          => 'Ou Ruessei Ti Pir',
                'km'          => 'អូរឬស្សី២',
                'district_id' => '1203'
            ],
            [
                'id'          => '120303',
                'en'          => 'Ou Ruessei Ti Bei',
                'km'          => 'អូរឬស្សី៣',
                'district_id' => '1203'
            ],
            [
                'id'          => '120304',
                'en'          => 'Ou Ruessei Ti Buon',
                'km'          => 'អូរឬស្សី៤',
                'district_id' => '1203'
            ],
            [
                'id'          => '120305',
                'en'          => 'Monourom',
                'km'          => 'មនោរម្យ',
                'district_id' => '1203'
            ],
            [
                'id'          => '120306',
                'en'          => 'Mittapheap',
                'km'          => 'មិត្តភាព',
                'district_id' => '1203'
            ],
            [
                'id'          => '120307',
                'en'          => 'Veal Vong',
                'km'          => 'វាលវង់',
                'district_id' => '1203'
            ],
            [
                'id'          => '120308',
                'en'          => 'Boeng Proluet',
                'km'          => 'បឺងព្រលិត',
                'district_id' => '1203'
            ],
            [
                'id'          => '120401',
                'en'          => 'Phsar Depou Ti Muoy',
                'km'          => 'ផ្សារដេប៉ូ១',
                'district_id' => '1204'
            ],
            [
                'id'          => '120402',
                'en'          => 'Phsar Depou Ti Pir',
                'km'          => 'ផ្សារដេប៉ូ២',
                'district_id' => '1204'
            ],
            [
                'id'          => '120403',
                'en'          => 'Phsar Depou Ti Bei',
                'km'          => 'ផ្សារដេប៉ូ៣',
                'district_id' => '1204'
            ],
            [
                'id'          => '120404',
                'en'          => 'Tuek Lak Ti Muoy',
                'km'          => 'ទឹកល្អក់ទី១',
                'district_id' => '1204'
            ],
            [
                'id'          => '120405',
                'en'          => 'Tuek Lak Ti Pir',
                'km'          => 'ទឹកល្អក់ទី២',
                'district_id' => '1204'
            ],
            [
                'id'          => '120406',
                'en'          => 'Tuek Lak Ti Bei',
                'km'          => 'ទឹកល្អក់ទី៣',
                'district_id' => '1204'
            ],
            [
                'id'          => '120407',
                'en'          => 'Boeng Kak Ti Muoy',
                'km'          => 'បឹងកក់ទី១',
                'district_id' => '1204'
            ],
            [
                'id'          => '120408',
                'en'          => 'Boeng Kak Ti Pir',
                'km'          => 'បឹងកក់ទី២',
                'district_id' => '1204'
            ],
            [
                'id'          => '120409',
                'en'          => 'Phsar Daeum Kor',
                'km'          => 'ផ្សារដើមគ',
                'district_id' => '1204'
            ],
            [
                'id'          => '120410',
                'en'          => 'Boeng Salang',
                'km'          => 'បឹងសាឡាង',
                'district_id' => '1204'
            ],
            [
                'id'          => '120501',
                'en'          => 'Dangkao',
                'km'          => 'ដង្កោ',
                'district_id' => '1205'
            ],
            [
                'id'          => '120507',
                'en'          => 'Pong Tuek',
                'km'          => 'ពងទឹក',
                'district_id' => '1205'
            ],
            [
                'id'          => '120508',
                'en'          => 'Prey Veaeng',
                'km'          => 'ព្រៃវែង',
                'district_id' => '1205'
            ],
            [
                'id'          => '120510',
                'en'          => 'Prey Sa',
                'km'          => 'ព្រៃសរ',
                'district_id' => '1205'
            ],
            [
                'id'          => '120512',
                'en'          => 'Krang Pongro',
                'km'          => 'ក្រាំងពង្រ',
                'district_id' => '1205'
            ],
            [
                'id'          => '120513',
                'en'          => 'Prateah Lang',
                'km'          => 'ប្រទះឡាង',
                'district_id' => '1205'
            ],
            [
                'id'          => '120514',
                'en'          => 'Sak Sampov',
                'km'          => 'សាក់សំពៅ',
                'district_id' => '1205'
            ],
            [
                'id'          => '120515',
                'en'          => 'Cheung Aek',
                'km'          => 'ជើងឯក',
                'district_id' => '1205'
            ],
            [
                'id'          => '120516',
                'en'          => 'Kong Noy',
                'km'          => 'គយនយ',
                'district_id' => '1205'
            ],
            [
                'id'          => '120517',
                'en'          => 'Preaek Kampues',
                'km'          => 'ព្រែកកំពឹស',
                'district_id' => '1205'
            ],
            [
                'id'          => '120518',
                'en'          => 'Roluos',
                'km'          => 'រលួស',
                'district_id' => '1205'
            ],
            [
                'id'          => '120519',
                'en'          => 'Spean Thma',
                'km'          => 'ស្ពានថ្ម',
                'district_id' => '1205'
            ],
            [
                'id'          => '120520',
                'en'          => 'Tien',
                'km'          => 'ទៀន',
                'district_id' => '1205'
            ],
            [
                'id'          => '120601',
                'en'          => 'Stueng Mean chey',
                'km'          => 'ស្ទឹងមានជ័យ',
                'district_id' => '1206'
            ],
            [
                'id'          => '120602',
                'en'          => 'Boeng Tumpun',
                'km'          => 'បឹងទំពុន',
                'district_id' => '1206'
            ],
            [
                'id'          => '120606',
                'en'          => 'Chak Angrae Leu',
                'km'          => 'ចាក់អង្រែលើ',
                'district_id' => '1206'
            ],
            [
                'id'          => '120607',
                'en'          => 'Chak Angrae Kraom',
                'km'          => 'ចាក់អង្រែក្រោម',
                'district_id' => '1206'
            ],
            [
                'id'          => '120702',
                'en'          => 'Tuol Sangke',
                'km'          => 'ទួលសង្កែ',
                'district_id' => '1207'
            ],
            [
                'id'          => '120703',
                'en'          => 'Svay Pak',
                'km'          => 'ស្វាយប៉ោក',
                'district_id' => '1207'
            ],
            [
                'id'          => '120704',
                'en'          => 'Kilomaetr Lekh Prammuoy',
                'km'          => 'គីឡូម៉ែតលេខប្រាំមួយ',
                'district_id' => '1207'
            ],
            [
                'id'          => '120706',
                'en'          => 'Ruessei Kaev',
                'km'          => 'ឬស្សីកែវ',
                'district_id' => '1207'
            ],
            [
                'id'          => '120711',
                'en'          => 'Chrang Chamreh Ti Muoy',
                'km'          => 'ច្រាំងចំរេះទី១',
                'district_id' => '1207'
            ],
            [
                'id'          => '120712',
                'en'          => 'Chrang Chamreh Ti Pir',
                'km'          => 'ច្រាំងចំរេះទី២',
                'district_id' => '1207'
            ],
            [
                'id'          => '120801',
                'en'          => 'Phnom Penh Thmei',
                'km'          => 'ភ្នំពេញថ្មី',
                'district_id' => '1208'
            ],
            [
                'id'          => '120802',
                'en'          => 'Tuek Thla',
                'km'          => 'ទឹកថ្លា',
                'district_id' => '1208'
            ],
            [
                'id'          => '120803',
                'en'          => 'Khmuonh',
                'km'          => 'ឃ្មួញ',
                'district_id' => '1208'
            ],
            [
                'id'          => '120807',
                'en'          => 'Krang Thnong',
                'km'          => 'ក្រាំងធ្នង់',
                'district_id' => '1208'
            ],
            [
                'id'          => '120901',
                'en'          => 'Trapeang Krasang',
                'km'          => 'ត្រពាំងក្រសាំង',
                'district_id' => '1209'
            ],
            [
                'id'          => '120903',
                'en'          => 'Phleung Chheh Roteh',
                'km'          => 'ភ្លើងឆេះរទេះ',
                'district_id' => '1209'
            ],
            [
                'id'          => '120904',
                'en'          => 'Chaom Chau',
                'km'          => 'ចោមចៅ',
                'district_id' => '1209'
            ],
            [
                'id'          => '120905',
                'en'          => 'Kakab',
                'km'          => 'កាកាប',
                'district_id' => '1209'
            ],
            [
                'id'          => '120906',
                'en'          => 'Samraong Kraom',
                'km'          => 'សំរោងក្រោម',
                'district_id' => '1209'
            ],
            [
                'id'          => '120908',
                'en'          => 'Boeng Thum',
                'km'          => 'បឹងធំ',
                'district_id' => '1209'
            ],
            [
                'id'          => '120909',
                'en'          => 'Kamboul',
                'km'          => 'កំបូល',
                'district_id' => '1209'
            ],
            [
                'id'          => '120910',
                'en'          => 'Kantaok',
                'km'          => 'កន្ទោក',
                'district_id' => '1209'
            ],
            [
                'id'          => '120911',
                'en'          => 'Ovlaok',
                'km'          => 'ឪឡឹក',
                'district_id' => '1209'
            ],
            [
                'id'          => '120913',
                'en'          => 'Snaor',
                'km'          => 'ស្នោរ',
                'district_id' => '1209'
            ],
            [
                'id'          => '121001',
                'en'          => 'Chrouy Changvar',
                'km'          => 'ជ្រោយចង្វារ',
                'district_id' => '1210'
            ],
            [
                'id'          => '121002',
                'en'          => 'Preaek Lieb',
                'km'          => 'ព្រែកលាប',
                'district_id' => '1210'
            ],
            [
                'id'          => '121003',
                'en'          => 'Preaek Ta Sek',
                'km'          => 'ព្រែកតាសេក',
                'district_id' => '1210'
            ],
            [
                'id'          => '121004',
                'en'          => 'Kaoh Dach',
                'km'          => 'កោះដាច់',
                'district_id' => '1210'
            ],
            [
                'id'          => '121005',
                'en'          => 'Bak Kaeng',
                'km'          => 'បាក់ខែង',
                'district_id' => '1210'
            ],
            [
                'id'          => '121101',
                'en'          => 'Preaek Phnov',
                'km'          => 'ព្រែកព្នៅ',
                'district_id' => '1211'
            ],
            [
                'id'          => '121102',
                'en'          => 'Ponhea Pon',
                'km'          => 'ពញាពន់',
                'district_id' => '1211'
            ],
            [
                'id'          => '121103',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '1211'
            ],
            [
                'id'          => '121104',
                'en'          => 'Kouk Roka',
                'km'          => 'គោករការ',
                'district_id' => '1211'
            ],
            [
                'id'          => '121105',
                'en'          => 'Ponsang',
                'km'          => 'ពន្សាំង',
                'district_id' => '1211'
            ],
            [
                'id'          => '121201',
                'en'          => 'Chhbar Ampov Ti Muoy',
                'km'          => 'ច្បារអំពៅទី១',
                'district_id' => '1212'
            ],
            [
                'id'          => '121202',
                'en'          => 'Chbar Ampov Ti Pir',
                'km'          => 'ច្បារអំពៅទី២',
                'district_id' => '1212'
            ],
            [
                'id'          => '121203',
                'en'          => 'Nirouth',
                'km'          => 'និរោធ',
                'district_id' => '1212'
            ],
            [
                'id'          => '121204',
                'en'          => 'Preaek Pra',
                'km'          => 'ព្រែកប្រា',
                'district_id' => '1212'
            ],
            [
                'id'          => '121205',
                'en'          => 'Veal Sbov',
                'km'          => 'វាលស្បូវ',
                'district_id' => '1212'
            ],
            [
                'id'          => '121206',
                'en'          => 'Preaek Aeng',
                'km'          => 'ព្រែកឯង',
                'district_id' => '1212'
            ],
            [
                'id'          => '121207',
                'en'          => 'Kbal Kaoh',
                'km'          => 'ក្បាលកោះ',
                'district_id' => '1212'
            ],
            [
                'id'          => '121208',
                'en'          => 'Preaek Thmei',
                'km'          => 'ព្រែកថ្មី',
                'district_id' => '1212'
            ],
            [
                'id'          => '130101',
                'en'          => 'Sang',
                'km'          => 'ស្អាង',
                'district_id' => '1301'
            ],
            [
                'id'          => '130102',
                'en'          => 'Tasu',
                'km'          => 'តស៊ូ',
                'district_id' => '1301'
            ],
            [
                'id'          => '130103',
                'en'          => 'Khyang',
                'km'          => 'ខ្យង',
                'district_id' => '1301'
            ],
            [
                'id'          => '130104',
                'en'          => 'Chrach',
                'km'          => 'ច្រាច់',
                'district_id' => '1301'
            ],
            [
                'id'          => '130105',
                'en'          => 'Thmea',
                'km'          => 'ធ្មា',
                'district_id' => '1301'
            ],
            [
                'id'          => '130106',
                'en'          => 'Putrea',
                'km'          => 'ពុទ្រា',
                'district_id' => '1301'
            ],
            [
                'id'          => '130201',
                'en'          => 'Chhaeb Muoy',
                'km'          => 'ឆែបមួយ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130202',
                'en'          => 'Chhaeb Pir',
                'km'          => 'ឆែបពីរ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130203',
                'en'          => 'Sangkae Muoy',
                'km'          => 'សង្កែមួយ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130204',
                'en'          => 'Sangkae Pir',
                'km'          => 'សង្កែពីរ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130205',
                'en'          => 'Mlu Prey Muoy',
                'km'          => 'ម្លូរព្រៃមួយ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130206',
                'en'          => 'Mlu Prey Pir',
                'km'          => 'ម្លូរព្រៃពីរ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130207',
                'en'          => 'Kampong Sralau Muoy',
                'km'          => 'កំពង់ស្រឡៅមួយ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130208',
                'en'          => 'Kampong Sralau Pir',
                'km'          => 'កំពង់ស្រឡៅពីរ',
                'district_id' => '1302'
            ],
            [
                'id'          => '130301',
                'en'          => 'Choam Ksant',
                'km'          => 'ជាំក្សាន្ត',
                'district_id' => '1303'
            ],
            [
                'id'          => '130302',
                'en'          => 'Tuek Kraham',
                'km'          => 'ទឹកក្រហម',
                'district_id' => '1303'
            ],
            [
                'id'          => '130303',
                'en'          => 'Pring Thum',
                'km'          => 'ព្រីងធំ',
                'district_id' => '1303'
            ],
            [
                'id'          => '130304',
                'en'          => 'Rumdaoh Srae',
                'km'          => 'រំដោះស្រែ',
                'district_id' => '1303'
            ],
            [
                'id'          => '130305',
                'en'          => 'Yeang',
                'km'          => 'យោង',
                'district_id' => '1303'
            ],
            [
                'id'          => '130306',
                'en'          => 'Kantuot',
                'km'          => 'កន្ទួត',
                'district_id' => '1303'
            ],
            [
                'id'          => '130307',
                'en'          => 'Sror Aem',
                'km'          => 'ស្រអែម',
                'district_id' => '1303'
            ],
            [
                'id'          => '130308',
                'en'          => 'Morokot',
                'km'          => 'មរកត',
                'district_id' => '1303'
            ],
            [
                'id'          => '130401',
                'en'          => 'Kuleaen Tboung',
                'km'          => 'គូលែនត្បូង',
                'district_id' => '1304'
            ],
            [
                'id'          => '130402',
                'en'          => 'Kuleaen Cheung',
                'km'          => 'គូលែនជើង',
                'district_id' => '1304'
            ],
            [
                'id'          => '130403',
                'en'          => 'Thmei',
                'km'          => 'ថ្មី',
                'district_id' => '1304'
            ],
            [
                'id'          => '130404',
                'en'          => 'Phnum Penh',
                'km'          => 'ភ្នំពេញ',
                'district_id' => '1304'
            ],
            [
                'id'          => '130405',
                'en'          => 'Phnum Tbaeng Pir',
                'km'          => 'ភ្នំត្បែងពីរ',
                'district_id' => '1304'
            ],
            [
                'id'          => '130406',
                'en'          => 'Srayang',
                'km'          => 'ស្រយង់',
                'district_id' => '1304'
            ],
            [
                'id'          => '130501',
                'en'          => 'Robieb',
                'km'          => 'របៀប',
                'district_id' => '1305'
            ],
            [
                'id'          => '130502',
                'en'          => 'Reaksmei',
                'km'          => 'រស្មី',
                'district_id' => '1305'
            ],
            [
                'id'          => '130503',
                'en'          => 'Rohas',
                'km'          => 'រហ័ស',
                'district_id' => '1305'
            ],
            [
                'id'          => '130504',
                'en'          => 'Rung Roeang',
                'km'          => 'រុនរឿង',
                'district_id' => '1305'
            ],
            [
                'id'          => '130505',
                'en'          => 'Rik Reay',
                'km'          => 'រីករាយ',
                'district_id' => '1305'
            ],
            [
                'id'          => '130506',
                'en'          => 'Ruos Roan',
                'km'          => 'រួសរាន់',
                'district_id' => '1305'
            ],
            [
                'id'          => '130507',
                'en'          => 'Rotanak',
                'km'          => 'រតនៈ',
                'district_id' => '1305'
            ],
            [
                'id'          => '130508',
                'en'          => 'Rieb Roy',
                'km'          => 'រៀបរាយ',
                'district_id' => '1305'
            ],
            [
                'id'          => '130509',
                'en'          => 'Reaksa',
                'km'          => 'រក្សា',
                'district_id' => '1305'
            ],
            [
                'id'          => '130510',
                'en'          => 'Rumdaoh',
                'km'          => 'រំដោះ',
                'district_id' => '1305'
            ],
            [
                'id'          => '130511',
                'en'          => 'Romtum',
                'km'          => 'រមទម',
                'district_id' => '1305'
            ],
            [
                'id'          => '130512',
                'en'          => 'Romoneiy',
                'km'          => 'រមណីយ',
                'district_id' => '1305'
            ],
            [
                'id'          => '130601',
                'en'          => 'Chamraeun',
                'km'          => 'ចំរើន',
                'district_id' => '1306'
            ],
            [
                'id'          => '130602',
                'en'          => 'Roang',
                'km'          => 'រអាង',
                'district_id' => '1306'
            ],
            [
                'id'          => '130603',
                'en'          => 'Phnum Tbaeng Muoy',
                'km'          => 'ភ្នំត្បែងមួយ',
                'district_id' => '1306'
            ],
            [
                'id'          => '130604',
                'en'          => 'Sdau',
                'km'          => 'ស្តៅ',
                'district_id' => '1306'
            ],
            [
                'id'          => '130605',
                'en'          => 'Ronak Ser',
                'km'          => 'រណសិរ្ស',
                'district_id' => '1306'
            ],
            [
                'id'          => '130703',
                'en'          => 'Chhean Mukh',
                'km'          => 'ឈានមុខ',
                'district_id' => '1307'
            ],
            [
                'id'          => '130704',
                'en'          => 'Pou',
                'km'          => 'ពោធិ៍',
                'district_id' => '1307'
            ],
            [
                'id'          => '130705',
                'en'          => 'Prame',
                'km'          => 'ប្រមេរុ',
                'district_id' => '1307'
            ],
            [
                'id'          => '130706',
                'en'          => 'Preah Khleang',
                'km'          => 'ព្រះឃ្លាំង',
                'district_id' => '1307'
            ],
            [
                'id'          => '130801',
                'en'          => 'Kampong Pranak',
                'km'          => 'កំពង់ប្រណាក',
                'district_id' => '1308'
            ],
            [
                'id'          => '130802',
                'en'          => 'Pal Hal',
                'km'          => 'ប៉ាលហាល',
                'district_id' => '1308'
            ],
            [
                'id'          => '140101',
                'en'          => 'Boeng Preah',
                'km'          => 'បឹងព្រះ',
                'district_id' => '1401'
            ],
            [
                'id'          => '140102',
                'en'          => 'Cheung Phnum',
                'km'          => 'ជើងភ្នំ',
                'district_id' => '1401'
            ],
            [
                'id'          => '140103',
                'en'          => 'Chheu Kach',
                'km'          => 'ឈើកាច់',
                'district_id' => '1401'
            ],
            [
                'id'          => '140104',
                'en'          => 'Reaks Chey',
                'km'          => 'រក្សជ័យ',
                'district_id' => '1401'
            ],
            [
                'id'          => '140105',
                'en'          => 'Roung Damrei',
                'km'          => 'រោងដំរី',
                'district_id' => '1401'
            ],
            [
                'id'          => '140106',
                'en'          => 'Sdau Kaong',
                'km'          => 'ស្តៅកោង',
                'district_id' => '1401'
            ],
            [
                'id'          => '140107',
                'en'          => 'Spueu Ka',
                'km'          => 'ស្ពឹ ក',
                'district_id' => '1401'
            ],
            [
                'id'          => '140108',
                'en'          => 'Spueu Kha',
                'km'          => 'ស្ពឹ ខ',
                'district_id' => '1401'
            ],
            [
                'id'          => '140109',
                'en'          => 'Theay',
                'km'          => 'ធាយ',
                'district_id' => '1401'
            ],
            [
                'id'          => '140201',
                'en'          => 'Cheach',
                'km'          => 'ជាច',
                'district_id' => '1402'
            ],
            [
                'id'          => '140202',
                'en'          => 'Doun Koeng',
                'km'          => 'ដូនកឹង',
                'district_id' => '1402'
            ],
            [
                'id'          => '140203',
                'en'          => 'Kranhung',
                'km'          => 'ក្រញូង',
                'district_id' => '1402'
            ],
            [
                'id'          => '140204',
                'en'          => 'Krabau',
                'km'          => 'ក្របៅ',
                'district_id' => '1402'
            ],
            [
                'id'          => '140205',
                'en'          => 'Seang Khveang',
                'km'          => 'ស៊ាងឃ្វាង',
                'district_id' => '1402'
            ],
            [
                'id'          => '140206',
                'en'          => 'Smaong Khang Cheung',
                'km'          => 'ស្មោងខាងជើង',
                'district_id' => '1402'
            ],
            [
                'id'          => '140207',
                'en'          => 'Smaong Khang Tboung',
                'km'          => 'ស្មោងខាងត្បូង',
                'district_id' => '1402'
            ],
            [
                'id'          => '140208',
                'en'          => 'Trabaek',
                'km'          => 'ត្របែក',
                'district_id' => '1402'
            ],
            [
                'id'          => '140301',
                'en'          => 'Ansaong',
                'km'          => 'អន្សោង',
                'district_id' => '1403'
            ],
            [
                'id'          => '140302',
                'en'          => 'Cham',
                'km'          => 'ចាម',
                'district_id' => '1403'
            ],
            [
                'id'          => '140303',
                'en'          => 'Cheang Daek',
                'km'          => 'ជាងដែក',
                'district_id' => '1403'
            ],
            [
                'id'          => '140304',
                'en'          => 'Chrey',
                'km'          => 'ជ្រៃ',
                'district_id' => '1403'
            ],
            [
                'id'          => '140305',
                'en'          => 'Kansoam Ak',
                'km'          => 'កន្សោមអក',
                'district_id' => '1403'
            ],
            [
                'id'          => '140306',
                'en'          => 'Kou Khchak',
                'km'          => 'គោកខ្ចក',
                'district_id' => '1403'
            ],
            [
                'id'          => '140307',
                'en'          => 'Kampong Trabaek',
                'km'          => 'កំពង់ត្របែក',
                'district_id' => '1403'
            ],
            [
                'id'          => '140308',
                'en'          => 'Peam Montear',
                'km'          => 'ពាមមន្ទារ',
                'district_id' => '1403'
            ],
            [
                'id'          => '140309',
                'en'          => 'Prasat',
                'km'          => 'ប្រាសាទ',
                'district_id' => '1403'
            ],
            [
                'id'          => '140310',
                'en'          => 'Pratheat',
                'km'          => 'ប្រធាតុ',
                'district_id' => '1403'
            ],
            [
                'id'          => '140311',
                'en'          => 'Prey Chhor',
                'km'          => 'ព្រៃឈរ',
                'district_id' => '1403'
            ],
            [
                'id'          => '140312',
                'en'          => 'Prey Poun',
                'km'          => 'ព្រៃពោន',
                'district_id' => '1403'
            ],
            [
                'id'          => '140313',
                'en'          => 'Thkov',
                'km'          => 'ថ្កូវ',
                'district_id' => '1403'
            ],
            [
                'id'          => '140401',
                'en'          => 'Chong Ampil',
                'km'          => 'ចុងអំពិល',
                'district_id' => '1404'
            ],
            [
                'id'          => '140402',
                'en'          => 'Kanhchriech',
                'km'          => 'កញ្ជ្រៀច',
                'district_id' => '1404'
            ],
            [
                'id'          => '140403',
                'en'          => 'Kdoeang Reay',
                'km'          => 'ក្ត្រឿងរាយ',
                'district_id' => '1404'
            ],
            [
                'id'          => '140404',
                'en'          => 'Kouk Kong Kaeut',
                'km'          => 'គោកគង់កើត',
                'district_id' => '1404'
            ],
            [
                'id'          => '140405',
                'en'          => 'Kouk Kong Lech',
                'km'          => 'គោកគង់លិច',
                'district_id' => '1404'
            ],
            [
                'id'          => '140406',
                'en'          => 'Preal',
                'km'          => 'ព្រាល',
                'district_id' => '1404'
            ],
            [
                'id'          => '140407',
                'en'          => 'Thma Pun',
                'km'          => 'ថ្មពូន',
                'district_id' => '1404'
            ],
            [
                'id'          => '140408',
                'en'          => 'Tnaot',
                'km'          => 'ត្នោត',
                'district_id' => '1404'
            ],
            [
                'id'          => '140501',
                'en'          => 'Angkor Sar',
                'km'          => 'អង្គរសរ',
                'district_id' => '1405'
            ],
            [
                'id'          => '140502',
                'en'          => 'Chres',
                'km'          => 'ច្រេស',
                'district_id' => '1405'
            ],
            [
                'id'          => '140503',
                'en'          => 'Chi Phoch',
                'km'          => 'ជីផុច',
                'district_id' => '1405'
            ],
            [
                'id'          => '140504',
                'en'          => 'Prey Khnes',
                'km'          => 'ព្រៃឃ្នេស',
                'district_id' => '1405'
            ],
            [
                'id'          => '140505',
                'en'          => 'Prey Rumdeng',
                'km'          => 'ព្រៃរំដេង',
                'district_id' => '1405'
            ],
            [
                'id'          => '140506',
                'en'          => 'Prey Totueng',
                'km'          => 'ព្រៃទទឹង',
                'district_id' => '1405'
            ],
            [
                'id'          => '140507',
                'en'          => 'Svay Chrum',
                'km'          => 'ស្វាយជ្រុំ',
                'district_id' => '1405'
            ],
            [
                'id'          => '140508',
                'en'          => 'Trapeang Srae',
                'km'          => 'ត្រពាំងស្រែ',
                'district_id' => '1405'
            ],
            [
                'id'          => '140601',
                'en'          => 'Angkor Angk',
                'km'          => 'អង្គរអង្គ',
                'district_id' => '1406'
            ],
            [
                'id'          => '140602',
                'en'          => 'Kampong Prasat',
                'km'          => 'កំពង់ប្រសាទ',
                'district_id' => '1406'
            ],
            [
                'id'          => '140603',
                'en'          => 'Kaoh Chek',
                'km'          => 'កោះចេក',
                'district_id' => '1406'
            ],
            [
                'id'          => '140604',
                'en'          => 'Kaoh Roka',
                'km'          => 'កោះរកា',
                'district_id' => '1406'
            ],
            [
                'id'          => '140605',
                'en'          => 'Kaoh Sampov',
                'km'          => 'កោះសំពៅ',
                'district_id' => '1406'
            ],
            [
                'id'          => '140606',
                'en'          => 'Krang Ta Yang',
                'km'          => 'ក្រាំងតាយ៉ង',
                'district_id' => '1406'
            ],
            [
                'id'          => '140607',
                'en'          => 'Preaek Krabau',
                'km'          => 'ព្រែកក្របៅ',
                'district_id' => '1406'
            ],
            [
                'id'          => '140608',
                'en'          => 'Preaek Sambuor',
                'km'          => 'ព្រែកសំបួរ',
                'district_id' => '1406'
            ],
            [
                'id'          => '140609',
                'en'          => 'Ruessei Srok',
                'km'          => 'ឬស្សីស្រុក',
                'district_id' => '1406'
            ],
            [
                'id'          => '140610',
                'en'          => 'Svay Phluoh',
                'km'          => 'ស្វាយភ្លោះ',
                'district_id' => '1406'
            ],
            [
                'id'          => '140701',
                'en'          => 'Ba Baong',
                'km'          => 'បាបោង',
                'district_id' => '1407'
            ],
            [
                'id'          => '140702',
                'en'          => 'Banlich Prasat',
                'km'          => 'បន្លិចប្រាសាទ',
                'district_id' => '1407'
            ],
            [
                'id'          => '140703',
                'en'          => 'Neak Loeang',
                'km'          => 'អ្នកលឿង',
                'district_id' => '1407'
            ],
            [
                'id'          => '140704',
                'en'          => 'Peam Mean Chey',
                'km'          => 'ពាមមានជ័យ',
                'district_id' => '1407'
            ],
            [
                'id'          => '140705',
                'en'          => 'Peam Ro',
                'km'          => 'ពាមរក៍',
                'district_id' => '1407'
            ],
            [
                'id'          => '140706',
                'en'          => 'Preaek Khsay Ka',
                'km'          => 'ព្រែកខ្សាយ​ ក',
                'district_id' => '1407'
            ],
            [
                'id'          => '140707',
                'en'          => 'Preaek Khsay Kha',
                'km'          => 'ព្រែកខ្សាយ ​ខ',
                'district_id' => '1407'
            ],
            [
                'id'          => '140708',
                'en'          => 'Prey Kandieng',
                'km'          => 'ព្រៃកណ្តៀង',
                'district_id' => '1407'
            ],
            [
                'id'          => '140801',
                'en'          => 'Kampong Popil',
                'km'          => 'កំពង់ពពិល',
                'district_id' => '1408'
            ],
            [
                'id'          => '140802',
                'en'          => 'Kanhcham',
                'km'          => 'កញ្ចំ',
                'district_id' => '1408'
            ],
            [
                'id'          => '140803',
                'en'          => 'Kampong Prang',
                'km'          => 'កំពង់ប្រាំង',
                'district_id' => '1408'
            ],
            [
                'id'          => '140805',
                'en'          => 'Mesar Prachan',
                'km'          => 'មេសរប្រចាន់',
                'district_id' => '1408'
            ],
            [
                'id'          => '140807',
                'en'          => 'Prey Pnov',
                'km'          => 'ព្រៃព្នៅ',
                'district_id' => '1408'
            ],
            [
                'id'          => '140808',
                'en'          => 'Prey Sniet',
                'km'          => 'ព្រៃស្នៀត',
                'district_id' => '1408'
            ],
            [
                'id'          => '140809',
                'en'          => 'Prey Sralet',
                'km'          => 'ព្រៃស្រឡិត',
                'district_id' => '1408'
            ],
            [
                'id'          => '140810',
                'en'          => 'Reab',
                'km'          => 'រាប',
                'district_id' => '1408'
            ],
            [
                'id'          => '140811',
                'en'          => 'Roka',
                'km'          => 'រកា',
                'district_id' => '1408'
            ],
            [
                'id'          => '140901',
                'en'          => 'Angkor Reach',
                'km'          => 'អង្គររាជ្យ',
                'district_id' => '1409'
            ],
            [
                'id'          => '140902',
                'en'          => 'Banteay Chakrei',
                'km'          => 'បន្ទាយចក្រី',
                'district_id' => '1409'
            ],
            [
                'id'          => '140903',
                'en'          => 'Boeng Daol',
                'km'          => 'បឹងដោល',
                'district_id' => '1409'
            ],
            [
                'id'          => '140904',
                'en'          => 'Chey Kampok',
                'km'          => 'ជៃកំពត',
                'district_id' => '1409'
            ],
            [
                'id'          => '140905',
                'en'          => 'Kampong Soeng',
                'km'          => 'កំពង់សឹង',
                'district_id' => '1409'
            ],
            [
                'id'          => '140906',
                'en'          => 'Krang Svay',
                'km'          => 'ក្រាំងស្វាយ',
                'district_id' => '1409'
            ],
            [
                'id'          => '140907',
                'en'          => 'Lvea',
                'km'          => 'ល្វា',
                'district_id' => '1409'
            ],
            [
                'id'          => '140908',
                'en'          => 'Preah Sdach',
                'km'          => 'ព្រះស្តេច',
                'district_id' => '1409'
            ],
            [
                'id'          => '140909',
                'en'          => 'Reathor',
                'km'          => 'រាធរ',
                'district_id' => '1409'
            ],
            [
                'id'          => '140910',
                'en'          => 'Rumchek',
                'km'          => 'រំចេក',
                'district_id' => '1409'
            ],
            [
                'id'          => '140911',
                'en'          => 'Sena Reach Otdam',
                'km'          => 'សេនារាជឧត្តម',
                'district_id' => '1409'
            ],
            [
                'id'          => '141001',
                'en'          => 'Baray',
                'km'          => 'បារាយណ៍',
                'district_id' => '1410'
            ],
            [
                'id'          => '141002',
                'en'          => 'Cheung Tuek',
                'km'          => 'ជើងទឹក',
                'district_id' => '1410'
            ],
            [
                'id'          => '141003',
                'en'          => 'Kampong Leav',
                'km'          => 'កំពង់លាវ',
                'district_id' => '1410'
            ],
            [
                'id'          => '141101',
                'en'          => 'Pou Rieng',
                'km'          => 'ពោធិ៍រៀង',
                'district_id' => '1411'
            ],
            [
                'id'          => '141102',
                'en'          => 'Preaek Anteah',
                'km'          => 'ព្រែកអន្ទះ',
                'district_id' => '1411'
            ],
            [
                'id'          => '141103',
                'en'          => 'Preaek Chrey',
                'km'          => 'ព្រែកជ្រៃ',
                'district_id' => '1411'
            ],
            [
                'id'          => '141104',
                'en'          => 'Prey Kanlaong',
                'km'          => 'ព្រៃកន្លោង',
                'district_id' => '1411'
            ],
            [
                'id'          => '141105',
                'en'          => 'Ta Kao',
                'km'          => 'តាកោ',
                'district_id' => '1411'
            ],
            [
                'id'          => '141106',
                'en'          => 'Kampong Ruessei',
                'km'          => 'កំពង់ឬស្សី',
                'district_id' => '1411'
            ],
            [
                'id'          => '141107',
                'en'          => 'Preaek Ta Sar',
                'km'          => 'ព្រែកតាសរ',
                'district_id' => '1411'
            ],
            [
                'id'          => '141201',
                'en'          => 'Ampil Krau',
                'km'          => 'អំពិលក្រៅ',
                'district_id' => '1412'
            ],
            [
                'id'          => '141202',
                'en'          => 'Chrey Khmum',
                'km'          => 'ជ្រៃឃ្មុំ',
                'district_id' => '1412'
            ],
            [
                'id'          => '141203',
                'en'          => 'Lve',
                'km'          => 'ល្វេ',
                'district_id' => '1412'
            ],
            [
                'id'          => '141204',
                'en'          => 'Pnov Ti Muoy',
                'km'          => 'ព្នៅទី១',
                'district_id' => '1412'
            ],
            [
                'id'          => '141205',
                'en'          => 'Pnov Ti Pir',
                'km'          => 'ព្នៅទី២',
                'district_id' => '1412'
            ],
            [
                'id'          => '141206',
                'en'          => 'Pou Ti',
                'km'          => 'ពោធិ៍ទី',
                'district_id' => '1412'
            ],
            [
                'id'          => '141207',
                'en'          => 'Preaek Changkran',
                'km'          => 'ព្រែកចង្រ្កាន',
                'district_id' => '1412'
            ],
            [
                'id'          => '141208',
                'en'          => 'Prey Daeum Thnoeng',
                'km'          => 'ព្រៃដើមថ្នឹង',
                'district_id' => '1412'
            ],
            [
                'id'          => '141209',
                'en'          => 'Prey Tueng',
                'km'          => 'ព្រៃទឹង',
                'district_id' => '1412'
            ],
            [
                'id'          => '141210',
                'en'          => 'Rumlech',
                'km'          => 'រំលេច',
                'district_id' => '1412'
            ],
            [
                'id'          => '141211',
                'en'          => 'Ruessei Sanh',
                'km'          => 'ឬស្សីសាញ់',
                'district_id' => '1412'
            ],
            [
                'id'          => '141301',
                'en'          => 'Angkor Tret',
                'km'          => 'អង្គរទ្រេត',
                'district_id' => '1413'
            ],
            [
                'id'          => '141302',
                'en'          => 'Chea Khlang',
                'km'          => 'ជាខ្លាង',
                'district_id' => '1413'
            ],
            [
                'id'          => '141303',
                'en'          => 'Chrey',
                'km'          => 'ជ្រៃ',
                'district_id' => '1413'
            ],
            [
                'id'          => '141304',
                'en'          => 'Damrei Puon',
                'km'          => 'ដំរីពួន',
                'district_id' => '1413'
            ],
            [
                'id'          => '141305',
                'en'          => 'Me Bon',
                'km'          => 'មេបុណ្យ',
                'district_id' => '1413'
            ],
            [
                'id'          => '141306',
                'en'          => 'Pean Roung',
                'km'          => 'ពាមរោង',
                'district_id' => '1413'
            ],
            [
                'id'          => '141307',
                'en'          => 'Popueus',
                'km'          => 'ពពឺស',
                'district_id' => '1413'
            ],
            [
                'id'          => '141308',
                'en'          => 'Prey Khla',
                'km'          => 'ព្រៃខ្លា',
                'district_id' => '1413'
            ],
            [
                'id'          => '141309',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '1413'
            ],
            [
                'id'          => '141310',
                'en'          => 'Svay Antor',
                'km'          => 'ស្វាយអន្ទរ',
                'district_id' => '1413'
            ],
            [
                'id'          => '141311',
                'en'          => 'Tuek Thla',
                'km'          => 'ទឹកថ្លា',
                'district_id' => '1413'
            ],
            [
                'id'          => '150101',
                'en'          => 'Boeng Bat Kandaol',
                'km'          => 'បឹងកក់កណ្តោល',
                'district_id' => '1501'
            ],
            [
                'id'          => '150102',
                'en'          => 'Boeng Khnar',
                'km'          => 'បឹងខ្នារ',
                'district_id' => '1501'
            ],
            [
                'id'          => '150103',
                'en'          => 'Khnar Totueng',
                'km'          => 'ខ្នារទទឺង',
                'district_id' => '1501'
            ],
            [
                'id'          => '150104',
                'en'          => 'Me Tuek',
                'km'          => 'មេទឹក',
                'district_id' => '1501'
            ],
            [
                'id'          => '150105',
                'en'          => 'Ou Ta Paong',
                'km'          => 'អូរតាប៉ោង',
                'district_id' => '1501'
            ],
            [
                'id'          => '150106',
                'en'          => 'Rumlech',
                'km'          => 'រំលេច',
                'district_id' => '1501'
            ],
            [
                'id'          => '150107',
                'en'          => 'Snam Preah',
                'km'          => 'ស្នាមព្រះ',
                'district_id' => '1501'
            ],
            [
                'id'          => '150108',
                'en'          => 'Svay Doun Kaev',
                'km'          => 'ស្វាយដូនកែវ',
                'district_id' => '1501'
            ],
            [
                'id'          => '150109',
                'en'          => 'Ta Lou',
                'km'          => 'តាលោ',
                'district_id' => '1501'
            ],
            [
                'id'          => '150110',
                'en'          => 'Trapeang chorng',
                'km'          => 'ត្រពាំងជង',
                'district_id' => '1501'
            ],
            [
                'id'          => '150201',
                'en'          => 'Anlong Vil',
                'km'          => 'អន្លង់វិល',
                'district_id' => '1502'
            ],
            [
                'id'          => '150203',
                'en'          => 'Kandieng',
                'km'          => 'កណ្តៀង',
                'district_id' => '1502'
            ],
            [
                'id'          => '150204',
                'en'          => 'Kanhchor',
                'km'          => 'កញ្ជរ',
                'district_id' => '1502'
            ],
            [
                'id'          => '150205',
                'en'          => 'Reang Til',
                'km'          => 'រាំងទិល',
                'district_id' => '1502'
            ],
            [
                'id'          => '150206',
                'en'          => 'Srae Sdok',
                'km'          => 'ស្រែស្តុក',
                'district_id' => '1502'
            ],
            [
                'id'          => '150207',
                'en'          => 'Svay Luong',
                'km'          => 'ស្វាយលួង',
                'district_id' => '1502'
            ],
            [
                'id'          => '150208',
                'en'          => 'Sya',
                'km'          => 'ស្យា',
                'district_id' => '1502'
            ],
            [
                'id'          => '150209',
                'en'          => 'Veal',
                'km'          => 'វាល',
                'district_id' => '1502'
            ],
            [
                'id'          => '150210',
                'en'          => 'Kaoh Chum',
                'km'          => 'កោះជុំ',
                'district_id' => '1502'
            ],
            [
                'id'          => '150301',
                'en'          => 'Anlong Tnaot',
                'km'          => 'អន្លង់ត្នោត',
                'district_id' => '1503'
            ],
            [
                'id'          => '150302',
                'en'          => 'Ansa Chambak',
                'km'          => 'អន្សាចំបក់',
                'district_id' => '1503'
            ],
            [
                'id'          => '150303',
                'en'          => 'Boeng Kantuot',
                'km'          => 'បឹងកន្ទួត',
                'district_id' => '1503'
            ],
            [
                'id'          => '150304',
                'en'          => 'Chheu Tom',
                'km'          => 'ឈើតុំ',
                'district_id' => '1503'
            ],
            [
                'id'          => '150305',
                'en'          => 'Kampong Luong',
                'km'          => 'កំពង់លួង',
                'district_id' => '1503'
            ],
            [
                'id'          => '150306',
                'en'          => 'Kampong Pou',
                'km'          => 'កំពង់ពោធិ៍',
                'district_id' => '1503'
            ],
            [
                'id'          => '150307',
                'en'          => 'Kbal Trach',
                'km'          => 'ក្បាលត្រាច',
                'district_id' => '1503'
            ],
            [
                'id'          => '150308',
                'en'          => 'Ou Sandan',
                'km'          => 'អូរសណ្តាន់',
                'district_id' => '1503'
            ],
            [
                'id'          => '150309',
                'en'          => 'Sna Ansa',
                'km'          => 'ស្នាអន្សា',
                'district_id' => '1503'
            ],
            [
                'id'          => '150310',
                'en'          => 'Svay Sa',
                'km'          => 'ស្វាយស',
                'district_id' => '1503'
            ],
            [
                'id'          => '150311',
                'en'          => 'Tnaot Chum',
                'km'          => 'ត្នោតជុំ',
                'district_id' => '1503'
            ],
            [
                'id'          => '150401',
                'en'          => 'Bak Chenhchien',
                'km'          => 'បាក់ជញ្ចៀន',
                'district_id' => '1504'
            ],
            [
                'id'          => '150402',
                'en'          => 'Leach',
                'km'          => 'លាច',
                'district_id' => '1504'
            ],
            [
                'id'          => '150403',
                'en'          => 'Phteah Rung',
                'km'          => 'ផ្ទះរុង',
                'district_id' => '1504'
            ],
            [
                'id'          => '150404',
                'en'          => 'Prongil',
                'km'          => 'ពង្រិល',
                'district_id' => '1504'
            ],
            [
                'id'          => '150405',
                'en'          => 'Rokat',
                'km'          => 'រកាត',
                'district_id' => '1504'
            ],
            [
                'id'          => '150406',
                'en'          => 'Santreae',
                'km'          => 'សន្ទ្រែ',
                'district_id' => '1504'
            ],
            [
                'id'          => '150407',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '1504'
            ],
            [
                'id'          => '150501',
                'en'          => 'Chamraeun Phal',
                'km'          => 'ចំរើនផល',
                'district_id' => '1505'
            ],
            [
                'id'          => '150503',
                'en'          => 'Lolok Sa',
                'km'          => 'លលកស',
                'district_id' => '1505'
            ],
            [
                'id'          => '150504',
                'en'          => 'Phteah Prey',
                'km'          => 'ផ្ទះព្រៃ',
                'district_id' => '1505'
            ],
            [
                'id'          => '150505',
                'en'          => 'Prey Nhi',
                'km'          => 'ព្រះញី',
                'district_id' => '1505'
            ],
            [
                'id'          => '150506',
                'en'          => 'Roleab',
                'km'          => 'រលាប',
                'district_id' => '1505'
            ],
            [
                'id'          => '150507',
                'en'          => 'Svay At',
                'km'          => 'ស្វាយអាត់',
                'district_id' => '1505'
            ],
            [
                'id'          => '150508',
                'en'          => 'Banteay Dei',
                'km'          => 'បន្ទាយដី',
                'district_id' => '1505'
            ],
            [
                'id'          => '150601',
                'en'          => 'Ou Saom',
                'km'          => 'អូរសោម',
                'district_id' => '1506'
            ],
            [
                'id'          => '150602',
                'en'          => 'Krapeu Pir',
                'km'          => 'ក្រពើពីរ',
                'district_id' => '1506'
            ],
            [
                'id'          => '150603',
                'en'          => 'Anlong Reab',
                'km'          => 'អន្លង់រាប',
                'district_id' => '1506'
            ],
            [
                'id'          => '150604',
                'en'          => 'Pramaoy',
                'km'          => 'ប្រម៉ោយ',
                'district_id' => '1506'
            ],
            [
                'id'          => '150605',
                'en'          => 'Thma Da',
                'km'          => 'ថ្មដា',
                'district_id' => '1506'
            ],
            [
                'id'          => '160101',
                'en'          => 'Malik',
                'km'          => 'ម៉ាលិក',
                'district_id' => '1601'
            ],
            [
                'id'          => '160103',
                'en'          => 'Nhang',
                'km'          => 'ញ៉ាង',
                'district_id' => '1601'
            ],
            [
                'id'          => '160104',
                'en'          => 'Ta Lav',
                'km'          => 'តាឡាវ',
                'district_id' => '1601'
            ],
            [
                'id'          => '160201',
                'en'          => 'Kachanh',
                'km'          => 'កាចាញ',
                'district_id' => '1602'
            ],
            [
                'id'          => '160202',
                'en'          => 'Labansiek',
                'km'          => 'ឡាបានសៀក',
                'district_id' => '1602'
            ],
            [
                'id'          => '160203',
                'en'          => 'Yeak Laom',
                'km'          => 'យក្ខឡោម',
                'district_id' => '1602'
            ],
            [
                'id'          => '160204',
                'en'          => 'Boeng Kansaeng',
                'km'          => 'បឹងកន្សែង',
                'district_id' => '1602'
            ],
            [
                'id'          => '160301',
                'en'          => 'Kak',
                'km'          => 'កក់',
                'district_id' => '1603'
            ],
            [
                'id'          => '160302',
                'en'          => 'Keh Chong',
                'km'          => 'កិះចុង',
                'district_id' => '1603'
            ],
            [
                'id'          => '160303',
                'en'          => 'La Minh',
                'km'          => 'ឡាមីញ',
                'district_id' => '1603'
            ],
            [
                'id'          => '160304',
                'en'          => 'Lung Khung',
                'km'          => 'លុងឃុង',
                'district_id' => '1603'
            ],
            [
                'id'          => '160305',
                'en'          => 'Saeung',
                'km'          => 'ស៊ើង',
                'district_id' => '1603'
            ],
            [
                'id'          => '160306',
                'en'          => 'Ting Chak',
                'km'          => 'ទីងចាក់',
                'district_id' => '1603'
            ],
            [
                'id'          => '160401',
                'en'          => 'Serei Mongkol',
                'km'          => 'សិរីមង្គល',
                'district_id' => '1604'
            ],
            [
                'id'          => '160402',
                'en'          => 'Srae Angkrorng',
                'km'          => 'ស្រែអង្រ្កង',
                'district_id' => '1604'
            ],
            [
                'id'          => '160403',
                'en'          => 'Ta Ang',
                'km'          => 'តាអង',
                'district_id' => '1604'
            ],
            [
                'id'          => '160404',
                'en'          => 'Teun',
                'km'          => 'តឺន',
                'district_id' => '1604'
            ],
            [
                'id'          => '160405',
                'en'          => 'Trapeang Chres',
                'km'          => 'ត្រពាំងច្រេស',
                'district_id' => '1604'
            ],
            [
                'id'          => '160406',
                'en'          => 'Trapeang Kraham',
                'km'          => 'ត្រពាំងក្រហម',
                'district_id' => '1604'
            ],
            [
                'id'          => '160501',
                'en'          => 'Chey Otdam',
                'km'          => 'ជ័យឧត្តម',
                'district_id' => '1605'
            ],
            [
                'id'          => '160502',
                'en'          => 'Ka Laeng',
                'km'          => 'កាឡែង',
                'district_id' => '1605'
            ],
            [
                'id'          => '160503',
                'en'          => 'Lbang Muoy',
                'km'          => 'ឡ្បាំង១',
                'district_id' => '1605'
            ],
            [
                'id'          => '160504',
                'en'          => 'Lbang Pir',
                'km'          => 'ឡ្បាំង២',
                'district_id' => '1605'
            ],
            [
                'id'          => '160505',
                'en'          => 'Ba Tang',
                'km'          => 'បាតាង',
                'district_id' => '1605'
            ],
            [
                'id'          => '160506',
                'en'          => 'Seda',
                'km'          => 'សេដា',
                'district_id' => '1605'
            ],
            [
                'id'          => '160601',
                'en'          => 'Cha Ung',
                'km'          => 'ចាអ៊ុង',
                'district_id' => '1606'
            ],
            [
                'id'          => '160602',
                'en'          => 'Pouy',
                'km'          => 'ប៉ូយ',
                'district_id' => '1606'
            ],
            [
                'id'          => '160603',
                'en'          => 'Aekakpheap',
                'km'          => 'ឯកភាព',
                'district_id' => '1606'
            ],
            [
                'id'          => '160604',
                'en'          => 'Kalai',
                'km'          => 'កាឡៃ',
                'district_id' => '1606'
            ],
            [
                'id'          => '160605',
                'en'          => 'Ou Chum',
                'km'          => 'អូរជុំ',
                'district_id' => '1606'
            ],
            [
                'id'          => '160606',
                'en'          => 'Sameakki',
                'km'          => 'សាមគ្គី',
                'district_id' => '1606'
            ],
            [
                'id'          => '160607',
                'en'          => 'Lak',
                'km'          => 'ល្អក់',
                'district_id' => '1606'
            ],
            [
                'id'          => '160701',
                'en'          => 'Bar Kham',
                'km'          => 'បរខាំ',
                'district_id' => '1607'
            ],
            [
                'id'          => '160702',
                'en'          => 'Lum Choar',
                'km'          => 'លំជ័រ',
                'district_id' => '1607'
            ],
            [
                'id'          => '160703',
                'en'          => 'Pak Nhai',
                'km'          => 'ប៉ក់ញ៉ៃ',
                'district_id' => '1607'
            ],
            [
                'id'          => '160704',
                'en'          => 'Pa Te',
                'km'          => 'ប៉ាតេ',
                'district_id' => '1607'
            ],
            [
                'id'          => '160705',
                'en'          => 'Sesan',
                'km'          => 'សេសាន',
                'district_id' => '1607'
            ],
            [
                'id'          => '160706',
                'en'          => 'Saom Thum',
                'km'          => 'សោមធំ',
                'district_id' => '1607'
            ],
            [
                'id'          => '160707',
                'en'          => 'Ya Tung',
                'km'          => 'យ៉ាទុង',
                'district_id' => '1607'
            ],
            [
                'id'          => '160801',
                'en'          => 'Ta Veaeng Leu',
                'km'          => 'តាវែងលើ',
                'district_id' => '1608'
            ],
            [
                'id'          => '160802',
                'en'          => 'Ta Veaeng Kraom',
                'km'          => 'តាវែងក្រោម',
                'district_id' => '1608'
            ],
            [
                'id'          => '160901',
                'en'          => 'Pong',
                'km'          => 'ប៉ុង',
                'district_id' => '1609'
            ],
            [
                'id'          => '160903',
                'en'          => 'Hat Pak',
                'km'          => 'ហាត់ប៉ក់',
                'district_id' => '1609'
            ],
            [
                'id'          => '160904',
                'en'          => 'Ka Choun',
                'km'          => 'កាចូន',
                'district_id' => '1609'
            ],
            [
                'id'          => '160905',
                'en'          => 'Kaoh Pang',
                'km'          => 'កោះពាក្យ',
                'district_id' => '1609'
            ],
            [
                'id'          => '160906',
                'en'          => 'Kaoh Peak',
                'km'          => 'កោះពាក្យ',
                'district_id' => '1609'
            ],
            [
                'id'          => '160907',
                'en'          => 'Kok Lak',
                'km'          => 'កុកឡាក់',
                'district_id' => '1609'
            ],
            [
                'id'          => '160908',
                'en'          => 'Pa Kalan',
                'km'          => 'ប៉ាកាឡាន់',
                'district_id' => '1609'
            ],
            [
                'id'          => '160909',
                'en'          => 'Phnum Kok',
                'km'          => 'ភ្នំកុក',
                'district_id' => '1609'
            ],
            [
                'id'          => '160910',
                'en'          => 'Veun Sai',
                'km'          => 'វើនសៃ',
                'district_id' => '1609'
            ],
            [
                'id'          => '170101',
                'en'          => 'Char Chhuk',
                'km'          => 'ចារឈូក ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170102',
                'en'          => 'Doun Peng',
                'km'          => 'ដូនពេង ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170103',
                'en'          => 'Kouk Doung',
                'km'          => 'គោកដូង ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170104',
                'en'          => 'Koul',
                'km'          => 'គោល ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170105',
                'en'          => 'Nokor Pheas',
                'km'          => 'នគរភាស ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170106',
                'en'          => 'Srae Khvav',
                'km'          => 'ស្រែខ្វាវ ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170107',
                'en'          => 'Ta Saom',
                'km'          => 'តាសោម ',
                'district_id' => '1701'
            ],
            [
                'id'          => '170201',
                'en'          => 'Chob Ta Trav',
                'km'          => 'ជប់តាត្រាវ ',
                'district_id' => '1702'
            ],
            [
                'id'          => '170202',
                'en'          => 'Leang Dai',
                'km'          => 'លាងដៃ ',
                'district_id' => '1702'
            ],
            [
                'id'          => '170203',
                'en'          => 'Peak Snaeng',
                'km'          => 'ពាក់ស្នែង ',
                'district_id' => '1702'
            ],
            [
                'id'          => '170204',
                'en'          => 'Svay Chek',
                'km'          => 'ស្វាយចេក ',
                'district_id' => '1702'
            ],
            [
                'id'          => '170301',
                'en'          => 'Khnar Sanday',
                'km'          => 'ខ្នារសណ្តាយ ',
                'district_id' => '1703'
            ],
            [
                'id'          => '170302',
                'en'          => 'Khun Ream',
                'km'          => 'ឃុនរាម ',
                'district_id' => '1703'
            ],
            [
                'id'          => '170303',
                'en'          => 'Preah Dak',
                'km'          => 'ព្រះដាក់ ',
                'district_id' => '1703'
            ],
            [
                'id'          => '170304',
                'en'          => 'Rumchek',
                'km'          => 'រំចេក ',
                'district_id' => '1703'
            ],
            [
                'id'          => '170305',
                'en'          => 'Run Ta Aek',
                'km'          => 'រុនតាឯក ',
                'district_id' => '1703'
            ],
            [
                'id'          => '170306',
                'en'          => 'Tbaeng',
                'km'          => 'ត្បែង ',
                'district_id' => '1703'
            ],
            [
                'id'          => '170401',
                'en'          => 'Anlong Samnar',
                'km'          => 'អន្លង់សំណរ ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170402',
                'en'          => 'Chi Kraeng',
                'km'          => 'ជីក្រែង ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170403',
                'en'          => 'Kampong Kdei',
                'km'          => 'កំពង់ក្តី ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170404',
                'en'          => 'Khvav',
                'km'          => 'ខ្វាវ ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170405',
                'en'          => 'Kouk Thlok Kraom',
                'km'          => 'គោកធ្លកក្រោម ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170406',
                'en'          => 'Kouk Thlok Leu',
                'km'          => 'គោកធ្លកលើ ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170407',
                'en'          => 'Lveaeng Ruessei',
                'km'          => 'ល្វែងឫស្សី ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170408',
                'en'          => 'Pongro Kraom',
                'km'          => 'ពង្រក្រោម ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170409',
                'en'          => 'Pongro Leu',
                'km'          => 'ពង្រលើ ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170410',
                'en'          => 'Ruessei Lok',
                'km'          => 'ឫស្សីលក ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170411',
                'en'          => 'Sangvaeuy',
                'km'          => 'សង្វើយ ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170412',
                'en'          => 'Spean Tnaot',
                'km'          => 'ស្ពានត្នោត ',
                'district_id' => '1704'
            ],
            [
                'id'          => '170601',
                'en'          => 'Chanleas Dai',
                'km'          => 'ជន្លាស់ដៃ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170602',
                'en'          => 'Kampong Thkov',
                'km'          => 'កំពង់ថ្កូវ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170603',
                'en'          => 'Kralanh',
                'km'          => 'ក្រឡាញ់ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170604',
                'en'          => 'Krouch Kor',
                'km'          => 'ក្រូចគរ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170605',
                'en'          => 'Roung Kou',
                'km'          => 'រោងគោ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170606',
                'en'          => 'Sambuor',
                'km'          => 'សំបួរ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170607',
                'en'          => 'Saen Sokh',
                'km'          => 'សែនសុខ ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170608',
                'en'          => 'Snuol',
                'km'          => 'ស្នួល ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170609',
                'en'          => 'Sranal',
                'km'          => 'ស្រណាល ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170610',
                'en'          => 'Ta An',
                'km'          => 'តាអាន ',
                'district_id' => '1706'
            ],
            [
                'id'          => '170701',
                'en'          => 'Sasar Sdam',
                'km'          => 'សសរស្តម្ភ ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170702',
                'en'          => 'Doun Kaev',
                'km'          => 'ដូនកែវ ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170703',
                'en'          => 'Kdei Run',
                'km'          => 'ក្តីរុន ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170704',
                'en'          => 'Kaev Poar',
                'km'          => 'កែវពណ៌ ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170705',
                'en'          => 'Khnat',
                'km'          => 'ខ្នាត ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170707',
                'en'          => 'Lvea',
                'km'          => 'ល្វា ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170708',
                'en'          => 'Mukh Paen',
                'km'          => 'មុខប៉ែន ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170709',
                'en'          => 'Pou Treay',
                'km'          => 'ពោធិទ្រាយ ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170710',
                'en'          => 'Puok',
                'km'          => 'ពួក ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170711',
                'en'          => 'Prey Chruk',
                'km'          => 'ព្រៃជ្រូក ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170712',
                'en'          => 'Reul',
                'km'          => 'រើស ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170713',
                'en'          => 'Samraong Yea',
                'km'          => 'សំរោងយា ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170715',
                'en'          => 'Trei Nhoar',
                'km'          => 'ត្រីញ័រ ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170716',
                'en'          => 'Yeang',
                'km'          => 'យាង ',
                'district_id' => '1707'
            ],
            [
                'id'          => '170901',
                'en'          => 'Ampil',
                'km'          => 'អំពិល',
                'district_id' => '1709'
            ],
            [
                'id'          => '170902',
                'en'          => 'Bakong',
                'km'          => 'បាគង ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170903',
                'en'          => 'Ballangk',
                'km'          => 'បល្ល័ង្គ ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170904',
                'en'          => 'Kampong Phluk',
                'km'          => 'កំពង់ភ្លុក ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170905',
                'en'          => 'Kantreang',
                'km'          => 'កន្ទ្រាំង ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170906',
                'en'          => 'Kandaek',
                'km'          => 'កណ្តែក ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170907',
                'en'          => 'Mean Chey',
                'km'          => 'មានជ័យ ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170908',
                'en'          => 'Roluos',
                'km'          => 'រលួស ',
                'district_id' => '1709'
            ],
            [
                'id'          => '170909',
                'en'          => 'Trapeang Thum',
                'km'          => 'ត្រពាំងធំ ',
                'district_id' => '1709'
            ],
            [
                'id'          => '171001',
                'en'          => 'Sla Kram',
                'km'          => 'ស្លក្រាម ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171002',
                'en'          => 'Svay Dankum',
                'km'          => 'ស្វាយដង្គំ ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171003',
                'en'          => 'Kok Chak',
                'km'          => 'គោកចក ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171004',
                'en'          => 'Sala Kamreuk',
                'km'          => 'សាលាកំរើក ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171005',
                'en'          => 'Nokor Thum',
                'km'          => 'នគរធំ ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171006',
                'en'          => 'Chreav',
                'km'          => 'ជ្រាវ ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171007',
                'en'          => 'Chong Khnies',
                'km'          => 'ចុងឃ្នៀស ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171008',
                'en'          => 'Sngkat Sambuor',
                'km'          => 'សំបួរ ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171009',
                'en'          => 'Siem Reab',
                'km'          => 'សៀមរាប ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171010',
                'en'          => 'Srangae',
                'km'          => 'ស្រង៉ែ ',
                'district_id' => '1710'
            ],
            [
                'id'          => '171012',
                'en'          => 'Krabei Riel',
                'km'          => 'ក្របីរៀល',
                'district_id' => '1710'
            ],
            [
                'id'          => '171013',
                'en'          => 'Tuek Vil',
                'km'          => 'ទឹកវិល',
                'district_id' => '1710'
            ],
            [
                'id'          => '171101',
                'en'          => 'Chan Sa',
                'km'          => 'ចាន់ស ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171102',
                'en'          => 'Dam Daek',
                'km'          => 'ដំដែក ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171103',
                'en'          => 'Dan Run',
                'km'          => 'ដានរុន ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171104',
                'en'          => 'Kampong Khleang',
                'km'          => 'កំពង់ឃ្លាំង ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171105',
                'en'          => 'Kien Sangkae',
                'km'          => 'កៀនសង្កែ ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171106',
                'en'          => 'Khchas',
                'km'          => 'ខ្ចាស់ ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171107',
                'en'          => 'Khnar Pou',
                'km'          => 'ខ្នារពោធិ៍ ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171108',
                'en'          => 'Popel',
                'km'          => 'ពពេល ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171109',
                'en'          => 'Samraong',
                'km'          => 'សំរោង ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171110',
                'en'          => 'Ta Yaek',
                'km'          => 'តាយ៉ែក ',
                'district_id' => '1711'
            ],
            [
                'id'          => '171201',
                'en'          => 'Chrouy Neang Nguon',
                'km'          => 'ជ្រោយនាងងួន ',
                'district_id' => '1712'
            ],
            [
                'id'          => '171202',
                'en'          => 'Klang Hay',
                'km'          => 'ក្លាំងហាយ ',
                'district_id' => '1712'
            ],
            [
                'id'          => '171203',
                'en'          => 'Tram Sasar',
                'km'          => 'ត្រាំសសរ ',
                'district_id' => '1712'
            ],
            [
                'id'          => '171204',
                'en'          => 'Moung',
                'km'          => 'មោង ',
                'district_id' => '1712'
            ],
            [
                'id'          => '171205',
                'en'          => 'Prei',
                'km'          => 'ប្រីយ៍ ',
                'district_id' => '1712'
            ],
            [
                'id'          => '171206',
                'en'          => 'Slaeng Spean',
                'km'          => 'ស្លែងស្ពាន ',
                'district_id' => '1712'
            ],
            [
                'id'          => '171301',
                'en'          => 'Boeng Mealea',
                'km'          => 'បឹងមាលា ',
                'district_id' => '1713'
            ],
            [
                'id'          => '171302',
                'en'          => 'Kantuot',
                'km'          => 'កន្ទួត ',
                'district_id' => '1713'
            ],
            [
                'id'          => '171303',
                'en'          => 'Khnang Phnum',
                'km'          => 'ខ្នងភ្នំ ',
                'district_id' => '1713'
            ],
            [
                'id'          => '171304',
                'en'          => 'Svay Leu',
                'km'          => 'ស្វាយលើ ',
                'district_id' => '1713'
            ],
            [
                'id'          => '171305',
                'en'          => 'Ta Siem',
                'km'          => 'តាសៀម ',
                'district_id' => '1713'
            ],
            [
                'id'          => '171401',
                'en'          => 'Prasat',
                'km'          => 'ប្រាសាទ ',
                'district_id' => '1714'
            ],
            [
                'id'          => '171402',
                'en'          => 'Lvea Krang',
                'km'          => 'ល្វាក្រាំង ',
                'district_id' => '1714'
            ],
            [
                'id'          => '171403',
                'en'          => 'Srae Nouy',
                'km'          => 'ស្រែណូយ ',
                'district_id' => '1714'
            ],
            [
                'id'          => '171404',
                'en'          => 'Svay Sa',
                'km'          => 'ស្វាយស ',
                'district_id' => '1714'
            ],
            [
                'id'          => '171405',
                'en'          => 'Varin',
                'km'          => 'វ៉ារិន ',
                'district_id' => '1714'
            ],
            [
                'id'          => '180101',
                'en'          => 'lek Muoy',
                'km'          => 'លេខ១',
                'district_id' => '1801'
            ],
            [
                'id'          => '180102',
                'en'          => 'Pir',
                'km'          => 'លេខ២',
                'district_id' => '1801'
            ],
            [
                'id'          => '180103',
                'en'          => 'Bei',
                'km'          => 'លេខ៣',
                'district_id' => '1801'
            ],
            [
                'id'          => '180104',
                'en'          => 'Buon',
                'km'          => 'លេខ៤',
                'district_id' => '1801'
            ],
            [
                'id'          => '180105',
                'en'          => 'Kaoh Rung',
                'km'          => 'កោះរ៉ុង',
                'district_id' => '1801'
            ],
            [
                'id'          => '180201',
                'en'          => 'Andoung Thma',
                'km'          => 'អណ្តូងថ្ម',
                'district_id' => '1802'
            ],
            [
                'id'          => '180202',
                'en'          => 'Boeng Ta Prum',
                'km'          => 'បឹងតាព្រហ្ម',
                'district_id' => '1802'
            ],
            [
                'id'          => '180203',
                'en'          => 'Bet Trang',
                'km'          => 'បិតត្រាំង',
                'district_id' => '1802'
            ],
            [
                'id'          => '180204',
                'en'          => 'Cheung Kou',
                'km'          => 'ជើងគោ',
                'district_id' => '1802'
            ],
            [
                'id'          => '180205',
                'en'          => 'Ou Chrov',
                'km'          => 'អូរជ្រៅ',
                'district_id' => '1802'
            ],
            [
                'id'          => '180206',
                'en'          => 'Ou Oknha Heng',
                'km'          => 'អូរឧញ៉ាហេង',
                'district_id' => '1802'
            ],
            [
                'id'          => '180207',
                'en'          => 'Prey Nob',
                'km'          => 'ព្រៃនប់',
                'district_id' => '1802'
            ],
            [
                'id'          => '180208',
                'en'          => 'Ream',
                'km'          => 'រាម',
                'district_id' => '1802'
            ],
            [
                'id'          => '180209',
                'en'          => 'Sameakki',
                'km'          => 'សាមគ្គី',
                'district_id' => '1802'
            ],
            [
                'id'          => '180210',
                'en'          => 'Samrong',
                'km'          => 'សំរុង',
                'district_id' => '1802'
            ],
            [
                'id'          => '180211',
                'en'          => 'Tuek Lak',
                'km'          => 'ទឹកល្អក់',
                'district_id' => '1802'
            ],
            [
                'id'          => '180212',
                'en'          => 'Tuek Thla',
                'km'          => 'ទឹកថ្លា',
                'district_id' => '1802'
            ],
            [
                'id'          => '180213',
                'en'          => 'Tuol Totueng',
                'km'          => 'ទួលទទឹង',
                'district_id' => '1802'
            ],
            [
                'id'          => '180214',
                'en'          => 'Veal Renh',
                'km'          => 'វាលរេញ',
                'district_id' => '1802'
            ],
            [
                'id'          => '180301',
                'en'          => 'Kampenh',
                'km'          => 'កំពេញ',
                'district_id' => '1803'
            ],
            [
                'id'          => '180302',
                'en'          => 'Ou Treh',
                'km'          => 'អូរត្រេះ',
                'district_id' => '1803'
            ],
            [
                'id'          => '180303',
                'en'          => 'Tumnob Rolok',
                'km'          => 'ទំនប់រលក',
                'district_id' => '1803'
            ],
            [
                'id'          => '180304',
                'en'          => 'Kaev Phos',
                'km'          => 'កែវផុស',
                'district_id' => '1803'
            ],
            [
                'id'          => '180401',
                'en'          => 'Chamkar Luong',
                'km'          => 'ចំការហ្លួង',
                'district_id' => '1804'
            ],
            [
                'id'          => '180402',
                'en'          => 'Kampong Seila',
                'km'          => 'កំពង់សីហា',
                'district_id' => '1804'
            ],
            [
                'id'          => '180403',
                'en'          => 'Ou Bak Roteh',
                'km'          => 'អូរបាក់រទេះ',
                'district_id' => '1804'
            ],
            [
                'id'          => '180404',
                'en'          => 'Stueng Chhay',
                'km'          => 'ស្ទឹងឆាយ',
                'district_id' => '1804'
            ],
            [
                'id'          => '190101',
                'en'          => 'Kamphun',
                'km'          => 'កុំភុន',
                'district_id' => '1901'
            ],
            [
                'id'          => '190102',
                'en'          => 'Kbal Romeas',
                'km'          => 'ក្បាលរមាស',
                'district_id' => '1901'
            ],
            [
                'id'          => '190103',
                'en'          => 'Phluk',
                'km'          => 'ភ្លុក',
                'district_id' => '1901'
            ],
            [
                'id'          => '190104',
                'en'          => 'Samkhuoy',
                'km'          => 'សាមឃួយ',
                'district_id' => '1901'
            ],
            [
                'id'          => '190105',
                'en'          => 'Sdau',
                'km'          => 'ស្តៅ',
                'district_id' => '1901'
            ],
            [
                'id'          => '190106',
                'en'          => 'Srae Kor',
                'km'          => 'ស្រែគរ',
                'district_id' => '1901'
            ],
            [
                'id'          => '190107',
                'en'          => 'Ta Lat',
                'km'          => 'តាឡាត',
                'district_id' => '1901'
            ],
            [
                'id'          => '190201',
                'en'          => 'Kaoh Preah',
                'km'          => 'កោះព្រះ',
                'district_id' => '1902'
            ],
            [
                'id'          => '190202',
                'en'          => 'Kaoh Sampeay',
                'km'          => 'កោះសំពាយ',
                'district_id' => '1902'
            ],
            [
                'id'          => '190203',
                'en'          => 'Kaoh Sralay',
                'km'          => 'កោះស្រឡាយ',
                'district_id' => '1902'
            ],
            [
                'id'          => '190204',
                'en'          => 'Ou Mreah',
                'km'          => 'អូរម្រេះ',
                'district_id' => '1902'
            ],
            [
                'id'          => '190205',
                'en'          => 'Ou Ruessei Kandal',
                'km'          => 'អូរឬស្សីកណ្តាល',
                'district_id' => '1902'
            ],
            [
                'id'          => '190206',
                'en'          => 'Siem Bouk',
                'km'          => 'សៀមបូក',
                'district_id' => '1902'
            ],
            [
                'id'          => '190207',
                'en'          => 'Srae Krasang',
                'km'          => 'ស្រែក្រសាំង',
                'district_id' => '1902'
            ],
            [
                'id'          => '190301',
                'en'          => 'Preaek Meas',
                'km'          => 'ព្រែកមាស',
                'district_id' => '1903'
            ],
            [
                'id'          => '190302',
                'en'          => 'Sekong',
                'km'          => 'សេកុង',
                'district_id' => '1903'
            ],
            [
                'id'          => '190303',
                'en'          => 'Santepheap',
                'km'          => 'សន្តិភាព',
                'district_id' => '1903'
            ],
            [
                'id'          => '190304',
                'en'          => 'Srae Sambour',
                'km'          => 'ស្រែសំបូរ',
                'district_id' => '1903'
            ],
            [
                'id'          => '190305',
                'en'          => 'Tma Kaev',
                'km'          => 'ថ្មកែវ',
                'district_id' => '1903'
            ],
            [
                'id'          => '190401',
                'en'          => 'Stueng Traeng',
                'km'          => 'ស្ទឹងត្រែង',
                'district_id' => '1904'
            ],
            [
                'id'          => '190402',
                'en'          => 'Srah Ruessei',
                'km'          => 'ស្រះឬស្សី',
                'district_id' => '1904'
            ],
            [
                'id'          => '190403',
                'en'          => 'Preah Bat',
                'km'          => 'ព្រះបាទ',
                'district_id' => '1904'
            ],
            [
                'id'          => '190404',
                'en'          => 'Sameakki',
                'km'          => 'សាមគ្គី',
                'district_id' => '1904'
            ],
            [
                'id'          => '190501',
                'en'          => 'Anlong Phe',
                'km'          => 'អន្លង់ភេ',
                'district_id' => '1905'
            ],
            [
                'id'          => '190502',
                'en'          => 'Chamkar Leu',
                'km'          => 'ចំការលើ',
                'district_id' => '1905'
            ],
            [
                'id'          => '190503',
                'en'          => 'Kang Cham',
                'km'          => 'កាំងចាម',
                'district_id' => '1905'
            ],
            [
                'id'          => '190504',
                'en'          => 'Kaoh Snaeng',
                'km'          => 'កោះស្នែង',
                'district_id' => '1905'
            ],
            [
                'id'          => '190505',
                'en'          => 'Anlong Chrey',
                'km'          => 'អន្លង់ជ្រៃ',
                'district_id' => '1905'
            ],
            [
                'id'          => '190506',
                'en'          => 'Ou Rai',
                'km'          => 'អូររៃ',
                'district_id' => '1905'
            ],
            [
                'id'          => '190507',
                'en'          => 'Ou Svay',
                'km'          => 'អូរស្វាយ',
                'district_id' => '1905'
            ],
            [
                'id'          => '190508',
                'en'          => 'Preah Rumkel',
                'km'          => 'ព្រះរំកិល',
                'district_id' => '1905'
            ],
            [
                'id'          => '190509',
                'en'          => 'Sam Ang',
                'km'          => 'សំអាង',
                'district_id' => '1905'
            ],
            [
                'id'          => '190510',
                'en'          => 'Srae Ruessei',
                'km'          => 'ស្រែឬស្សី',
                'district_id' => '1905'
            ],
            [
                'id'          => '190511',
                'en'          => 'Thala Barivat',
                'km'          => 'ថាឡាបរិវ៉ាត់',
                'district_id' => '1905'
            ],
            [
                'id'          => '200103',
                'en'          => 'Chantrea',
                'km'          => 'ចន្ទ្រា',
                'district_id' => '2001'
            ],
            [
                'id'          => '200104',
                'en'          => 'Chres',
                'km'          => 'ច្រេស',
                'district_id' => '2001'
            ],
            [
                'id'          => '200105',
                'en'          => 'Me Sar Thngak',
                'km'          => 'មេសរថ្ងក',
                'district_id' => '2001'
            ],
            [
                'id'          => '200108',
                'en'          => 'Prey Kokir',
                'km'          => 'ព្រៃគគីរ',
                'district_id' => '2001'
            ],
            [
                'id'          => '200109',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '2001'
            ],
            [
                'id'          => '200110',
                'en'          => 'Tuol Sdei',
                'km'          => 'ទូលស្តី',
                'district_id' => '2001'
            ],
            [
                'id'          => '200201',
                'en'          => 'Banteay Krang',
                'km'          => 'បន្ទាយក្រាំង',
                'district_id' => '2002'
            ],
            [
                'id'          => '200202',
                'en'          => 'Nhor',
                'km'          => 'ញរ',
                'district_id' => '2002'
            ],
            [
                'id'          => '200203',
                'en'          => 'Khsaetr',
                'km'          => 'ខ្សែត្រ',
                'district_id' => '2002'
            ],
            [
                'id'          => '200204',
                'en'          => 'Preah Ponlea',
                'km'          => 'ព្រះពន្លា',
                'district_id' => '2002'
            ],
            [
                'id'          => '200205',
                'en'          => 'Prey Thum',
                'km'          => 'ព្រះធំ',
                'district_id' => '2002'
            ],
            [
                'id'          => '200206',
                'en'          => 'Reach Montir',
                'km'          => 'រាជមន្ទីរ',
                'district_id' => '2002'
            ],
            [
                'id'          => '200207',
                'en'          => 'Samlei',
                'km'          => 'សំឡី',
                'district_id' => '2002'
            ],
            [
                'id'          => '200208',
                'en'          => 'Samyaong',
                'km'          => 'សំយ៉ោង',
                'district_id' => '2002'
            ],
            [
                'id'          => '200209',
                'en'          => 'Svay Ta Yean',
                'km'          => 'ស្វាយតាយាន',
                'district_id' => '2002'
            ],
            [
                'id'          => '200211',
                'en'          => 'Thmei',
                'km'          => 'ថ្មី',
                'district_id' => '2002'
            ],
            [
                'id'          => '200212',
                'en'          => 'Tnaot',
                'km'          => 'ត្នោត',
                'district_id' => '2002'
            ],
            [
                'id'          => '200301',
                'en'          => 'Bos Mon',
                'km'          => 'បុសមន',
                'district_id' => '2003'
            ],
            [
                'id'          => '200302',
                'en'          => 'Thmea',
                'km'          => 'ធ្មា',
                'district_id' => '2003'
            ],
            [
                'id'          => '200303',
                'en'          => 'Kampong Chak',
                'km'          => 'កំពង់ចក',
                'district_id' => '2003'
            ],
            [
                'id'          => '200304',
                'en'          => 'Chrung Popel',
                'km'          => 'ជ្រុងពពេល',
                'district_id' => '2003'
            ],
            [
                'id'          => '200305',
                'en'          => 'Kampong Ampil',
                'km'          => 'កំពង់អំពិល',
                'district_id' => '2003'
            ],
            [
                'id'          => '200306',
                'en'          => 'Meun Chey',
                'km'          => 'មានជ័យ',
                'district_id' => '2003'
            ],
            [
                'id'          => '200307',
                'en'          => 'Pong Tuek',
                'km'          => 'ពងទឹក',
                'district_id' => '2003'
            ],
            [
                'id'          => '200308',
                'en'          => 'Sangkae',
                'km'          => 'សង្កែ',
                'district_id' => '2003'
            ],
            [
                'id'          => '200309',
                'en'          => 'Svay Chek',
                'km'          => 'ស្វាយចេក',
                'district_id' => '2003'
            ],
            [
                'id'          => '200310',
                'en'          => 'Thna Thnong',
                'km'          => 'ថ្នាធ្នង់',
                'district_id' => '2003'
            ],
            [
                'id'          => '200401',
                'en'          => 'Ampil',
                'km'          => 'អំពិល',
                'district_id' => '2004'
            ],
            [
                'id'          => '200402',
                'en'          => 'Andoung Pou',
                'km'          => 'អណ្តូងពោធិ៍',
                'district_id' => '2004'
            ],
            [
                'id'          => '200403',
                'en'          => 'Andoung Trabaek',
                'km'          => 'អណ្តូងត្របែក',
                'district_id' => '2004'
            ],
            [
                'id'          => '200404',
                'en'          => 'Angk Prasrae',
                'km'          => 'អង្គប្រស្រែ',
                'district_id' => '2004'
            ],
            [
                'id'          => '200405',
                'en'          => 'Chantrei',
                'km'          => 'ចន្ទ្រី',
                'district_id' => '2004'
            ],
            [
                'id'          => '200406',
                'en'          => 'Chrey Thum',
                'km'          => 'ជ្រៃធំ',
                'district_id' => '2004'
            ],
            [
                'id'          => '200407',
                'en'          => 'Doung',
                'km'          => 'ដូង',
                'district_id' => '2004'
            ],
            [
                'id'          => '200408',
                'en'          => 'Kampong Trach',
                'km'          => 'កំពង់ត្រាច',
                'district_id' => '2004'
            ],
            [
                'id'          => '200409',
                'en'          => 'Kokir',
                'km'          => 'គគីរ',
                'district_id' => '2004'
            ],
            [
                'id'          => '200410',
                'en'          => 'Krasang',
                'km'          => 'ក្រសាំង',
                'district_id' => '2004'
            ],
            [
                'id'          => '200411',
                'en'          => 'Mukh Da',
                'km'          => 'មុខដា',
                'district_id' => '2004'
            ],
            [
                'id'          => '200412',
                'en'          => 'Mream',
                'km'          => 'ម្រាម',
                'district_id' => '2004'
            ],
            [
                'id'          => '200413',
                'en'          => 'Sambuor',
                'km'          => 'សំបួរ',
                'district_id' => '2004'
            ],
            [
                'id'          => '200414',
                'en'          => 'Sambatt Mean Chey',
                'km'          => 'សម្បត្តិមានជ័យ',
                'district_id' => '2004'
            ],
            [
                'id'          => '200415',
                'en'          => 'Trapeang Sdau',
                'km'          => 'ត្រពាំងស្តៅ',
                'district_id' => '2004'
            ],
            [
                'id'          => '200416',
                'en'          => 'Tras',
                'km'          => 'ត្រស់',
                'district_id' => '2004'
            ],
            [
                'id'          => '200501',
                'en'          => 'Angk Ta Sou',
                'km'          => 'អង្គតាសូ',
                'district_id' => '2005'
            ],
            [
                'id'          => '200502',
                'en'          => 'Basak',
                'km'          => 'បាសាក់',
                'district_id' => '2005'
            ],
            [
                'id'          => '200503',
                'en'          => 'Chambak',
                'km'          => 'ចំបក់',
                'district_id' => '2005'
            ],
            [
                'id'          => '200504',
                'en'          => 'Kampong Chamlang',
                'km'          => 'កំពង់ចំឡង',
                'district_id' => '2005'
            ],
            [
                'id'          => '200505',
                'en'          => 'Ta Suos',
                'km'          => 'តាសួស',
                'district_id' => '2005'
            ],
            [
                'id'          => '200507',
                'en'          => 'Chheu Teal',
                'km'          => 'ឈើទាល',
                'district_id' => '2005'
            ],
            [
                'id'          => '200508',
                'en'          => 'Doun Sa',
                'km'          => 'ដូនស',
                'district_id' => '2005'
            ],
            [
                'id'          => '200509',
                'en'          => 'Kouk Pring',
                'km'          => 'គោកព្រីង',
                'district_id' => '2005'
            ],
            [
                'id'          => '200510',
                'en'          => 'Kraol Kou',
                'km'          => 'ក្រោលគោ',
                'district_id' => '2005'
            ],
            [
                'id'          => '200511',
                'en'          => 'Kruos',
                'km'          => 'គ្រួស',
                'district_id' => '2005'
            ],
            [
                'id'          => '200512',
                'en'          => 'Pouthi Reach',
                'km'          => 'ពោធិរាជ',
                'district_id' => '2005'
            ],
            [
                'id'          => '200513',
                'en'          => 'Svay Angk',
                'km'          => 'ស្វាយអង្គ',
                'district_id' => '2005'
            ],
            [
                'id'          => '200514',
                'en'          => 'Svay Chrum',
                'km'          => 'ស្វាយជ្រំ',
                'district_id' => '2005'
            ],
            [
                'id'          => '200515',
                'en'          => 'Svay Thum',
                'km'          => 'ស្វាយធំ',
                'district_id' => '2005'
            ],
            [
                'id'          => '200516',
                'en'          => 'Svay Yea',
                'km'          => 'ស្វាយយា',
                'district_id' => '2005'
            ],
            [
                'id'          => '200517',
                'en'          => 'Thlok',
                'km'          => 'ធ្លក',
                'district_id' => '2005'
            ],
            [
                'id'          => '200601',
                'en'          => 'Svay Rieng',
                'km'          => 'ស្វាយរៀង',
                'district_id' => '2006'
            ],
            [
                'id'          => '200602',
                'en'          => 'Prey Chhlak',
                'km'          => 'ព្រៃឆ្លាក់',
                'district_id' => '2006'
            ],
            [
                'id'          => '200603',
                'en'          => 'Koy Trabaek',
                'km'          => 'គយត្របែក',
                'district_id' => '2006'
            ],
            [
                'id'          => '200604',
                'en'          => 'Pou Ta Hao',
                'km'          => 'ពោធិ៍តាហោ',
                'district_id' => '2006'
            ],
            [
                'id'          => '200605',
                'en'          => 'Chek',
                'km'          => 'ចេក',
                'district_id' => '2006'
            ],
            [
                'id'          => '200606',
                'en'          => 'Svay Toea',
                'km'          => 'ស្វាយតឿ',
                'district_id' => '2006'
            ],
            [
                'id'          => '200607',
                'en'          => 'Sangkhoar',
                'km'          => 'សង្ឃ័រ',
                'district_id' => '2006'
            ],
            [
                'id'          => '200702',
                'en'          => 'Koki Saom',
                'km'          => 'គគីរសោម',
                'district_id' => '2007'
            ],
            [
                'id'          => '200703',
                'en'          => 'Kandieng Reay',
                'km'          => 'កណ្តៀងរាយ',
                'district_id' => '2007'
            ],
            [
                'id'          => '200704',
                'en'          => 'Monourom',
                'km'          => 'មនោរម្យ',
                'district_id' => '2007'
            ],
            [
                'id'          => '200705',
                'en'          => 'Popeaet',
                'km'          => 'ពពែត',
                'district_id' => '2007'
            ],
            [
                'id'          => '200706',
                'en'          => 'Prey Ta Ei',
                'km'          => 'ព្រៃតាអី',
                'district_id' => '2007'
            ],
            [
                'id'          => '200707',
                'en'          => 'Prasoutr',
                'km'          => 'ប្រសូត្រ',
                'district_id' => '2007'
            ],
            [
                'id'          => '200708',
                'en'          => 'Romeang Thkaol',
                'km'          => 'រមាំងថ្កោល',
                'district_id' => '2007'
            ],
            [
                'id'          => '200709',
                'en'          => 'Sambuor',
                'km'          => 'សំបួរ',
                'district_id' => '2007'
            ],
            [
                'id'          => '200711',
                'en'          => 'Svay Rumpear',
                'km'          => 'ស្វាយរំពារ',
                'district_id' => '2007'
            ],
            [
                'id'          => '200801',
                'en'          => 'Bati',
                'km'          => 'បាទី',
                'district_id' => '2008'
            ],
            [
                'id'          => '200802',
                'en'          => 'Bavet',
                'km'          => 'បាវិត',
                'district_id' => '2008'
            ],
            [
                'id'          => '200803',
                'en'          => 'Chrak Mtes',
                'km'          => 'ច្រកម្ទេស',
                'district_id' => '2008'
            ],
            [
                'id'          => '200804',
                'en'          => 'Prasat',
                'km'          => 'ប្រសាទ',
                'district_id' => '2008'
            ],
            [
                'id'          => '200805',
                'en'          => 'Prey Angkunh',
                'km'          => 'ព្រៃអង្គញ់',
                'district_id' => '2008'
            ],
            [
                'id'          => '210101',
                'en'          => 'Angkor Borei',
                'km'          => 'អង្គរបុរី',
                'district_id' => '2101'
            ],
            [
                'id'          => '210102',
                'en'          => 'Ba Srae',
                'km'          => 'បាស្រែ',
                'district_id' => '2101'
            ],
            [
                'id'          => '210103',
                'en'          => 'Kouk Thlok',
                'km'          => 'គោកធ្លក',
                'district_id' => '2101'
            ],
            [
                'id'          => '210104',
                'en'          => 'Ponley',
                'km'          => 'ពន្លៃ',
                'district_id' => '2101'
            ],
            [
                'id'          => '210105',
                'en'          => 'Preaek Phtoul',
                'km'          => 'ព្រែកផ្ទោល',
                'district_id' => '2101'
            ],
            [
                'id'          => '210106',
                'en'          => 'Prey Phkoam',
                'km'          => 'ព្រៃផ្គាំ',
                'district_id' => '2101'
            ],
            [
                'id'          => '210201',
                'en'          => 'Chambak',
                'km'          => 'ចំបក់',
                'district_id' => '2102'
            ],
            [
                'id'          => '210202',
                'en'          => 'Champei',
                'km'          => 'ចំប៉ី',
                'district_id' => '2102'
            ],
            [
                'id'          => '210203',
                'en'          => 'Doung',
                'km'          => 'ដូង',
                'district_id' => '2102'
            ],
            [
                'id'          => '210204',
                'en'          => 'Kandoeng',
                'km'          => 'កណ្តឹង',
                'district_id' => '2102'
            ],
            [
                'id'          => '210205',
                'en'          => 'Komar Reachea',
                'km'          => 'កុមាររាជា',
                'district_id' => '2102'
            ],
            [
                'id'          => '210206',
                'en'          => 'Krang Leav',
                'km'          => 'ក្រាំងលាវ',
                'district_id' => '2102'
            ],
            [
                'id'          => '210207',
                'en'          => 'Krang Thnong',
                'km'          => 'ក្រាំងធ្នង់',
                'district_id' => '2102'
            ],
            [
                'id'          => '210208',
                'en'          => 'Lumpong',
                'km'          => 'លំពង់',
                'district_id' => '2102'
            ],
            [
                'id'          => '210209',
                'en'          => 'Pea Ream',
                'km'          => 'ពារាម',
                'district_id' => '2102'
            ],
            [
                'id'          => '210210',
                'en'          => 'Pot Sar',
                'km'          => 'ពត់សរ',
                'district_id' => '2102'
            ],
            [
                'id'          => '210211',
                'en'          => 'Sour Phi',
                'km'          => 'សូរភី',
                'district_id' => '2102'
            ],
            [
                'id'          => '210212',
                'en'          => 'Tang Doung',
                'km'          => 'តាំងដូង',
                'district_id' => '2102'
            ],
            [
                'id'          => '210213',
                'en'          => 'Tnaot',
                'km'          => 'ត្នោត',
                'district_id' => '2102'
            ],
            [
                'id'          => '210214',
                'en'          => 'Trapeang Krasang',
                'km'          => 'ត្រពាំងក្រសាំង',
                'district_id' => '2102'
            ],
            [
                'id'          => '210215',
                'en'          => 'Trapeang Sab',
                'km'          => 'ត្រពាំងសាប',
                'district_id' => '2102'
            ],
            [
                'id'          => '210301',
                'en'          => 'Borei Cholsar',
                'km'          => 'បូរីជលសារ',
                'district_id' => '2103'
            ],
            [
                'id'          => '210302',
                'en'          => 'Chey Chouk',
                'km'          => 'ជ័យជោគ',
                'district_id' => '2103'
            ],
            [
                'id'          => '210303',
                'en'          => 'Doung Khpos',
                'km'          => 'ដូងខ្ពស់',
                'district_id' => '2103'
            ],
            [
                'id'          => '210304',
                'en'          => 'Kampong Krasang',
                'km'          => 'កំពង់ក្រសាំង',
                'district_id' => '2103'
            ],
            [
                'id'          => '210305',
                'en'          => 'Kouk Pou',
                'km'          => 'គោកពោធិ៍',
                'district_id' => '2103'
            ],
            [
                'id'          => '210401',
                'en'          => 'Angk Prasat',
                'km'          => 'អង្គប្រសាទ',
                'district_id' => '2104'
            ],
            [
                'id'          => '210402',
                'en'          => 'Preah Bat Choan Chum',
                'km'          => 'ព្រះបាទជាន់ជុំ',
                'district_id' => '2104'
            ],
            [
                'id'          => '210403',
                'en'          => 'Kamnab',
                'km'          => 'កំណប់',
                'district_id' => '2104'
            ],
            [
                'id'          => '210404',
                'en'          => 'Kampeaeng',
                'km'          => 'កំពែង',
                'district_id' => '2104'
            ],
            [
                'id'          => '210405',
                'en'          => 'Kiri Chong Kaoh',
                'km'          => 'គិរីចុងកោះ',
                'district_id' => '2104'
            ],
            [
                'id'          => '210406',
                'en'          => 'Kouk Prech',
                'km'          => 'គោកព្រេច',
                'district_id' => '2104'
            ],
            [
                'id'          => '210407',
                'en'          => 'Phnum Den',
                'km'          => 'ភ្នំដិន',
                'district_id' => '2104'
            ],
            [
                'id'          => '210408',
                'en'          => 'Prey Ampok',
                'km'          => 'ព្រៃអំពក',
                'district_id' => '2104'
            ],
            [
                'id'          => '210409',
                'en'          => 'Prey Rumdeng',
                'km'          => 'ព្រៃរំដេង',
                'district_id' => '2104'
            ],
            [
                'id'          => '210410',
                'en'          => 'Ream Andaeuk',
                'km'          => 'រាមអណ្តើក',
                'district_id' => '2104'
            ],
            [
                'id'          => '210411',
                'en'          => 'Saom',
                'km'          => 'សោម',
                'district_id' => '2104'
            ],
            [
                'id'          => '210412',
                'en'          => 'Ta Ou',
                'km'          => 'តាអូរ',
                'district_id' => '2104'
            ],
            [
                'id'          => '210501',
                'en'          => 'Krapum Chhuk',
                'km'          => 'ក្រពុំឈូក',
                'district_id' => '2105'
            ],
            [
                'id'          => '210502',
                'en'          => 'Pech Sar',
                'km'          => 'ពេជសារ',
                'district_id' => '2105'
            ],
            [
                'id'          => '210503',
                'en'          => 'Prey Khla',
                'km'          => 'ព្រៃខ្លា',
                'district_id' => '2105'
            ],
            [
                'id'          => '210504',
                'en'          => 'Prey Yuthka',
                'km'          => 'ព្រៃយុថ្កា',
                'district_id' => '2105'
            ],
            [
                'id'          => '210505',
                'en'          => 'Romenh',
                'km'          => 'រមេញ',
                'district_id' => '2105'
            ],
            [
                'id'          => '210506',
                'en'          => 'Thlea Prachum',
                'km'          => 'ធ្លាប្រជុំ',
                'district_id' => '2105'
            ],
            [
                'id'          => '210601',
                'en'          => 'Angkanh',
                'km'          => 'អង្កាញ់',
                'district_id' => '2106'
            ],
            [
                'id'          => '210602',
                'en'          => 'Ban Kam',
                'km'          => 'បានកាម',
                'district_id' => '2106'
            ],
            [
                'id'          => '210603',
                'en'          => 'Champa',
                'km'          => 'ចំប៉ា',
                'district_id' => '2106'
            ],
            [
                'id'          => '210604',
                'en'          => 'Char',
                'km'          => 'ចារ',
                'district_id' => '2106'
            ],
            [
                'id'          => '210605',
                'en'          => 'Kampeaeng',
                'km'          => 'កំពែង',
                'district_id' => '2106'
            ],
            [
                'id'          => '210606',
                'en'          => 'Kampong Reab',
                'km'          => 'កំពង់រាប',
                'district_id' => '2106'
            ],
            [
                'id'          => '210607',
                'en'          => 'Kdanh',
                'km'          => 'ក្តាញ់',
                'district_id' => '2106'
            ],
            [
                'id'          => '210608',
                'en'          => 'Pou Rumchak',
                'km'          => 'ពោធិ៍រំបាក',
                'district_id' => '2106'
            ],
            [
                'id'          => '210609',
                'en'          => 'Prey Kabbas',
                'km'          => 'ព្រៃកប្បាស',
                'district_id' => '2106'
            ],
            [
                'id'          => '210610',
                'en'          => 'Prey Lvea',
                'km'          => 'ព្រៃល្វា',
                'district_id' => '2106'
            ],
            [
                'id'          => '210611',
                'en'          => 'Prey Phdau',
                'km'          => 'ព្រៃផ្តៅ',
                'district_id' => '2106'
            ],
            [
                'id'          => '210612',
                'en'          => 'Snao',
                'km'          => 'ស្នោ',
                'district_id' => '2106'
            ],
            [
                'id'          => '210613',
                'en'          => 'Tang Yab',
                'km'          => 'តាំងយ៉ាប',
                'district_id' => '2106'
            ],
            [
                'id'          => '210701',
                'en'          => 'Boeng Tranh Khang Cheung',
                'km'          => 'បឹងត្រាញ់ខាងជើង',
                'district_id' => '2107'
            ],
            [
                'id'          => '210702',
                'en'          => 'Boeng Tranh Khang Tboung',
                'km'          => 'បឹងត្រាញ់ខាងត្បូង',
                'district_id' => '2107'
            ],
            [
                'id'          => '210703',
                'en'          => 'Cheung Kuon',
                'km'          => 'ជើងគួន',
                'district_id' => '2107'
            ],
            [
                'id'          => '210704',
                'en'          => 'Chumreah Pen',
                'km'          => 'ជំរះពេន',
                'district_id' => '2107'
            ],
            [
                'id'          => '210705',
                'en'          => 'Khvav',
                'km'          => 'ខ្វាវ',
                'district_id' => '2107'
            ],
            [
                'id'          => '210706',
                'en'          => 'Lumchang',
                'km'          => 'លំចង់',
                'district_id' => '2107'
            ],
            [
                'id'          => '210707',
                'en'          => 'Rovieng',
                'km'          => 'រវៀង',
                'district_id' => '2107'
            ],
            [
                'id'          => '210708',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '2107'
            ],
            [
                'id'          => '210709',
                'en'          => 'Soengh',
                'km'          => 'សឹង្ហ',
                'district_id' => '2107'
            ],
            [
                'id'          => '210710',
                'en'          => 'Sla',
                'km'          => 'ស្លា',
                'district_id' => '2107'
            ],
            [
                'id'          => '210711',
                'en'          => 'Trea',
                'km'          => 'ទ្រា',
                'district_id' => '2107'
            ],
            [
                'id'          => '210801',
                'en'          => 'Baray',
                'km'          => 'បារាយណ៍',
                'district_id' => '2108'
            ],
            [
                'id'          => '210802',
                'en'          => 'Roka Knong',
                'km'          => 'រកាក្នុង',
                'district_id' => '2108'
            ],
            [
                'id'          => '210803',
                'en'          => 'Roka Krau',
                'km'          => 'រកាក្រៅ',
                'district_id' => '2108'
            ],
            [
                'id'          => '210901',
                'en'          => 'Angk Ta Saom',
                'km'          => 'អង្គតាសោម',
                'district_id' => '2109'
            ],
            [
                'id'          => '210902',
                'en'          => 'Cheang Tong',
                'km'          => 'ជាងទង',
                'district_id' => '2109'
            ],
            [
                'id'          => '210903',
                'en'          => 'Kus',
                'km'          => 'គុស',
                'district_id' => '2109'
            ],
            [
                'id'          => '210904',
                'en'          => 'Leay Bour',
                'km'          => 'លាយបូរ',
                'district_id' => '2109'
            ],
            [
                'id'          => '210905',
                'en'          => 'Nhaeng Nhang',
                'km'          => 'ញ៉ែងញ៉ង',
                'district_id' => '2109'
            ],
            [
                'id'          => '210906',
                'en'          => 'Ou Saray',
                'km'          => 'អូរសារាយ',
                'district_id' => '2109'
            ],
            [
                'id'          => '210907',
                'en'          => 'Trapeang Kranhoung',
                'km'          => 'ត្រពាំងក្រញ៉ូង',
                'district_id' => '2109'
            ],
            [
                'id'          => '210908',
                'en'          => 'Otdam Soriya',
                'km'          => 'ឧត្តមសុរិយា',
                'district_id' => '2109'
            ],
            [
                'id'          => '210909',
                'en'          => 'Popel',
                'km'          => 'ពពេល',
                'district_id' => '2109'
            ],
            [
                'id'          => '210910',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '2109'
            ],
            [
                'id'          => '210911',
                'en'          => 'Srae Ronoung',
                'km'          => 'ស្រែរនោង',
                'district_id' => '2109'
            ],
            [
                'id'          => '210912',
                'en'          => 'Ta Phem',
                'km'          => 'តាភេម',
                'district_id' => '2109'
            ],
            [
                'id'          => '210913',
                'en'          => 'Tram Kak',
                'km'          => 'ត្រាំកក់',
                'district_id' => '2109'
            ],
            [
                'id'          => '210914',
                'en'          => 'Trapeang Thum Khang Cheung',
                'km'          => 'ត្រពាំងធំខាងជើង',
                'district_id' => '2109'
            ],
            [
                'id'          => '210915',
                'en'          => 'Trapeang Thum Khang Tboung',
                'km'          => 'ត្រពាំងធំខាងត្បូង',
                'district_id' => '2109'
            ],
            [
                'id'          => '211001',
                'en'          => 'Angkanh',
                'km'          => 'អង្កាញ់',
                'district_id' => '2110'
            ],
            [
                'id'          => '211002',
                'en'          => 'Angk Khnor',
                'km'          => 'អង្គខ្នុរ',
                'district_id' => '2110'
            ],
            [
                'id'          => '211003',
                'en'          => 'Chi Khma',
                'km'          => 'ជីខ្មា',
                'district_id' => '2110'
            ],
            [
                'id'          => '211004',
                'en'          => 'Khvav',
                'km'          => 'ខ្វាវ',
                'district_id' => '2110'
            ],
            [
                'id'          => '211005',
                'en'          => 'Prambei Mum',
                'km'          => 'ប្រាំបីមុំ',
                'district_id' => '2110'
            ],
            [
                'id'          => '211006',
                'en'          => 'Angk Kaev',
                'km'          => 'អង្គកែវ',
                'district_id' => '2110'
            ],
            [
                'id'          => '211007',
                'en'          => 'Prey Sloek',
                'km'          => 'ព្រៃស្លឹក',
                'district_id' => '2110'
            ],
            [
                'id'          => '211008',
                'en'          => 'Roneam',
                'km'          => 'រនាម',
                'district_id' => '2110'
            ],
            [
                'id'          => '211009',
                'en'          => 'Sambuor',
                'km'          => 'សំបួរ',
                'district_id' => '2110'
            ],
            [
                'id'          => '211010',
                'en'          => 'Sanlung',
                'km'          => 'សន្លុង',
                'district_id' => '2110'
            ],
            [
                'id'          => '211011',
                'en'          => 'Smaong',
                'km'          => 'ស្មោង',
                'district_id' => '2110'
            ],
            [
                'id'          => '211012',
                'en'          => 'Srangae',
                'km'          => 'ស្រង៉ែ',
                'district_id' => '2110'
            ],
            [
                'id'          => '211013',
                'en'          => 'Thlok',
                'km'          => 'ធ្លក',
                'district_id' => '2110'
            ],
            [
                'id'          => '211014',
                'en'          => 'Tralach',
                'km'          => 'ត្រឡាច',
                'district_id' => '2110'
            ],
            [
                'id'          => '220101',
                'en'          => 'Anlong Veaeng',
                'km'          => 'អន្លង់វែង',
                'district_id' => '2201'
            ],
            [
                'id'          => '220103',
                'en'          => 'Trapeang Tav',
                'km'          => 'ត្រពាំងតាវ',
                'district_id' => '2201'
            ],
            [
                'id'          => '220104',
                'en'          => 'Trapeang Prei',
                'km'          => 'ត្រពាំងប្រីយ៍',
                'district_id' => '2201'
            ],
            [
                'id'          => '220105',
                'en'          => 'Thlat',
                'km'          => 'ផ្លាត',
                'district_id' => '2201'
            ],
            [
                'id'          => '220106',
                'en'          => 'Lumtong',
                'km'          => 'លំទង',
                'district_id' => '2201'
            ],
            [
                'id'          => '220201',
                'en'          => 'Ampil',
                'km'          => 'អំពិល',
                'district_id' => '2202'
            ],
            [
                'id'          => '220202',
                'en'          => 'Beng',
                'km'          => 'បេង',
                'district_id' => '2202'
            ],
            [
                'id'          => '220203',
                'en'          => 'Kouk Khpos',
                'km'          => 'គោកខ្ពស់',
                'district_id' => '2202'
            ],
            [
                'id'          => '220204',
                'en'          => 'Kouk Mon',
                'km'          => 'គោកមន',
                'district_id' => '2202'
            ],
            [
                'id'          => '220301',
                'en'          => 'Cheung Tien',
                'km'          => 'ជើងទៀន',
                'district_id' => '2203'
            ],
            [
                'id'          => '220302',
                'en'          => 'Chong Kal',
                'km'          => 'ចុងកាល់',
                'district_id' => '2203'
            ],
            [
                'id'          => '220303',
                'en'          => 'Krasang',
                'km'          => 'ក្រសាំង',
                'district_id' => '2203'
            ],
            [
                'id'          => '220304',
                'en'          => 'Pongro',
                'km'          => 'ពង្រ',
                'district_id' => '2203'
            ],
            [
                'id'          => '220401',
                'en'          => 'Bansay Reak',
                'km'          => 'បន្ទាយរាក់',
                'district_id' => '2204'
            ],
            [
                'id'          => '220402',
                'en'          => 'Bos Sbov',
                'km'          => 'បុស្បូវ',
                'district_id' => '2204'
            ],
            [
                'id'          => '220403',
                'en'          => 'Koun Kriel',
                'km'          => 'កូនគ្រៀល',
                'district_id' => '2204'
            ],
            [
                'id'          => '220404',
                'en'          => 'Samraong',
                'km'          => 'សំរោង',
                'district_id' => '2204'
            ],
            [
                'id'          => '220405',
                'en'          => 'Ou Smach',
                'km'          => 'អូរស្មាច់',
                'district_id' => '2204'
            ],
            [
                'id'          => '220501',
                'en'          => 'Bak Anloung',
                'km'          => 'បាក់អន្លូង',
                'district_id' => '2205'
            ],
            [
                'id'          => '220502',
                'en'          => 'Phav',
                'km'          => 'ផ្អាវ',
                'district_id' => '2205'
            ],
            [
                'id'          => '220503',
                'en'          => 'Ou Svay',
                'km'          => 'អូរស្វាយ',
                'district_id' => '2205'
            ],
            [
                'id'          => '220504',
                'en'          => 'Preah Pralay',
                'km'          => 'ព្រះប្រឡាយ',
                'district_id' => '2205'
            ],
            [
                'id'          => '220505',
                'en'          => 'Tumnob Dach',
                'km'          => 'ទំនប់ដាច់',
                'district_id' => '2205'
            ],
            [
                'id'          => '220506',
                'en'          => 'Trapeang Prasat',
                'km'          => 'ត្រពាំងប្រសាទ',
                'district_id' => '2205'
            ],
            [
                'id'          => '230101',
                'en'          => 'Angkaol',
                'km'          => 'អង្កោល',
                'district_id' => '2301'
            ],
            [
                'id'          => '230103',
                'en'          => 'Pong Tuek',
                'km'          => 'ពងទឹក',
                'district_id' => '2301'
            ],
            [
                'id'          => '230201',
                'en'          => 'Kaeb',
                'km'          => 'កែប',
                'district_id' => '2302'
            ],
            [
                'id'          => '230202',
                'en'          => 'Prey Thum',
                'km'          => 'ព្រៃធំ',
                'district_id' => '2302'
            ],
            [
                'id'          => '230203',
                'en'          => 'Ou Krasar',
                'km'          => 'អូរក្រសារ',
                'district_id' => '2302'
            ],
            [
                'id'          => '240101',
                'en'          => 'Pailin',
                'km'          => 'ប៉ៃលិន',
                'district_id' => '2401'
            ],
            [
                'id'          => '240102',
                'en'          => 'Ou Ta Vau',
                'km'          => 'អូរតាវ៉ៅ',
                'district_id' => '2401'
            ],
            [
                'id'          => '240103',
                'en'          => 'Tuol Lvea',
                'km'          => 'ទួលល្វា',
                'district_id' => '2401'
            ],
            [
                'id'          => '240104',
                'en'          => 'Bar Yakha',
                'km'          => 'បយ៉ាខា',
                'district_id' => '2401'
            ],
            [
                'id'          => '240201',
                'en'          => 'Sala Krau',
                'km'          => 'សាលាក្រៅ',
                'district_id' => '2402'
            ],
            [
                'id'          => '240202',
                'en'          => 'Stueng Trang',
                'km'          => 'ស្ទឹងត្រង់',
                'district_id' => '2402'
            ],
            [
                'id'          => '240203',
                'en'          => 'Stueng Kach',
                'km'          => 'ស្ទឹងកាច់',
                'district_id' => '2402'
            ],
            [
                'id'          => '240204',
                'en'          => 'Ou Andoung',
                'km'          => 'អូរអណ្តូង',
                'district_id' => '2402'
            ],
            [
                'id'          => '250101',
                'en'          => 'Chong Cheach',
                'km'          => 'ចុងជាច',
                'district_id' => '2501'
            ],
            [
                'id'          => '250102',
                'en'          => 'Dambae',
                'km'          => 'តំបែរ',
                'district_id' => '2501'
            ],
            [
                'id'          => '250103',
                'en'          => 'Kouk Srok',
                'km'          => 'គោកស្រុក',
                'district_id' => '2501'
            ],
            [
                'id'          => '250104',
                'en'          => 'Neang Teut',
                'km'          => 'នាងទើត',
                'district_id' => '2501'
            ],
            [
                'id'          => '250105',
                'en'          => 'Seda',
                'km'          => 'សេដា',
                'district_id' => '2501'
            ],
            [
                'id'          => '250106',
                'en'          => 'Trapeang Pring',
                'km'          => 'ត្រពាំងព្រីង',
                'district_id' => '2501'
            ],
            [
                'id'          => '250107',
                'en'          => 'Tuek Chrov',
                'km'          => 'ទឹកជ្រៅ',
                'district_id' => '2501'
            ],
            [
                'id'          => '250201',
                'en'          => 'Chhuk',
                'km'          => 'ឈូក',
                'district_id' => '2502'
            ],
            [
                'id'          => '250202',
                'en'          => 'Chumnik',
                'km'          => 'ជំនីក',
                'district_id' => '2502'
            ],
            [
                'id'          => '250203',
                'en'          => 'Kampong Treas',
                'km'          => 'កំពង់ទ្រាស',
                'district_id' => '2502'
            ],
            [
                'id'          => '250204',
                'en'          => 'Kaoh Pir',
                'km'          => 'កោះពីរ',
                'district_id' => '2502'
            ],
            [
                'id'          => '250205',
                'en'          => 'Krouch Chhmar',
                'km'          => 'ក្រូចឆ្នារ',
                'district_id' => '2502'
            ],
            [
                'id'          => '250206',
                'en'          => 'Peus Muoy',
                'km'          => 'ប៉ីស១',
                'district_id' => '2502'
            ],
            [
                'id'          => '250207',
                'en'          => 'Peus Pir',
                'km'          => 'ប៉ីស២',
                'district_id' => '2502'
            ],
            [
                'id'          => '250208',
                'en'          => 'Preaek A chi',
                'km'          => 'ព្រែកអាជី',
                'district_id' => '2502'
            ],
            [
                'id'          => '250209',
                'en'          => 'Roka Khnor',
                'km'          => 'រការខ្នុរ',
                'district_id' => '2502'
            ],
            [
                'id'          => '250210',
                'en'          => 'Svay Khleang',
                'km'          => 'ស្វាយឃ្លាំង',
                'district_id' => '2502'
            ],
            [
                'id'          => '250211',
                'en'          => 'Trea',
                'km'          => 'ទ្រា',
                'district_id' => '2502'
            ],
            [
                'id'          => '250212',
                'en'          => 'Tuol Snuol',
                'km'          => 'ទួលស្នួល',
                'district_id' => '2502'
            ],
            [
                'id'          => '250301',
                'en'          => 'Chan Mul',
                'km'          => 'ចាន់មូល',
                'district_id' => '2503'
            ],
            [
                'id'          => '250302',
                'en'          => 'Choam',
                'km'          => 'ជាំ',
                'district_id' => '2503'
            ],
            [
                'id'          => '250303',
                'en'          => 'Choam Kravien',
                'km'          => 'ជាំក្រវៀន',
                'district_id' => '2503'
            ],
            [
                'id'          => '250304',
                'en'          => 'Choam Ta Mau',
                'km'          => 'ជាំតាម៉ៅ',
                'district_id' => '2503'
            ],
            [
                'id'          => '250305',
                'en'          => 'Dar',
                'km'          => 'ដា',
                'district_id' => '2503'
            ],
            [
                'id'          => '250306',
                'en'          => 'Kampoan',
                'km'          => 'កំពាន់',
                'district_id' => '2503'
            ],
            [
                'id'          => '250307',
                'en'          => 'Kokir',
                'km'          => 'គគីរ',
                'district_id' => '2503'
            ],
            [
                'id'          => '250308',
                'en'          => 'Memong',
                'km'          => 'មេមង',
                'district_id' => '2503'
            ],
            [
                'id'          => '250309',
                'en'          => 'Memot',
                'km'          => 'មេមត់',
                'district_id' => '2503'
            ],
            [
                'id'          => '250310',
                'en'          => 'Rumchek',
                'km'          => 'រំចេក',
                'district_id' => '2503'
            ],
            [
                'id'          => '250311',
                'en'          => 'Rung',
                'km'          => 'រូង',
                'district_id' => '2503'
            ],
            [
                'id'          => '250312',
                'en'          => 'Tonlung',
                'km'          => 'ទន្លូង',
                'district_id' => '2503'
            ],
            [
                'id'          => '250313',
                'en'          => 'Tramung',
                'km'          => 'ត្រមូង',
                'district_id' => '2503'
            ],
            [
                'id'          => '250314',
                'en'          => 'Triek',
                'km'          => 'ទ្រៀក',
                'district_id' => '2503'
            ],
            [
                'id'          => '250401',
                'en'          => 'Ampil Ta Pok',
                'km'          => 'អំពិលតាពក',
                'district_id' => '2504'
            ],
            [
                'id'          => '250402',
                'en'          => 'Chak',
                'km'          => 'ចក',
                'district_id' => '2504'
            ],
            [
                'id'          => '250403',
                'en'          => 'Damril',
                'km'          => 'ដំរិល',
                'district_id' => '2504'
            ],
            [
                'id'          => '250404',
                'en'          => 'Kong Chey',
                'km'          => 'គងជ័យ',
                'district_id' => '2504'
            ],
            [
                'id'          => '250405',
                'en'          => 'Mien',
                'km'          => 'មៀន',
                'district_id' => '2504'
            ],
            [
                'id'          => '250406',
                'en'          => 'Preah Theat',
                'km'          => 'ព្រះធាតុ',
                'district_id' => '2504'
            ],
            [
                'id'          => '250407',
                'en'          => 'Tuol Souphi',
                'km'          => 'ទួលសុភី',
                'district_id' => '2504'
            ],
            [
                'id'          => '250501',
                'en'          => 'Dountei',
                'km'          => 'ដូនតី',
                'district_id' => '2505'
            ],
            [
                'id'          => '250502',
                'en'          => 'Kak',
                'km'          => 'កក់',
                'district_id' => '2505'
            ],
            [
                'id'          => '250503',
                'en'          => 'Kandaol Chrum',
                'km'          => 'កណ្តោលជ្រុំ',
                'district_id' => '2505'
            ],
            [
                'id'          => '250504',
                'en'          => 'Kaong Kang',
                'km'          => 'កោងកាង',
                'district_id' => '2505'
            ],
            [
                'id'          => '250505',
                'en'          => 'Kraek',
                'km'          => 'ក្រែក',
                'district_id' => '2505'
            ],
            [
                'id'          => '250506',
                'en'          => 'Popel',
                'km'          => 'ពពេល',
                'district_id' => '2505'
            ],
            [
                'id'          => '250507',
                'en'          => 'Trapeang Phlong',
                'km'          => 'ត្រពាំងផ្លុង',
                'district_id' => '2505'
            ],
            [
                'id'          => '250508',
                'en'          => 'Veal Mlu',
                'km'          => 'វាលម្លូរ',
                'district_id' => '2505'
            ],
            [
                'id'          => '250601',
                'en'          => 'Suong',
                'km'          => 'សួង',
                'district_id' => '2506'
            ],
            [
                'id'          => '250602',
                'en'          => 'Vihear Luong',
                'km'          => 'វិហារលួង',
                'district_id' => '2506'
            ],
            [
                'id'          => '250701',
                'en'          => 'Anhchaeum',
                'km'          => 'អញ្ចើម',
                'district_id' => '2507'
            ],
            [
                'id'          => '250702',
                'en'          => 'Boeng Pruol',
                'km'          => 'បឹងព្រួល',
                'district_id' => '2507'
            ],
            [
                'id'          => '250703',
                'en'          => 'Chikor',
                'km'          => 'ជីគរ',
                'district_id' => '2507'
            ],
            [
                'id'          => '250704',
                'en'          => 'Chirou Ti Muoy',
                'km'          => 'ជីរោទ៍ទី១',
                'district_id' => '2507'
            ],
            [
                'id'          => '250705',
                'en'          => 'Chirou Ti Pir',
                'km'          => 'ជីរោទ៍ទី២',
                'district_id' => '2507'
            ],
            [
                'id'          => '250706',
                'en'          => 'Chob',
                'km'          => 'ជប់',
                'district_id' => '2507'
            ],
            [
                'id'          => '250707',
                'en'          => 'Kor',
                'km'          => 'គរ',
                'district_id' => '2507'
            ],
            [
                'id'          => '250708',
                'en'          => 'Lngieng',
                'km'          => 'ល្ងៀង',
                'district_id' => '2507'
            ],
            [
                'id'          => '250709',
                'en'          => 'Mong Riev',
                'km'          => 'មង់វៀរ',
                'district_id' => '2507'
            ],
            [
                'id'          => '250710',
                'en'          => 'Peam Chileang',
                'km'          => 'ពាមជីលាំង',
                'district_id' => '2507'
            ],
            [
                'id'          => '250711',
                'en'          => 'Roka Po Pram',
                'km'          => 'រការប្រាំ',
                'district_id' => '2507'
            ],
            [
                'id'          => '250712',
                'en'          => 'Sralab',
                'km'          => 'ស្រឡប់',
                'district_id' => '2507'
            ],
            [
                'id'          => '250713',
                'en'          => 'Thma Pech',
                'km'          => 'ថ្មពេជ្រ',
                'district_id' => '2507'
            ],
            [
                'id'          => '250714',
                'en'          => 'Tonle Bet',
                'km'          => 'ទន្លេបិទ',
                'district_id' => '2507'
            ],
        ];
    }
}
