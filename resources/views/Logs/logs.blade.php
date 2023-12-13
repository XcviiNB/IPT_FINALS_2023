@extends('base')

@section('content')

<div class="container mt-5">
    <div class="card text-dark bg-white mb-3">
        <div class="card-header">
            <h1 class="mb-0 text-center">Logs</h1>
        </div>
        <div class="card-body">
            <table class="table table-white table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Log Entry</th>
                        <th scope="col">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                    <tr>
                        <th scope="row">{{ $log->id }}</th>
                        <td>{{ $log->log_entry }}</td>
                        <td>{{ $log->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<style>
    .table-hover tbody tr:hover {
        background-color: #9e9e9e;
    }
</style>
