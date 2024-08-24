<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \App\Models\Task;

class ResetDailyHabits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-daily-habits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets the is_done field to 0 for daily habits.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
		// Update the tasks table
		$affectedRows = Task::where('is_daily_habit', 1)->update(['is_done' => 0]);

		$now = date('Y-m-d H:i:s');
		$this->info('Daily habits reset successfully! '.$affectedRows.' rows affected. Last executed in '.$now);
	}
}
