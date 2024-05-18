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
                        <img src="{{asset('assets/group.png')}}" alt="">
                        <p>Friends</p>
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
                <div class="title">
                    <h1>Friends</h1>
                </div>
                <div class="myfriend">
                    <a href="{{route('myfriends',$user)}}" class="my-friends">MyFriends</a>
                 </div>
                 <div class="search">
                    <form action="" method="GET"> 
                        <input type="search" name="search" placeholder="Search">
                        <button class="submit-btn" > Search  </button>
                    </form>
                 </div>
                <div class="friendlist">
                    @foreach ($users as $item)
                    @if(  !($user->friends()->where('friend_id',$item->id)->exists()))
                    <div class="findfriend">
                        <div class="image">
                            <img class="actual" src="{{asset('storage/' . $item->file)}}">
                        </div>
                        <div class="information">
                            <div>
                                <h3 class="name">{{$item->name}}</h3>
                            </div>
                            <div class="buttons">
                                <form action="{{route('friends.add',[$user->id,$item->id])}}" method="POST">
                                    @csrf
                                    <button class="add">Add friend</button>
                                </form>
                            </div>
                        </div>
                    </div>   
                    @endif                     
                    @endforeach

                </div>
            </div>
            
</x-layout>