<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    //****************
    //administradores
    //****************

        User::create([
            'name' => 'Dario',
            'lastname' => 'Suarez Lazarte',
            'CI' => '9005925',
            'phone' => '65085392',
            'email' => 'dsuarezlazarte@gmail.com',
            'password' => Hash::make('123456'),
        ])->assignRole('admin');

        User::create([
            'name' => 'admin1',
            'lastname' => 'de la empresa',
            'CI' => '1',
            'phone' => '1',
            'email' => 'correo1@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('admin');

        User::create([
            'name' => 'admin2',
            'lastname' => 'de la empresa',
            'CI' => '2',
            'phone' => '2',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('admin');

        //****************
        //clientes
        //****************

        User::create([
            'name' => 'cliente1',
            'lastname' => 'de la empresa',
            'CI' => '100',
            'phone' => '100',
            'email' => 'cliente1@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('cliente');

        User::create([
            'name' => 'cliente2',
            'lastname' => 'de la empresa',
            'CI' => '200',
            'phone' => '200',
            'email' => 'cliente2@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('cliente');

        User::create([
            'name' => 'cliente3',
            'lastname' => 'de la empresa',
            'CI' => '300',
            'phone' => '300',
            'email' => 'cliente3@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('cliente');

    //****************
    //técnicos
    //****************

        $tec1 = User::create([
            'name' => 'tecnico1',
            'lastname' => 'de la empresa',
            'CI' => '10',
            'phone' => '10',
            'email' => 'tecnico1@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('tecnico');
        Worker::create([
            'occupied' => '0',
            'user_id' => $tec1->id,
        ]);

        $tec2 = User::create([
            'name' => 'tecnico2',
            'lastname' => 'de la empresa',
            'CI' => '20',
            'phone' => '20',
            'email' => 'tecnico2@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('tecnico');
        Worker::create([
            'occupied' => '0',
            'user_id' => $tec2->id,
        ]);

        $tec3 =  User::create([
            'name' => 'tecnico3',
            'lastname' => 'de la empresa',
            'CI' => '30',
            'phone' => '30',
            'email' => 'tecnico3@correo.com',
            'password' => Hash::make('123456'),
        ])->assignRole('tecnico');
        Worker::create([
            'occupied' => '0',
            'user_id' => $tec3->id,
        ]);

    }
}
