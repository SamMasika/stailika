@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Assign Permission
                    </div>
                    <div class="card-body">
                        <form action="{{url('assign/'.$roles->id)}}" method="post">
                            @csrf
                            <div class="row">
                        <label for="">Role</label>
                        <input type="text" class="form-control" name="name" value={{$roles->name}} readonly>
                           </div>
                    <div class="row">
                        {{-- <div class="col-md-12 mb-3"> --}}
                            <select class="js-example-basic-single" name="permission[]" multiple="multiple">
                                @foreach ($permissions as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
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
    @endsection


    @push('scripts')

    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });
  
        });
  
    </script>
        
    @endpush