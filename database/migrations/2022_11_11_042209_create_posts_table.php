<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
			$table->longText('title')->unique();
			$table->text('image')->nullable();
			$table->longText('content');
			$table->enum('status', array('active', 'pending'));
            $table->string('tags')->nullable();
			$table->bigInteger('category_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('posts');
    }
};
