<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryTokensTable extends Migration
{
    public $tableName = 'temporary_tokens';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists( $this->tableName );

        Schema::create( $this->tableName, function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );
            $table->string( 'uuid', 32 )->nullable();
            $table->string( 'email' );
            $table->string( 'token' );
            $table->timestamps();

            $table->index( 'uuid' );
            $table->index( 'email' );
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