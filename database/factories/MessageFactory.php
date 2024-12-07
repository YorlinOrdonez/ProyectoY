<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition()
    {
        return [
            'content' => $this->faker->text,
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'book_id' => Book::factory(),
        ];
    }
}

