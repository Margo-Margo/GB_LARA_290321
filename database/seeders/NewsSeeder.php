<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator;

class NewsSeeder extends Seeder
{
    /** @var Generator */
    protected $faker;

    /**
     * Run the database seeds.
     *
     * @param Generator $faker
     * @return void
     */
    public function run(Generator $faker)
    {
        $this->faker = $faker;

        \DB::table('news')
            ->insert($this->generateData());
    }

    protected function generateData(): array {
        $data = [];
        $data[] = [
            'title' => $this->faker->text(10),
            'description' => $this->faker->text(10),
            'source' => 3,
            'category_id' => 4,
            'publish_date' => $this->faker->date(),
        ];
        return $data;
    }
}
