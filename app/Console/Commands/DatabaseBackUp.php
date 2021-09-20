<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use App\Mail\BackedUpDatabase;
use Carbon\Carbon;
use DB;
use App\Models\Backup;
use Exception;
use Illuminate\Console\Command;
use App\Events\DatabaseBackUpNotification;

class DatabaseBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic database backup.';

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
        try {
            $filename = "backup-" . Carbon::now()->format('Y-m-d') . strtotime(Carbon::now()) . ".gz";
            $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
            $returnVar = null;
            $output = null;

            exec($command, $output, $returnVar);
            activity('backup')->log('Backup, automatic processing. Dump new file already.');
        } catch (Exception $ex) {
            $result = Backup::create([
                'chanel' => 'backup_log',
                'message' => $ex->getMessage(),
                'status' => 'failure',
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now()
            ]);
            activity('backup')->log("Backup, automatic processing failure. because $ex->getMessage()");
            Mail::to(explode(',', env("MAIL_ADMINISTRATOR")))->send(new BackedUpDatabase($result));
        } finally {
            $result = Backup::create([
                'chanel' => 'backup_log',
                'message' => 'auto run schedule command database:backup',
                'status' => 'success',
                'created_at' =>  Carbon::now(),
                'updated_at' =>  Carbon::now()
            ]);
            Mail::to(explode(',', env("MAIL_ADMINISTRATOR")))->send(new BackedUpDatabase($result, $filename));
            activity('backup')->log("Backup, automatic processing success. and send email to ".env("MAIL_ADMINISTRATOR")." already.");
            event(new DatabaseBackUpNotification($result));
        }
    }
}