<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label>nom Category</label>
        <input type="text" name="nom" required>
    </div>
    
    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>

    <button type="submit">add Category</button>
</form>