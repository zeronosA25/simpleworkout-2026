<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Barbell', 'description' => 'Long bar with weight plates — essential for squats, bench press, and deadlift. Standard Olympic barbell weighs 20 kg.'],
            ['name' => 'Dumbbell', 'description' => 'Handheld free weights available in various sizes. Ideal for isolation exercises and unilateral training.'],
            ['name' => 'Cable Machine', 'description' => 'Pulley-based resistance machine providing constant tension throughout the range of motion. Includes attachments like rope, straight bar, and D-handle.'],
            ['name' => 'Resistance Band', 'description' => 'Elastic bands in varying resistance levels. Great for warm-up, mobility work, and assisted pull-ups.'],
            ['name' => 'Kettlebell', 'description' => 'Cast iron ball with a single handle. Perfect for ballistic movements like swings, snatches, and Turkish get-ups.'],
            ['name' => 'Bodyweight', 'description' => 'No equipment needed — uses your own body weight as resistance. Foundation for push-ups, squats, planks, and more.'],
            ['name' => 'Bench', 'description' => 'Flat or adjustable workout bench. Essential for bench press variations, seated exercises, and step-ups.'],
            ['name' => 'Pull Up Bar', 'description' => 'Horizontal bar mounted on wall or doorframe. Used for pull-ups, chin-ups, and hanging leg raises.'],
            ['name' => 'EZ Curl Bar', 'description' => 'Curved barbell designed for arm exercises. The angled grip reduces wrist strain during curls and extensions.'],
        ];

        foreach ($items as $item) {
            Equipment::firstOrCreate(
                ['name' => $item['name']],
                ['description' => $item['description']]
            );
        }
    }
}
