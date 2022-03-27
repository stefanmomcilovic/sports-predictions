<?php

namespace App\Console\Commands;

use App\Models\PredictionsData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class cleanDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete every record older than 31 days.';

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
        $cleanDB = PredictionsData::where('prediction_created_at', '<', date('Y-m-d H:i:s', strtotime('-31 day')))->delete();
        $this->info("Cleaning database... " . $cleanDB);
        Log::info("Cleaning database... " . $cleanDB);
    }
}
