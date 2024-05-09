<div class="header">
    <div class="main-section">
        <div class="sidebar">
            <div class="profile-section">
                <img src="assets/me.jpg" class="profile-img">
                <p class="profile-name">Turzo</p>
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
                    <a href="/users/{{$user->id}}/create-card"><p>Create form</p></a>
                </li>
            </ul>
            <ul class="sidebar-items">
                <li>
                    <a href={{route('logout')}}><img src="assets/logout.png"></a>
                </li>
            </ul>
        </div>
        <div class="not-sidebar">
            {{$slot}}
        </div>
    </div>
</div>
