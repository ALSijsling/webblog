<?php

namespace App\Console\Commands;

use App\Mail\Newsletter;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weekly newsletter';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('newsletter', 1)->get();

        foreach ($users as $user) {
            Mail::to($user)->send(new Newsletter());
        }
    }
}
