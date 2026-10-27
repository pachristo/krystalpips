<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('head1')->nullable();
            $table->text('head2')->nullable();
            $table->string('cta_label')->nullable()->default('Get started');
            $table->string('packages_heading')->nullable()->default('Choose a package');
            $table->longText('intro')->nullable();
            $table->longText('footer_content')->nullable();
            $table->timestamps();
        });

        $now = now();
        $pages = [
            [
                'key' => 'signals',
                'name' => 'Signals',
                'title' => 'Forex Signals | Krystal Pips',
                'meta_description' => 'Get precise, timely Forex signals from Krystal Pips. Choose a plan and start trading with expert insights.',
                'meta_keywords' => 'forex signals, trading signals, krystal pips',
                'head1' => 'Forex Signals that move with the market',
                'head2' => 'Receive precise, timely signal calls designed to help you maximize opportunities and manage risk.',
                'cta_label' => 'View packages',
                'packages_heading' => 'Signal packages',
                'intro' => '<p>Pick a package that matches your trading style. Payments unlock access to our VIP signal channels.</p>',
                'footer_content' => '<h2>Why Krystal Pips signals?</h2><p>Our analysts combine technical, fundamental, and sentiment analysis to deliver high-quality trade ideas across major pairs, gold, and selected indices.</p>',
            ],
            [
                'key' => 'mentorship',
                'name' => 'Mentorship',
                'title' => 'Forex Mentorship | Krystal Pips',
                'meta_description' => 'One-on-one Forex mentorship with seasoned traders. Build skills, strategy, and confidence with Krystal Pips.',
                'meta_keywords' => 'forex mentorship, trading coach, krystal pips',
                'head1' => 'Mentorship built around your goals',
                'head2' => 'Learn directly from experienced traders with personalized guidance, feedback, and accountability.',
                'cta_label' => 'View packages',
                'packages_heading' => 'Mentorship packages',
                'intro' => '<p>Choose a mentorship plan and get structured support as you grow into a consistent trader.</p>',
                'footer_content' => '<h2>What you gain</h2><p>Personalized strategy reviews, live session access, and a clear path from beginner setups to professional risk management.</p>',
            ],
            [
                'key' => 'investment',
                'name' => 'Investment',
                'title' => 'Investment Program | Krystal Pips',
                'meta_description' => 'Grow your capital with Krystal Pips investment programs guided by experienced market professionals.',
                'meta_keywords' => 'forex investment, managed growth, krystal pips',
                'head1' => 'Invest with clarity and confidence',
                'head2' => 'Strategic investment options designed for steady growth, transparency, and professional oversight.',
                'cta_label' => 'View packages',
                'packages_heading' => 'Investment packages',
                'intro' => '<p>Select an investment package and let our team put a disciplined process to work for you.</p>',
                'footer_content' => '<h2>How our investment program works</h2><p>We focus on risk-aware allocation, clear reporting, and realistic return targets aligned with your capital size.</p>',
            ],
            [
                'key' => 'account-management',
                'name' => 'Account management',
                'title' => 'Account Management | Krystal Pips',
                'meta_description' => 'Professional Forex account management from Krystal Pips. Let experts handle your trades while you stay informed.',
                'meta_keywords' => 'account management, forex managed account, krystal pips',
                'head1' => 'Account management, handled for you',
                'head2' => 'Sit back while our experts manage your trading account with disciplined execution and clear communication.',
                'cta_label' => 'View packages',
                'packages_heading' => 'Account management packages',
                'intro' => '<p>Choose a package based on your account size and let our team take over day-to-day execution.</p>',
                'footer_content' => '<h2>Managed with discipline</h2><p>Every account is handled with risk limits, transparent updates, and a focus on capital preservation first.</p>',
            ],
            [
                'key' => 'courses',
                'name' => 'Courses',
                'title' => 'Trading Courses | Krystal Pips',
                'meta_description' => 'Learn Forex trading with Krystal Pips courses — practical lessons, strategies, and materials for lasting results.',
                'meta_keywords' => 'forex courses, trading education, krystal pips',
                'head1' => 'Courses that sharpen your edge',
                'head2' => 'Practical trading education packed with strategies, analysis frameworks, and real-world examples.',
                'cta_label' => 'View packages',
                'packages_heading' => 'Course packages',
                'intro' => '<p>Select a course package and start building a stronger foundation for consistent trading decisions.</p>',
                'footer_content' => '<h2>Learn with purpose</h2><p>Our materials cover market structure, risk management, execution psychology, and the tools professionals use daily.</p>',
            ],
        ];

        foreach ($pages as $page) {
            DB::table('service_pages')->insert(array_merge($page, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('service_pages');
    }
};
