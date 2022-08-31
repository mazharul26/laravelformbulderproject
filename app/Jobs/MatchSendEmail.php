<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\MyTestMail;
class MatchSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $details = [
            'title' => "This is test Mail Queue use",
            'name' => "Md Mazharul Islam",
            'email' => "mazharul@gmail.com",
        ];
        $mail = new MyTestMail($details);
        \Mail::to('mazharul.islam@sarbs.net')
        ->cc('md.mazharuli30@gmail.com')
        ->bcc('md.mazharuli26@yahoo.com')
        ->send($mail);
        dd("Sending Mail Successfully.");
    }
}
