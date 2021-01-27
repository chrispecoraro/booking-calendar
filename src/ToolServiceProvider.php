<?php

namespace Tipoff\BookingCalendar;

use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'booking-calendar');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'fullcalendar');

        Nova::serving(function (ServingNova $event) {
            Nova::provideToScript([
                'fullCalendarLicenseKey' => config('fullcalendar.license_key'),
            ]);
        });
    }
}
