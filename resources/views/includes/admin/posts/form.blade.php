@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </div>
@endif

@if ($post->exists)
    <form action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" method="POST" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="POST" novalidate>
@endif

@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" value="{{ old('title', $post->title) }}" required minlenght="5" maxlenght="50">
            {{-- MESSAGGIO ERRORE --}}
            @error('title')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category)
                    <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->label }}</option>
                @endforeach
            </select>

            {{-- MESSAGGIO ERRORE --}}
            @error('category_id')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
        </div>
    </div>

    @if (count($tags))
        <div class="col-12 mb-2">
            <fieldset>
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="tag-{{ $tag->label }}" name="tags[]"
                            value="{{ $tag->id }}" @if (in_array($tag->id, old('tags', $prev_tags ?? []))) checked @endif>
                        <label class="form-check-label" for="tag-{{ $tag->label }}"> {{ $tag->label }}</label>
                    </div>
                @endforeach
            </fieldset>
        </div>
    @endif



    <div class="col-12">
        <div class="form-group">
            <label for="content">Contenuto</label>

            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="8" name="content"
                required>{{ old('content', $post->content) }}</textarea>
            {{-- MESSAGGIO ERRORE --}}
            @error('content')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
        </div>
    </div>
    {{-- <div class="col-11">
        <div class="form-group">
            <label for="image">Immagine</label><br />
            <input type="file" class="@error('title') is-invalid @enderror" id="image" name="image"
               
                @error('image')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
                </div>
        </div>
        <div class="col-1">
            <img class="img-fluid"
                src="{{ $post->image ? asset('storage/' . $post->image) : 'https://ralfvanveen.com/wp-content/uploads/2021/06/Placeholder-_-Begrippenlijst.svg' }}"
                alt="{{ $post->image ? $post->title : 'placeholder' }}">
        </div>
    </div> --}}
    <div class="col-11">
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" id="image" name="image">

        </div>
    </div>
    <div class="col-1 mt-4">
        <img class="img-fluid"
            src="{{ $post->image ? asset('storage/' . $post->image) : 'https://ralfvanveen.com/wp-content/uploads/2021/06/Placeholder-_-Begrippenlijst.svg' }}"
            alt="{{ $post->image ? $post->title : 'placeholder' }}" id="preview" />
    </div>


    <hr />
    <footer class="d-flex justify-content-between">
        <a class="btn btn-secondary mr-2" href="{{ route('admin.posts.index') }}">
            <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
        </a>
        <button class="btn btn-success" type="submit">
            <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
        </button>

        {{-- Checkbox  Autore Nascondere all'utente loggato la possibilità di modificare post di cui non è autore. 
    OPPURE permettergli di fare modifiche
     e di decidere se dopo la modifica debba risultare autore o meno (tramite un checkbox) --}}
        {{-- @if ($post->exists && $post->user_id !== Auth::id())
        <div class="form-froup form-check">
            <input type="checkbox" class="form-check input" id="switch_author" name="switch_author" value="1"
                @if (old('switch_author'))  @endif>
            <label class="form-check-label" for="switch_author"><strong>Assegnami come autore del post di: </strong>
                {{ $post->user->name }}</label>
        </div>
    @endif --}}
    </footer>
    </form>
