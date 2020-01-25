@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
@parent
インディックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>Name</th>
        <th>Mail</th>
        <th>Age</th>
    </tr>
    @foreach ($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->age }}</td>
        </tr>
    @endforeach
</table>
@endsection

@section('footer')
copryright 2020 someya
@endsection