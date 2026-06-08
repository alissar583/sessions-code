<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
</head>

<body>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label id="name">name</label>
        <input for='name' type="text" name="name">
        @error('name')
            {{ $message }}
        @enderror

        <label id="email">email</label>
        <input for='email' type="email" name="email">
        @error('email')
            {{ $message }}
        @enderror

        <label id="password">password</label>
        <input for='password' type="password" name="password">


        <button type="submit">Submit</button>
    </form>
</body>

</html>
