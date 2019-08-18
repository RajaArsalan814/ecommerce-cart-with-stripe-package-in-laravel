@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
    <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
    
                    <div class="card-body" >
                <form action="
                @if($edit==true)
                {{route('product.update',['id'=>$product->id])}}
                @else
                {{route('product.store')}}
                @endif
                " method="post">

                @if($edit==true)
                <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control">
                    </div>
                    @csrf
                    <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" value="{{$product->price}}" class="form-control">
                    </div>
                    <div class="form-group">
                                <label for="">Image</label>
                                <input type="text" name="image" value="{{$product->image}}" class="form-control">
                    </div>
                    <button type="submit" class="form-control btn btn-primary">Update</button>
                @else
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    @csrf
                    <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                                <label for="">Image</label>
                                <input type="text" name="image" class="form-control">
                    </div>
                    <button type="submit" class="form-control btn btn-primary">Save</button>
                    @endif
                </form>
                        {{--  @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        You are logged in!  --}}
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection