@extends('dashboard.layouts.main')

@section('container')

    <div class="row" style="color: #15adcc">
        <div class="col">
            <h1>Gallery for 
                @foreach ($kost_name as $name)
                    {{ $name }}
                @endforeach
            </h1>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col">
            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($images as $image)
                <div class="swiper-slide">
                    <img src="{{ $image->url }}" alt="{{ $image->url }}" class="img-fluid mb-5" width="700">
                </div>
                @endforeach
                

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            
                {{-- <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div> --}}
            </div>
        </div>
    </div>

    <div class="row mt-5 text-center">
        <div class="col">
            <a href="/dashboard/galleries" class="btn btn-primary border-0" style="background-color: #15adcc"><span data-feather="chevrons-left"></span>&nbsp; Back to Kost Galleries</a>
        </div>
    </div>

@endsection