<?php

use Illuminate\Database\Seeder;


use App\User;
use App\Dish;
use App\Order;
use App\Category;
use App\Grup;
use App\Req;

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
            $this->call('GrupTableSeeder');
            $this->command->info('Grup table seeded!');
            $this->call('PivotGrupTableSeeder');
            $this->command->info('Pivot Grup table seeded!');
            $this->call('ReqGrupTableSeeder');
            $this->command->info('Req Grup table seeded!');
            $this->call('OrderablesTableSeeder');
            $this->command->info('Orderables table seeded!');
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
            'name' => 'Dron2',
            'is_admin' => '0',
            'password' => Hash::make('111111')
        ));
        
        User::create(array(
            'email' => 'drons2p3@ukr.net',
            'name' => 'Dron3',
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
            'name' => 'Хлеб ',
            'description' => 'Хлеб Хлеб Хлеб Хлеб ',
            'category_id' => '1'
        ));
          
     Dish::create(array(
            'name' => 'Борщ ',
            'description' => 'Борщ Борщ Борщ Борщ Борщ',
            'category_id' => '1'
        ));
          
     Dish::create(array(
            'name' => 'Картошка ',
            'description' => 'Картошка Картошка Картошка Картошка ',
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
  
        DB::table('dish_order')->delete();
        DB::insert('insert into dish_order (dish_id, order_id) values (1, 1)');  
        DB::insert('insert into dish_order (dish_id, order_id) values (2, 1)');  
        
    }
 }
 
 
class GrupTableSeeder extends Seeder
 {
    public function run() {
        DB::table('grups')->delete();
    
     Grup::create(array(
            'name' => 'Первая группа',
            'admin_id' => '3'
        ));
        
     Grup::create(array(
            'name' => 'Вторая группа',
            'admin_id' => '2'
        ));
        
     Grup::create(array(
            'name' => 'Третья группа',
            'admin_id' => '3'
        ));
    
    }
 }

class PivotGrupTableSeeder extends Seeder
 {
    public function run() {
        DB::table('grup_user')->delete();
  
        DB::insert('insert into grup_user (grup_id, user_id) values (1, 1)');  
        DB::insert('insert into grup_user (grup_id, user_id) values (1, 2)');  
        
    }
 }
 
  
class ReqGrupTableSeeder extends Seeder
 {
    public function run() {
        DB::table('reqs')->delete();
    
     Req::create(array(
            'user_id' => '2',
            'grup_id' => '3'
        ));
        
    }
 }


class OrderablesTableSeeder extends Seeder
 {
    public function run() {
        DB::table('orderables')->delete();
  
        DB::insert('insert into orderables (order_id, orderable_id, orderable_type) values (1, 1, "App\\\User")');  
        
    }
 }
 