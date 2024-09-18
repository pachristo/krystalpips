<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Transaction;

class StatisticsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Card::make('Total Users', User::count())
            ->description('Total number of registered users')
            ->descriptionIcon('heroicon-s-users'),

        Card::make('Total Blogs', Blog::count())
            ->description('Blog Post count')
            ->descriptionIcon('heroicon-s-book-open'),
            Card::make('Total Testimonial', Testimonial::count())
            ->description('Testimonial count')
            ->descriptionIcon('heroicon-s-ticket'),



            Card::make('Total Faqs', Faq::count())
            ->description('Faq  count')
            ->descriptionIcon('heroicon-s-question-mark-circle'),
            Card::make('Total Subscription Count', Transaction::count())
            ->description('subscription  count')
            ->descriptionIcon('heroicon-s-shopping-cart'),
        ];
    }
}
