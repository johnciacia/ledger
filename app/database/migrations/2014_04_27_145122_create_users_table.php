<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create( 'users', function( $table ) {
			$table->increments( 'id' );
			$table->string( 'email', 100 )->unique();
			$table->string( 'password', 64 );
			$table->string( 'remember_token', 255 )->nullable();
			$table->string( 'coinbase_token', 255 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop( 'users' );
	}

}
