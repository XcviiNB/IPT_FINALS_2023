<?php

namespace App\Console\Commands;

use App\Mail\DailyGamesReminder;
use App\Mail\NewGameAvailable;
use App\Models\Games;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNewGameEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-new-game';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email to all users about the new game';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::role('client_user')->get();

        foreach ($users as $user) {
            try {
                Mail::to($user->email)->send(new DailyGamesReminder());
                $this->info('Reminder email sent to: ' . $user->email);
            } catch (\Exception $exception) {
                $this->error('Failed to send reminder email to ' . $user->email . ': ' . $exception->getMessage());
            }
        }
    }
}
