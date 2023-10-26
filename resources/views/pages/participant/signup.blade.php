@extends("layouts.master")

@section("content")


    @php
        $conf = \App\Models\Conference::conference();
    @endphp
    <div class="account padding-top padding-bottom">
        <div class=" container">
            <div class="row g-5 align-items-center flex-md-row-reverse">
                <div class="col-lg-5">
                    <div class="account__wrapper">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3 class="title">Sign Up</h3>
                        <form class="account__for" method="post" action="{{ route('participant.signup') }}">
                            @csrf
                            <div class="form-floating mb-4">
                                <select name="role" class="form-control">
                                    <option value="">Choose</option>
                                    <option value="student_nigerian">As Nigerian Student</option>
                                    <option value="student_international">As Foreign Student</option>
                                    <option value="academics_nigerian">As Nigerian Academics</option>
                                    <option value="academics_international">As Foreign Academics</option>
                                    <option value="organization_nigerian">As Nigerian Organization</option>
                                    <option value="organization_international">As Foreign Organization</option>
                                </select>
                                <label for="floatingInput-user">Participation</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInput-user" placeholder="Full Name" name="name">
                                <label for="floatingInput-user">Full Name/Organization Name</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword2" placeholder="Confirm Password" name="password_confirmation">
                                <label for="floatingPassword2">Confirm Password</label>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <div class="checkgroup">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Accept Terms &amp; Policy</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="d-block default-btn move-top"><span>Signup Now</span></button>
                            </div>
                        </form>
                        <div class="account-bottom">
                            <p class="d-block cate pt-10"> Have an Account? <a href="{{route('participant.login')}}"> Sign
                                    in</a></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="account-img">
                        <img src="assets/images/account/sign-in.png" alt="shape-image">
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection
