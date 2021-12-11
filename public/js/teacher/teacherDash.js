$(document).ready(function(){
    $('aside ul li.title').click(function(){
        $(this).next().toggleClass('d-none');
    })
});

function show(id){
    var parts=document.querySelectorAll('.box > div.part');
    parts.forEach(element => {
        element.classList.add('d-none');
    });
    document.getElementById(id).classList.remove('d-none');
}