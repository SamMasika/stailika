@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Assign Role
                    </div>
                    <div class="card-body">
                        <form action="{{url('userrole/'.$users->id)}}" method="post">
                            @csrf
                            <div class="row">
                        <label for="">Role</label>
                        <input type="text" class="form-control" name="name" value={{$users->name}} readonly>
                           </div>
                    <div class="row">
                        {{-- <div class="col-md-12 mb-3"> --}}
                            <select class="js-example-basic-single" name="role[]" multiple="multiple">
                                @foreach ($roles as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                        {{-- </div> --}}
                        <button type="submit" class="btn btn-primary">Assign</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Assign Permission
                    </div>
                    <div class="card-body">
                        <form action="{{url('user-permission/'.$users->id)}}" method="post">
                            @csrf
                            <div class="row">
                        <label for="">Permission</label>
                        <input type="text" class="form-control" name="name" value={{$users->name}} readonly>
                           </div>
                    <div class="row">
                            <select class="js-example-basic-single" name="permission[]" multiple="multiple">
                                @foreach ($permissions as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                              </select>
                    
                        <button type="submit" class="btn btn-primary">Assign</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @endsection
    
    
    