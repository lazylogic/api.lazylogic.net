<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'sessions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists( $this->tableName );

        Schema::create( $this->tableName, function ( Blueprint $table ) {
            $table->string( 'id' )->unique();
            $table->unsignedBigInteger( 'user_id' )->nullable();
            $table->string( 'ip_address', 45 )->nullable();
            $table->text( 'user_agent' )->nullable();
            $table->text( 'payload' );
            $table->integer( 'last_activity' );
        } );
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