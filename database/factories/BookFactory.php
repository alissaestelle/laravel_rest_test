<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */

   protected $model = Book::class;

  public function definition(): array
  {
    return [
        'title' => $this->faker->sentence(3),
        'author_id' => rand(1, Author::count()),
        'abstract' => $this->faker->paragraph(10)
      ];
  }
}
