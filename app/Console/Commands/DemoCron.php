<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\WelcomeMail;
use Mail;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
     
        $users = User::all();
        foreach ($users as $user) {
            
            
            $date_published = $user->last_published;
            $ldate = date('Y-m-d H:i:s');
    
    
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date_published);
            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ldate);
            $diff_in_days = $to->diffInDays($from);
            
            if($diff_in_days >= 7)
            {
                Mail::to($user)->send(new WelcomeMail($user));
            }

            
        }
      
        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
