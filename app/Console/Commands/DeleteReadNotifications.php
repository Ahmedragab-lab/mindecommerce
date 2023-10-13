<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteReadNotifications extends Command
{
    protected $signature   = 'read-notification:delete';
    protected $description = 'Remove seen notifications older than 5 days ago';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        return  DB::table('notifications')->whereNotNull('read_at')
                                            ->whereDate('read_at','<= ', now()->subDays(5)->toDateTimeString() )
                                            ->delete();
    }
}
