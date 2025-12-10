<form action="{{ route('diagnosa.proses') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control">
    </div>

    <div class="mb-3">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Motor</label>
        <input type="text" name="tahun_motor" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Lanjut</button>
</form>
