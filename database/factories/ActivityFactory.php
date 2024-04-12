<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pending_activities = [
            'environment.operation',
            'environment.push',
            'environment.redeploy',
            'environment.source-operation',
            'environment.domain.create',
            'environment.domain.delete',
            'environment.domain.update',
            'environment.restore',
            'environment.synchronize',
            'environment.variable.create',
            'environment.variable.delete',
            'environment.variable.update',
        ];
        $nok_activities = [
            'environment.deactivate',
            'environment.delete',
            'environment.pause',
        ];
        $ok_activities = [
            'environment.initialize',
            'environment.resume',
        ];

        return [
            'type' => $this->faker->randomElement(array_merge($pending_activities, $nok_activities, $ok_activities)),
            'state' => $this->faker->randomElement(['pending', 'in_progress', 'completed', 'cancelled']),
            'availability' => $this->faker->boolean(70),
            'description' => $this->faker->sentence(),
            'text' => $this->faker->sentence(),
            'timing_wait' => $this->faker->randomFloat(2, 0, 100),
            'timing_build' => $this->faker->randomFloat(2, 0, 100),
            'timing_deploy' => $this->faker->randomFloat(2, 0, 100),
            'timing_execute' => $this->faker->randomFloat(2, 0, 100),
            'environment_id' => \App\Models\Environment::factory(),
        ];
    }
}
