@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
    <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Products</div>
    
                    <div class="card-body" >
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)                                    
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td><a href="{{route('product.edit',['id'=>$product->id])}}">Edit</a></td>
                                    <td><a href="{{route('product.delete',['id'=>$product->id])}}">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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