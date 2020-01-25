@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インディックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copryright 2020 someya
@endsection