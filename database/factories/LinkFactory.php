<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Eloquent\Factory;

/* @var Illuminate\Database\Eloquent\Factory $factory */

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = $this->faker->randomElement([
        Link::STATUS_SUBMITTED,
        Link::STATUS_APPROVED,
        Link::STATUS_REJECTED,
    ]);

    return [
        'user_id' => User::factory(),
        'title' => $this->faker->sentence(),
        'url' => $this->faker->url,
        'text' => $this->faker->paragraph,
        'status' => $status,
        'publish_date' => $status === Link::STATUS_APPROVED ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
    ];
    }
}
