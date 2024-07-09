@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit alternative</h1>
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
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <h1>Edit Alternatif</h1>
                            <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="nama">Nama Alternatif</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $alternatif->nama }}" required>
                                </div>

                                @foreach($kriterias as $kriteria)
                                <div class="form-group">
                                    <label for="nilai_{{ $kriteria->id }}">{{ $kriteria->nama }}</label>
                                    <input type="number" step="0.01" class="form-control" id="nilai_{{ $kriteria->id }}" name="nilai[{{ $kriteria->id }}]" value="{{ $alternatif->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? 0 }}" required>
                                </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary">Update Alternatif</button>
                            </form>
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
