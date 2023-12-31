<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContactFormSubmissions;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            WhatIDoSeeder::class,
            PostCategoriesSeeder::class,
            KnowledgebaseCategorySeeder::class,
            SettingSeeder::class,
            WhoWorkWithSeeder::class,
            CurrentPageSeeder::class,
        ]);
    }
}
