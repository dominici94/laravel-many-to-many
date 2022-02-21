@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tags list</div>

                <div class="card-body">
                    <div class="mb-2">
                        <a href="{{route("tags.create")}}"><button type="button" class="btn btn-success">Aggiungi tag</button></a>
                        
                    </div>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($tags as $tag)

                                <tr>
                                    <td>{{$tag->id}}</td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>
                                        <a href="{{route("tags.show", $tag->id)}}"><button type="button" class="btn btn-success">Visualizza</button></a>
                                        <a href="{{route("tags.edit", $tag->id)}}"><button type="button" class="btn btn-warning">Modifica</button></a>
                                        <form action="{{route("tags.destroy", $tag->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </td>
                                </tr>
                                
                            @endforeach
                            
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection