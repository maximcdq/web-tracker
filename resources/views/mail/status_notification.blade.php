<div class="container">

    <p> Уважаемый {{ $mailData['userName'] }}, у
        @if ( count($mailData['resources']) > 1 )
            Ваших ресурсов
        @else Вашего ресурса
        @endif
        изменился статус!
    </p>

    @foreach($mailData['resources'] as $resource)
        <ul>
            <li>{{ $resource->resourceName }} [{{ $resource->resourceURL }}] изменил статус <b>{{ $resource->oldResourseStatusCode }}</b>
                на <b>{{ $resource->newResourseStatusCode }}</b></li>
        </ul>
    @endforeach

</div>
