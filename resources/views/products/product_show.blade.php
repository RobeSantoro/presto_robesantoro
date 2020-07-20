@extends('layouts.app')
@section('content')

<div class="container pt-5">

    <div class="row justify-content-center">
        {{-- TITOLO E DESCRIZIONE --}}
        <div class="col-12 text-center mb-4">
            <h1>{{ $product->product_name }}</h1>
            <p class="card-text mt-2 mb-1">{{ $product->product_description }}</p>
            <p class="card-text mb-1">Inserito da {{ $product->user->name }}</p>
        </div>

        <div class="col-12 col-md-6 col-lg-5 mb-4">
            @if(count($product->productImages) > 0)
                {{-- ONLY ONE IMAGE --}}
                @if(count($product->productImages) > 1)
                    {{-- MORE THAN ONE IMAGE --}}
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <ol class="carousel-indicators" style="list-style-type: none;">
                                @foreach( $product->productImages as $image )
                                    <li data-target="#carousel" data-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->first ? 'active' : '' }}">
                                        <div id="square"></div>
                                    </li>
                                @endforeach
                            </ol>

                            @foreach($product->productImages as $image)

                                <div
                                    class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="card-img-top" src="{{ $image->getUrl(300,300) }}"
                                        alt="{{ $product->product_description }}">

                                    @if(Auth::user()->is_revisor == true)
                                        {{-- REVISOR MULTIPLE IMAGE --}}
                                        <div class="px-1 my-2">
                                            @if($image->labels)
                                                @foreach($image->labels as $label )
                                                    {{ $label }}{{ $loop->last ? '' : ',' }}
                                                    &nbsp;
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="px-2">
                                            <h6 class="mt-4">ADULT
                                                <span class="float-right">{{ $image->adult }}</span>
                                            </h6>
                                            <div class="progress mb-1 shadow">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <h6 class="mt-4">SPOOF
                                                <span class="float-right">{{ $image->spoof }}</span>
                                            </h6>
                                            <div class="progress mb-1 shadow">
                                                <div class="progress-bar" role="progressbar" style="width: 25%"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <h6 class="mt-4">MEDICAL
                                                <span class="float-right">{{ $image->medical }}</span>
                                            </h6>
                                            <div class="progress mb-1 shadow">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <h6 class="mt-4">VIOLENCE
                                                <span class="float-right">{{ $image->violence }}</span>
                                            </h6>
                                            <div class="progress mb-1 shadow">
                                                <div class="progress-bar" role="progressbar" style="width: 75%"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>

                                            <h6 class="mt-4">RACY
                                                <span class="float-right">{{ $image->racy }}</span>
                                            </h6>
                                            <div class="progress mb-4 shadow">
                                                <div class="progress-bar" role="progressbar" style="width: 100%"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @else

                                    @endif
                                </div>
                            @endforeach

                        </div>

                        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>

                @else{{-- MORE THAN ONE IMAGE --}}
                    <img class="card-img-top" src="{{ $product->productImages->first()->getUrl(300,300) }}"
                        alt="{{ $product->product_description }}">


                    @if(Auth::user()->is_revisor == true)
                        <div class="my-2">
                            @if( $product->productImages )
                                @foreach($product->productImages->labels as $label )
                                    {{ $label }}{{ $loop->last ? '' : ',' }}
                                    &nbsp;
                                @endforeach
                            @endif
                        </div>

                        <h6 class="mt-4">ADULT
                            <span class="float-right">{{ ($product->productImages->first()->adult) }}</span>
                        </h6>
                        <div class="progress mb-1 shadow">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                aria-valuemax="100"></div>
                        </div>

                        <h6 class="mt-2">SPOOF
                            <span class="float-right">{{ ($product->productImages->first()->spoof) }}</span>
                        </h6>
                        <div class="progress mb-1 shadow">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h6 class="mt-2">MEDICAL
                            <span class="float-right">{{ ($product->productImages->first()->medical) }}</span>
                        </h6>
                        <div class="progress mb-1 shadow">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h6 class="mt-2">VIOLENCE
                            <span class="float-right">{{ ($product->productImages->first()->violence) }}</span>
                        </h6>
                        <div class="progress mb-1 shadow">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <h6 class="mt-2">RACY
                            <span class="float-right">{{ ($product->productImages->first()->racy) }}</span>
                        </h6>
                        <div class="progress mb-1 shadow">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @endif
                @endif{{-- MORE THAN ONE IMAGE --}}
            @else{{-- NO IMAGE --}}
                <img class="card-img-top" src="https://via.placeholder.com/300" alt="Image Missing">
            @endif{{-- ONLY ONE IMAGE --}}

            @if(Auth::user()->is_revisor == true)

                <div class="row mt-3">
                    <div class="col-12">
                        <form action="{{ route('revisor.reject' , $product->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger float-left shadow w-49">Rifiuta</button>
                        </form>
                        <form action="{{ route('revisor.accept' , $product->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success float-right shadow w-49">Approva</button>
                        </form>

                    </div>
                </div>

            @else
                <div class="row mt-3">
                    <div class="col-12">
                        <a href="#" class="btn btn-primary w-100 shadow">Compra</a>
                    </div>
                </div>
            @endif

        </div>

    </div>


</div>


@endsection
