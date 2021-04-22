<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator;

class SourceSeeder extends Seeder
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

        \DB::table('source')
            ->insert($this->generateData());
    }

    protected function generateData(): array {
        $data = [];
        $data[] = [
            'title' => $this->faker->text(50),
            'source' => $this->faker->url,
            'user' => $this->faker->text(10),
            'publish_date' => $this->faker->date(),
        ];
        return $data;
    }
}
