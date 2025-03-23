@session('success')
<div class="alert alert-success">{{$value}}</div>
@endsession

@session('error')
<div class="alert alert-danger">{{$value}}</div>
@endsession


@if ($errors->any())
<div class="alert alert-danger">
    <ul class="m-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
