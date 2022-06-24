@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('sites.store') }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name">Название ресурса</label>
                        <input type="text" class="form-control" name="name" placeholder="Название ресурса">
                    </div>
                    <div class="form-group mb-4">
                        <label for="url">Ссылка на ресурс (URL)</label>
                        <input type="text" class="form-control" name="url" placeholder="Название ресурса">
                    </div>
                    <div class="form-group mb-4">
                        <label for="response_code">Статус код ресурса</label>
                        <select class="form-control" name="response_code">
                            <option>200</option>
                            <option>301</option>
                            <option>404</option>
                            <option>500</option>
                        </select>
                    </div>
                    <button class="btn btn-dark" type="submit"> Отправить</button>
                    <a class="btn btn-success" href="{{ route('sites.index') }}"> Назад</a>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><b>{{ $error }}</b></li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
