<x-layout>
    <div class="header">
        <div class="main-section">
            <div class="sidebar">
                <a href="{{route('user',$user)}}">
                    <div class="profile-section">
                        <img src="{{asset('storage/' . $user->file)}}" class="profile-img">
                        <p class="profile-name">{{$user->name}}</p>
                    </div>
                </a>
                <ul class="sidebar-items">
                    <a href="{{route('getcards',$user->id)}}">
                    <li class="sidebar-list">
                        <img src="{{asset('assets/menu.png')}}" alt="">
                        <p>Dashboard</p>
                    </li>
                    </a>
                    <li class="sidebar-list">
                        <img src="{{asset('assets/planning.png')}}" alt="">
                        <p>Commits</p>
                    </li>
                    <li class="sidebar-list">
                        <img src="{{asset('assets/bell.png')}}" alt="">
                        <p>Notifications</p>
                    </li>
                </ul>
                <ul class="sidebar-items">
                    <li>
                        <a  href={{route('logout')}}><img src="{{asset('assets/logout.png')}}"></a>
                    </li>
                </ul>
            </div>
            <div class="not-sidebar">
                <div class="user-profile">
                    <div class="profile">
                        <img src="{{asset('storage/' . $user->file)}}" class="profile-img">
                        <p class="profile-name">{{$user->name}}</p>
                    </div>
                    <div class="information-section">
                        <h2>Profile Information</h2>
                        <img src="{{asset('assets/edit.png')}}" alt="">
                        <div class="information">
                            <p class="information-title">Name:</p>
                            <p class="information-details">{{$user->name}}</p>
                        </div>
                        <div class="information">
                            <p class="information-title">Email:</p>
                            <p class="information-details">{{$user->email}}</p>
                        </div>
                        <div class="information">
                            <p class="information-title">Phone Number:</p>
                            <p class="information-details">0178860924526</p>
                        </div>
                        <?php 
                            $string = $user->skills;
                            $skills = explode(",",$string);
                        ?>
                        <div class="information">
                            <p class="information-title">Skills:</p>
                        @foreach ($skills as $item)
                            <p class="information-details">{{$item}}</p>
                        @endforeach
                        </div>

                    </div>
                </div>
                <div class="user-projects">
                    <h2>Projects</h2>

                </div>


            </div>
</x-layout>