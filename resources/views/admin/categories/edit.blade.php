<style>
                    .title {
                        text-align: center;
                        margin-bottom: 20px;
                        font-size: 22px;
                    }

                    .form {
                        display: flex;
                        flex-direction: column;
                        gap: 15px;
                        max-width: 420px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 6px;
                    }

                    .form > div {
                        display: flex;
                        flex-direction: column;
                        gap: 5px;
                    }

                    .form label {
                        font-size: 14px;
                        font-weight: bold;
                    }

                    .form input,
                    .form textarea {
                        padding: 8px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        font-size: 14px;
                    }

                    .form textarea {
                        min-height: 80px;
                        resize: vertical;
                    }

                    .form-actions {
                        display: flex;
                        gap: 10px;
                        align-items: center;
                    }

                    .btn-edit {
                        padding: 8px 16px;
                        background-color: #f0ad4e;
                        color: white;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        font-size: 14px;
                    }

                    .btn-edit:hover {
                        background-color: #ec971f;
                    }

                    .btn-anuller {
                        padding: 8px 16px;
                        background-color: #6c757d;
                        color: white;
                        text-decoration: none;
                        border-radius: 4px;
                        font-size: 14px;
                    }

                    .btn-anuller:hover {
                        background-color: #5a6268;
                    }

</style>
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