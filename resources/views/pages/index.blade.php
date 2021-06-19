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
            <td><a href="{{route('table.update' , $recording->id)}}" class="btn btn-primary">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                    <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                </svg>
            </a>
            <a href="{{route('table.delete' , $recording->id)}}" class="btn btn-danger"> 
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </td>
            </tr>
        @endforeach 
        </table>
            @if(!isset($sums['Доход']))
                <p class="text-success">Доход : 0</p>
                <p class="text-danger">Расход : -{{number_format($sums['Расход'], 2, '.', ' ')}}</p>
                <p> Итог : {{number_format($sums['Расход'], 2, '.', ' ')}}</p>
                    @elseif(!isset($sums['Расход']))
                        <p class="text-danger">Расход : 0</p>
                        <p class="text-success">Доход : +{{number_format($sums['Доход'], 2, '.', ' ')}}</p>
                        <p> Итог : {{number_format($sums['Доход'], 2, '.', ' ')}}</p>
                @else
                    <p class="text-success">Доход : +{{number_format($sums['Доход'], 2, '.', ' ')}}</p>
                    <p class="text-danger">Расход : -{{number_format($sums['Расход'], 2, '.', ' ')}}</p>
                    @php 
                        $outcome = $sums['Доход'] - $sums['Расход'];
                    @endphp 
                    <p>Итог : {{$outcome}}</p> 
                        
            @endif

        @else
            <p>Здесь пусто :(</p>

        @endif
@endsection