<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersPaypal extends Migration {

	public function up()
        {
            Schema::table('users', function(Blueprint $table)
            {
                 $table->integer('paypal');
            });
        }

        public function down()
        {
            
            Schema::table('users', function(Blueprint $table)
            {
                $table->dropColumn('paypal');
                
            });
         }
}


