<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = ['Al Ain','Abu Dhabi','Al Gharbia'];
        foreach ($datas as $data) {
            Location::create(['name'=>$data]);
        }
    }
}