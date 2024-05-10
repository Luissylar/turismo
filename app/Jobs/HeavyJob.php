<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;


class HeavyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $factors = $this->factorize($this->number);
        Log::info("Factors of {$this->number} are: " . implode(', ', $factors));
    }

    private function factorize($number)
    {
        $factors = [];
        for ($i = 2; $i * $i <= $number; $i++) {
            while ($number % $i == 0) {
                $factors[] = $i;
                $number /= $i;
            }
        }
        if ($number > 1) {
            $factors[] = $number;
        }
        return $factors;
    }
}
