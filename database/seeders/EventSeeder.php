<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'title' => 'Corte mia',
                'description' => 'Corte mia',
                'start' => '2024-04-08 08:00',
                'end' => '2024-04-08 09:00',
            ],
            [
                'title' => 'Corte tepo',
                'description' => 'Corte mia',
                'start' => '2024-04-08 09:00',
                'end' => '2024-04-08 10:00',
            ],
            [
                'title' => 'Corte ziro',
                'description' => 'Corte mia',
                'start' => '2024-04-08 11:00',
                'end' => '2024-04-08 12:00',
            ],
            [
                'title' => 'Corte asd',
                'description' => 'Corte mia',

                'start' => '2024-04-08 13:00',
                'end' => '2024-04-08 14:00',
            ],
        ];

        foreach ($events as $event) {
            Event::create([
                'title' => $event['title'],
                'description' => $event['description'],
                'start' => $event['start'],
                'end' => $event['end'],
            ]);
        }
    }
}
