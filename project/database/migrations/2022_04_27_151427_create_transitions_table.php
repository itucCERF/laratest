<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id')->unsigned();
            $table->unsignedBigInteger('department_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->string('decided_img')->nullale();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->foreign('member_id','fk_transitions_member_id')->references('id')
                    ->on('members')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('department_id','fk_transitions_department_id')->references('id')
                    ->on('departments')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('user_id','fk_transitions_user_id')->references('id')
                    ->on('users')->onUpdate('RESTRICT')->onDelete('SET NULL');
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
        Schema::dropIfExists('transitions');
    }
}
