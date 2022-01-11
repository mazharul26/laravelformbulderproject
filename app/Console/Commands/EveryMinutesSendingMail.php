<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class EveryMinutesSendingMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:everyminutessendingmail';

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
        \Log::info("Mail sending successfully.");
        $data =  User::get();
        // \Mail::to("admin@gmail.com", "Great")->send(new MyTestMail($data));
        // dd("Email is Sent.");
           $emails = ['mazharul.islam@sarbs.net','md.mazharuli30@gmail.com'];

            \Mail::send('emails.myTestMail', ['datas'=>$data], function($message) use ($emails)
            {
                $message->to($emails)->subject('Warehouse Inventory');
            });
    }
}
