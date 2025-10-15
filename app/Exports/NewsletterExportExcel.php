<?php

namespace App\Exports;

use Throwable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithCustomQuerySize;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExportExcel implements WithMapping, WithHeadings, WithStyles, WithEvents, WithColumnWidths, ShouldQueue, WithCustomQuerySize, WithChunkReading, FromCollection
{
    use Exportable, SerializesModels;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function collection()
    {
        return $this->result;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 45,
            'C' => 20,
            'D' => 15,
        ];
    }

    public function headings(): array
    {
        return [
            '#ID',
            'E-mail',
            'status',
        ];
    }

    public function map($newsletter): array
    {
        // dd($newsletter->schools()->first()->school);
        return [
            $newsletter->getId(),
            $newsletter->email,
            $newsletter->getStatus()->text,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true], 'cell' => ['background' => '0B2A97', 'color' => 'FFFFFF']],
        ];
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:W1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('6cff95');
            },
        ];
    }


    public function querySize(): int
    {
        $size = $this->result->count();
        return $size;
    }


    public function chunkSize(): int
    {
        return 100;
    }

    public function handle()
    {
        echo "Import finished.";
    }
}
