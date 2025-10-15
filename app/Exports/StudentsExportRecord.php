<?php

namespace App\Exports;


use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

use File;

use ZipArchive;
use Illuminate\Support\Facades\Storage;
# Set Max Memory Limit
ini_set('memory_limit', '1G');

class StudentsExportRecord implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $result;
    protected $footer;
    protected $zipName;

    public function __construct($result, $footer = null, $zipName)
    {
        $this->result = $result;
        $this->footer = $footer;
        $this->zipName = $zipName;
    }

    public function handle()
    {
        $files = [];

        # 
        $folder = $this->zipName;


        foreach ($this->result as $key => $content) {

            $document = (object) [];
            if ($this->footer) {
                $document->footer = $this->footer;
            }

            $pdf = \PDF::loadView('backend.pages.students.export.pdf', [
                'content' => $content,
                'document' => $document,
            ]);

            $pathPdf = 'public/exports/pdf/' . $folder . '/' . Str::slug($content->name, '-') . '-' . $content->getId() . '.pdf';
            Storage::put($pathPdf, $pdf->output());
        }

        $files = File::files(storage_path('app/public/exports/pdf/' . $folder));

        # Create Ziped Files
        $zip = new \ZipArchive;
        if ($zip->open(storage_path('app/public/exports/zip/' . $this->zipName . '.zip'), \ZipArchive::CREATE) === TRUE) {

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }
        Storage::deleteDirectory('/public/exports/pdf/' . $folder);
    }
}
