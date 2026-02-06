<h2 class="title" >edite category {{ $category->title }}</h2>

<form class="form" action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    <div>
        <label>title categry</label>
        <input type="text" name="title" value="{{ $category->title }}" required>
    </div>

    <div>
        <label>description</label>
        <textarea name="description">{{ $category->description }}</textarea>
    </div>

    <button class="btn-edit" type="submit" >edite</button>
    <a class="btn-anuller" href="{{ url('/categories') }}">anuller</a>
</form>