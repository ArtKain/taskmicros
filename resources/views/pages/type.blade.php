@extends('layouts.main-layouts')

@section('title' , 'Таблица Доходы/Расходы')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/main.css">
@endsection

@section('content')

    <div class="contener"> 
        <form  action="{{route('create.type.submit')}}"  method="post">
             @csrf
                <label class=" col-form-label">Тип : </label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="type" value="{{old('type')}}" id="type" placeholder="Введите тип">
                </div><br>
                <label class=" col-form-label">Категорию :</label><br>
                <div id="categories">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="category[]" id="category" placeholder="Введите категории">
                    </div>
                </div><br>
                <button type="button" class="btn btn-primary" id="addCategory">Ещё</button><br>

                <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
        <script>
            document.getElementById('addCategory').addEventListener('click', function () {
            let div = document.createElement('div');
            div.classList.add('col-sm-10');
            let input = document.createElement('input');
            input.type = 'text';
            input.name = 'category[]';
            input.placeholder = 'Введите категории';
            input.classList.add('form-control');
            div.appendChild(input);

            document.getElementById('categories').appendChild(div);
            })
        </script>
@endsection