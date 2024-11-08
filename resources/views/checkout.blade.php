@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body">
                    <form action="{{ route('checkout.store')}}" method="post">
                        @csrf
                        @foreach($methods as $method)
                            <input type="radio" name="payment_method" value="{{ $method->slug }}">
                            {{ $method->name }}
                        @endforeach
                        <button type="submit">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
