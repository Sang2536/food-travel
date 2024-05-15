<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\System>
 */
class SystemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'domain'    =>  "https://localhost/foodtravel.test",
            'app_name'  =>  "FOOD TRAVEL",
            'app_title' =>  "sells camping and travel food",
            'favicon'   =>  "",
            'logo'  =>  "",
            'language'  =>  "vi",
            'styles'    =>  (object) [
                'bg_color'  =>  "bg-cyan-600",
                'text_color'    =>  "text-black-600",
                'font_family'   =>  "Vetical, Time new roman",
                'font_size' =>  "18px"
            ],
        ];
    }
}
