<?php

namespace App\Observers;

use App\Models\File;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class FileObserver
{
    public function creating(File $file)
    {
        //
    }

    public function updating(File $file)
    {
        //
    }
}