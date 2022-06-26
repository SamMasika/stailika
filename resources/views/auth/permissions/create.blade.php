@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Create Permission
                    </div>
                    <div class="card-body">
                        <form action="{{url('store-permission')}}" method="post">
                            @csrf
                            <div class="">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="">
                        <label for="">Description</label>
                        <input type="text" class="form-control"  row="3" name="description">
                    </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


@section('scripts')
    
@endsection