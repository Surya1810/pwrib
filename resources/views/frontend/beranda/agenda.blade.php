@extends('frontend.layouts.app')

@section('title')
    Agenda
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-3">
        <h1 class="fs-3 fw-600 mb-3 text-center">Agenda Kegiatan</h1>

        <table id="agendaTable" class="table table-striped table-bordered">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Penyelenggara</th>
                <th>Jam</th>
                <th>Lokasi</th>
                <th>Detail</th>
            </thead>
            <tbody>
                @foreach ($agendas as $key => $agenda)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $agenda->tanggal->format('d-m-Y') }}</td>
                        <td>{{ $agenda->nama }}</td>
                        <td>{{ $agenda->penyelenggara }}</td>
                        <td>{{ $agenda->jam->format('H:i') }}</td>
                        <td>{{ $agenda->lokasi }}</td>
                        <td>{{ $agenda->detail }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#agendaTable').DataTable({
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
