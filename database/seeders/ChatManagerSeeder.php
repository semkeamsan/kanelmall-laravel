<?php

namespace Database\Seeders;

use App\Models\ChatManager;
use App\Models\Language;
use Illuminate\Database\Seeder;

class ChatManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $value) {
            $model =  ChatManager::create($value);

        }
    }
    public function data()
    {
        return [
            [
                'name'  => 'Facebook',
                'link'  => 'http://fb.com/kanelmallstore',
                'icon'  => 'fab fa-facebook',
                'color'  => '#3B5998',
            ],
            [
                'name'  => 'Twitter',
                'link'  => 'http://twitter.com/kanelmallstore',
                'icon'  => 'fab fa-twitter',
                'color'  => '#55ACEE',
            ],
            [
                'name'  => 'Google Plus',
                'link'  => 'http://google.com/kanelmallstore',
                'icon'  => 'fab fa-google',
                'color'  => '#dd4b39',
            ],
            [
                'name'  => 'Linkedin',
                'link'  => 'http://linkedin.com/kanelmallstore',
                'icon'  => 'fab fa-linkedin',
                'color'  => '#007bb5',
            ],
            [
                'name'  => 'Instagram',
                'link'  => 'http://instagram.com/kanelmallstore',
                'icon'  => 'fab fa-instagram',
                'color'  => '#f44336',
            ],
            [
                'name'  => 'Snapchat',
                'link'  => 'http://snapchat.com/kanelmallstore',
                'icon'  => 'fab fa-snapchat',
                'color'  => '#fffc00',
            ],
            [
                'name'  => 'Skype',
                'link'  => 'http://skype.com/kanelmallstore',
                'icon'  => 'fab fa-skype',
                'color'  => '#00aff0',
            ],
            [
                'name'  => 'Yahoo',
                'link'  => 'http://yahoo.com/kanelmallstore',
                'icon'  => 'fab fa-yahoo',
                'color'  => '#430297',
            ],
            [
                'name'  => 'Phone',
                'link'  => 'Tel:(+855) 987654321',
                'icon'  => 'fal fa-phone',
                'color'  => null,
            ],
        ];
    }
}
