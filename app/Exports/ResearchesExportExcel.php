<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromArray;

# Events
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Files\LocalTemporaryFile;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

# Sheets
use App\Exports\Sheets\FirstResearche;
use Maatwebsite\Excel\Events\BeforeSheet;

class ResearchesExportExcel  implements ShouldQueue, WithEvents,  FromArray
{
    use Exportable, SerializesModels;

    public $template;
    public $items;

    public function __construct($result)
    {
        $this->result = $result;
        $this->items = $result;
        $this->template = public_path('global/DefaultExcelResearches.xlsx');
    }

    public function array(): array
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [

            BeforeSheet::class => function (BeforeSheet $event) {
            },

            BeforeWriting::class => function (BeforeWriting $event) {
                $event->writer->reopen(new LocalTemporaryFile($this->template), \Maatwebsite\Excel\Excel::XLSX);

                $event->writer->getSheetByIndex(0);
                $this->calledByEvent = true; // set the flag
                // $event->writer->getSheetByIndex(0)->export($event->getConcernable()); // call the export on the first sheet

                # 
                $event->getWriter()->getSheetByIndex(0)->setCellValue('H1', 'FORMULÁRIO PARA CÁLCULO DA PESQUISA INSTITUCIONAL - ' . $this->items["year"]);
                $event->getWriter()->getSheetByIndex(1)->setCellValue('H1', 'FORMULÁRIO PARA CÁLCULO DA PESQUISA INSTITUCIONAL - ' . $this->items["year"]);
                $event->getWriter()->getSheetByIndex(2)->setCellValue('H1', 'FORMULÁRIO PARA CÁLCULO DA PESQUISA INSTITUCIONAL - ' . $this->items["year"]);

                # 
                $event->getWriter()->getSheetByIndex(0)->setCellValue('C3', $this->items["unit"] . " - " . $this->items["classe"]);
                $event->getWriter()->getSheetByIndex(1)->setCellValue('C3', $this->items["unit"] . " - " . $this->items["classe"]);
                $event->getWriter()->getSheetByIndex(2)->setCellValue('C3', $this->items["unit"] . " - " . $this->items["classe"]);

                #
                $event->getWriter()->getSheetByIndex(0)->setCellValue('V3', $this->items["program"]);
                $event->getWriter()->getSheetByIndex(1)->setCellValue('V3', $this->items["program"]);
                $event->getWriter()->getSheetByIndex(2)->setCellValue('V3', $this->items["program"]);



                $line = 9;
                $line_2 = 2;
                foreach ($this->items["rows"] as $key => $value) {



                    if (!empty($value["instutional"])) {
                        foreach ($value["instutional"] as $sheet => $item) {

                            if ($sheet === 0) {
                                $event->getWriter()->getSheetByIndex(5)->setCellValue('B' . $line_2, $item->text);
                            }

                            if ($sheet === 1) {
                                $event->getWriter()->getSheetByIndex(5)->setCellValue('C' . $line_2, $item->text);
                            }

                            if ($sheet === 2) {
                                $event->getWriter()->getSheetByIndex(5)->setCellValue('D' . $line_2, $item->text);
                            }


                            # interest_in_studying 
                            if ((int) $item->interest_in_studying === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('D' . $line, 1);
                            }
                            if ((int) $item->interest_in_studying === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('E' . $line, 1);
                            }
                            if ((int) $item->interest_in_studying === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('F' . $line, 1);
                            }
                            if ((int) $item->interest_in_studying === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('G' . $line, 1);
                            }


                            # behavior 
                            if ((int) $item->behavior === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('H' . $line, 1);
                            }
                            if ((int) $item->behavior === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('I' . $line, 1);
                            }
                            if ((int) $item->behavior === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('J' . $line, 1);
                            }
                            if ((int) $item->behavior === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('K' . $line, 1);
                            }


                            # responsibility 
                            if ((int) $item->responsibility === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('L' . $line, 1);
                            }
                            if ((int) $item->responsibility === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('M' . $line, 1);
                            }
                            if ((int) $item->responsibility === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('N' . $line, 1);
                            }
                            if ((int) $item->responsibility === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('O' . $line, 1);
                            }

                            # respect 
                            if ((int) $item->respect === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('P' . $line, 1);
                            }
                            if ((int) $item->respect === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('Q' . $line, 1);
                            }
                            if ((int) $item->respect === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('R' . $line, 1);
                            }
                            if ((int) $item->respect === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('S' . $line, 1);
                            }

                            # self_esteem 
                            if ((int) $item->self_esteem === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('T' . $line, 1);
                            }
                            if ((int) $item->self_esteem === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('U' . $line, 1);
                            }
                            if ((int) $item->self_esteem === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('V' . $line, 1);
                            }
                            if ((int) $item->self_esteem === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('W' . $line, 1);
                            }

                            # habits 
                            if ((int) $item->habits === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('X' . $line, 1);
                            }
                            if ((int) $item->habits === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('Y' . $line, 1);
                            }
                            if ((int) $item->habits === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('Z' . $line, 1);
                            }
                            if ((int) $item->habits === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('AA' . $line, 1);
                            }

                            # care 
                            if ((int) $item->care === 1) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('AB' . $line, 1);
                            }
                            if ((int) $item->care === 2) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('AC' . $line, 1);
                            }
                            if ((int) $item->care === 3) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('AD' . $line, 1);
                            }
                            if ((int) $item->care === 4) {
                                $event->getWriter()->getSheetByIndex($sheet)->setCellValue('AE' . $line, 1);
                            }
                        }
                    }


