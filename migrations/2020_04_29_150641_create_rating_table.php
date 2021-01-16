<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingTable extends Migration
{
    public function up()
    {
        Schema::create('rates', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ratable_id');
            $table->string('ratable_type', 35);
            $table->unsignedBigInteger('user_id');
            $table->enum('value', [1, 2, 3, 4, 5]);
            $table->timestamp('created_at');
        });

        Schema::create('rate_stats', function(Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('ratable_id');
            $table->string('ratable_type', 35);

            $table->decimal('avg_value', 3)->default(0);
            $table->integer('star_count')->default(1);

            $table->integer('five_star_count')->default(1);
            $table->integer('four_star_count')->default(1);
            $table->integer('three_star_count')->default(1);
            $table->integer('two_star_count')->default(1);
            $table->integer('one_star_count')->default(1);
        });
    }

    public function down()
    {
        Schema::drop('star_stats');
        Schema::drop('rate_stats');
    }
}
