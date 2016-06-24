<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
        {
            Schema::table('users', function(Blueprint $table)
            {
                //$table->text('image');
                //$table->int('active');
                 $table->boolean('confirmed')->default(0);
                 $table->string('confirmation_code')->nullable();
            });
        }

        public function down()
        {
            // here you're not dropping the whole table, only removing the newly added columns
//            Schema::table('club', function(Blueprint $table){
//                $table->dropColumn('confirmed');
//                $table->dropColumn('confirmation_code');
//            Schema::drop('confirmed');
//            Schema::drop('confirmation_code');
            Schema::table('users', function(Blueprint $table)
            {
                $table->dropColumn('confirmed');
                $table->dropColumn('confirmation_code');
            });
         }

         

}
