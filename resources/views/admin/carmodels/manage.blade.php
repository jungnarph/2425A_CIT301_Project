@extends('admin.layouts.layout')
@section('admin_title')
Car Model Management
@endsection
@section('main_panel')
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 main-content">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <h1 class="h2">Car Model Management</h1>
        </div>
    </div>

    <!-- Additional content goes here -->
    <div class="">
        <table class="">
            <thead>
                <tr>
                    <th>Model ID</th>
                    <th>Model Name</th>
                    <th>Type</th>
                    <th>Seating Capacity</th>
                    <th>Transmission Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-cell="Model ID">1</td>
                    <td data-cell="Model Name">NISSAN GT-R</td>
                    <td data-cell="Type">Sports Car</td>
                    <td data-cell="Seating Capacity">4</td>
                    <td data-cell="Transmission Type">Manual</td>
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
                    <td data-cell="Model ID">2</td>
                    <td data-cell="Model Name">Toyota Vios</td>
                    <td data-cell="Type">Sedan</td>
                    <td data-cell="Seating Capacity">5</td>
                    <td data-cell="Transmission Type">CVT</td>
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