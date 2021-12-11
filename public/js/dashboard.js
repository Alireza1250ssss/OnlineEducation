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
        document.getElementById('list-of-users').innerHTML=this.responseText;
        updatePag();
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


function updatePag(){
    var pagLinks = document.querySelectorAll('a.page-link');
        pagLinks.forEach(element => {
            element.addEventListener('click',function(event){
                event.preventDefault();
                var xhr =new XMLHttpRequest();
                xhr.onload=function(){
                    document.getElementById('list-of-users').innerHTML=this.responseText;
                    updatePag();
                }
                var role=document.querySelector('#searchform select').value;
                xhr.open("GET",this.getAttribute('href')+'&role='+role);
                xhr.send();
            });
        });    
}


