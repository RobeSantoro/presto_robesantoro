<div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">

    <div class="card h-100" style="width: 18rem;">

        @if(count($product->productImages) > 0)

            @if(count($product->productImages) > 1)

                <div id="carouselMini{{ $loop->index }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->productImages as $image)
                            <div
                                class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ $image->getUrl(300,300) }}" class="card-img-top"
                                    alt="{{ $product->product_description }}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselMini{{ $loop->index }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselMini{{ $loop->index }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


            @else
                <img class="card-img-top" src="{{ $product->productImages->first()->getUrl(300,300) }}"
                    alt="{{ $product->product_description }}">
            @endif

        @else
            <img class="card-img-top" src="https://via.placeholder.com/300" alt="Image Missing">
        @endif

        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <h5 class="card-title">{{ $product->product_name }} {{ $product->id }}</h5>
                    <p class="card-text">{{ $product->product_description }}</p>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-12">

                    <a href="{{ route('product_show_route',['id'=>$product->id]) }}"
                        class="btn btn-secondary w-100 mb-2">
                       @if(Auth::user() && Auth::user()->is_revisor == true)
                        Valuta
                        @else
                        Dettagli
                        @endif
                    </a>

                    <p class="small text-muted">
                        <a class="d-flex float-left" href="{{ route('productByCategory_route',[$product->category->name,$product->category->id])}}">
                            {{ $product->category->name }}
                        </a>
                        <span class="d-flex float-right">
                            {{ $product->created_at->format('d/m/Y') . ' - ' . $product->user->name }}
                        </span>
                    </p>

                </div>
            </div>
        </div>

    </div>

</div>
