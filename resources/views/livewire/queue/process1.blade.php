@section('meta_title', 'MEDICAL RECORD')
@section('page_title', 'PROSES PEMERIKSAAN IBU HAMIL')
@section('page_title_icon')
<i class="metismenu-icon fa fa-list"></i>
@endsection
@section('modal')
<livewire:component.modal-diagnosa :id="$queue->id"/>
<livewire:component.modal-lab/>
<livewire:component.modal-drug/>
@endsection

<div class="row">
    <div class="card col-md-12">
        @role("bidan")
        <div class="card-header">
            <div class="btn-actions-pane-right text-capitalize">
                <button  wire:click="save" class="btn-wide btn-outline-2x mr-md-2 btn btn-primary"><i class="fa
                    fa-check"></i> Selesai
                </button>
            </div>
        </div>
        @endrole
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
                                        <td style="font-weight: bold;" width="35%">Tanggal Masuk / Jam</td>
                                        <td width="1%">:</td>
                                        <td>{{\Carbon\Carbon::parse($queue->created_at)->format('d F Y / H:i')}}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">No. Rekam Medis</td>
                                        <td width="1%">:</td>
                                        <td>
                                            {{$queue->patient->no_rekam_medis}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">

                                            Bidan Pemeriksa

                                        </td>
                                        <td>:</td>
                                        <td>

                                            {{$queue->doctor->name}}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;" width="35%">Layanan </td>
                                        <td>:</td>
                                        <td>{{$queue->service->name}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @role("bidan")
            <div class="card-body row">
                <div class='form-group col-md-6'>
                    <label for='anak_ke' class='control-label'> {{ __('Hamil Anak ke') }}</label>
                    <input type='text' wire:model.lazy='anak_ke'
                    class="form-control @error('anak_ke') is-invalid @enderror" id='anak_ke' autofocus placeholder="Hamil Anak ke">
                    @error('anak_ke')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='hpht' class='control-label'> {{ __('HPHT') }}</label>
                    <input type='date' wire:model.lazy='hpht'
                    class="form-control @error('hpht') is-invalid @enderror" id='hpht' autofocus placeholder="HPHT" >
                    @error('hpht')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='hpll' class='control-label'> {{ __('HPL') }}</label>
                    <input type='date' wire:model.lazy='hpll'
                    class="form-control @error('hpll') is-invalid @enderror" id='hpll' autofocus placeholder="HPL">
                    @error('hpll')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='pregnant_age' class='control-label'> {{ __('Usia Kehamilan') }}</label>
                    <input type='text' wire:model.lazy='pregnant_age'
                    class="form-control @error('pregnant_age') is-invalid @enderror" id='pregnant_age' autofocus placeholder="Usia Kehamilan">
                    @error('pregnant_age')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='lila' class='control-label'> {{ __('Lingkar Lengan Atas') }}</label>
                    <input type='text' wire:model.lazy='lila'
                    class="form-control @error('lila') is-invalid @enderror" id='lila' autofocus placeholder="LILA">
                    @error('lila')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='weight' class='control-label'> {{ __('Berat Badan (KG)') }}</label>
                    <input type='text' wire:model.lazy='weight'
                    class="form-control @error('weight') is-invalid @enderror" id='weight' autofocus placeholder="Berat Badan">
                    @error('weight')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='blood_pressure' class='control-label'> {{ __('Tekanan Darah (mmHg)') }}</label>
                    <input type='text' wire:model.lazy='blood_pressure'
                    class="form-control @error('blood_pressure') is-invalid @enderror" id='blood_pressure' autofocus placeholder="Tekanan Darah">
                    @error('blood_pressure')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='tfu' class='control-label'> {{ __('Tinggi Fudus Uteri') }}</label>
                    <input type='text' wire:model.lazy='tfu'
                    class="form-control @error('tfu') is-invalid @enderror" id='tfu' autofocus placeholder="TFU">
                    @error('tfu')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='djj' class='control-label'> {{ __('Denyut Jantung Janin') }}</label>
                    <input type='text' wire:model.lazy='djj'
                    class="form-control @error('djj') is-invalid @enderror" id='djj' autofocus placeholder="DJJ">
                    @error('djj')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='immunization_tt' class='control-label'> {{ __('Imunisasi TT') }}</label>
                    <input type='text' wire:model.lazy='immunization_tt'
                    class="form-control @error('immunization_tt') is-invalid @enderror" id='immunization_tt' autofocus placeholder="Imunisasi TT">
                    @error('immunization_tt')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
                <div class='form-group col-md-6'>
                    <label for='complaint' class='control-label'> {{ __('Keluhan') }}</label>
                    <input type='text' wire:model.lazy='complaint'
                    class="form-control @error('complaint') is-invalid @enderror" id='complaint' autofocus placeholder="Keluhan">
                    @error('complaint')
                    <div class='invalid-feedback'>{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="card-main">
                    <div class="card-header">
                        Data Obat
                        <div class="btn-actions-pane-right text-capitalize">
                            <button  wire:click="addDrug" class="btn-wide btn-outline-2x mr-md-2 btn
                            btn-primary btn-sm">
                                <i class="fa fa-plus-circle"></i>
                                Tambah Obat
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Obat</th>
                                    <th>Qty</th>
                                    <th>Aturan Pakai</th>
                                    @if ($queue->jenis_rawat == NULL)
                                    <th>Harga</th>
                                    @endif
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listDrug as $index => $drug)
                                <tr>
                                    <td>{{$drug["drug"]["nama"]}}</td>
                                    <td> <input type="number"
                                        min="0"
                                        max="{{$drug["drug"]["stok"]}}"
                                        class="form-control"
                                        wire:model="listDrug.{{$index}}.quantity"/>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                        wire:model="listDrug.{{$index}}.instruction"
                                        placeholder="Aturan Pakai"/>
                                    </td>
                                    @if ($queue->jenis_rawat == NULL)
                                    <td>
                                        <input type="text" class="form-control" wire:model.lazy="listDrug.{{$index}}.harga" placeholder="0"/>
                                    </td>
                                    @endif
                                    <td>
                                        <button wire:click="deleteDrug({{$index}})" class="btn btn-sm
                                        btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            @endrole

        </div>
    </div>
</div>


