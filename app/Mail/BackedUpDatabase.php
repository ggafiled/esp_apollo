<?php

namespace App\Mail;

use App\Models\Backup;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BackedUpDatabase extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $backup;

    public function __construct(Backup $backup, $file = null)
    {
        $this->backup = $backup;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->file !== null) {
            return $this->view('emails.database.backedup')
                ->attach(storage_path("app/backup/$this->file"), [
                    'as' => $this->file,
                    'mime' => 'application/gzip',
                ]);
        } else {
            return $this->view('emails.database.backedup');
        }
    }
}