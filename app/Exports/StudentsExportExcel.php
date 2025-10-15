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

# Set Max Memory Limit
ini_set('memory_limit', '1G');

class StudentsExportExcel implements WithMapping, WithHeadings, WithStyles, WithEvents, WithColumnWidths, ShouldQueue, WithCustomQuerySize, WithChunkReading, FromCollection
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
            'E' => 20,
            'F' => 20,
            'G' => 25,
            'H' => 35,
            'I' => 35,
            'J' => 35,
            'K' => 35,
            'L' => 35,
            'M' => 35,
            'N' => 50,
            'O' => 35,
            'P' => 35,
            'Q' => 35,
            'R' => 35,
            'S' => 35,
            'T' => 35,
            'U' => 35,
            'V' => 35,
            'X' => 105,
            'Z' => 35, 
            'AA' => 40,
            'AB' => 40,
            'AC' => 40,
            'AD' => 40,
            'AE' => 40,
            'AF' => 40
        ];
    }

    public function headings(): array
    {
        return [
            '#ID',
            'Nome',
            'CPF',
            'Sexo',
            'Data de Nascimento',
            'Telefone',
            'País (Nacionalidade)',
            'Estado (Nacionalidade)',
            'Cidade (Nacionalidade)',
            'Mãe',
            'Telefone (mãe)',
            'Pai',
            'Telefone (pai)',
            'Contatos de Emergencia',
            'Escola (atual)',
            'Ensino (atual)',
            'Ano Letivo (atual)',
            'Ano Escolar (atual)',
            'Turma (atual)',
            'Período (atual)',
            'Identificação Polo (ativo)',
            'Identificação Programa (ativo)',
            'Identificação Turma (ativo)',
            'Documentos Apresentados',
            'Status',
          	'CEP',
          	'Pais',
            'Cidade',
          	'Estado',
          	'Rua',
          	'Numero',
          	'Bairro'
        ];
    }

    public function map($students): array
    {
        //dd($students->city->name);
        return [
          
          
            $students->getId(),
            $students->name,
            $students->document,
            $students->sex->name,
            \Carbon\Carbon::parse($students->birth_date)->format('d/m/Y'),
            $students->phone,
            ((isset($students->nationality_country->name)) ? $students->nationality_country->name : '--'),
            ((isset($students->nationality_state->name)) ? $students->nationality_state->name : '--'),
            ((isset($students->nationality_city->name)) ? $students->nationality_city->name : '--'),
            $students->mother_name,
            $students->mother_phone,
            $students->father_name,
            $students->father_phone,

            ($students->contacts()->count() > 0) ? $students->contacts()->get()->map(function ($contact) {
                return $contact->name . ' | ' . $contact->phone;
            }) : '',

            (isset($students->schools()->first()->school)) ? $students->schools()->first()->school->name : '--',
            (isset($students->schools()->first()->teaching)) ? $students->schools()->first()->getTeaching() : '--',
            (isset($students->schools()->first()->academic_year)) ? $students->schools()->first()->academic_year : '--',
            (isset($students->schools()->first()->school_year->name)) ? $students->schools()->first()->school_year->name : '--',
            (isset($students->schools()->first()->classe)) ? $students->schools()->first()->classe : '--',
            (isset($students->schools()->first()->period)) ? $students->schools()->first()->getPeriod() : '--',

            (isset($students->registrations()->first()->unit->name)) ? $students->registrations()->first()->unit->name : '--',
            (isset($students->registrations()->first()->program->name)) ? $students->registrations()->first()->program->name : '--',
            (isset($students->registrations()->first()->classe->name)) ? $students->registrations()->first()->classe->name : '--',

            (($students->responsible_document) ? 'Cópia do RG / CPF do Responsável' : '') . (($students->certificate_birth) ? ' | Cópia da Cert. de Nac. ou RG do adolescente' : '') . (($students->certificate_of_schooling) ? ' | Atestado de Escolaridade' : '') . (($students->certificate_medical) ? ' | Atestado Médico' : ''),
            $students->getStatus()->text , 
          	$students->zipcode,
            $students->country->name,  
          	$students->city->name,
          	$students->state->name,
            $students->address,
            $students->number,
            $students->district

          
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
                $event->sheet->getDelegate()->getStyle('A1:AF1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('6cff95');
            },
        ];
    }

    public function failed(Throwable $exception): void
    {
        // handle failed export
       echo $exception;
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
