<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Speciality;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospitals = Hospital::all();
        $specialities = Speciality::all();
        $faker = Faker\Factory::create();

        $img = 'images/doctor.jpg';

        foreach ($hospitals as $hospital) {
            foreach ($specialities as $speciality) {

                $user = User::create([
                    'name' => 'Dr.'.$faker->lastName,
                    'email' => $faker->unique()->email,
                    'password' => Hash::make('123456789'),
                ]);

                $doctor = new Doctor;
                $doctor->user_id  = $user->id;
                $doctor->speciality_id   = $speciality->id;
                $doctor->hospital_id   = $hospital->id;
                $doctor->slot_id   = $faker->biasedNumberBetween(1,4);
                $doctor->nationality  = 'Bangali';
                $doctor->gender  = $faker->randomElement(['male', 'felame']);
                $doctor->language  = $faker->languageCode;
                $doctor->photo  = $img;
                $doctor->subscription_id  = 1;
                $doctor->save();


                $role = Role::where('name','doctor')->first();
                $user->assignRole([$role->id]);
            }
        }
    }
}