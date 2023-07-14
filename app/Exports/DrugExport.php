<?php

namespace App\Exports;

use App\Models\Drug;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DrugExport implements
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
        return Drug::all();
    }

    // Metode ini digunakan untuk memetakan setiap baris data menjadi array yang sesuai dengan struktur kolom
    public function map($row): array
    {
        return [
            $row->nama,
            $row->stok,
            $row->min_stok,
            $row->harga,
        ];
    }

    // Metode ini mengembalikan array yang berisi judul kolom pada file Excel
    public function headings(): array
    {
        return [
            'Nama',
            'Stok',
            'Min Stok',
            'Harga'
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
