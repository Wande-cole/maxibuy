<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            ['name' => 'maths', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'english', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'chemistry', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('subscribers')->insert([
            ['endpoint' => 'http://127.0.0.1:9000/api/subscriber/test', 'created_at' => now(), 'updated_at' => now()]
        ]);

        DB::table('subscriber_topic')->insert([
            [
                'subscriber_id' => 1,
                'topic_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}