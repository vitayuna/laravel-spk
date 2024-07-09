@extends('layouts.app')

@section('content')
<div class="container">
    <h1>TOPSIS Calculation Results</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Alternative</th>
                <th>TOPSIS Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatives as $i => $alternative)
            <tr>
                <td>{{ $alternative->name }}</td>
                <td>{{ $scores[$i] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
