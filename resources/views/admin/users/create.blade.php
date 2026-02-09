<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <label for="name">User Name:</label><br>
        <input id="name" name="name" type="text" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" required id="email" name="email"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>
        <label for="role">Role: </label>
        <select name="role" id="role">
            <option value="Client">Client</option>
            <option value="Supplier">Supplier</option>
            <option value="Admin">Admin</option>
        </select><br><br>
        <input type="submit" id="submit">
    </form>
</body>
</html>
