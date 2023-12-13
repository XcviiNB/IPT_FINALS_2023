@extends('base')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center" style="color: #fff;">Add New Game</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="game_title" class="text-white">Game Title</label>
                    <input type="text" class="form-control" name="game_title" id="game_title" required>
                </div>
                <div class="form-group">
                    <label for="date_released" class="text-white">Date Released</label>
                    <input type="date" class="form-control" name="date_released" id="date_released" required>
                </div>
                <div class="form-group">
                    <label for="synopsis" class="text-white">Synopsis</label>
                    <textarea class="form-control" name="synopsis" id="synopsis" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image" class="text-white">Game Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="form-group">
                    <label for="available" class="text-white">Available</label>
                    <select class="form-control" name="available" id="available" required>
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add Game</button>
            </form>
        </div>
    </div>
</div>

@endsection
