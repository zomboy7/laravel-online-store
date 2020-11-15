<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::all()->random(1)->first();
        $type = array_rand(Category::TYPES);
        $price = rand(700, 4000);

        return array_merge([
            'category_id' => $category->id,
            'slug' => $this->faker->slug(2),
            'type' => $type,
            'code' => "{$this->faker->countryCode}-{$this->faker->randomNumber(8)}",
            'rating' => rand(0, 2000),
            'unit' => 'шт',
            'price' => $price,
            'amount' => rand(0, 1) ? rand(5, 300) : null,
            'old_price' => rand(0, 5) ? null : rand(400, $price),
        ], $this->translations());
    }

    protected function translations()
    {
        $data = [];
        foreach (config('app.locales') as $locale)
        {
            $faker = \Faker\Factory::create($locale);
            $data[$locale] = [
                'name' => $faker->text(35),
                'description' => $faker->text(250)
            ];
        }
        return $data;
    }
}
