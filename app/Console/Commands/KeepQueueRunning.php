<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
class KeepQueueRunning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:keepalive';

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
    while (true) {
        try {
            // This will start the queue worker.
            Artisan::call('queue:work', ['--daemon' => true]);

            // Pause for 5 seconds.
            sleep(5);
            
            // Stop the worker.
            Artisan::call('queue:restart');

        } catch (\Exception $e) {
            // Handle any exceptions, perhaps log them.
            Log::error("An error occurred while managing the queue: " . $e->getMessage());
            sleep(10); // Wait for a bit before retrying.
        }
    }
}
}
