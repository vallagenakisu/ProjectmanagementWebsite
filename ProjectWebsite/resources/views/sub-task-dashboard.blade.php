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
                    <a href="{{route('friends',$user->id)}}">
                        <li class="sidebar-list">
                                <img src="{{asset('assets/group.png')}}" alt="">
                                <p>Friends</p>
                            </li>
                        </a>
                        <a href="{{route('notification',$user)}}">
                    
                            <li class="sidebar-list">
                                <img src="{{asset('assets/bell.png')}}" alt="">
                                <p>Notifications</p>
                            </li>
                        </a>
                </ul>
                <ul class="sidebar-items">
                    <li>
                        <a  href={{route('logout')}}><img src="{{asset('assets/logout.png')}}"></a>
                    </li>
                </ul>
            </div>
            <div class="not-sidebar">
                <div class="title">         
                    <h1>{{$card->title}}</h1>
                </div>
                <div class="add-task">
                    <form action="/dashboard/{{$user->id}}/cards/{{$card->id}}/action" method="POST">
                        @csrf
                        <div class="input">
                            <label for="Title" >Enter The Title</label>
                            <input type="text" name="title">
                        </div>
                        {{-- <div class="input">
                            <label for="Assigned" >Assigned To</label>
                            <input type="email" name="assigned">
                        </div> --}}
                        <div class="dropdown" style="margin-top:1em">
                            <label for="">Select a friend</label>
                            <select name="assigned" id="assigned" class="assigned" >
                                @foreach ($user->friends as $friend)
                                <option value="{{$friend->email}}"> {{$friend->name}}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                </div>
                <h2>Tree Section:</h2>
                <ul class="tree">
                        @foreach ($sub_tasks as $item)
                        @if ($item->card_id == $card->id)
                        <li>
                            <a href="/dashboard/{{$user->id}}/cards/{{$card->id}}/sub-task/{{$item->id}}">
                                <div class="sticky">
                                    <div class="section-one">
                                        <h2>{{$item->title}}</h2>
                                        <?php
                                            $admin = $item->user;
                                        ?>
                                        <img src="{{asset('storage/' . $admin->file)}}">
                                        {{-- <form action="/dashboard/{{$user->id}}/cards/{{$card->id}}/{{$item->id}}/update" method="POST" >
                                            @csrf
                                            <div class="btn"><button class="complete">Done</button></div>
                                        </form> --}}
                                        <form action="/dashboard/{{$user->id}}/cards/{{$card->id}}/{{$item->id}}/delete" method="POST" >
                                            @csrf
                                            <div class="btn"><button class="Delete">Delete</button></div>
                                        </form>

                                        @if($item->status == 1)
                                        <div class="done"> <img src="{{asset('assets/correct.png')}}" alt="image">  </div>
                                        @else
                                        <div class="done" style="display:none"> <img src="{{asset('assets/correct.png')}}" alt="image">  </div>
                                        @endif
                                    </div>

                                </div>
                            </a>
                            @foreach ($item->children as $elements)
                            <x-sub-task-li :elements="$elements"/>
                            @endforeach
                        </li>                   
                        @endif
                        @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>