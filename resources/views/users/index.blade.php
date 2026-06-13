<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Users List</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">edit</a>
                        <form action="{{ route('users.delete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">delete</button>
                        </form>
                        {{-- <a href="{{ route('users.delete',$user->id) }}">delete</a> --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
<a href={{ route('users.create') }}>create new user</a>

</html>
