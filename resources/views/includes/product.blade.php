<div class="col-12 col-md-6 col-lg-4 mb-4 d-flex justify-content-center">

    <div class="card h-100" style="width: 18rem;">

        @if($product->img != 'NULL')
            <img class="card-img-top" src="{{ Storage::url($product->img) }}" alt="Card image cap">
        @else
            <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
        @endif

        <div class="card-body">

            <h5 class="card-title">{{ $product->product_name }}</h5>

            <p class="card-text">{{ $product->product_description }}</p>
            <a href="{{ route('product_details',['id'=>$product->id]) }}"
                class="btn btn-primary w-100">Dettagli</a>

            <div class="row mt-3">

                <div class="col-12">

                    <p class="small text-muted">
                        <a class="d-flex float-left" href="{{ route('categories_route',
                                [
                                $product->category->name,
                                $product->category->id
                                ])
                            }}"> {{ $product->category->name }} </a>
                        <span class="d-flex float-right">
                            {{ $product->created_at->format('d/m/Y') }} -
                            {{ $product->user->name }}</span>
                    </p>

                </div>
            </div>
        </div>

    </div>

</div>
