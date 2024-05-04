<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{

    public function run(): void
    {
        Category::create([
           'name' => 'Categoria Teste',
            'slug' => 'categoriateste',
            'description'=> 'Catégoria de teste cadastrada',
            'tenant_id' => 1,
        ]);
    }
}
