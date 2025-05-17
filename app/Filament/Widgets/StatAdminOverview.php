<?php

namespace App\Filament\Widgets;

Use App\Models\User;
Use App\Models\Category;
Use App\Models\Book;
Use App\Models\Borrowing;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::query()->count())
            ->description('All User From the Database')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Stat::make('Books', Book::query()->count())
            ->description('All Book From the Database')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
            Stat::make('Categories', Category::query()->count())
            ->description('All Category From the Database')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Borrowings', Borrowing::query()->count())
            ->description('All Borrowing From the Database')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),

            
        ];
    }
}
