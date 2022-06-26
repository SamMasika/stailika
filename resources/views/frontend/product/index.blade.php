@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('content')
<div class="container">
<div class="py-3 mb-4 shadow-sm bg-light border-top">
    <div class="container">
        <h6 class="mb-0">
           <a href="{{url('category')}}">Collections</a> /
           <a href="{{url('view-category/'.$category->slug)}}">{{$category->name}}</a>/ </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h4>{{$category->name}}</h4>
                @foreach ($product as $prod)
                <div class="col-md-3 mb-3">
                    <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                    <div class="card">
                        <img src="{{asset('admin/images/product/'.$prod->image)}}" alt="Product image">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start">Tsh.{{$prod->selling_price}}/=</span>
                            <span class="float-end"><s>Tsh.{{$prod->origin_price}}/=</s></span>
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
