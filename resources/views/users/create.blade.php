@extends('layouts.app')

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="name">name</label>
        <input id='name' type="text" name="name">
        @error('name')
            {{ $message }}
        @enderror

        <label for="email">email</label>
        <input id='email' type="email" name="email">
        @error('email')
            {{ $message }}
        @enderror

        <label for="password">password</label>
        <input id='password' type="password" name="password">


        <button type="submit">Submit</button>
    </form>
@endsection
