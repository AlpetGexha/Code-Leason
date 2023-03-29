<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeLogs>
 */
class TimeLogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkInTime = $this->faker->dateTimeBetween('-1 month', 'now');
        $checkOutTime = $this->faker->dateTimeBetween($checkInTime, 'now');

        return [
            'employee_id' => Employee::factory(),
            'check_in_time' => $checkInTime,
            'check_out_time' => $checkOutTime,
            'hours_worked' => $this->faker->randomFloat(2, 1, 8),
        ];
    }
}
