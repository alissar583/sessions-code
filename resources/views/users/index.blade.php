@extends('layouts.app')

@section('content')
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

    <a href={{ route('users.create') }}>create new user</a>
@endsection
