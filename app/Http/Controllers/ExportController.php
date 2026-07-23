<?php

namespace App\Http\Controllers;

use App\Exports\FilmsExport;
use App\Models\Film;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function pdf()
    {
        $films = Film::all();

        $pdf = Pdf::loadView('film.pdf', compact('films'));

        return $pdf->download('daftar-film.pdf');
    }

    public function excel()
    {
        return Excel::download(new FilmsExport, 'daftar-film.xlsx');
    }
}