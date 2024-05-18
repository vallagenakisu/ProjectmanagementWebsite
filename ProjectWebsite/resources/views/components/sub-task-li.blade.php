@props(['elements'])   
   <ul>
        <li>
            @php
                $user = $elements->card->user;
                $find = $elements->user;
            @endphp
            <a href="/dashboard/{{$user->id}}/cards/{{$elements->card_id}}/sub-task/{{$elements->id}}">
                <div class="sticky">
                    <div class="section-one">
                        <h2>{{$elements->title}}</h2>
                        <img src="{{asset('storage/'.$find->file)}}">
                        <form action="/dashboard/{{$user->id}}/cards/{{$elements->card_id}}/{{$elements->id}}/update" method="POST" >
                            @csrf
                            <div class="btn"><button class="complete">Done</button></div>
                        </form>
                        <form action="/dashboard/{{$user->id}}/cards/{{$elements->card_id}}/{{$elements->id}}/delete" method="POST" >
                            @csrf
                            <div class="btn"><button class="Delete">Delete</button></div>
                        </form>

                        @if($elements->status == 1)
                        <div class="done"> <img src="{{asset('assets/correct.png')}}" alt="image">  </div>
                        @else
                        <div class="done" style="display:none"> <img src="{{asset('assets/correct.png')}}" alt="image">  </div>
                        @endif
                    </div>
                </div>
            </a>

            @foreach ($elements->children as $child)
            <x-sub-task-li :elements="$child"/>    
            @endforeach
        </li>
   </ul>
   