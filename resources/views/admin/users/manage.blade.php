@extends('admin.layouts.layout')
@section('admin_title')
User Management
@endsection

@section('main_panel')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">User Management</h1>
        </div>
    </div>

    <!-- Additional content goes here -->
    <div class="">
        <table class="">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-cell="User ID">1</td>
                    <td data-cell="Username">admin</td>
                    <td data-cell="Full Name">Daniel John Bucad</td>
                    <td data-cell="User Type">Admin</td>
                    <td>
                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('GET')
                            -->
                            <button type="success">View Details</button>
                        </form>

                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('GET')
                            -->
                            <button class="success" type="submit">Edit</button>
                        </form>

                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('DELETE')
                            -->
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td data-cell="User ID">2</td>
                    <td data-cell="Username">lmnslntn</td>
                    <td data-cell="Full Name">Daniel Bucad</td>
                    <td data-cell="User Type">User</td>
                    <td>
                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('GET')
                            -->
                            <button type="success">View Details</button>
                        </form>

                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('GET')
                            -->
                            <button class="success" type="submit">Edit</button>
                        </form>

                        <form style="display:inline;">
                            <!--
                            @csrf
                            @method('DELETE')
                            -->
                            <button class="danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
@endsection