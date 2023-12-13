@extends('base')

@section('content')

<div class="container mt-5">
    <p class="my-4"> <span class="text-warning"> Hello, </span> <strong class="text-info"> {{ auth()->user()->name }}! </strong> </p>

    <div class="card bg-white text-dark">

        @if (session('success'))
            <div class="alert alert-success">
                <strong> {{ session('success') }} </strong>
            </div>
        @endif

        @if (session('update'))
        <div class="alert alert-warning">
            <strong> {{ session('update') }} </strong>
        </div>
    @endif

        @if (session('remove'))
            <div class="alert alert-danger">
                <strong> {{ session('remove') }} </strong>
            </div>
        @endif

        @if (auth()->check())
            @can('manage-games')
                <div class="card-header">
                    <h1 class="mb-0 text-center">Games</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-white table-hover table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Game Title</th>
                                    <th>Date Released</th>
                                    <th>Synopsis</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $game)
                                <tr>
                                    <td>{{ $game->game_title }}</td>
                                    <td>{{ $game->date_released }}</td>
                                    <td>{{ $game->synopsis }}</td>
                                    <td>
                                        @if ($game->available)
                                            Available
                                        @else
                                            Not available
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('games.edit', $game->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('games.destroy', $game->id) }}" method="POST" class="d-inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('games.create') }}" class="btn btn-success mb-3">Add New Game</a>
                    </div>
                </div>
            @endcan
        @endif
    </div>
</div>

@endsection

<style>
    .table-hover tbody tr:hover {
        background-color: #9e9e9e;
    }
</style>
