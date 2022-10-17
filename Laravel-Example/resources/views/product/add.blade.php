@extends('layouts.app')

@section('title')
    Add Data
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('product.insert') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    <small class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror</small>
                </div>
                <div class="mb-3">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                    <small class="text-danger">
                    @error('price')
                        {{ $message }}
                    @enderror</small>
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                        {{ old('description') }}
                    </textarea>
                    <small class="text-danger">
                    @error('description')
                        {{ $message }}
                    @enderror</small>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection