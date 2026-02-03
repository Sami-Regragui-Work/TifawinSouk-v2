<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>TifawinSouk</title>
   
    
</head>
<body>

    <h1>Categories</h1>
    <div>
        <a href="{{ url('/categories/create') }}">add category</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>descreption</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td><strong>{{ $category->title }}</strong></td>
                <td>{{ $category->description ?? 'ne pas de description' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>