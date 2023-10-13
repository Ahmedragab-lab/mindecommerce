<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $faker  = Factory::create();
        $sara   = User::whereFirstname('sara')->first();
        $egypt  = Country::with('states')->whereId(1)->first();
        $state  = State::whereCountryId($egypt->id)->first();
        $city   = City::whereStateId($state->id)->first();

        $sara->addresses()->create([
            'address_title'         => 'Home',
            'default_address'       => true,
            'first_name'            => 'Sara',
            'last_name'             => 'Ragab',
            'email'                 => $faker->email,
            'mobile'                => $faker->phoneNumber,
            'address'               => '12 zidan street',
            'address2'              => '2 abd el hamid mkey street',
            'country_id'            => $egypt->id,
            'state_id'              => $state->id,
            'city_id'               => $city->id,
            'zip_code'              => $faker->randomNumber(5),
            'po_box'                => $faker->randomNumber(4),
        ]);


        $sara->addresses()->create([
            'address_title'         => 'Work',
            'default_address'       => false,
            'first_name'            => 'Sara',
            'last_name'             => 'Ragab',
            'email'                 => $faker->email,
            'mobile'                => $faker->phoneNumber,
            'address'               => '6 october',
            'address2'              => 'saad zaglol',
            'country_id'            => $egypt->id,
            'state_id'              => $state->id,
            'city_id'               => $city->id,
            'zip_code'              => $faker->randomNumber(5),
            'po_box'                => $faker->randomNumber(4),
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
