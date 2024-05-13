@props(['elements'])
<div class="sub-task-card">
    <div class="items-holder">
        <div class="section-one">
            <h2>{{$elements->title}}</h2>
            <img src="{{asset('assets/c2.png')}}">
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
        {{-- <div class="section-two">
            <form method="POST" action="/dashboard/{{$user->id}}/cards/{{$card->id}}/{{$item->id}}/action" >
                @csrf
                <input class="add_subtask" type="text" placeholder="Add Subtask" name="title">
                <input class="assigned_to" type="text" placeholder="Assigned To" name="assigned">
                <button class="add-btn" type="submit">Add</button>
            </form>
        </div> --}}
    </div>
    <div class="arrow">
        <img src="{{asset('assets/down-arrow.png')}}">
    </div>
    <ul style="list-style:none ; padding-left: 7em " >
        <li>
            @foreach ($elements->children as $child)
                <x-sub-task-li :elements="$child"/>    
            @endforeach
        </li>
    </ul> 
</div>    
   