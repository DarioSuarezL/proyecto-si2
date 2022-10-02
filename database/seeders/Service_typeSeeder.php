<?php

namespace Database\Seeders;

use App\Models\Service_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Service_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service_type::create([
            'name' => 'Servicio de instalación - Hogar',
            'description' => 'Servicio de instalacion para tu hogar (casas de hasta 3 pisos)',
            'price' => '1500'
        ]);

        Service_type::create([
            'name' => 'Servicio de mantenimiento - Hogar',
            'description' => 'Servicio de mantenimiento para tu hogar (casas de hasta 3 pisos)',
            'price' => '1000'
        ]);

        Service_type::create([
            'name' => 'Servicio de instalación - Empresa',
            'description' => 'Servicio de instalacion para tu empresa',
            'price' => '2500'
        ]);
        
        Service_type::create([
            'name' => 'Servicio de mantenimiento - Empresa',
            'description' => 'Servicio de mantenimiento para tu empresa',
            'price' => '2000'
        ]);

        Service_type::create([
            'name' => 'Servicios de instalación de generador electrico',
            'description' => 'Instalación de generador auxiliar de energía electrica',
            'price' => '1000'
        ]);

        Service_type::create([
            'name' => 'Servicios de instalación de transformador electrico',
            'description' => 'Instalación de transformador de energía electrica',
            'price' => '1025'
        ]);

        Service_type::create([
            'name' => 'Servicios de instalación de paneles solares',
            'description' => 'Instalación de paneles solares',
            'price' => '1900'
        ]);

        Service_type::create([
            'name' => 'Servicios de mantenimiento de paneles solares',
            'description' => 'Servicio de instalacion de paneles solares',
            'price' => '1550'
        ]);
    }
}
