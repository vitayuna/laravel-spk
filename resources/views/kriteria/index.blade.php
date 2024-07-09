@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kriteria</h1>
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

                            <a href="{{ route('kriteria.create') }}" class='btn btn-primary'> <span
                                    class='fa fa-plus'></span> Add Kriteria</a>
                            <br>

                            <table class="table table-bordered mt-2">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Tingkat Kepentingan</th>
                                    <th>Jenis</th> <!-- Tambahkan kolom jenis -->
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($kriterias as $krit)
                                <tr>
                                    <td>{{ $krit->id }}</td>
                                    <td>{{ $krit->nama }}</td>
                                    <td>{{ $krit->bobot }}</td>
                                    <td>{{ $krit->jenis }}</td> <!-- Menampilkan jenis -->
                                    <td>
                                        {{-- <a href="{{ route('kriteria.show', $krit->id) }}" class="btn btn-info">Lihat</a> --}}
                                        <a href="{{ route('kriteria.edit', $krit->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('kriteria.destroy', $krit->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
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
