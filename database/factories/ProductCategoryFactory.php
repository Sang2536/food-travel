<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $getCateId = ProductCategory::where('level', 0)->select('pc_id')->get();

        $parentId = null;
        if (! empty($getCateId)) $parentId = fake()->randomElement([null, ...$getCateId]);

        $level = 1;
        if (empty($parentId)) $level = 0;

        $name = fake()->name();
        $keywords = explode(' ', $name);

        return [
            'pc_id' =>  fake()->unique()->regexify('[A-Z0-9]{6}'),
            'name'  =>  $name,
            'parent_id' =>  $parentId,
            'level' => $level,
            'slug'  =>  '',
            'keywords'   =>  $keywords,
            'short_descr'   =>  fake()->text(100),
            'note'  =>  fake()->text(20),
            'created_by'    =>  fake()->numberBetween(2, User::count()),
        ];
    }
}
