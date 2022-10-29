@extends('../layout')

@section('content')
<div class="container text-center">
    <h1>
        Name product
        {{ $product->name}}</h1>
    <h4>{{ $product->price}}</h4>
    <h5>{{ $product->detail}}</h5>
</div>
@endsection
