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
        @if(session('error'))
            {{session('error')}}
        @endif
        <div class="loginform">
            <form class="form-control" action="{{route('registration.post')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <p class="title">Register</p>
                <div class="input-field">
                    <input name="name"  class="input form-control "  type="name" />
                    <label class="label" for="email">Enter Name</label>
                </div>
                <div class="input-field">
                    <input name="email"  class="input form-control "  type="email" />
                    <label class="label" for="email">Enter Email</label>
                </div>
                <div class="input-field">
                    <input name = "password" class="input form-control " type="password" />
                    <label class="label" for="password">Enter Password</label>
                </div>
                <div class="input-field">
                    <input name = "skills" class="input form-control " type="text"/>
                    <label class="label" for="skills">Enter Your Skills "Comma Separated"</label>
                </div>
                <div class="input-field">
                    <label  for="file">Attatch Your Profile Picture</label>
                    <input name = "file" class="input form-control " type="file" />

                </div>
                <button class="submit-btn">Register</button>
            </form>

        </div>
    </div>
</div>

</x-layout>