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
                                        <ul>
                                            <li><strong>ACCOUNT NAME:</strong> ABU BUSINESS SCHOOL NIGERIAN JOURNAL OF ACCOUNTING RESEARCH CONFERENCE</li>
                                            <li><strong>ACCOUNT No.:</strong>0015641852</li>
                                            <li><strong>BANK:</strong>  JAIZ BANK PLC.</li>
                                        </ul>



                                            <form action="{{route('participant.journal.upload')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <table class="table">
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group">
                                                                <label for="">Paper Title</label>
                                                                <input type="text" class="form-control" name="title">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label for="">Payment Evidence</label>
                                                                <input type="file" class="form-control" name="payment_img">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label for="">Journal Paper</label>
                                                                <input type="file" class="form-control" name="conference">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                           <center>
                                                               <div class="form-group">
                                                                   <label for="" class="text-danger">(.doc or .pdf) Max size 2MB </label>
                                                                   <br>
                                                                   <button class="btn btn-outline-secondary">Submit</button>
                                                               </div>
                                                           </center>

                                                        </td>
                                                    </tr>


                                                </table>

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>SN</th>
                                                        <th>Download</th>
                                                        <th>Document For</th>
                                                        <th>Review Status</th>
                                                        <th>Payment Status</th>
                                                        <th>Remark</th>
                                                    </tr>
                                                    @foreach($user->submissionsJournal() as $submission)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>
                                                                <a href="{{route('participant.conference.download',[$submission->id])}}">Download</a>
                                                            </td>
                                                            <td>{{$submission->title}}</td>
                                                            <td>{{$submission->status}}</td>
                                                            <td>{{$submission->payent_status}}</td>
                                                            <td>{{$submission->remark}}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </form>




                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="col-lg-4">
                        @include("commons.menu_part")
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
