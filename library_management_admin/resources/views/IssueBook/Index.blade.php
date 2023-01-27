@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Shelf List</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Book</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($borrowRequests as $borrowRequest)
                                <tr>
                                    <td>{{ $borrowRequest->book->title }}</td>
                                    <td>{{ $borrowRequest->user->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="#" class="btn btn-sm btn-info rounded">
                                                Accept
                                            </a>
                                            <a href="#" class="btn btn-sm btn-danger rounded">
                                                Denied
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
