<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <label for="name">User Name:</label><br>
        <input value="{{ $user->name }}" id="name" name="name" type="text" required readonly><br><br>
        <label for="email">Email:</label><br>
        <input value="{{ $user->email }}" type="text" required id="email" name="email" readonly><br><br>
        <label for="phone">Phone:</label><br>
        <input value="{{ $user->phone }}" type="text" id="phone" name="phone" required readonly><br><br>
        <label for="address">Address:</label><br>
        <input value="{{ $user->address }}" type="text" id="address" name="address" required readonly><br><br>
        <label for="role">Role: </label><br>
        <input for="role" id="role" name="role" value="{{ $user->role->name }}" readonly><br><br>
        <div class="btns">
            <a href="{{ route('admin.users.edit', compact('user')) }}">Edit</a>
            <a href="{{ route('admin.index')}}">Close</a>
        </div>
</body>
</html>
