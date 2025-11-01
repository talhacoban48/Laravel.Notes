<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("description")->nullable();
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("category_id")->nullable()->constrained()->cascadeOnDelete();
            $table->enum("status", allowed: ["pending", "in_progress", "completed"])->default("pending");
            $table->enum("priority", allowed: ["low", "medium", "high"])->default("medium");
            $table->dateTime("due_date")->nullable();
            $table->dateTime("completed_at")->nullable();
            // $table->softDeletes();
            $table->boolean("is_starred")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
