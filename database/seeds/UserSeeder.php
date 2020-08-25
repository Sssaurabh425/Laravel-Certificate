<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->adminTableSeeds();
    }
    private function adminTableSeeds()
    {
        DB::table('tbl_user')->insert([
            'name' => 'Saurabh',
            'email'  => 'saurabh@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            /*
            'email'      => env('MAIL_USERNAME'),
            'password'   => env('MAIL_PASSWORD'),
            'phone'      => env('SCHOOL_ADMIN_CONTACT'),
            */
        ]);
    }
}
