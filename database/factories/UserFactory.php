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
                'password'       => bcrypt($this->faker->password),
                'remember_token' => Str::random(10),

            ];
        }
    }
