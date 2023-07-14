@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'PEMERIKSAAN ANC')
@section('page_title_icon')
<i class="metismenu-icon fa fa-list"></i>
@endsection

<div class="row">
    <div class="card col-md-12">
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
                                        <td>:</td>
                                        <td>{{$history->patient->nik}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Nama Lengkap</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$history->patient->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;">Sex / Umur</td>
                                        <td>:</td>
                                        <td>
                                            {{$history->patient->gender}} / {{\Carbon\Carbon::parse($history->patient->birth_date)
                                                ->diffInYears
                                                ()}}
                                                Thn
                                            </td>
                                        </tr>
                                    </tbody></table>
                                </div>
                                <div class="col-md-6">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: bold;" width="35%">Alamat</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    {{$history->patient->address}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;" width="35%">Gol. Darah</td>
                                                <td>:</td>
                                                <td>{{$history->patient->blood_type}}</td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;" width="35%">No. Telepon</td>
                                                <td>:</td>
                                                <td>{{$history->patient->phone_number}} </td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="card-header">
                                    Data Pemeriksaan
                                </div>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tgl. Pemeriksaan</th>
                                            <th>Hamil Anak Ke</th>
                                            <th>HPHT</th>
                                            <th>HPL</th>
                                            <th>Usia Kehamilan</th>
                                            <th>Lingkar Lengan Atas</th>
                                            <th>Berat Badan (KG)</th>
                                            <th>Tekanan Darah (mmHg)</th>
                                            <th>Tinggi Fudus Uteri</th>
                                            <th>Denyut Jantung Janin</th>
                                            <th>Imunisasi TT</th>
                                            <th>Keluhan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $history)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{\Carbon\Carbon::parse($history->created_at)->format('H:i, d F Y')}}</td>
                                            <td>{{ $history->anak_ke }}</td>
                                            <td>{{\Carbon\Carbon::parse($history->hpht)->format('d F Y')}}</td>
                                            <td>{{\Carbon\Carbon::parse($history->hpll)->format('d F Y')}}</td>
                                            <td>{{ $history->pregnant_age }}</td>
                                            <td>{{ $history->lila }}</td>
                                            <td>{{ $history->weight }}</td>
                                            <td>{{ $history->blood_pressure }}</td>
                                            <td>{{ $history->tfu }}</td>
                                            <td>{{ $history->djj }}</td>
                                            <td>{{ $history->immunization_tt }}</td>
                                            <td>{{ $history->complaint }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="float-left pt-3 pr-3">
                            {{ $data->appends(request()->query())->links() }}
                        </div>
                        <div wire:loading wire:target="nextPage,gotoPage,previousPage" class="loader-page"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
