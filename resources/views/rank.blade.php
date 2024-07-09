@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hasil Perhitungan TOPSIS</h1>
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
                        <div class="table-responsive">
                            <!-- Tampilkan matriks keputusan -->
                            <h2>Matriks Keputusan</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($matrix as $altName => $row)
                                    <tr>
                                        <td>{{ $altName }}</td>
                                        @foreach($row as $nilai)
                                        <td>{{ $nilai }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <!-- Tampilkan matriks normalisasi -->
                            <h2>Matriks Normalisasi</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($normalized as $altName => $row)
                                    <tr>
                                        <td>{{ $altName }}</td>
                                        @foreach($row as $nilai)
                                        <td>{{ number_format($nilai, 4) }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <!-- Tampilkan matriks normalisasi terbobot -->
                            <h2>Matriks Normalisasi Terbobot</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                        <th>{{ $kriteria->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($weighted as $altName => $row)
                                    <tr>
                                        <td>{{ $altName }}</td>
                                        @foreach($row as $nilai)
                                        <td>{{ number_format($nilai, 4) }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Tampilkan hasil perhitungan TOPSIS -->
                            <h2>Hasil Perhitungan TOPSIS</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Ranking</th>
                                        <th>Alternatif</th>
                                        <th>Skor Preferensi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rankedResults as $result)
                                    <tr>
                                        <td>{{ $result['rank'] }}</td>
                                        <td>{{ $result['nama'] }}</td>
                                        <td>{{ number_format($result['skor'], 4) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
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

