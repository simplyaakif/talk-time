<?php

    namespace Database\Seeders;

    use App\Models\Guide;
    use Illuminate\Database\Seeder;

    class GuideSeeder extends Seeder {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Guide::factory()->count(1)->create();
        }
    }
