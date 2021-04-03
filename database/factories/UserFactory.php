<?php

    namespace Database\Factories;

    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Str;

    class UserFactory extends Factory {

        protected $model = User::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'name'           => $this->faker->name,
                'email'          => $this->faker->unique()->safeEmail,
                'password'       => '$2y$10$1EMUs0b/NF7K5uL/zi.ffOl0nvnydjCavd28OANcC7.Z7USNEIjMy',
                'remember_token' => Str::random(10),

            ];
        }
    }
