@extends('layouts.app')

@section('content')
<div class="container">
    <h1>TOPSIS Calculation</h1>
    <form action="{{ route('topsis.calculate') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
</div>
@endsection
