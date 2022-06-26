@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Edit Permission
                    </div>
                    <div class="card-body">
                        <form action="{{url('update-permission/'.$permissions->id)}}" method="post">
                            @csrf
                            <div class="">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$permissions->name}}">
                    </div>
                    <div class="">
                        <label for="">Description</label>
                        <input type="text" class="form-control"  row="3" name="description" value="{{$permissions->description}}">
                    </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


@section('scripts')
    
@endsection