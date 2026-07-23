<?php

namespace App\Exports;

use App\Models\Film;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FilmsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Film::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul',
            'Genre',
            'Sutradara',
            'Tahun',
            'Rating',
        ];
    }

    public function map($film): array
    {
        static $number = 0;
        $number++;

        return [
            $number,
            $film->title,
            $film->genre,
            $film->director,
            $film->release_year,
            $film->rating,
        ];
    }
}