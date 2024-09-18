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
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('head1')->nullable();
            $table->text('head2')->nullable();
            $table->text('head3')->nullable();
            $table->text('signals')->nullable();
            $table->text('investment')->nullable();
            $table->text('community_support')->nullable();
            $table->text('mentorship')->nullable();
            $table->text('proven_strategy')->nullable();
            $table->text('commitment')->nullable();
            $table->text('trading_tools')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepages');
    }
};
