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
                                <h1>Journal Submissions without Reviewer</h1>

                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <!-- Add other submission fields as needed -->
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($submissions as $submission)
                                        <tr>
                                            <td>{{ str_pad($submission->id,6,0,STR_PAD_LEFT) }}</td>
                                            <td>{{ $submission->title }}</td>
                                            <!-- Add other submission fields as needed -->
                                            <td>
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#selectReviewerModal{{ $submission->id }}">Select Reviewer</button>
                                            </td>
                                        </tr>

                                        <!-- Modal for selecting reviewer -->
                                        <div class="modal fade" id="selectReviewerModal{{ $submission->id }}" tabindex="-1" role="dialog" aria-labelledby="selectReviewerModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form method="post" action="{{ route('submissions.addReviewer.journal') }}">
                                                    @csrf
                                                    <input type="hidden" name="submission_id" value="{{ $submission->id }}">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="selectReviewerModalLabel">Select Reviewer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Display a list of users here -->
                                                            <input type="hidden" name="submission_id" value="{{ $submission->id }}">
                                                            <div class="form-group">
                                                                <label for="reviewer_id">Select Reviewer:</label>
                                                                <select class="form-control" id="reviewer_id" name="reviewer_id">
                                                                    @foreach ($users as $user)
                                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save Reviewer</button>
                                                        </div>
                                                    </div>
                                                </form>
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



@endsection
