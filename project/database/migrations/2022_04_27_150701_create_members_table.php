<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->char('name', 255);
            $table->enum('gender', ['1', '2', '0']);
            $table->timestamp('email')->unique();
            $table->timestamp('birthday')->nullable();
            $table->string('address')->nullale();
            $table->string('profile')->nullale();
            $table->string('id_card')->nullale();
            $table->string('notes')->nullale();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
