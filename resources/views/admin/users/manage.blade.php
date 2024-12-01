@extends('admin.layouts.layout')
@section('admin_title')
User Management
@endsection

@section('main_panel')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">User Management</h1>
        </div>
        <a href="{{ route('create.user') }}" class="btn btn-success create-btn-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
            </svg>
            <span>Add User</span>
        </a>
    </div>

    @if(session('success'))
        <div class="alert custom-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Additional content goes here -->
    <div class="">
        <a href="{{ route('create.user') }}" class="btn btn-success create-btn-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
            </svg>
            <span>Add User</span>
        </a>
        <table class="">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="users-table" data-cell="">{{ $user->username }}</td>
                    <td class="users-table" data-cell="">{{ $user->First_name }} {{ $user->Middle_name }} {{ $user->Last_name }}</td>
                    <td class="users-table" data-cell="">
                        @if($user->usertype === 'superadmin')
                            <span style="padding: 5px 10px; border-radius: 5px; background-color: black; color:red;">Superadmin</span>
                        @elseif($user->usertype === 'admin')
                            <span style="padding: 5px 10px; border-radius: 5px; background-color: black; color:yellow;">Admin</span>
                        @else
                            <span style="padding: 5px 10px; border-radius: 5px; background-color: black;">User</span>
                        @endif
                    </td>
                    <td>
                        @if($user->usertype !=='superadmin')
                        <form action="{{ route('delete.user', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="danger" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                                <span style="display:contents;">Delete</span>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection