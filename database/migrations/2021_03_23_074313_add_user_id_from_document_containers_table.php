<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdFromDocumentContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_containers', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable();
            $table->foreign("user_id")->references("id")->on("users")
                ->onUpdate( 'cascade' )->onDelete( 'cascade' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_containers', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
