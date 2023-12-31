<!-- resources/views/submissions/index.blade.php -->

@extends('layouts.master')

@section('content')

    <div class="blog padding-top padding-bottom">
        <div class="container">
            <div class="blog__wrapper">
                <div class="row ">
                    <div class="col-lg-9">
                        <article>
                            <div class="container">

                                <h3>My Review Submissions(Journal)</h3>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Sub.Date</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($submissions as $submission)
                                        <tr>
                                            <td>{{ $submission->title }}</td>
                                            <td>{{ $submission->name }}</td>
                                            <td>{{ $submission->created_at }}</td>
                                            <td>{{ $submission->remark}}</td>
                                            <td>
                                                <a href="{{ route('admin.download', $submission->id) }}"  class="btn btn-secondary btn-sm">Download</a>
                                                <button type="button" class="btn default-btn--secondary btn-sm" data-toggle="modal" data-target="#submissionModal{{ $submission->id }}">
                                                    Review
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal for each submission -->
                                        <div class="modal fade" id="submissionModal{{ $submission->id }}" tabindex="-1" role="dialog" aria-labelledby="submissionModalLabel{{ $submission->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="submissionModalLabel{{ $submission->id }}">Review Submission</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.review.journal', $submission->id) }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="remarks">Remarks:</label>
                                                                <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status">Status:</label>
                                                                <select class="form-control" id="status" name="status" required>
                                                                    <option >Accept with No correction</option>
                                                                    <option>Accept with minor correction</option>
                                                                    <option>Accept with major correction</option>
                                                                    <option>Rejected</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Submit Review</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
