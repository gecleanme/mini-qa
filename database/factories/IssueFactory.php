<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Issue>
 */
class IssueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        return [
            'reporter_id' => $user->id,
            'title' => $this->faker->word(),
            'priority' => $this->faker->word(),
            'description' => $this->faker->paragraph(2),
            'attachments' => $this->faker->word(),
            'department' => $this->faker->word(),
            'status' => $this->faker->word()
        ];
    }
}
