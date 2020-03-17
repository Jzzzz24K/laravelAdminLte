<?php

namespace App\Providers\App\Listeners;

use App\Model\View;
use App\Providers\Login;
use Carbon\Carbon;
use http\Client\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StatisticsViews
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $ip = $event->request->getClientIp();
        $date = Carbon::now()->toDateString();
        View::whereDate('created_at',$date)  ->firstOrCreate(['ip'=>$ip]);
    }
}
