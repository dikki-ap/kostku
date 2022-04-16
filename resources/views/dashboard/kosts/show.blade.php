@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Kost Details</h1>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-6">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($images as $image)
                <div class="swiper-slide">
                    <img src="{{ $image->url }}" alt="{{ $image->url }}" class="img-fluid rounded-3 mb-5" width="700">
                </div>
                @endforeach
                

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev" style="color: #15adcc"></div>
                <div class="swiper-button-next" style="color: #15adcc"></div>
            </div>
        </div>
        <div class="col mx-3">
            <h2 class="mb-3" style="color: #15adcc">{{ $kost->name }}</h2>

            <article><i>{{ $kost->districts }}, {{ $kost->city }}</i></article>
            <article>Tipe: {{ $kost->category->name }}</article>
            <article class="mb-3"><span data-feather="star" style="color: #EDAE2A"></span>&nbsp; <span style="color: #15adcc">{{ $kost->rating }}/5</span></article>

            
            <h4 class="my-4">Rp. {{ $kost->price }}K / {{ $kost->period_time }}</h4>

            <h5><span data-feather="map-pin" style="color: #15adcc"></span>&nbsp;: {{ $kost->address }}</h5>
            <a href="@if ($kost->url_location == null)
                #
            @else
                {{ $kost->url_location }}
            @endif" target="_blank" class="btn btn-primary text-decoration-none border-0 my-3" style="background-color: #15adcc">Google Maps &nbsp;<span data-feather="map-pin" ></span></a>

            <h6 class="mt-3">No Telepon Pemilik: {{ $kost->phone_number }}</h5>

            <h6 class="mt-2">Fasilitas:
                <ul class="my-2" style="list-style-type: none">
                    @if ($kost->bathroom)
                        <li class="my-2">
                            <span data-feather="check-square" style="color: #15adcc"></span>&nbsp; Kamar Mandi
                        </li>
                    @else

                    @endif

                    @if ($kost->bed)
                        <li class="my-2">
                            <span data-feather="check-square" style="color: #15adcc"></span>&nbsp; Kasur
                        </li>
                    @else

                    @endif

                    @if ($kost->ac)
                        <li class="my-2">
                            <span data-feather="check-square" style="color: #15adcc"></span>&nbsp; AC
                        </li>
                    @else

                    @endif
                </ul>
            </h6>
        </div>
    </div>

    <div class="row text-center mt-3">
        <div class="col">
            <a href="/dashboard/kosts" class="btn btn-primary border-0" style="background-color: #15adcc"><span data-feather="chevrons-left"></span>&nbsp; Back to Kost List</a>
        </div>
    </div>
@endsection