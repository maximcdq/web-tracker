@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card p-4">
                <form method="POST" action="{{ route('resources.store') }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="name" class="mb-2"><b>Название ресурса</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Название ресурса">
                    </div>
                    <div class="form-group mb-4">
                        <label for="url" class="mb-2"><b>Ссылка на ресурс (URL)</b></label>
                        <input type="text" class="form-control" name="url" placeholder="https://">
                    </div>
                    <div class="form-group mb-4">
                        <label for="response_code" class="mb-2"><b>Статус код ресурса</b></label>
                        <select class="form-control" name="response_code">
                            <option>200</option>
                            <option>301</option>
                            <option>404</option>
                            <option>500</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark" type="submit"> Отправить</button>
                        <a class="btn btn-success" href="{{ route('resources.index') }}"> Назад</a>
                    </div>
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
