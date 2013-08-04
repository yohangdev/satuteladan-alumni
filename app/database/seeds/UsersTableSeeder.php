<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $users = array(
            array(
                'email'         => 'admin@example.org',
                'password'      => Hash::make('admin'),
                'name'          => 'Administrator',
                'active'        => 1,
                'verified'      => 1,
                'verified_by'   => 1,
                'verified_date' => new DateTime,
                'created_at'    => new DateTime,
                'updated_at'    => new DateTime,
            )
        );

        DB::table('users')->insert( $users );
    }

}
