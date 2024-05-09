<x-layout>
    <div class="login-section12">
        <div class="image">
            <img src="{{asset('assets/cardForm.jpg')}}" class="profile-img">
        </div>
        <div class="loginform">
            <form class="form-control" action="/dashboard/{{$user->id}}/action" method="POST">
                @csrf
                <p class="title">Create Project</p>
                {{-- Title --}}
                <div class="input-field">
                    <input name="title"  class="input form-control "  type="name" />
                    <label class="label" for="email">Enter the title</label>
                </div>
                {{-- Assigned To --}}
                <div class="input-field">
                    <input name="assigned"  class="input form-control "  type="name" />
                    <label class="label" for="email">Assigned To</label>
                </div>
                <button type="submit" class="submit-btn">Create</button>
            </form>
        </div>
    </div>
</x-layout>