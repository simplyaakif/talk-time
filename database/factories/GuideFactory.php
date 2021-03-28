<?php

    namespace Database\Factories;

    use App\Models\Guide;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Carbon;

    class GuideFactory extends Factory {

        protected $model = Guide::class;

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
                'user_id' => function () {
                    return User::factory()->create()->id;
                },
            ];
        }
    }
