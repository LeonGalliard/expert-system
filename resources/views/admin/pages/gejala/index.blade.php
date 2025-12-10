@extends('admin.layouts.app', [
    'elementActive' => 'gejala',
])
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <h1>Gejala<h1>
            </div>
            <div class="col-md-12">
                <div class="container-fluid bg-white p-4">
                    <div class="mb-4">
                        <table>
                            <div class="container-small">
                                <div class="row">
                                    <!-- Tombol Tambah -->
                                    <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                                        data-target="#modalTambahGejala">Tambah</button>

                                    <!-- Modal Tambah Gejala -->
                                    <div class="modal fade" id="modalTambahGejala" tabindex="-1"
                                        aria-labelledby="modalTambahGejala" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Gejala</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('gejala.store') }}"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label>Kode Gejala</label>
                                                            <input type="text" name="kode_gejala" class="form-control"
                                                                value="{{ $terbaru }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Gejala</label>
                                                            <input type="text" name="nama_gejala" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-success" value="Tambah">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Edit Gejala -->
                                    <div class="modal fade" id="modalEditGejala" tabindex="-1"
                                        aria-labelledby="modalEditGejala" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="card card-default color-palette-box">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Edit Gejala</h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" id="form-edit-gejala"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label>Kode Gejala</label>
                                                                <input type="text" name="kode_gejala"
                                                                    class="form-control" id="edit-kode_gejala"
                                                                    placeholder="kode_gejala">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Gejala</label>
                                                                <input type="text" name="nama_gejala"
                                                                    class="form-control" id="edit-nama_gejala"
                                                                    placeholder="nama_gejala">
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit"
                                                                class="btn btn-success mt-4">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Table -->
                                    <div class="w-100">
                                        <table class="table table-bordered yajra-datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Gejala</th>
                                                    <th>Nama Gejala</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>

                                    <form action="" id="delete-form" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>

                                @section('javascript')
                                    <script>
                                        $(function() {
                                            var table = $('.yajra-datatable').DataTable({
                                                processing: true,
                                                serverSide: true,
                                                responsive: true,
                                                ajax: "{{ route('gejala.list') }}",
                                                columns: [{
                                                        data: 'DT_RowIndex',
                                                        name: 'DT_RowIndex'
                                                    },
                                                    {
                                                        data: 'kode_gejala',
                                                        name: 'kode_gejala'
                                                    },
                                                    {
                                                        data: 'nama_gejala',
                                                        name: 'nama_gejala'
                                                    },
                                                    {
                                                        data: 'action',
                                                        name: 'action',
                                                        orderable: true,
                                                        searchable: true
                                                    },
                                                ]
                                            });

                                            // Isi modal edit saat tombol Edit diklik
                                            $('body').on('click', '.editGejala', function() {
                                                var id = $(this).data('id');
                                                var kode = $(this).data('kode');
                                                var nama = $(this).data('nama');
                                                $('#edit-kode_gejala').val(kode);
                                                $('#edit-nama_gejala').val(nama);
                                                $('#form-edit-gejala').attr('action', '/gejala/' + id);
                                                $('#modalEditGejala').modal('show');
                                            });
                                        });

                                        function notificationBeforeDelete(event, el) {
                                            event.preventDefault();
                                            Swal.fire({
                                                title: 'Apakah kamu yakin akan menghapus data ini?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                cancelButtonText: 'Batal',
                                                confirmButtonText: 'Ya'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $("#delete-form").attr('action', $(el).attr('href'));
                                                    $("#delete-form").submit();
                                                    Swal.fire('Berhasil Dihapus');
                                                }
                                            })
                                        }
                                    </script>
                                @endsection

                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
