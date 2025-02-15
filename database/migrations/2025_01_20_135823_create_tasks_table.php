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
    public function up(): void
    {
        Schema::create(
            'tasks', function (Blueprint $table) {
                $table->id();
                $table->string('title', 255)->notNullable();
                $table->text('description')->nullable()->default(null);
                $table->dateTime('due_date')->notNullable();
                $table->dateTime('create_date')->notNullable();
                $table->enum('priority', ['низкий','средний','высокий'])
                    ->notNullable();
                $table->string('category')->notNullable();
                $table->enum('status', ['не выполнена','выполнена'])->notNullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
