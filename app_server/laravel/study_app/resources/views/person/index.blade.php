@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
@parent
インディックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>Person</th>
        <th>Board</th>
    </tr>
    @foreach ($hasItems as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
        <td>
            @if ($item->boards != null)
            <table width="100%">
                @foreach ($item->boards as $obj)
                <tr>
                    <td>{{$obj->getData()}}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </td>
    </tr>
    @endforeach
</table>

<div style="margin:10px;"></div>
<table>
    <tr>
        <th>Person</th>
    </tr>
    @foreach ($noItems as $item)
    <tr>
        <td>{{ $item->getData() }}</td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copryright 2020 someya
@endsection