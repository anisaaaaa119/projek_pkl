<form action="{{ route('peminjam.store') }}" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama"><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal"><br><br>

        <button type="submit">Simpan</button>
    </form>