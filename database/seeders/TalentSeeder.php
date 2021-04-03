<?php

    namespace Database\Seeders;

    use App\Models\Talent;
    use App\Models\User;
    use Illuminate\Database\Seeder;

    class TalentSeeder extends Seeder {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            User::factory()
            ->has(
                Talent::factory()
                    ->state(function (array $attributes, User $user) {
                        return ['name' => $user->name,];
                    })
            )
            ->create();
        }
    }
