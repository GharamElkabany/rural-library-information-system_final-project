<?php

namespace Database\Factories;
use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_id' => Book::factory(),
            'member_id' => Member::factory(),
            'borrow_date' => $this->faker->date,
            'return_date' => $this->faker->optional()->date
        ];
    }
}
