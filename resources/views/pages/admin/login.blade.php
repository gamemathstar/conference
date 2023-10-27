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
                        <h3 class="title">Admin Login</h3>
                        <form class="account__form" action="{{route('admin.login')}}" method="post">
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
                                <button class="d-block default-btn move-top"><span>Signin Now</span></button>
                            </div>
                        </form>
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
