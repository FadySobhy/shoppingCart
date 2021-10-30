@extends('master')

@section('content')
        <div class="justify-content-center">
            <div class="content">
                <div class="title m-b-md">
                    Products
                </div>

                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-3">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('product.svg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">Shipped from {{ $product->shipping_rate->country }}</p>
                                        <button id="add-to-cart-{{$loop->iteration}}" onclick="addToCart('{{$product->id}}', '{{$loop->iteration}}')" class="btn btn-primary">Add to cart</button>
                                        <p id="added-success-message-{{$loop->iteration}}" class="text-success d-none">
                                            <i class="fa fa-check" aria-hidden="true"></i> Item is added successfully
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('javascript')
    <script>
        function addToCart(productID, iteration){
            console.log(productID)
            $.ajax({
                type: "GET",
                url: "{{ route('cart.add-item') }}",
                data: {
                    product_id: productID
                },
                success: function (data) {
                    $('#counter').text(data.result);
                    $('#add-to-cart-'+iteration).addClass('d-none');
                    $('#added-success-message--'+iteration).removeClass("d-none");
                    $('#added-success-message-'+iteration).addClass('d-block');
                }
            });
        }
    </script>
@endsection
