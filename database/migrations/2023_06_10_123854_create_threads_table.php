<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->id();

			$table->string('key')->nullable();
			$table->string('password_hash');

            $table->timestamps();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();

			$table->foreignId('thread_id')->constrained()->onDelete('cascade');
			$table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
			$table->text('message');

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
        Schema::dropIfExists('threads');
    }
}
