<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Issue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteCompletedAttachments implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $issue;

    /**
     * Create a new job instance.
     * Job to delete attachments on completion done
     *
     * @return void
     */
    public function __construct(Issue $issue)
    {
        $this->issue = $issue;
        \Log::info($issue);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        // Get the file path
        $filePath = $this->issue->attachments;
        \Log::info($filePath);

        // Check if the file exists, choose disk, then pass path to helper method
        if (Storage::disk('public')->exists($filePath)) {
            // Delete the file
            Storage::disk('public')->delete($filePath);
        }

        // Update the Issue Model instance
        $this->issue->attachments = null;
        $this->issue->save();
        \Log::info('Attachment Deleted');
    }

    public function failed(\Throwable $e)
    {
        \Log::info('job failed');
    }
}
