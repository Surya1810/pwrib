@extends('frontend.layouts.app')

@section('title')
    Daftar Anggota
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-3">
        <h1 class="fs-3 fw-600 mb-3 text-center">Daftar Anggota</h1>

        <table id="anggotaTable" class="table table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Media</th>
                <th>Nomor Anggota</th>
                <th>Jenis Keanggotaan</th>
                <th>Masa Berlaku</th>
                <th>Group</th>
            </thead>
            <tbody>
                @foreach ($anggotas as $key => $anggota)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $anggota->nama }}</td>
                        <td>{{ $anggota->media }}</td>
                        <td>{{ $anggota->nomor }}</td>
                        <td>{{ $anggota->jenis_keanggotaan }}</td>
                        <td>{{ $anggota->masa_berlaku }}</td>
                        <td>{{ $anggota->pengurus->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#anggotaTable').DataTable({
                responsive: true,
                autoWidth: false,
                headerCallback: function(thead, data, start, end, display) {
                    $(thead).css('background-color', '#000');
                    $(thead).css('color', '#FFD700');
                },
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari data...",
                    lengthMenu: "Tampilkan _MENU_ data",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        previous: "Sebelumnya",
                        next: "Berikutnya"
                    }
                }
            });
        });
    </script>
@endpush
