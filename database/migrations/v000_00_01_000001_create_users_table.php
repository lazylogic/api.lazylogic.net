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

            $table->string( 'locale', 8 )->default( 'ko' )->comment( 'https://www.w3schools.com/tags/ref_language_codes.asp' );
            $table->string( 'country', 3 )->nullable( 'KR' )->comment( 'ISO 3166-2 alpha3' );
            $table->string( 'phone_country', 4 )->nullable();
            $table->string( 'phone_area', 4 )->nullable();
            $table->string( 'phone_number', 16 )->nullable();

            $table->rememberToken();
            $table->string( 'email_verified_token' )->nullable()->comment( 'email 인증 토큰' );
            $table->timestamp( 'email_verified_at' )->nullable();
            $table->timestamp( 'loggedin_at' )->nullable();

            $table->timestamps();
            $table->softDeletes();

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