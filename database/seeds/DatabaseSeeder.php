<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('comments')->truncate();
        DB::table('tickets')->truncate();
        Schema::enableForeignKeyConstraints();

        $this->call(TicketSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