                    # 
                    $event->getWriter()->getSheetByIndex(0)->setCellValue('C' . $line, $value["student"]->name);
                    $event->getWriter()->getSheetByIndex(1)->setCellValue('C' . $line, $value["student"]->name);
                    $event->getWriter()->getSheetByIndex(2)->setCellValue('C' . $line, $value["student"]->name);

                    # Sheet 4
                    $event->getWriter()->getSheetByIndex(4)->setCellValue('A' . $line_2, $value["student"]->name);
                    $event->getWriter()->getSheetByIndex(4)->setCellValue('B' . $line_2, $value["student"]->sex->name);
                    $event->getWriter()->getSheetByIndex(4)->setCellValue('C' . $line_2, $value["student"]->getYears());
                    if (!empty($value["research"])) {

                        $event->getWriter()->getSheetByIndex(4)->setCellValue('D' . $line_2, $value["research"]->when_did_you_start_program);
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('E' . $line_2, $value["research"]->how_did_you_program());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('F' . $line_2, $value["research"]->what_led_to_program());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('G' . $line_2, $value["research"]->have_you_ever_stopped_studying());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('H' . $line_2, $value["research"]->in_what_year);
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('I' . $line_2, $value["research"]->did_you_need_tutoring());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('J' . $line_2, $value["research"]->had_difficulty_learning());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('K' . $line_2, $value["research"]->what_is_the_family_situation());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('L' . $line_2, $value["research"]->with_currently_lives());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('M' . $line_2, $value["research"]->how_many_people_same_household());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('N' . $line_2, $value["research"]->when_you_child_stay());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('O' . $line_2, $value["research"]->what_living_conditions());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('P' . $line_2, $value["research"]->your_child_has_social_network());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('Q' . $line_2, $value["research"]->what_is_accessing_the_internet());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('R' . $line_2, $value["research"]->what_family_means_of_transportation());
                        $event->getWriter()->getSheetByIndex(4)->setCellValue('S' . $line_2, $value["research"]->level_of_education());
                    }



                    $event->getWriter()->getSheetByIndex(5)->setCellValue('A' . $line_2, $value["student"]->name);

                    $line++;
                    $line_2++;
                }




                $event->writer->setActiveSheetIndex(0);
                return $event->getWriter()->getSheetByIndex(0);
            },

            // AfterSheet::class => function (AfterSheet $event) {
            // }
        ];
    }
}
