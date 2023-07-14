@php
use App\Models\MedicalRecordDrugs;
use App\Models\DrugBidan;
@endphp
@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'PROCESS  PEMBAYARAN')
@section('page_title_icon')
<i class="metismenu-icon fa fa-credit-card" aria-hidden="true"></i>
@endsection

<div class="row">
    <form action="{{ url('/antri/obat/process/'.$queue->id) }}" method="POST">
        @csrf
        <div class="card col-md-12">
            <div class="card-header">
                <div class="btn-actions-pane-right text-capitalize">
                    <button  class="btn-wide btn-outline-2x mr-md-2 btn btn-primary"><i class="fa
                        fa-check"></i> Selesai
                    </button>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-md-12">
                    <div class="main-card">
                        <div class="card-header">
                            Data Pasien
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">NIK</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$queue->patient->nik}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Nama Lengkap</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$queue->patient->name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Sex / Umur</td>
                                            <td>:</td>
                                            <td>
                                                {{$queue->patient->gender}} / {{\Carbon\Carbon::parse($queue->patient->birth_date)->diffInYears()}} Thn
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Alamat</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$queue->patient->address}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Gol. Darah</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$queue->patient->blood_type}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">Tanggal Periksa / Jam</td>
                                            <td width="1%">:</td>
                                            <td>{{\Carbon\Carbon::parse($queue->created_at)->format('d F Y / H:i')}}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" width="35%">No. Rekam Medis</td>
                                            <td width="1%">:</td>
                                            <td>
                                                {{$queue->patient->no_rekam_medis}}
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;" width="35%">Dokter Pemeriksa</td>
                                                <td>:</td>
                                                <td>{{$queue->doctor->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;" width="35%">Layanan </td>
                                                <td>:</td>
                                                <td>{{$queue->service->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;" width="35%">Jenis Rawat </td>
                                                <td>:</td>
                                                <td>
                                                    @if ($queue->jenis_rawat == NULL)
                                                    -
                                                    @else
                                                    {{$queue->jenis_rawat}}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Jalan')
                                                <th>No</th>
                                                <th>Nama Obat</th>
                                                <th>Qty</th>
                                                <th>Aturan Pakai</th>
                                                <th>Total</th>
                                                @endif
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                @endif
                                                @if ($queue->jenis_rawat === NULL)
                                                <th>No</th>
                                                <th>Qty</th>
                                                <th>Nama</th>
                                                <th>Aturan Pakai</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($queue->jenis_rawat == "Inap")
                                            @php
                                            $tampung = 0;
                                            $qty = 0;
                                            $total = 0;
                                            $record_obat = MedicalRecordDrugs::where("medical_record_id", $queue->medical_record_id)->get();
                                            foreach ($record_obat as $key => $value) {
                                                $tampung = $value->Drugs->harga;
                                                $qty = $value->quantity;
                                                $total += $tampung * $qty;
                                            }
                                            @endphp
                                            <tr>
                                                <td>1.</td>
                                                <td>Ruangan</td>
                                                <td><input type="number" name="qty1" wire:model="qty1" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga1" wire:model="harga1" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty1) && isset($harga1) ? number_format((float)$qty1 * (float)$harga1) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td>Assesment Awal</td>
                                                <td><input type="number" name="qty2" wire:model="qty2" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga2" wire:model="harga2" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty2) && isset($harga2) ? number_format((float)$qty2 * (float)$harga2) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Pendaftaran</td>
                                                <td><input type="number" name="qty3" wire:model="qty3" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga3" wire:model="harga3" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty3) && isset($harga3) ? number_format((float)$qty3 * (float)$harga3) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Infus Set DEWASA+ Tindakan</td>
                                                <td><input type="number" name="qty4" wire:model="qty4" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga4" wire:model="harga4" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty4) && isset($harga4) ? number_format((float)$qty4 * (float)$harga4) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Tindakan Perawat</td>
                                                <td><input type="number" name="qty5" wire:model="qty5" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga5" wire:model="harga5" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty5) && isset($harga5) ? number_format((float)$qty5 * (float)$harga5) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Paket Obat DAN INFUS /hari</td>
                                                <td><input type="number" name="qty6" wire:model="qty6" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga6" wire:model="harga6" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty6) && isset($harga6) ? number_format((float)$qty6 * (float)$harga6) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Assesment dan Visite Dokter</td>
                                                <td><input type="number" name="qty7" wire:model="qty7" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga7" wire:model="harga7" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty7) && isset($harga7) ? number_format((float)$qty7 * (float)$harga7) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Obat Pulang</td>
                                                <td><input type="number" name="qty8" wire:model="qty8" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga8" wire:model="harga8" placeholder="Harga" class="form-control" value="{{ $tampung }}" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty8) && isset($harga8) ? number_format((float)$qty8 * (float)$harga8) : '' }}" readonly></td>

                                                {{-- <td><input type="number" name="qty8" placeholder="Qty" value="{{ $qty }}" readonly class="form-control" /></td>
                                                <td><input type="number" name="harga8" placeholder="Harga" class="form-control" readonly value="{{ $total }}" /></td>
                                                <td><input type="text" class="form-control" value="{{ $tampung * $qty }}" readonly></td> --}}
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>EKG</td>
                                                <td><input type="number" name="qty9" wire:model="qty9" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga9" wire:model="harga9" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty9) && isset($harga9) ? number_format((float)$qty9 * (float)$harga9) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Cek Darah Lengkap</td>
                                                <td><input type="number" name="qty10" wire:model="qty10" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga10" wire:model="harga10" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty10) && isset($harga10) ? number_format((float)$qty10 * (float)$harga10) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Fisioterapi</td>
                                                <td><input type="number" name="qty11" wire:model="qty11" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga11" wire:model="harga11" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty11) && isset($harga11) ? number_format((float)$qty11 * (float)$harga11) : '' }}" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>Tindakan Tambahan</td>
                                                <td><input type="number" name="qty12" wire:model="qty12" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga12" wire:model="harga12" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty12) && isset($harga12) ? number_format((float)$qty12 * (float)$harga12) : '' }}" readonly></td>
                                            </tr>
                                            @elseif($queue->jenis_rawat == "Jalan")
                                            @foreach ($queue->medicalrecord->drugs as $drug)
                                            @php
                                            $subtotal += $drug->harga * $drug->pivot->quantity;
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{$drug->nama}}</td>
                                                <td>{{$drug->pivot->quantity}}</td>
                                                <td>{{$drug->pivot->instruction}}</td>
                                                <td>Rp. {{ number_format($drug->harga * $drug->pivot->quantity) }}</td>
                                            </tr>
                                            @endforeach
                                            @elseif($queue->jenis_rawat == NULL)
                                            @php
                                            $subtotal = 0;
                                            $drug_bidan = DrugBidan::where("pregnantmom_id", $queue->pregnantmom_id)->get();
                                            @endphp
                                            @foreach ($drug_bidan as $item)
                                                @php
                                                $subtotal += $item->harga * $item->quantity;
                                                @endphp
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->drug->nama}}</td>
                                                <td>{{ $item->instruction }}</td>
                                                <td>{{ $item->harga }}</td>
                                                <td>{{ $item->harga * $item->quantity }}</td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                        {{-- <tbody>

                                            @php
                                            $subtotal = 0;
                                            @endphp
                                            @foreach($queue->medicalrecord->drugs as $drug)
                                            @php
                                            $subtotal += $drug->harga * $drug->pivot->quantity;
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                @if ($queue->jenis_rawat !== 'Inap')
                                                <td>{{$drug->nama}}</td>
                                                <td>{{$drug->pivot->quantity}}</td>
                                                <td>{{$drug->pivot->instruction}}</td>
                                                <td>Rp. {{ number_format($drug->harga * $drug->pivot->quantity) }}</td>
                                                @endif
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>Ruangan</td>
                                                <td><input type="number" name="qty1" wire:model="qty1" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga1" wire:model="harga1" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty1) && isset($harga1) ? number_format((float)$qty1 * (float)$harga1) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 2 }}</td>
                                                <td>Assesment Awal</td>
                                                <td><input type="number" name="qty2" wire:model="qty2" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga2" wire:model="harga2" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty2) && isset($harga2) ? number_format((float)$qty2 * (float)$harga2) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 3 }}</td>
                                                <td>Pendaftaran</td>
                                                <td><input type="number" name="qty3" wire:model="qty3" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga3" wire:model="harga3" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty3) && isset($harga3) ? number_format((float)$qty3 * (float)$harga3) : '' }}" readonly></td>

                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 4 }}</td>
                                                <td>Infus Set DEWASA+ Tindakan</td>
                                                <td><input type="number" name="qty4" wire:model="qty4" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga4" wire:model="harga4" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty4) && isset($harga4) ? number_format((float)$qty4 * (float)$harga4) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 5 }}</td>
                                                <td>Tindakan Perawat</td>
                                                <td><input type="number" name="qty5" wire:model="qty5" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga5" wire:model="harga5" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty5) && isset($harga5) ? number_format((float)$qty5 * (float)$harga5) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 6 }}</td>
                                                <td>Paket Obat DAN INFUS /hari</td>
                                                <td><input type="number" name="qty6" wire:model="qty6" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga6" wire:model="harga6" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty6) && isset($harga6) ? number_format((float)$qty6 * (float)$harga6) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 7 }}</td>
                                                <td>Assesment dan Visite Dokter</td>
                                                <td><input type="number" name="qty7" wire:model="qty7" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga7" wire:model="harga7" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty7) && isset($harga7) ? number_format((float)$qty7 * (float)$harga7) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 8 }}</td>
                                                <td>Obat Pulang</td>
                                                <td><input type="number" name="qty8" wire:model="qty8" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga8" wire:model="harga8" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty8) && isset($harga8) ? number_format((float)$qty8 * (float)$harga8) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 9 }}</td>
                                                <td>EKG</td>
                                                <td><input type="number" name="qty9" wire:model="qty9" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga9" wire:model="harga9" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty9) && isset($harga9) ? number_format((float)$qty9 * (float)$harga9) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 10 }}</td>
                                                <td>Cek Darah Lengkap</td>
                                                <td><input type="number" name="qty10" wire:model="qty10" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga10" wire:model="harga10" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty10) && isset($harga10) ? number_format((float)$qty10 * (float)$harga10) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 11 }}</td>
                                                <td>Fisioterapi</td>
                                                <td><input type="number" name="qty11" wire:model="qty11" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga11" wire:model="harga11" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty11) && isset($harga11) ? number_format((float)$qty11 * (float)$harga11) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if ($queue->jenis_rawat === 'Inap')
                                                <td>{{ $loop->index + 12 }}</td>
                                                <td>Tindakan Tambahan</td>
                                                <td><input type="number" name="qty12" wire:model="qty12" placeholder="Qty" class="form-control" /></td>
                                                <td><input type="number" name="harga12" wire:model="harga12" placeholder="Harga" class="form-control" /></td>
                                                <td><input type="text" class="form-control" value="{{ isset($qty12) && isset($harga12) ? number_format((float)$qty12 * (float)$harga12) : '' }}" readonly></td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody> --}}
                                    </table>
                                    @if ($queue->jenis_rawat !== 'Inap')
                                    Subtotal : <input type="text" name="payment" placeholder="payment" class="form-control"  id='payment' style="width: 50%" value="{{ $subtotal + $queue->doctor->harga_jasa }}" readonly>
                                    @endif
                                    @if ($queue->jenis_rawat == 'Inap')
                                    Jumlah Pembayaran : <input type="text" name="payment" placeholder="payment" class="form-control" id="payment" style="width: 50%" value="{{ $jumlah }}" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
