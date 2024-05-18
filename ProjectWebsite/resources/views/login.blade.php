<x-layout>
    <div class="main-section">
        <div class="carosol-section">
            <img id="slide-1" src="assets/c1.png" alt="">
            <img id="slide-2" src="assets/c2.jpg" alt="">
            <img id="slide-3" src="assets/c3.jpg" alt="">
            <img id="slide-4" src="assets/c4.jpg" alt="">
            <img id="slide-5" src="assets/c5.jpg" alt="">
        </div>
        <div class="login-section">
            <div class="loginform">
                @if(session('error'))
                    {{session('error')}}
                @endif
                <form class="form-control" action="{{route('login.post')}}" method="POST">
                    @csrf
                    <p class="title">Login</p>
                    <div class="input-field">
                        <input name="email"  class="input form-control "  type="email" />
                        <label class="label" for="email">Enter Email</label>
                    </div>
                    <div class="input-field">
                        <input name = "password" class="input form-control " type="password" />
                        <label class="label" for="password">Enter Password</label>
                    </div>
                    <button class="submit-btn">Log In</button>
                    <a href="{{url('/')}}/registration">Click Here to Register</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>





