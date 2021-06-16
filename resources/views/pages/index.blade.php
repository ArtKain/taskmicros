@extends('layouts.main-layouts')

@section('title' , 'Таблица Доходы/Расходы')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="/styles/table.css">
@endsection



@section('content')
        @if(count($record) > 0)
        <h3><div class="results">Найдено <span>{{$record->count()}}</span> записей</div></h3><br>
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Тип</th>
            <th scope="col">Категория</th>
            <th scope="col">Дата</th>
            <th scope="col">Итог</th>
            <th scope="col">Комментарий</th>
            </tr>
        </thead>
        <tbody>

        @foreach($record as $recording)
            <tr>
            <th scope="row">{{ $recording->type['income'] }}</th>
            <td>{{ $recording->category['title'] }}</td>
            <td>{{ $recording->created_at }}</td>
            <td>{{ number_format($recording->sum, 2, '.', ' ') }}</td>
            <td>{{ $recording->massege }}</td>
            <td><a href="{{route('table.update' , $recording->id)}}"><button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            </a>
            <a href="{{route('table.delete' , $recording->id)}}"><button class="btn btn-danger">  
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg></td>
            </tr>
        @endforeach 
        </table>
            @if(!isset($sums['Доход']))
                <p class="text-success">Доход : 0</p>
                <p class="text-danger">Расход : -{{number_format($sums['Расход'], 2, '.', ' ')}}</p>
                    @elseif(!isset($sums['Расход']))
                        <p class="text-danger">Расход : 0</p>
                        <p class="text-success">Доход : +{{number_format($sums['Доход'], 2, '.', ' ')}}</p>
                @else
                    <p class="text-success">Доход : +{{number_format($sums['Доход'], 2, '.', ' ')}}</p>
                    <p class="text-danger">Расход : -{{number_format($sums['Расход'], 2, '.', ' ')}}</p>
            @endif

        @else
            <p>Здесь пусто :(</p>

        @endif
@endsection