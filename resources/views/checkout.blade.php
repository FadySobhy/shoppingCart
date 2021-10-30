@extends('master')

@section('content')
        <div class="justify-content-center">
            <div class="content">
                <div class="title m-b-md">
                    Checkout Preview
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Items</h3>
                                    <ul>
                                    @foreach(session('cart') as $product)
                                        <li class="card-text">{{ $product->name }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Checkout</h3>
                                    @foreach($result as $key => $value)
                                        @if($key == 'Discounts')
                                            <p class="card-text">{{ $key }}: </p>
                                            <ul class="ml-5 list-unstyled">
                                            @foreach($value as $title => $discount)
                                                <li class="card-text ">{{ $title }} {{ $discount }}</li>
                                            @endforeach
                                            </ul>
                                        @else
                                            <p class="card-text">{{ $key }}:  {{$value}}</p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
