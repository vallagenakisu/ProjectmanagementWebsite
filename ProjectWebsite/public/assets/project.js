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