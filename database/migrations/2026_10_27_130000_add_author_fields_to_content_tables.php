<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('author')->nullable()->after('photo');
            $table->string('author_role')->nullable()->after('author');
            $table->string('author_photo')->nullable()->after('author_role');
            $table->text('author_bio')->nullable()->after('author_photo');
        });

        Schema::table('service_pages', function (Blueprint $table) {
            $table->string('author')->nullable()->after('footer_content');
            $table->string('author_role')->nullable()->after('author');
            $table->string('author_photo')->nullable()->after('author_role');
            $table->text('author_bio')->nullable()->after('author_photo');
        });

        if (Schema::hasTable('courses_pricings') && ! Schema::hasColumn('courses_pricings', 'author_role')) {
            Schema::table('courses_pricings', function (Blueprint $table) {
                $table->string('author_role')->nullable()->after('author');
                $table->string('author_photo')->nullable()->after('author_role');
                $table->text('author_bio')->nullable()->after('author_photo');
            });
        }
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['author', 'author_role', 'author_photo', 'author_bio']);
        });

        Schema::table('service_pages', function (Blueprint $table) {
            $table->dropColumn(['author', 'author_role', 'author_photo', 'author_bio']);
        });

        if (Schema::hasTable('courses_pricings') && Schema::hasColumn('courses_pricings', 'author_role')) {
            Schema::table('courses_pricings', function (Blueprint $table) {
                $table->dropColumn(['author_role', 'author_photo', 'author_bio']);
            });
        }
    }
};
