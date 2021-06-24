@extends('layouts.main-layouts')

@section('title' , 'Заполнение Данных')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="/styles/main.css">
@endsection

@section('content')
        <h5 class="text-center">Заполните данные :</h5>

        <div class="contener">
            <form  action="{{route('submit')}}"  method="post">
            @csrf
                <label>Выберите дату:</label>
                    <input type="date" name="created_at" id="created_at" value=""><br><br>

                    <label>Выберите тип:</label><br>
                    <select id="category" name="category" class="form-control">
                        @foreach($type as $types)
                            <optgroup label="{{ $types->income }}">
                                @foreach($types->category->where('user_id', auth()->id()) as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>

                <label class=" col-form-label">Сумма:</label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="sum" id="Summa" placeholder="Введите сумму">
                </div><br>

                <label>Комментарий :</label><br>
                    <textarea name="massege" id="massege" cols="30" rows="5" placeholder="Введите комментарий"></textarea><br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
@endsection