 @extends('layout.layout')
 @section('content')
 <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header items-center border ">
                                <h4 class="card-title">Data Jenis Barang</h4>
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah Data Barang</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NamaJenis</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp

                                            @foreach ($data_jenis as $row)
                                            <tr>
                                                <td>{{ $no++}}</td>
                                                <td>{{$row->nama_jenis}}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#modalEdit{{ $row->id }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                                    <a data-toggle="modal" data-target="#modalHapus{{ $row->id }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCreate">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Create Data Jenis Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/jenisbarang/store" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                    <label>JenisBarang</label>
                                                    <input type="tex" name="nama_jenis" class="form-control" placeholder="namajenisbarang.." required>
                                                </div>
                                                <div class="sweetalert modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-primary btn sweet-succes">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($data_jenis as $d)
                                     <!-- Modal -->
                                    <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data Jenis Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('jenisbarang.update',['id'  =>$d->id])}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                    <label>JenisBarang</label>
                                                    <input type="text" name="name" value="{{ $d->nama_jenis }}" class="form-control" placeholder="namajenisbarang..." r>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                     @foreach ($data_jenis as $c)
                                     <!-- Modal -->
                                    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data User</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('jenisbarang.destroy',['id'  =>$c->id])}}" method="GET">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <h5>Apakah Anda Yakin ingin Menghapus data ini</h5>
                                                    </div>
                                                </div>
                                                <div class="sweetalert modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-warning sweet-confirm"><i class="fa fa-trash"></i>hapus</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                    @endforeach
 </div>

        </div>
@endsection
