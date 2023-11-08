<!-- users/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="blog padding-top padding-bottom">
        <div class="container">
            <div class="blog__wrapper">
                <div class="row ">
                    <div class="col-lg-9">
                        <article>
                            <div class="container">
                                <h1>User Management</h1>


                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#editUserModal{{ $user->id }}">
                                                    Edit
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#resetPasswordModal{{ $user->id }}">
                                                    Reset Password
                                                </button>
                                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                                        data-target="#makeJournalAdminModal{{ $user->id }}">
                                                    Make Admin
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit User Modal -->
                                        @include('pages.admin.users.modals.edit_user')

                                        <!-- Reset Password Modal -->
                                        @include('pages.admin.users.modals.reset_password')

                                        <!-- Make Journal Admin Modal -->
                                        @include('pages.admin.users.modals.make_journal_admin')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-3">
                        @include("commons.menu")
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
