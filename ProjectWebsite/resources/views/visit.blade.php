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
                        <img src="{{asset('storage/' . $friends->file)}}" class="profile-img">
                        <p class="profile-name">{{$friends->name}}</p>
                    </div>
                    <div class="information-section">
                        <h2>Profile Information</h2>
                        <img src="{{asset('assets/edit.png')}}" alt="">
                        <div class="information">
                            <p class="information-title">Name:</p>
                            <p class="information-details">{{$friends->name}}</p>
                        </div>
                        <div class="information">
                            <p class="information-title">Email:</p>
                            <p class="information-details">{{$friends->email}}</p>
                        </div>
                        <div class="information">
                            <p class="information-title">Phone Number:</p>
                            <p class="information-details">0178860924526</p>
                        </div>
                        <?php 
                            $string = $friends->skills;
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
                    <h2>Tasks</h2>
                    <div class="project-list-container">
                        <?php
                            $collection = $friends->subtasks;
                        ?>
                        @foreach ($collection as $item)
                        <?php
                            $card = $item->card;
                        ?>
                        <div class="list">
                            <div class="title"><h2>{{$item->title}}</h2></div>
                            <div class="img"> <img src="{{asset('storage/'.$friends->file)}}" alt="image"> </div>
                            <form action="/dashboard/{{$friends->id}}/cards/{{$card->id}}/{{$item->id}}/update" method="POST" >
                                @csrf
                                <div class="btn"><button class="complete">Done</button></div>
                            </form>
                            <form action="/dashboard/{{$friends->id}}/cards/{{$card->id}}/{{$item->id}}/delete" method="POST" >
                                @csrf
                                <div class="btn"><button class="Delete">Delete</button></div>
                            </form>
                            @if($item->status == 1)
                            <div class="done"> <img src="{{asset('assets/correct.png')}}" alt="image"> </div>
                            @else
                            <div class="done" style="display: none"> <img src="{{asset('assets/correct.png')}}" alt="image"> </div>
                            @endif
                        </div>    
                        @endforeach
                </div>
            </div>
</x-layout>