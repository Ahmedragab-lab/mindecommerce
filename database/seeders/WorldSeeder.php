<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class WorldSeeder extends Seeder
{

    public function run()
    {
        // $sql_file = public_path('ecommerce_World.sql');
        // $db = [
            //     'host' => '127.1.1.1',
            //     'database' => 'morasoftecommerce',
            //     'username' => 'root',
            //     'password' => null,
            // ];

            // exec("mysql --user={$db['username']} --password={$db['password']} --host={$db['host']} --database={$db['database']} < $sql_file");
        // Country::truncate();

        $countries = [
            ['name' => 'Egypt', 'status' => 1],
            ['name' => 'Saudi Arabia', 'status'=> 1],
            ['name' => 'France', 'status' => 1],
            ['name' => 'United Status', 'status'=> 1],
            ['name' => 'Iraq', 'status'=> 1],
        ];
        foreach ($countries as $key => $value) {
            Country::create($value);
        }


        //status
        $status=[
            ['name'=> 'Kafr el-Sheikh Governorate', 'country_id'=>1, 'status'=>1],
            ['name'=> 'Cairo Governorate', 'country_id'=>1, 'status'=>1],
            ['name'=> 'Alexandria Governorate', 'country_id'=>1, 'status'=>1],
            ['name'=> 'Giza Governorate', 'country_id'=>1, 'status'=>1],
            ['name'=> 'Red Sea Governorate', 'country_id'=>1, 'status'=>1],
            ['name'=> 'Washington', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Howland Island', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Delaware', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Alaska', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Maryland', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Baker Island', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Kingman Reef', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'New Hampshire', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Wake Island', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Kansas', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Texas', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Nebraska', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Vermont', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Jarvis Island', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Hawaii', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Guam', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'United status Virgin Islands', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Utah', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Oregon', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'California', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'New Jersey', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'North Dakota', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Kentucky', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Minnesota', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Oklahoma', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Pennsylvania', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'New Mexico', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'American Samoa', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Illinois', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Michigan', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Virginia', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Johnston Atoll', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'West Virginia', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Mississippi', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Northern Mariana Islands', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'United status Minor Outlying Islands', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Massachusetts', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Arizona', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Connecticut', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Florida', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'District of Columbia', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Midway Atoll', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Navassa Island', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Indiana', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Wisconsin', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Wyoming', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'South Carolina', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Arkansas', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'South Dakota', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Montana', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'North Carolina', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Palmyra Atoll', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Puerto Rico', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Colorado', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Missouri', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'New York', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Maine', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Tennessee', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Georgia', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Alabama', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Louisiana', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Nevada', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Iowa', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Idaho', 'country_id'=> 4,'status'=> 1],
            ['name'=> 'Rhode Island', 'country_id'=> 4,'status'=> 1],
        ];
        foreach ($status as $key => $value) {
            State::create($value);
        }


        //cities
        $cities=[
            ['name'=> 'Al Ḩāmūl','state_id'  => 1, 'status'=> 1],
            ['name'=> 'Ḩalwān'  ,'state_id'  =>2, 'status'=> 1],
            ['name'=> 'Al ‘Ayyāţ','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Alexandria','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Arish','state_id'=> 5, 'status'=> 1],
            ['name'=> 'Ash Shuhadā’','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Ashmūn','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Aswan','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Asyūţ','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Awsīm','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Az Zarqā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Aş Şaff','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Banhā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Banī Mazār','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Banī Suwayf','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Basyūn','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Bilqās','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Būsh','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Cairo','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Dahab','state_id'=> 5, 'status'=> 1],
            ['name'=> 'Damanhūr','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Damietta','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Dayr Mawās','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Dayrūţ','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Dikirnis','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Dishnā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Disūq','state_id'=>2, 'status'=> 1],
            ['name'=> 'El Gouna','state_id'=> 2, 'status'=> 1],
            ['name'=> 'El-Tor','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Farshūţ','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Fuwwah','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Fāraskūr','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Giza','state_id'=> 4, 'status'=> 1],
            ['name'=> 'Hurghada','state_id'=> 5, 'status'=> 1],
            ['name'=> 'Ibshawāy','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Idfū','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Idkū','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Ismailia','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Isnā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Iţsā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Jirjā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Juhaynah','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Kafr ad Dawwār','state_id'=> 3, 'status'=> 1],
            ['name'=> 'Kafr ash Shaykh','state_id'=>2, 'status'=> 1],
            ['name'=> 'Kafr az Zayyāt','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Kawm Umbū','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Kawm Ḩamādah','state_id'=> 4, 'status'=> 1],
            ['name'=> 'Kousa','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Luxor','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Madīnat Sittah Uktūbar','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Makadi Bay','state_id'=> 5, 'status'=> 1],
            ['name'=> 'Mallawī','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Manfalūţ','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Markaz Disūq','state_id'=>2, 'status'=> 1],
            ['name'=> 'Markaz Jirjā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Markaz Sūhāj','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Markaz al Uqşur','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Marsa Alam','state_id'=> 5, 'status'=> 1],
            ['name'=> 'Maţāy','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Mersa Matruh','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Minyat an Naşr','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Munshāt ‘Alī Āghā','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Munūf','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Naja\' Ḥammādī','state_id'=> 2, 'status'=> 1],
            ['name'=> 'New Cairo','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Nuwaybi‘a','state_id'=> 5, 'status'=> 1],
            ['name'=> 'Port Said','state_id'=> 2, 'status'=> 1],
            ['name'=> 'Ahtanum', 'state_id' =>6, 'status'=> 1],
            ['name'=> 'Airway Heights', 'state_id' =>6, 'status'=> 1],
            ['name'=> 'Adams County', 'state_id' =>6, 'status'=> 1],
        ];
            foreach ($cities as $key => $value) {
                City::create($value);
            }
    }
}
