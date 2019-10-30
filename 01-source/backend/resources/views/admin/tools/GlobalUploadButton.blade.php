<div class="btn-group" data-toggle="buttons">
    @foreach($options as $option => $label)
        <a class="btn btn-danger btn-sm" href="{{ $option }}" value='{{ $option }}'>{{$label}}</a>
    @endforeach
</div>
