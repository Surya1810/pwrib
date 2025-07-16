@extends('frontend.layouts.app')

@section('title')
    Daftar Pengurus
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-3">
        <h1 class="fs-3 fw-600 mb-3 text-center">Daftar Pengurus</h1>

        <div class="row g-3">
            <div class="col-12 col-md-6">
                <div class="card h-100 p-3">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <!-- Foto -->
                        <img src="https://via.placeholder.com/100" alt="Foto Pengurus"
                            class="rounded-circle me-md-3 mb-3 mb-md-0" width="100" height="100">

                        <!-- Informasi -->
                        <div class="text-center text-md-start">
                            <h5 class="mb-1">Pardamean Lumban Gaol,S.H.,M.H</h5>
                            <p class="mb-0 text-muted">Ketua Umum</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card h-100 p-3">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <!-- Foto -->
                        <img src="https://via.placeholder.com/100" alt="Foto Pengurus"
                            class="rounded-circle me-md-3 mb-3 mb-md-0" width="100" height="100">

                        <!-- Informasi -->
                        <div class="text-center text-md-start">
                            <h5 class="mb-1">Firkie Apriliza Ramadhani,S.E.,M.M.,M.H</h5>
                            <p class="mb-0 text-muted">Sekretaris Jendral</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card h-100 p-3">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <!-- Foto -->
                        <img src="https://via.placeholder.com/100" alt="Foto Pengurus"
                            class="rounded-circle me-md-3 mb-3 mb-md-0" width="100" height="100">

                        <!-- Informasi -->
                        <div class="text-center text-md-start">
                            <h5 class="mb-1">Fifit Fitriani</h5>
                            <p class="mb-0 text-muted">Bendahara</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card h-100 p-3">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <!-- Foto -->
                        <img src="https://via.placeholder.com/100" alt="Foto Pengurus"
                            class="rounded-circle me-md-3 mb-3 mb-md-0" width="100" height="100">

                        <!-- Informasi -->
                        <div class="text-center text-md-start">
                            <h5 class="mb-1">KOMBES POL.(PURN)DRS.H. Iyer Sudaryana,S.H.,M.H</h5>
                            <p class="mb-0 text-muted">Dewan Pembina</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card h-100 p-3">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <!-- Foto -->
                        <img src="https://via.placeholder.com/100" alt="Foto Pengurus"
                            class="rounded-circle me-md-3 mb-3 mb-md-0" width="100" height="100">

                        <!-- Informasi -->
                        <div class="text-center text-md-start">
                            <h5 class="mb-1">AKBP POL.(PURN) Fatma Noer</h5>
                            <p class="mb-0 text-muted">Dewan Etik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-striped table-bordered mt-3">
            <thead>
                <th>Bidang</th>
                <th>Ketua</th>
            </thead>
            <tbody>
                <tr>
                    <td>Ketua Bidang Organisasi dan Keanggotaan</td>
                    <td>Regi Pratama Rizqi,S.E</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Pendidikan & Pelatihan Profesi Wartawan</td>
                    <td>Rudy Haryanto,S.Pd</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Advokasi & Pembelaan Wartawan</td>
                    <td>Sweden Simarmata,S.H.,M.H</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Humas</td>
                    <td>H. Duhan Arif,A.md</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Etika dan Wartawan</td>
                    <td>Rudi Novrianto, S.H.,M.H</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Ekonomi Kerakyatan</td>
                    <td>Annisa Yulianti K,S.E.,M.M</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Pengkajian & Pengembangan</td>
                    <td>Ridwan Kadarusman,S.E.,M.M.</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Hubungan Antar Lembaga</td>
                    <td>Novia Alinda S.Hum</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Pemuda & Jurnalisme Milenial</td>
                    <td>Suhaefi Fauzian,S.Kom</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Dana & Usaha</td>
                    <td>Ari Amanda Wirawan</td>
                </tr>
                <tr>
                    <td>Ketua Bidang IT dan Digital </td>
                    <td>Maulidannur Lubis,S.Kom</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Kerja sama</td>
                    <td>Sally Armalia Ismail , S.S</td>
                </tr>
                <tr>
                    <td>Ketua Riset dan data</td>
                    <td>Irfan Juliana,S.kom</td>
                </tr>
                <tr>
                    <td>Ketua Bid. Pengadaan</td>
                    <td>H. Dani Nugraha</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Lingkungan</td>
                    <td>Encep Zainul Syah,S.Ds</td>
                </tr>
                <tr>
                    <td>Ketua Ekonomi Pembangunan</td>
                    <td>Candra Pratama,SE.,MM</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Penghargaan</td>
                    <td>H. Edi Sutisna</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Media Online / Cetak / Penyiaran</td>
                    <td>Surya Dinarta Halim</td>
                </tr>
                <tr>
                    <td>Ketua Bidang Perizinan</td>
                    <td>Anna Frida Nurhayati,SH.,M.H</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
@endpush
