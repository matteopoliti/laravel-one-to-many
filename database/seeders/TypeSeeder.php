<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Frontend',
            'Backend',
            'Ui',
            'Fullstack',
            'Vue',
            'Laravel'
        ];

        foreach ($types as $element) {
            $newType = new Type();
            $newType->type  = $element;
            $newType->slug = Str::slug($newType->type);
            $newType->save();
        }
    }
}
