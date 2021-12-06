$(document).ready(function(){
    $('aside ul li.title').click(function(){
        $(this).next().toggleClass('d-none');
    })

    
});
var searchform = document.getElementById('searchform');
searchform.onsubmit=function(e){
    e.preventDefault();
    var role = this.querySelector('select').value;
    var name = this.querySelector("input[name='name']").value;
    var national_code = this.querySelector("input[name='national_code']").value;
    var xhr = new XMLHttpRequest();
    xhr.onload=function(){
        console.log(this.responseText);
        document.getElementById('list-of-users').innerHTML=this.responseText;
    }
    xhr.open('GET','users?name='+name+'&national_code='+national_code+'&role='+role);
    xhr.send();
}

function show(id){
    var parts=document.querySelectorAll('.box > div.part');
    parts.forEach(element => {
        element.classList.add('d-none');
    });
    document.getElementById(id).classList.remove('d-none');
}

var forms = document.querySelectorAll('form');


