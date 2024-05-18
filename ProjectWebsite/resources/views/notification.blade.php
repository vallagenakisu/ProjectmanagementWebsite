<x-layout>

    <?php
        $collection = $user->notifications;
        $flag = 0 ;
        foreach($collection as $item)
        {
            if($item->read_at == null)
            {
                $flag = 1;
                break;
            }
        }
    ?>
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
                    @if($flag == 1)
                    <?php
                        $flag = 0;
                    ?>
                    <a href="{{route('notification', $user->id) }}">
                    <li class="sidebar-list">
                        <img src="{{asset('assets/bellOn.png')}}" alt="">
                        <p>Notifications</p>
                    </li>
                    </a>
                    @else 
                    <a href="{{route('notification', $user->id) }}">
                        <li class="sidebar-list">
                            <img src="{{asset('assets/bell.png')}}" alt="">
                            <p>Notifications</p>
                        </li>
                    </a>
                    @endif 

                </ul>
                <ul class="sidebar-items">
                    <li>
                        <a  href={{route('logout')}}><img src="{{asset('assets/logout.png')}}"></a>
                    </li>
                </ul>
            </div>
            <div class="not-sidebar">
                <div class="title">
                    <h1>Notifications</h1>
                </div>
                <div class="notification-container">
                    @foreach ($collection as $item)
                    <div class="notification">
                        <?php 
                            $item->markAsRead();
                        ?>
                        <p> {{$item->data['data']}} </p>
                    </div>                        
                    @endforeach
            </div>
        </div>
    </div>
</x-layout>