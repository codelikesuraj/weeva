@props(['status'])

@if ($status)
    <div class="alert alert-success">
        @foreach ($status as $message)
            <li class="m-0 list-unstyled">{!!$message!!}</li>
        @endforeach
    </div>
@endif
