@extends('layouts.app')

@section('title')
    Products
@endsection

@section('content')
    <a href="{{ route('product.add') }}" class="btn btn-primary mb-3">Add Data</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $i => $item)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('product.delete', $item->id) }}" method="post" style="display: inline;">
                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection