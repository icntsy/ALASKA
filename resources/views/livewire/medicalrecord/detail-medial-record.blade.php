{{-- @php
    $data = json_decode($this->pyshicalTest)
@endphp
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Kolom</th>
      <th scope="col">Hasil</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td>Berat Badan</td>
      <td>{{ $data->weight }} kg</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Tinggi Badan</td>
      <td>{{ $data->weight }} cm</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Gol. Darah</td>
      <td>{{ $data->blood }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Tensi</td>
      <td>{{ $data->blood_pressure }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Buta Warna</td>
      <td>{{ $data->color_blind }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Pernafasan</td>
      <td>{{ $data->respiration }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Nadi</td>
      <td>{{ $data->pulse }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Riwayat Penyakit</td>
      <td>{{ $data->history_disease }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Disabilitas</td>
      <td>{{ $data->disability }}</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Suhu</td>
      <td>{{ $data->temperature }}</td>
    </tr>
  </tbody>
</table> --}}
