@extends('layouts.main-layouts')

@section('title' , 'Обновление данных')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="/styles/main.css">
@endsection

@section('content')

        <h5 class="text-center">Обновите данные :</h5>

        <div class="contener">
            <form  action="{{route('table.update.submit' , $recording->id)}}"  method="post">
            @csrf
                    <h6>Был создан :</h6>{{$recording->created_at}}<br><br>
                    
                <label>Выберите тип:</label><br>
                    <select id="category" name="category" class="form-control">
                        @foreach($type as $types)
                            <optgroup label="{{ $types->income }}">
                                @foreach($types->category as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                <label class=" col-form-label">Сумма:</label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sum" id="Summa" value="{{$recording->sum}}" placeholder="Введите сумму">
                </div><br>

                <label>Комментарий :</label><br>
                    <textarea name="massege" id="massege" cols="30" rows="5" placeholder="Введите комментарий">{{$recording->massege}}</textarea><br>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
        </div>
@endsection