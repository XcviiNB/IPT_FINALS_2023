@extends('base')

@section('content')

<div class="container mt-5">
    <h1 class="text-white mb-3">Edit Game</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="game_title" class="text-white">Game Title</label>
            <input type="text" class="form-control" name="game_title" id="game_title" value="{{ old('game_title', $game->game_title) }}" required>
        </div>

        <div class="form-group">
            <label for="date_released" class="text-white">Date Released</label>
            <input type="date" class="form-control" name="date_released" id="date_released" value="{{ old('date_released', $game->date_released) }}" required>
        </div>

        <div class="form-group">
            <label for="synopsis" class="text-white">Synopsis</label>
            <textarea class="form-control" name="synopsis" id="synopsis" required>{{ old('synopsis', $game->synopsis) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image" class="text-white">Game Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>

        <div class="form-group">
            <label for="available" class="text-white">Available</label>
            <select class="form-control" name="available" id="available" required>
                <option value="1" {{ $game->available ? 'selected' : '' }}>Available</option>
                <option value="0" {{ !$game->available ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Game</button>
    </form>
</div>

@endsection
