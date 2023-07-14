@php
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalRecordDrugs;
@endphp


<!DOCTYPE html>
<html>
<head>
    <title>Klinik Pratama Laa-Tachzan - Kwitansi</title>
    <style>
        .row {
            display: flex;
            justify-content: space-between;
        }

        .column {
            flex: 1;
        }

        .column .clinic {
            text-align: right;
            font-size: 14px;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .column .clinic {
            text-align: right;
            font-size: 14px;
        }
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .address {
            text-align: right;
        }

        .kwitansi {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .customer {
            text-align: left;
        }

        table {
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }

        .content-border {
            border: 1px solid #000;
            padding: 10px;
            /* margin: 400px;
            margin-top: 50px; */
        }
    </style>
</head>
<body>
    <div class="content-border">
        {{-- <div class="container">
            <img src="{{ asset('images/logo-inversesss.png') }}" alt="Logo" style="width: 100px; height: 100px;">




        </div> --}}
        <div class="column">
            <div class="kwitansi">KWITANSI</div>
            <br>
            <div class="column">
                <div class="clinic">Klinik Pratama Laa-Tachzan</div> <!-- Add this line -->
            </div>
            <div class="column">
                <div class="clinic">Jl. Bypass Kliwed lama Kec. Kertasmaya</div> <!-- Add this line -->
            </div>
            <div class="column">
                <div class="clinic">Kab. Indramayu</div> <!-- Add this line -->
            </div>
            <div class="column">
                <div>Tanggal :  {!! Carbon::createFromFormat('Y-m-d H:i:s', $transaksi->created_at)->isoFormat('D MMMM Y') !!}</div>
                <div class="customer">Nama Pelanggan : {{ $transaksi->queue->patient->name }}</div>
            </div>
            <br>


            <table>
                <thead>
                    <tr>
                        <th style="width: 20%;">No.</th>
                        <th style="width: 50%;">Keterangan</th>
                        <th style="width: 30%;">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Rawat {{$transaksi->queue->jenis_rawat = "Jalan"}}</td>
                        {{-- <td>{{ $transaksi->queue->service->name }}</td> --}}
                        <td>Rp. {{ number_format(floatval($transaksi->payment)) }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <div></div>
                <div class="total">
                    Total: Rp. {{ number_format(floatval($transaksi->payment)) }}
                    </div>
            </div>
        </div>

        <div class="footer">
            Terimakasih, Semoga Cepat Sembuh
        </div>
    </body>
    </html>
