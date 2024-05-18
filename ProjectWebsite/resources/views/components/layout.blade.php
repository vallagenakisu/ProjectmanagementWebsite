<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/project_style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/project.js')}}">
    <link rel="stylesheet" href="{{asset('assets/sub-task.css')}}">
    <link rel="stylesheet" href="{{asset('assets/user.css')}}">
    <link rel="stylesheet" href="{{asset('assets/friends.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>    
    {{$slot}}
</body>
<script>
const card = document.querySelectorAll(".sub-task-card");
const arrow_toggle = document.querySelectorAll(".arrow");
const progress = document.querySelectorAll(".finished");

for(let i = 0 ; i < arrow_toggle.length;i++)
{
    j = 0
    while (j < 16) 
    {
        j++;
        a = j + "em"
        progress[i].style.width = a;
    }
}
for(let i = 0 ; i < arrow_toggle.length;i++)
{
    arrow_toggle[i].onclick = function()
    {
        card[i].classList.toggle("active");
    };        
}
</script>
</html>