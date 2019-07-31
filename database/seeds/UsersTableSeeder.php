<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( $this->tableName )->insert( [
            'role'       => ROLE_ADMIN,
            'uuid'       => b64uuid(),
            'first_name' => 'Admin',
            'last_name'  => '',
            'email'      => 'admin@lazylogic.net',
            'passwd'     => \DB::raw( "PASSWORD('admin./')" ),
            'status'     => STATUS_ACTIVATED,
            'created_at' => date( 'YmdHis' ),
            'updated_at' => date( 'YmdHis' ),
        ] );

        DB::table( $this->tableName )->insert( [
            'role'       => ROLE_MANAGER,
            'uuid'       => b64uuid(),
            'first_name' => 'Lazy',
            'last_name'  => 'Logic',
            'email'      => 'lazy@lazylogic.net',
            'passwd'     => \DB::raw( "PASSWORD('lazy./')" ),
            'status'     => STATUS_ACTIVATED,
            'created_at' => date( 'YmdHis' ),
            'updated_at' => date( 'YmdHis' ),
        ] );

        DB::table( $this->tableName )->insert( [
            'role'       => ROLE_MEMBER | 0xFF00,
            'uuid'       => b64uuid(),
            'first_name' => 'Tester',
            'last_name'  => 'Logic',
            'email'      => 'tester@lazylogic.net',
            'passwd'     => \DB::raw( "PASSWORD('1')" ),
            'status'     => STATUS_ACTIVATED,
            'created_at' => date( 'YmdHis' ),
            'updated_at' => date( 'YmdHis' ),
        ] );

        DB::table( $this->tableName )->insert( [
            'role'       => ROLE_MEMBER,
            'uuid'       => b64uuid(),
            'first_name' => 'Razy',
            'last_name'  => 'Dev',
            'email'      => 'razy.dev@gmail.com',
            'passwd'     => \DB::raw( "PASSWORD('razy./')" ),
            'status'     => STATUS_ACTIVATED,
            'created_at' => date( 'YmdHis' ),
            'updated_at' => date( 'YmdHis' ),
        ] );
    }
}