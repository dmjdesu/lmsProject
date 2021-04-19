<?php
use Illuminate\Database\Seeder;
 
class LearnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        factory(App\Learn::class, 50)
            ->create()
            ->each(function ($learn) {
                $progresses = factory(App\Progress::class, 2)->make();
                $learn->comments()->saveMany($progresses);
            }
        );
    }
}
