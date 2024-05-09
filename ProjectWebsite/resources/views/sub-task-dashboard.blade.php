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
                        <img src="assets/menu.png" alt="">
                        <p>Dashboard</p>
                    </li>
                    <li class="sidebar-list">
                        <img src="assets/planning.png" alt="">
                        <p>Commits</p>
                    </li>
                    <li class="sidebar-list">
                        <img src="assets/bell.png" alt="">
                        <p>Notifications</p>
                    </li>
                    <li class="sidebar-list">
                        <img src="assets/bell.png" alt="">
                        <a href="/users/{{$user->id}}/create-card"><p>Create Project</p></a>
                    </li>
                </ul>
                <ul class="sidebar-items">
                    <li>
                        <a href={{route('logout')}}><img src="{{asset('assets/logout.png')}}"></a>
                    </li>
                </ul>
            </div>
            <div class="not-sidebar">
                <div class="title">         
                    <h1>{{$card->title}}</h1>
                </div>
                <div class="form-sub-tasks">
                    <div class="loginform">
                        <form class="form-control" action="/dashboard/{{$user->id}}/cards/{{$card->id}}/action" method="POST">
                            @csrf
                            <p class="title">Add Task</p>
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
                <div class="sub-task-card">
                    <div class="section-one">
                        <h2>Invitation</h2>
                        <img src="assets/me.jpg">
                    </div>
                    <div class="progress-bar">
                        <div class="unfinished">
                            <div class="finished">
                            </div>
                        </div>
                        <label class="container">
                            <input checked="checked" type="checkbox">
                            <div class="checkmark"></div>
                        </label>
                    </div>
                    <div class="section-two">
                        <form method="get">
                            <input class="commit-input" type="text" placeholder="Commit Message">
                            <input class="commit-btn" type="button" value="Commit">
                        </form>
                    </div>
                    <div class="arrow">
                        <img src="assets/down-arrow.png">
                    </div>
                    <ul class="task-list">
                        <li>
                                <div class="task">
                                    <p>Omar Hall</p>
                                    <label class="container">
                                        <input checked="checked" type="checkbox">
                                        <div class="checkmark"></div>
                                    </label>
                                </div>
                        </li>
                        <li>
                                <div class="task">
                                    <p>Omar Hall</p>
                                    <label class="container">
                                        <input checked="checked" type="checkbox">
                                        <div class="checkmark"></div>
                                    </label>
                                </div>
                        </li>
                        <li>
                                <div class="task">
                                    <p>Omar Hall</p>
                                    <label class="container">
                                        <input checked="checked" type="checkbox">
                                        <div class="checkmark"></div>
                                    </label>
                                </div>
                        </li>
                        <li>
                                <div class="task">
                                    <p>Omar Hall</p>
                                    <label class="container">
                                        <input checked="checked" type="checkbox">
                                        <div class="checkmark"></div>
                                    </label>
                                </div>
                        </li>
                        <li>
                                <div class="task">
                                    <p>Omar Hall</p>
                                    <label class="container">
                                        <input checked="checked" type="checkbox">
                                        <div class="checkmark"></div>
                                    </label>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>