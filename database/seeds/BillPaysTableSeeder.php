<?php

use Illuminate\Database\Seeder;

class BillPaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Models\Category::all();
        factory(\App\Models\BillPay::class,100)
            ->make()
            ->each(function($billPay) use($categories){
                $category = $categories->random();
                $user = $category->user;
                \Tenant::setTenant($user);
                $billPay->user_id = $user->id;
                $billPay->category_id = $category->id;
                $billPay->save();
            });
        \Tenant::setTenant(null);
    }
}
