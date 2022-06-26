@extends('layouts.front')

@section('title')
   Welcome to Stailika
@endsection

@section('content')
@include('layouts.frontinc.slider')
   
<div class="py-5">
    <div class="container">
        <div class="row">
            <h4>Featured Products</h4>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($fproducts as $prod)
                <div class="item">
                     {{-- <a href="{{url('view-category/'.$tcate->slug)}}"> --}}
                    <div class="card">
                        <img src="{{asset('admin/images/product/'.$prod->image)}}" alt="Product image">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            {{-- <h5>{{$prod->shop->name}}</h5> --}}
                            <span class="float-start">Tsh.{{$prod->selling_price}}/=</span>
                            <span class="float-end"><s>Tsh.{{$prod->origin_price}}/=</s></span>
                        </div>
                    </div>
                </div>  
                @endforeach
                
            </div>
          
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h4>Trending Category</h4>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($tcategory as $tcate)
                <div class="item">
                    <a href="{{url('view-category/'.$tcate->slug)}}">
                    <div class="card">
                        <img src="{{asset('admin/images/category/'.$tcate->image)}}" alt="Product image">
                        <div class="card-body">
                            <h5>{{$tcate->name}}</h5>  
                            {{-- <h5>{{$tcate->shop->name}}</h5>   --}}
                            <p>
                                {{$tcate->description}}
                            </p>
                        </div>
                    </div>
                 </a>
             </div>  
                @endforeach
                
            </div>
          
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
    </script>
@endsection