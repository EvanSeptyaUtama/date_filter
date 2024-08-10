<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Today
        Employee::factory(6)->create([
            'created_at' => Carbon::today(),
        ]);

        //Yesterday
        Employee::factory(6)->create([
            'created_at' => Carbon::yesterday(),
        ]);

        //This week
        Employee::factory(6)->create([
            'created_at' => Carbon::now()->startOfWeek(),
            ])->each(function ($post) {
                $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
                $post->save();
            });

        //This last week
        Employee::factory(6)->create([
            'created_at' => Carbon::now()->subWeek()->startOfWeek(),
            ])->each(function ($post) {
                $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 6));
                $post->save();
            });

        //This month
        Employee::factory(6)->create([
            'created_at' => Carbon::now()->startOfMonth(),
            ])->each(function ($post) {
                $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
                $post->save();
            });

        //This last month
        Employee::factory(6)->create([
            'created_at' => Carbon::now()->subMonth()->startOfMonth(),
            ])->each(function ($post) {
                $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 30));
                $post->save();
            });

        //This year
        Employee::factory(6)->create([
            'created_at' => Carbon::now()->startOfYear(),
            ])->each(function ($post) {
                $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
                $post->save();
            });

        //This last year
        Employee::factory(6)->create([
            'created_at' => Carbon::now()->subYear()->startOfYear(),
            ])->each(function ($post) {
                $post->created_at = $post->created_at->addMinutes(rand(1, 1440 * 365));
                $post->save();
            });
    }
}
