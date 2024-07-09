@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Alternatif</h1>
    <form action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Alternatif</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
@endsection
