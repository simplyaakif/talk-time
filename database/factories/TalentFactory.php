<?php

    namespace Database\Factories;

    use App\Models\Talent;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class TalentFactory extends Factory {

        protected $model = Talent::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'name'       => $this->faker->name,
                'mobile'     => $this->faker->word,
                'dob'        => null,
                'profession' => $this->faker->word,
                'city'       => $this->faker->city,
                'user_id' => 5
            ];
        }
    }
