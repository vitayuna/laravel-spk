{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Alternatif</h1>
    <a href="{{ route('alternatif.create') }}" class="btn btn-primary mb-3">Tambah Alternatif</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alternatifs as $alternatif)
            <tr>
                <td>{{ $alternatif->nama }}</td>
                <td>
                    <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Isi Nilai Alternatif</h2>
    @foreach($alternatifs as $alternatif)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $alternatif->nama }}</h5>
            <form action="{{ route('nilai-alternatif.store') }}" method="POST">
                @csrf
                <input type="hidden" name="alternatif_id" value="{{ $alternatif->id }}">
                @foreach($kriterias as $kriteria)
                <div class="form-group">
                    <label for="nilai_{{ $kriteria->id }}">{{ $kriteria->nama }}</label>
                    <input type="number" step="0.01" class="form-control" id="nilai_{{ $kriteria->id }}" name="nilai[{{ $kriteria->id }}]" required>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Simpan Nilai</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Alternatif</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form untuk menambah alternatif baru beserta nilainya -->
    <form action="{{ route('alternatif.storeWithNilai') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Alternatif</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        @foreach($kriterias as $kriteria)
        <div class="form-group">
            <label for="nilai_{{ $kriteria->id }}">{{ $kriteria->nama }}</label>
            <input type="number" step="0.01" class="form-control" id="nilai_{{ $kriteria->id }}" name="nilai[{{ $kriteria->id }}]" required>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Tambah Alternatif</button>
    </form>

    <hr>

    <!-- Daftar alternatif yang sudah ada -->
    <h2>Daftar Alternatif</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Alternatif</th>
                @foreach($kriterias as $kriteria)
                <th>{{ $kriteria->nama }}</th>
                @endforeach
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alternatifs as $alternatif)
            <tr>
                <td>{{ $alternatif->nama }}</td>
                @foreach($kriterias as $kriteria)
                <td>{{ $alternatif->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? 'N/A' }}</td>
                @endforeach
                <td>
                    <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}



@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alternative & Score</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            {{-- <a href="{{ route('alternatif.create') }}" class='btn btn-primary'> <span
                                    class='fa fa-plus'></span> Add Alternative</a>

                            <br> --}}

                            <form action="{{ route('alternatif.storeWithNilai') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Alternatif</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                        
                                @foreach($kriterias as $kriteria)
                                <div class="form-group">
                                    <label for="nilai_{{ $kriteria->id }}">{{ $kriteria->nama }}</label>
                                    <input type="number" step="0.01" class="form-control" id="nilai_{{ $kriteria->id }}" name="nilai[{{ $kriteria->id }}]" required>
                                </div>
                                @endforeach
                        
                                <button type="submit" class="btn btn-primary">Tambah Alternatif</button>
                            </form>



                            <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example1" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>Nama Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                        @endforeach
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alternatifs as $alternatif)
                                    <tr>
                                        <td>{{ $alternatif->nama }}</td>
                                        @foreach($kriterias as $kriteria)
                                        <td>{{ $alternatif->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? 'N/A' }}</td>
                                        @endforeach
                                        <td>
                                            <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

        $('#mytable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection


