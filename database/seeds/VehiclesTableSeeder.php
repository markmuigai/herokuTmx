<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create 5 vehicles
        //Assign the vehicles to 5 users(drivers)
        Vehicle::create([
        	'user_id' => '1',
        	'plateNo' => 'M755S',
        	'vehicle_model' => 'Honda',
        	'vehicle_type' => 'Motorbike',
        ]);

        Vehicle::create([
        	'user_id' => '2',
        	'plateNo' => 'M572C',
        	'vehicle_model' => 'Ducati',
        	'vehicle_type' => 'Motorbike',
        ]);
        Vehicle::create([
        	'user_id' => '3',
        	'plateNo' => 'M914D',
        	'vehicle_model' => 'BMW',
        	'vehicle_type' => 'Motorbike',
        ]);

        Vehicle::create([
        	'user_id' => '4',
        	'plateNo' => '',
        	'vehicle_model' => 'KBN 819R',
        	'vehicle_type' => 'Lorry',
        ]);

        Vehicle::create([
        	'user_id' => '5',
        	'plateNo' => '',
        	'vehicle_model' => 'KCG 134B',
        	'vehicle_type' => 'Lorry',
        ]);
    }
}
