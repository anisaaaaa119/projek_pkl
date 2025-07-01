<form action="{{ route('peminjam.update', $peminjam->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $peminjam->nama }}"><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="{{ $peminjam->tanggal }}"><br><br>

        <label>Status:</label><br>
        <input type="text" name="status" value="{{ $peminjam->status }}"><br><br>

        <button type="submit">Update</button>
    </form>