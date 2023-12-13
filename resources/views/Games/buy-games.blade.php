@extends('base')

@section('content')
    @if (session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        @foreach ($games as $game)
            <div class="card">
                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->game_title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->game_title }}</h5>
                    <p class="card-text">{{ $game->synopsis }}</p>
                    @if ($game->available)
                        <p class="availability available">Available</p>
                        <form action="{{ route('games.buy', $game->id) }}" method="POST" onsubmit="return confirmPurchase('{{ addslashes($game->game_title) }}')">
                            @csrf
                            <button type="submit" class="btn btn-primary">Buy</button>
                        </form>
                    @else
                        <p class="availability not-available">Not Available</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function confirmPurchase(gameTitle) {
            return confirm('Are you sure you want to buy "' + gameTitle + '"?');
        }
    </script>
@endsection

<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
    }

    .card {
        width: 300px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.5rem;
        margin-bottom: .5rem;
    }

    .card-text {
        font-size: 1rem;
        color: #666;
        margin-bottom: 1rem;
    }

    .availability {
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .available {
        color: #28a745;
    }

    .not-available {
        color: #dc3545;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }

    .flash-message {
        text-align: center;
        padding: 1rem;
        margin-bottom: 2rem;
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        border-radius: 0.25rem;
        position: fixed;
        top: 5rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1050;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
        display: none;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const flashMessage = document.querySelector('.flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'block';
            setTimeout(function() {
                flashMessage.style.display = 'none';
            }, 4000);
        }
    });
</script>
