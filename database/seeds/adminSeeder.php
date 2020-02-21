<?php

use Illuminate\Database\Seeder;
use App\User;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' =>1, 'email' => "admin@gmail.com", 'password' => 123456,'user_type'=>"admin"]
           
           ];
           foreach ($data as $instence) {
               $object = new User;
               $object->email = $instence['email'];
               $object->password = $instence['password'];
               $object->user_type= $instence['user_type'];

               $object->save();
           }
    }
}
