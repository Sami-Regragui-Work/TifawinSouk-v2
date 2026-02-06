<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>TifawinSouk</title>
     <style>

                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f5f5f5;
                                margin: 0;
                                padding: 20px;
                                direction: rtl;
                            }

                            h1 {
                                text-align: center;
                                margin-bottom: 20px;
                            }

                            
                            

                            

                            .add-category a:hover {
                                background-color: #1a5bb8;
                            }

                            
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                background-color: white;
                            }

                            thead {
                                background-color: #ddd;
                            }

                            th, td {
                                padding: 10px;
                                border: 1px solid #ccc;
                                text-align: center;
                            }

                            tbody tr {
                                display: flex;
                            }

                            thead tr {
                                display: flex;
                            }

                            th, td {
                                flex: 1;
                            }

                            tbody tr:nth-child(even) {
                                background-color: #f2f2f2;
                            }
                           
                            .actions {
                                display: flex;
                                gap: 8px;
                                align-items: center;
                            }

                            
                            .btn-edit {
                                padding: 6px 12px;
                                background-color: #f0ad4e;
                                color: white;
                                text-decoration: none;
                                border-radius: 4px;
                                font-size: 14px;
                            }

                            .btn-edit:hover {
                                background-color: #ec971f;
                            }

                        
                            .btn-delete {
                                padding: 6px 12px;
                                background-color: #d9534f;
                                color: white;
                                border: none;
                                border-radius: 4px;
                                cursor: pointer;
                                font-size: 14px;
                            }

                            .btn-delete:hover {
                                background-color: #c9302c;
                            }

                           
                            .add-btn {
                                display: inline-flex;
                                align-items: center;
                                padding: 8px 14px;
                                background-color: #5cb85c;
                                color: white;
                                text-decoration: none;
                                border-radius: 5px;
                                font-size: 14px;
                                margin-top: 10px;
                            }

                            .add-btn:hover {
                                background-color: #449d44;
                            }

     </style>

    
</head>
<body>
     
    <h1>Categories</h1>
    <div>
        <a class="add-btn" href="{{ url('/categories/create') }}">add category</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>nom category </th>
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
                </td>
                <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">edite</a> | 

                        <form  method="POST" style="display:inline;">
                            @csrf
                            <button class="btn-delete" type="submit" onclick="return confirm('delete ?')" >
                                delete
                            </button>
                        </form>
               </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>