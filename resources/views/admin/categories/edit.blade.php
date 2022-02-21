@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Modifica Categoria: {{$category->name}}</div>

                <div class="card-body">
                    
                    <form action="{{route("categories.update", $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci nome della categoria" value="{{old('name', $category->name)}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Modifica Post</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection