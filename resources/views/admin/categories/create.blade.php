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
                            max-width: 400px;
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
                            font-weight: bold;
                            font-size: 14px;
                        }
                        
                        
                        .form input,
                        .form textarea {
                            padding: 8px;
                            border: 1px solid #ccc;
                            border-radius: 4px;
                            font-size: 14px;
                        }

                        
                        .form textarea {
                            resize: vertical;
                            min-height: 80px;
                        }
                        
                        .btn-anuller{
                            align-self: flex-start;
                            padding: 8px 16px;
                            background-color: #5cb7b8;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-size: 14px;
                        }
                        
                        .btn {
                            align-self: flex-start;
                            padding: 8px 16px;
                            background-color: #5cb85c;
                            color: white;
                            border: none;
                            border-radius: 4px;
                            cursor: pointer;
                            font-size: 14px;
                        }
                        
                        .btn:hover {
                            background-color: #449d44;
                        }
                        
                        

                    </style>
<h2  class="title">add category</h2>
<form class="form" action="{{ route('categories.store') }}" method="POST">
    @csrf
    <div>
        <label>nom Category</label>
        <input type="text" name="title" required>
    </div>
    
    <div>
        <label>Description</label>
        <textarea name="description"></textarea>
    </div>
     
    <div >
        <a class="btn-anuller"href="{{ url('/categories') }}">anuller</a>
        <button class="btn" type="submit">add Category</button>
    </div>
</form>