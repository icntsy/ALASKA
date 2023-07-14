<?php

namespace App\Exports;

use App\Models\Diagnosis;
use App\Models\Room;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DiagnosisExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Diagnosis::all();
    }

    // Metode ini digunakan untuk memetakan setiap baris data menjadi array yang sesuai dengan struktur kolom
    public function map($row): array
    {
        return [
            $row->category,
            $row->subcategory,
            $row->english_name,
            $row->indonesian_name
        ];
    }

     // Metode ini mengembalikan array yang berisi judul kolom pada file Excel
    public function headings(): array
    {
        return [
            'Category',
            'SubCategory',
            'English Name',
            'Indonesian Name'
        ];
    }

     // Metode ini mengatur gaya tampilan pada file Excel
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => 'true']]
        ];
    }
}
