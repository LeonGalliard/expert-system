@extends('admin.layouts.app', [
    'elementActive' => 'aturan',
])

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <h1>Aturan</h1>
            </div>
            <div class="col-md-12">
                <div class="container-fluid bg-white p-4">
                    <div class="mb-4">
                        <div class="row mb-2">
                            <!-- Tombol Tambah -->
                            <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                                data-target="#modalTambahAturan">Tambah</button>
                        </div>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="modalTambahAturan" tabindex="-1" aria-labelledby="modalTambahAturan"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Aturan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('aturan.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label>Kode Aturan</label>
                                                <input type="text" name="kode_aturan" class="form-control"
                                                    value="{{ $terbaru }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Kode Gejala</label>
                                                <select name="kode_gejala[]"
                                                    class="select2bs4 select2-multiple form-control" multiple>
                                                    @foreach ($gejalas as $gejala)
                                                        <option value="{{ $gejala->kode_gejala }}">
                                                            {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kode Kerusakan</label>
                                                <select name="kode_kerusakan" class="form-control">
                                                    @foreach ($kerusakans as $kerusakan)
                                                        <option value="{{ $kerusakan->kode_kerusakan }}">
                                                            {{ $kerusakan->kode_kerusakan . ' - ' . $kerusakan->nama_kerusakan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" value="Submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Tambah -->

                        <!-- Modal Edit Dinamis -->
                        <div class="modal fade" id="modalEditAturan" tabindex="-1" aria-labelledby="modalEditAturan"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Aturan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="form-edit-aturan" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Kode Aturan</label>
                                                <input type="text" name="kode_aturan" id="edit-kode_aturan"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Gejala</label>
                                                <select name="kode_gejala[]" id="edit-kode_gejala"
                                                    class="select2bs4 select2-multiple form-control" multiple>
                                                    @foreach ($gejalas as $gejala)
                                                        <option value="{{ $gejala->kode_gejala }}">
                                                            {{ $gejala->kode_gejala . ' - ' . $gejala->nama_gejala }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Kerusakan</label>
                                                <select name="kode_kerusakan" id="edit-kode_kerusakan" class="form-control">
                                                    @foreach ($kerusakans as $kerusakan)
                                                        <option value="{{ $kerusakan->kode_kerusakan }}">
                                                            {{ $kerusakan->kode_kerusakan . ' - ' . $kerusakan->nama_kerusakan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" value="Update">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Edit -->

                        <!-- Table -->
                        <div class="w-100">
                            <table class="table table-bordered yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Aturan</th>
                                        <th>Kode Gejala</th>
                                        <th>Nama Kerusakan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>

                        <form action="" id="delete-form" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('.select2-multiple').select2({
                width: '100%'
            });

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('aturan.list') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'kode_aturan',
                        name: 'kode_aturan'
                    },
                    {
                        data: 'kode_gejala',
                        name: 'kode_gejala'
                    },
                    {
                        data: 'nama_kerusakan',
                        name: 'nama_kerusakan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            // Edit Aturan via Modal
            $('body').on('click', '.editAturan', function() {
                var id = $(this).data('id');
                var kodeAturan = $(this).data('kode_aturan');
                var kodeGejala = $(this).data('kode_gejala'); // array
                var kodeKerusakan = $(this).data('kode_kerusakan');

                $('#edit-kode_aturan').val(kodeAturan);
                $('#edit-kode_kerusakan').val(kodeKerusakan);

                var select = $('#edit-kode_gejala');
                select.val(null).trigger('change'); // reset
                select.val(kodeGejala).trigger('change'); // set value

                $('#form-edit-aturan').attr('action', '/aturan/' + id);
                $('#modalEditAturan').modal('show');
            });
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah kamu yakin akan menghapus file ini?',
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
@endsection
