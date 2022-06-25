@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 card p-4 mt-4">
                <h2 class="mb-4">Список ресурсов</h2>
                <table class="table table-bordered table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Название</th>
                        <th scope="col">URL</th>
                        <th scope="col">Status code</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $resource)
                        <tr>
                            <th scope="row">{{ $resource['id'] }}</th>
                            <td>{{ $resource['name'] }}</td>
                            <td><a href="{{ $resource['url'] }}" target="_blank">{{ $resource['url'] }}</a></td>
                            <td><b>{{ $resource['response_code'] }}</b></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $resources->links() }}
                <hr>
                <a href="{{route('resources.create')}}" class="btn btn-dark mt-4 w-25 p-2"> Создать ресурс</a>
            </div>
        </div>
    </div>
@endsection
