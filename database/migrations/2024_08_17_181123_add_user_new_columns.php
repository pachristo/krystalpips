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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_verified')->default(false)->nullable();
            $table->string('sub_id')->default('')->nullable();
            $table->string('sub_status')->default('0')->nullable();
            $table->integer('sub_count')->default(0)->nullable();
            $table->string('acct_name')->nullable();
            $table->string('acct_no')->nullable();
            $table->string('telegram_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
