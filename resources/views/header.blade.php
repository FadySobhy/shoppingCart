<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Shopping Cart Task</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href={{ route('home') }}>Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        @isset($itemsNumber )
        <div class="form-inline my-2 my-lg-0">
            <a href="{{ route('checkout') }}" class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart  <span id="counter" class="badge badge-pill badge-danger">{{ $itemsNumber }}</span></a>
        </div>
        @endisset
    </div>
</nav>
