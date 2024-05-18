<x-layout>
    <div class="header">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                {{$error}}       
            @endforeach
        @endif
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
                <?php
                    $admin =  $sub_tasks->user;
                ?> 
                <h1 style="padding : 1em">{{$sub_tasks->title}}</h1>
                <div class="upper-section">
                    <a href="{{route('visit',[$user->id,$admin->id])}}">
                        <div class="profile-card">
                            <div class="card">
                                <img src={{asset('storage/'.$admin->file)}} alt="Image">
                                <div class="details">
                                    <h2>{{$admin->name}}</h2>
                                    <?php
                                    $string = $admin->skills;
                                    $skills = explode(",",$string);
                                    ?>
                                    @foreach ($skills as $element)
                                        <p>{{$element}}</p>    
                                    @endforeach
                                    
                                </div>
                                <p id="info">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </a>    
                    <div class="progress-bar">
                        <div class="box">
                            <div class="percent">
                              <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70"></circle>
                              </svg>
                              <div class="num">
                                @if($sub_tasks->no_child == 0)
                                <h2><span>100%</span></h2>
                                @else 
                                <h2>{{  (int)(($sub_tasks->completion/$sub_tasks->no_child)*100)}}<span>%</span></h2>
                                @endif
                              </div>
                            </div>
                            <h2 class="text">Progress</h2>
                          </div>
                    </div>
                </div>
                <div class="commit-section">
                    <form action="">
                        <input type="text" class="commit" name="commit">
                        <input type="file" name="file" id="file" class="file" >
                        <button>Commit</button>
                    </form>
                </div>
                <div class="lower-section">
                    <div class="sub-task-list">
                        <div class="list-container">
                            <h2>Sub-Tasks List:</h2>
                            <div class="add-task">
                                <form action="/dashboard/{{$user->id}}/cards/{{$card->id}}/{{$sub_tasks->id}}/action" method="POST">
                                    @csrf
                                    <div class="input">
                                        <label for="Title" >Enter The Title</label>
                                        <input type="text" name="title">
                                    </div>
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
                            @foreach ($sub_tasks->children as $item)
                            <div class="list">
                                <div class="title"><h2>{{$item->title}}</h2></div>
                                <div class="img"> <img src="{{asset('assets/me.jpg')}}" alt="image"> </div>
                                <form action="/dashboard/{{$user->id}}/cards/{{$card->id}}/{{$item->id}}/update" method="POST" >
                                    @csrf
                                    <div class="btn"><button class="complete">Done</button></div>
                                </form>
                                <form action="/dashboard/{{$user->id}}/cards/{{$card->id}}/{{$item->id}}/delete" method="POST" >
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
                    <div class="commit-history">
                        <h2>Commit History</h2>
                        <img src="{{asset('assets/history.png')}}" alt="">
                    </div>
                    <script>
                        var completion =  @json($sub_tasks->completion);
                        var child = @json($sub_tasks->no_child);
                        completion = parseInt(completion);
                        child = parseInt(child);
                        if(child == 0)
                        {
                            completion =100;
                            var circle = document.querySelector('.box .percent svg circle:nth-child(2)');
                            var value = 440 - (440 * completion) / 100;
                            console.log(completion);
                            circle.style.strokeDashoffset = value;
                        }
                        else 
                        {
                            completion =(completion/child)*100;
                            var circle = document.querySelector('.box .percent svg circle:nth-child(2)');
                            var value = 440 - (440 * completion) / 100;
                            console.log(completion);
                            circle.style.strokeDashoffset = value;
                        }
       
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-layout>