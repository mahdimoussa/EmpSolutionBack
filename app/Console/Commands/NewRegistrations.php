<?php

namespace App\Console\Commands;

use App\Mail\newRegistrationsMail;
use App\Models\User;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NewRegistrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registrations:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to Admin';

    /**
     * Create a new command instance.'App\Console\Commands\Carbon'
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Email Sent To Admin');
        $newUsers = User::where('created_at','>=', \Carbon\Carbon::now()->subDays(1))->count();
        Mail::to('mahdi.m.moussa@gmail.com')->send(new newRegistrationsMail($newUsers));
    }
}
