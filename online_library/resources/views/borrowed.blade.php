@extends('layouts.app') <!-- or remove if you’re not using a layout -->

@section('content')
    <div class="session-container">
        <h2>Borrowed Books</h2>

        @if ($books->count())
            <ul>
                @foreach ($books as $book)
                    <li>
                        <strong>{{ $book->title }}</strong> - {{ $book->type }} - <br>Rs. {{ $book->price }}
                        <form method="POST" action="{{ route('return.book', $book->id) }}">
                            @csrf
                            <p style="text-align:right;"><button type="submit" class="btn btn-warning btn-sm">Return</button></p>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No borrowed books found.</p>
        @endif
    </div>
@endsection
