<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSentFlag extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
        {
            Schema::table('users', function(Blueprint $table)
            {
                 $table->boolean('sent')->default(0);
            });
        }

        public function down()
        {
          Schema::table('users', function(Blueprint $table)
            {
                $table->dropColumn('sent');
                
            });
         }


}
