@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Edit Role
                    </div>
                    <div class="card-body">
                        <form action="{{url('update-role/'.$roles->id)}}" method="post">
                            @csrf
                            <div class="">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$roles->name}}">
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