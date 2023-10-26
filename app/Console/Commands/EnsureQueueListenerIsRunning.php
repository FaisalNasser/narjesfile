<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class EnsureQueueListenerIsRunning extends Command
{
    protected $signature = 'queue:checkup';

    protected $description = 'Ensure that the queue listener is running.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (! $this->isQueueListenerRunning()) {
            $this->comment('Queue listener is being started.');
            $pid = $this->startQueueListener();

            if ($pid) {
                $this->saveQueueListenerPID($pid);
                $this->comment('Queue listener started with PID ' . $pid);
            } else {
                Log::error('Failed to start queue listener.');
                $this->error('Failed to start queue listener.');
            }
        } else {
            $this->comment('Queue listener is already running.');
        }
    }

    private function isQueueListenerRunning()
    {
        $pid = $this->getLastQueueListenerPID();
        if (! $pid) {
            return false;
        }

        $process = exec("ps -p $pid -opid=,cmd=");
        $processIsQueueListener = !empty($process); // Checking if process is running

        return $processIsQueueListener;
    }

    private function getLastQueueListenerPID()
    {
        $pidFilePath = storage_path('app/queue.pid'); // Using storage directory instead for better permissions
        if (! file_exists($pidFilePath)) {
            return false;
        }

        return file_get_contents($pidFilePath);
    }

    private function saveQueueListenerPID($pid)
    {
        $pidFilePath = storage_path('app/queue.pid'); // Using storage directory instead
        file_put_contents($pidFilePath, $pid);
    }

    private function startQueueListener()
    {
        $command = env('PATH_PHP', 'php') . ' ' . base_path() . '/artisan queue:work --queue=default --delay=0 --memory=256 --once --timeout=90 --sleep=5 --tries=3 > /dev/null & echo $!';
        
        $pid = exec($command);

        return $pid;
    }
}
