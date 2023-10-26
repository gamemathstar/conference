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
                        <h3 class="title">Sign In</h3>
                        <form class="account__form" action="{{route('participant.login')}}" method="post">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between flex-wrap pt-sm-2">
                                    <div class="checkgroup">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                    <a href="forgot-pass.html">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="d-block default-btn move-top"><span>Signin Now</span></button>
                            </div>
                        </form>
                        <div class="account-bottom">
                            <p class="d-block cate pt-10">Don’t Have any Account? <a href="{{route('participant.signup')}}"> Sign
                                    Up</a></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="account-img">
                        <img src="/assets/images/account/sign-in.png" alt="shape-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
