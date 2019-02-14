<?php

use Illuminate\Database\Seeder;

class ThumbnailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Thumbnail::class, 50)->create();
    }
}
