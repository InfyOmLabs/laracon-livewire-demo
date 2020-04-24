<?php

use App\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            $ticket = new Ticket(
                [
                    'subject' => $faker->sentence,
                    'description' => $faker->paragraph,
                ]
            );
            $ticket->save();
        }
    }
}
