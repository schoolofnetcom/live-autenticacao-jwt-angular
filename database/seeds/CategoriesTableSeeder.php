<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();
        factory(\App\Models\Category::class,100)
            ->make()
            ->each(function($category) use($users){
                \Tenant::setTenant($users->random());
                $category->save();
            });
        \Tenant::setTenant(null);
    }
}
