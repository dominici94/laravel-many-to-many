@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Nuovo post</div>

                <div class="card-body">
                    
                    <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titolo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci titolo" value="{{old('title')}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Contenuto</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10" placeholder="Inserisci il contenuto del post">{{old('content')}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                <option value="">Seleziona categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h4>Tags</h4>

                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="tags[]" id="{{$tag->slug}}" value="{{$tag->id}}" {{in_array($tag->id, old( "tags", [] ) ) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                                </div>
                            @endforeach
                            @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" name="published" id="published" {{old('published') ? 'checked' : ''}}>
                            <label class="form-check-label" for="published">Pubblica</label>
                            @error('published')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <img id="uploadPreview" class="w-100" src="https://via.placeholder.com/350x150">
                            <label for="image">Aggiungi immagine</label>
                            <input type="file" id="image" name="image" onchange="PreviewImage();">
                            <script type="text/javascript">

                                function PreviewImage() {
                                    var oFReader = new FileReader();
                                    oFReader.readAsDataURL(document.getElementById("image").files[0]);

                                    oFReader.onload = function (oFREvent) {
                                        document.getElementById("uploadPreview").src = oFREvent.target.result;
                                    };
                                };

                            </script>
                        </div>
                        @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Crea Post</button>

                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection