@props(['item'])
<div class="project-cards">
    <div class="card-title">
        <h2>{{$item->title}}</h2>
    </div>
    <div class="card-details">
        <p>Role : </p>
        <p> {{$item->adminName}}</p>
        <br>
        <p>Created :</p>
        <p>{{$item->timestamps}}</p>
    </div>
</div>