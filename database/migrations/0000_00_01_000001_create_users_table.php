<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists( $this->tableName );

        Schema::create( $this->tableName, function ( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->bigIncrements( 'id' );
            $table->integer( 'role' )->default( ROLE_MEMBER );
            $table->string( 'uuid', 32 )->unique();
            $table->string( 'email' )->unique();
            $table->string( 'passwd' );
            $table->string( 'first_name' );
            $table->string( 'last_name' )->nullable()->default( null );
            $table->string( 'status', 16 )->default( STATUS_INITIAL );

            $table->string( 'locale', 5 )->default( 'ko_KR' )->comment( 'll_CC. ll is ISO 639-1 language code alpha2, CC is ISO 3166-2 alpha2' );
            $table->string( 'country', 2 )->nullable( 'KR' )->comment( 'ISO 3166-2 alpha2' );
            $table->string( 'phone_country', 4 )->nullable();
            $table->string( 'phone_area', 4 )->nullable();
            $table->string( 'phone_number', 16 )->nullable();

            $table->rememberToken();
            $table->string( 'api_token' )->unique()->nullable()->default( null );

            $table->timestamp( 'email_verified_at' )->nullable();
            $table->timestamps();
        } );

        Artisan::call( 'db:seed', array( '--class' => 'UsersTableSeeder' ) );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( $this->tableName );
    }
}