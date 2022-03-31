@props(['errors', 'class'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="{{$class}} alert alert-danger p-0">
            @foreach ($errors->all() as $error)
                <li class="m-0 text-center list-unstyled">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
