@extends("layouts.master")

@section("content")


    @php
        $conf = \App\Models\Conference::conference();
    @endphp

    <div class="blog padding-top padding-bottom">
        <div class="container">
            <div class="blog__wrapper">
                <div class="row ">
                    <div class="col-lg-8">
                        <article>
                            <div class="post-item-2">
                                <div class="post-inner">
                                    <div class="post-thumb mb-30 px-30 pt-30">
                                        <img src="/doa.jpg" alt="blog">
                                    </div>
                                    <div class="post-content pt-0">
                                        <h3>{{$conf->title}}</h3>
                                        <ul class="blog__meta d-flex flex-wrap align-items-center mb-4">
                                            <li class="blog__meta-author">
                                                <a href="#"><span></span>
                                                    15th October 2023
                                                </a>
                                            </li>
                                            <li class="blog__meta-date">
                                                <a href="#">
                                                        <!-- <i class="fa-solid fa-calendar-days"></i> Font Awesome fontawesome.com --></span>
                                                    6th December 2023
                                                </a>
                                            </li>
                                        </ul>
                                        <p>
                                            {!! $conf->description !!}
                                        </p>

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(!$user->hasApplied($conf->id))
                                            <a href="{{route('participant.conference.join',[$conf->id])}}" class="btn default-btn--secondary">
                                                Join us
                                            </a>
                                        @else
                                            <form action="{{route('participant.conference.upload')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label for="">Conference Submission</label>
                                                                <input type="file" class="form-control" name="conference">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label for="">Submission Type</label>

                                                                <select name="title" class="form-control">
                                                                    <option>Conference</option>
                                                                    <option>Publication</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label for="" class="text-danger">.doc or .pdf</label>
                                                                <button class="btn btn-outline-secondary">Submit</button>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    @foreach($user->submissions($conf->id) as $submission)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('participant.conference.download',[$submission->id])}}">Download</a>
                                                        </td>
                                                        <td>{{$submission->title}}</td>
                                                    </tr>

                                                    @endforeach
                                                </table>
                                            </form>
                                        @endif


                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-lg-4">
                        <aside class="ps-lg-4">
                            <div class="widget widget-category">
                                <div class="widget__header">
                                    <h5>Conferences</h5>
                                </div>
                                <ul class="lab-ul widget-wrapper list-bg-none">

                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
