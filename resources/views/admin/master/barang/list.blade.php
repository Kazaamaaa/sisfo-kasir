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
                                <h4 class="card-title">Data Barang</h4>
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Tambah Data Barang</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>id_barang</th>
                                                <th>nama_barang</th>
                                                <th>harga</th>
                                                <th>stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp

                                            @foreach ($data_barang as $row)
                                            <tr>
                                                <td>{{ $no++}}</td>
                                                <td>{{$row->nama_barang}}</td>
                                                <td>{{$row->nama_jenis}}</td>
                                                <td>{{$row->harga}}</td>
                                                <td>{{$row->stok}}</td>
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
                                                    <h5 class="modal-title">Create Data Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/barang/store" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                     <div class="form-group">
                                                    <label>NamaBarang</label>
                                                    <input type="text" name="nama_barang" class="form-control" placeholder="namabarang.." required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label>JenisBarang</label>
                                                    <select name="id_jenis" class="form-control" required>
                                                            <option value="">Pilih Jenis Barang</option>
                                                            @foreach ($data_jenis as $j)
                                                            <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                                            @endforeach
                                                    </select>
                                                    </div>
                                                     <div class="form-group">
                                                    <label>Harga</label>
                                                    <input type="number" name="harga" class="form-control" placeholder="hargabarang.." required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label>Stok</label>
                                                    <input type="number" name="stok" class="form-control" placeholder="stokbarang..." required>
                                                    </div>
                                                </div>
                                                <div class="sweetalert modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                                                    <button type="submit" class="btn btn-primary btn sweet-succes">Save changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach ($data_barang as $d)
                                     <!-- Modal -->
                                    <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Data User</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('user.update',['id'  =>$d->id])}}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" name="name" value="{{ $d->name }}" class="form-control" placeholder="nama lengkap....." r>
                                                    </div>
                                                     <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email"  value="{{ $d->email }}" class="form-control" placeholder="email anda......" >
                                                    </div>
                                                     <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="password anda....." value="{{$d->password}}">
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

                                     @foreach ($data_barang as $c)
                                     <!-- Modal -->
                                    <div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Data User</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('user.destroy',['id'  =>$c->id])}}" method="GET">
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
 @endsection
