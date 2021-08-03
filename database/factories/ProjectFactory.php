<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Dev\Infrastructure\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Dev\Application\Utility\ProjectType;
use Dev\Application\Utility\ExperienceLevel;
use Dev\Application\Utility\Visibility;
use Dev\Application\Utility\BudgetType;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Project::class, function (Faker $faker) {
    return [
        'client_id' => 1,
        'service_id' => 1,
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'description_ar' => $faker->text,
        'description_en' => $faker->text,
        'type' => $faker->randomElement([ProjectType::ONE_TIME, ProjectType::ON_GOING]),
        'experience_level' => $faker->randomElement([ExperienceLevel::BEGINNER, ExperienceLevel::MID_LEVEL, ExperienceLevel::TOP_LEVEL]),
        'visibility' => $faker->randomElement([Visibility::PUBLIC, Visibility::PRIVATE]),
        'budget' => $faker->randomFloat(),
        'budget_type' => $faker->randomElement([BudgetType::NEGOTIABLE, BudgetType::NON_NEGOTIABLE])
    ];
});
