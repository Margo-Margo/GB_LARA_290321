<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator;

class CategorySeeder extends Seeder
{
    /** @var Generator */
    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        $this->faker = $faker;

        \DB::table('categories')
            ->insert($this->generateData());
    }

    protected function generateData(): array {
        $data = [];
        $data[] = [
            'name' => $this->faker->text(50),

        ];
        return $data;
    }
}
