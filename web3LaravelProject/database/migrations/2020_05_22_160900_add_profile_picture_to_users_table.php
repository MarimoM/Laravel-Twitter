<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePictureToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->renameColumn('name', 'first_name');
            $table->string('last_name');
            $table->string('profile_image_path', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('users', function($table) {
        $table->dropColumn('last_name');
        $table->dropColumn('profile_image_path');
    });
    }
}
