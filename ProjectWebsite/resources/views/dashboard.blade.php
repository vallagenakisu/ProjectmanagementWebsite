<x-layout>
    <div class="header">
        <div class="main-section">
            <div class="sidebar">
                <div class="profile-section">
                    <img src="{{asset('storage/' . $user->file)}}" class="profile-img">
                    <p class="profile-name">{{$user->name}}</p>
                </div>
                <ul class="sidebar-items">
                    <li class="sidebar-list">
                        <img src="{{asset('assets/menu.png')}}" alt="">
                        <p>Dashboard</p>
                    </li>
                    <li class="sidebar-list">
                        <img src="{{asset('assets/planning.png')}}" alt="">
                        <p>Commits</p>
                    </li>
                    <li class="sidebar-list">
                        <img src="{{asset('assets/bell.png')}}" alt="">
                        <p>Notifications</p>
                    </li>
                    {{-- <li class="sidebar-list">
                        <img src="{{asset('assets/create.png')}}" alt="">
                    </li> --}}
                </ul>
                <ul class="sidebar-items">
                    <li>
                        <a  href={{route('logout')}}><img src="{{asset('assets/logout.png')}}"></a>
                    </li>
                </ul>
            </div>
            <div class="not-sidebar">
                <div class="title">
                    <h1>Projects</h1>
                </div>

            <div class="project-cards-container">
                @foreach ($cards as $item)
                @if($item->user_id == $user->id)
                <a href="/dashboard/{{$user->id}}/cards/{{$item->id}}">
                    <div class="project-cards">
                        <div class="card-title">
                            <h2>{{$item->title}}</h2>
                        </div>
                        <div class="card-details">
                            <p>Role : </p>
                            <p> {{$item->adminName}}</p>
                            <br>
                            <p>Created :</p>
                            <p>{{$item->timestamps}}</p>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
                <a href="/users/{{$user->id}}/create-card">
                    <div class="project-cards">
                        <div class="create">
                            <img src="{{asset('assets/plus.png')}}" alt="">
                        </div>  
                    </div>
                </a>

            </div>
            </div>
        </div>
    </div>
</x-layout>