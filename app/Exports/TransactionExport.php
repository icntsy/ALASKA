<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class TransactionExport implements
    FromCollection,
    WithMapping,
    WithHeadings,
    WithStyles,
    ShouldAutoSize
{

    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Transaction::query();

    if ($this->startDate && $this->endDate) {
        $startDate = Carbon::parse($this->startDate)->startOfDay();
        $endDate = Carbon::parse($this->endDate)->endOfDay();
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    return $query->get();
    }

    // Metode ini digunakan untuk memetakan setiap baris data menjadi array yang sesuai dengan struktur kolom
    public function map($row): array
    {
        return [

            $row->queue->patient->name,
            Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->isoFormat('D MMMM Y'),
            $row->queue->doctor->name,
            $row->queue->service->name,
            $row->queue->jenis_rawat ?? '-',
            $row->payment,

        ];
    }

    // Metode ini mengembalikan array yang berisi judul kolom pada file Excel
    public function headings(): array
    {
        return [

            'Nama Lengkap',
            'Tanggal Transaksi',
            'Dokter / Bidan',
            'Layanan',
            'Jenis Rawat',
            'Jumlah Pembayaran'

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
