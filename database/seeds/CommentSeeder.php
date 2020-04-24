<?php

use App\Comment;
use App\Ticket;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $tickets = Ticket::all();
        foreach($tickets as $ticket) {

            $commentsCount = random_int(5, 15);

            for($i = 0; $i < $commentsCount; $i++) {
                $ticket->comments()->save(
                    new Comment(['message' => $faker->sentence])
                );
            }
        }
    }
}
