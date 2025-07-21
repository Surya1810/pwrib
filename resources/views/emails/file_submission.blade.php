    <h2>Pendaftaran Baru</h2>

    <p><strong>Nama:</strong> {{ $data['name'] }}</p>
    <p><strong>Telepon:</strong> {{ $data['phone'] }}</p>
    <p><strong>Jenis:</strong> {{ $data['jenis'] }}</p>
    <p><strong>File:</strong> {{ asset('storage/' . $data['file']) }}</p>
