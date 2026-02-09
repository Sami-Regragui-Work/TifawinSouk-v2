<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.users.update', compact('user')) }}" method="POST">
        @csrf @method('PUT')
        <label for="name">User Name:</label><br>
        <input value="{{ $user->name }}" id="name" name="name" type="text" required><br><br>
        <label for="email">Email:</label><br>
        <input value="{{ $user->email }}" type="email" required id="email" name="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="phone">Phone:</label><br>
        <input value="{{ $user->phone }}" type="text" id="phone" name="phone" required><br><br>
        <label for="address">Address:</label><br>
        <input value="{{ $user->address }}" type="text" id="address" name="address" required><br><br>
        <label for="role">Role: </label>
        <select name="role" id="role">
            @if ($user->role_id == 1)
                <option value="Client">Client</option>
                <option value="Supplier">Supplier</option>
                <option value="Admin" selected>Admin</option>
            @elseif ($user->role_id == 1)
                <option value="Client">Client</option>
                <option value="Supplier" selected>Supplier</option>
                <option value="Admin">Admin</option>
            @else
                <option value="Client" selected>Client</option>
                <option value="Supplier">Supplier</option>
                <option value="Admin">Admin</option>
            @endif
        </select><br><br>
        <div class="btns">
            <button type="submit">Submit Editings</button>
            <button>Close</button>
        </div>
    </form>
</body>
</html>
