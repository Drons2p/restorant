<?php

use Illuminate\Database\Seeder;


use App\User;
use App\Dish;
use App\Order;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $this->call('UserTableSeeder');
            $this->command->info('User table seeded!');
            $this->call('DishTableSeeder');
            $this->command->info('Dish table seeded!');
            $this->call('OrderTableSeeder');
            $this->command->info('Order table seeded!');
            $this->call('CategoryTableSeeder');
            $this->command->info('Category table seeded!');
            $this->call('PivotTableSeeder');
            $this->command->info('Pivot table seeded!');
    }
}


class UserTableSeeder extends Seeder
 {
    public function run() {
        DB::table('users')->delete();
        User::create(array(
            'email' => 'drons2p@ukr.net',
            'name' => 'Dron',
            'is_admin' => '1',
            'password' => Hash::make('222222')
        ));
    
        User::create(array(
            'email' => 'drons2p2@ukr.net',
            'name' => 'Dron',
            'is_admin' => '0',
            'password' => Hash::make('111111')
        ));
        
        User::create(array(
            'email' => 'drons2p3@ukr.net',
            'name' => 'Dron',
            'is_admin' => '0',
            'password' => Hash::make('111111')
        ));
    
    }
 }


class DishTableSeeder extends Seeder
 {
    public function run() {
        DB::table('dishes')->delete();
        Dish::create(array(
            'name' => 'Сало',
            'description' => 'Сало Сало Сало',
            'category_id' => '1'
        ));
    
     Dish::create(array(
            'name' => 'Хліб ',
            'description' => 'Хліб Хліб Хліб ',
            'category_id' => '1'
        ));
          
     Dish::create(array(
            'name' => 'Борщ ',
            'description' => 'Борщ Борщ Борщ Борщ Борщ',
            'category_id' => '1'
        ));
          
     Dish::create(array(
            'name' => 'Картопля ',
            'description' => 'Картопля Картопля Картопля Картопля ',
            'category_id' => '2'
        ));
          
     Dish::create(array(
            'name' => 'Каша ',
            'description' => 'Каша Каша Каша Каша Каша ',
            'category_id' => '2'
        ));  
        
                
     Dish::create(array(
            'name' => 'Торт ',
            'description' => 'Торт Торт Торт Торт Торт ',
            'category_id' => '3'
        ));          
     Dish::create(array(
            'name' => 'Сок ',
            'description' => 'Сок Сок Сок Сок Сок Сок Сок Сок ',
            'category_id' => '3'
        ));
        
    }
 }

class OrderTableSeeder extends Seeder
 {
    public function run() {
        DB::table('orders')->delete();
   
     Order::create(array(
            'user_id' => '1',
            'sent' => '0'
        ));
    
    }
 }


class CategoryTableSeeder extends Seeder
 {
    public function run() {
        DB::table('categories')->delete();
    
     Category::create(array(
            'name' => 'Первое',
            'description' => 'Первое'
        ));
        
     Category::create(array(
            'name' => 'Второе',
            'description' => 'Второе'
        ));
        
     Category::create(array(
            'name' => 'Десерт',
            'description' => 'Десерт'
        ));
    
    }
 }

class PivotTableSeeder extends Seeder
 {
    public function run() {
  
        DB::insert('insert into dish_order (dish_id, order_id) values (1, 1)');  
        DB::insert('insert into dish_order (dish_id, order_id) values (2, 1)');  
        
    }
 }