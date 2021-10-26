@extends('layouts.master')
@section('content')
    <form action="{{route('multi_delete_action')}}" method="POST">
        @csrf
        <table>
            <tr>
                <th></th>
                <th>Product Name</th>
                <th>Product Concentration</th>
                <th>Product Volume</th>
                <th>Product Brand</th>
                <th>Product Origin</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td><input type="checkbox" name="products_id[]" value="{{$product->id}}"></td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->concentration}}</td>
                    <td>{{$product->volume}}</td>
                    <td>{{$product->origin->name}}</td>
                    <td>{{$product->brand->name}}</td>
                <tr></tr>
            @endforeach
        </table>

        <button>Submit</button>
    </form>
@endsection