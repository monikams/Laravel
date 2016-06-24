<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersFile extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
        {
            Schema::table('users', function(Blueprint $table)
            {
                 $table->string('filename');
            });
        }

        public function down()
        {
           Schema::table('users', function(Blueprint $table)
            {
                $table->dropColumn('filename');
                
            });
         }


}