@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Название</th>
                    <th scope="col">URL</th>
                    <th scope="col">Status code</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sites as $site)
                <tr>
                    <th scope="row">{{ $site['id'] }}</th>
                    <td>{{ $site['name'] }}</td>
                    <td> <a href="{{ $site['url'] }}" target="_blank">{{ $site['url'] }}</a></td>
                    <td>{{ $site['response_code'] }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
                {{ $sites->links() }}
            <a href="{{route('sites.create')}}" class="btn btn-dark mt-4"> Создать ресурс</a>
        </div>
    </div>
</div>
@endsection
