<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('admin123'),
            ],
            [
               'name'=>'Petugas',
               'email'=>'petugas@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('petugas123'),
            ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('user123'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}