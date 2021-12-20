var editexambtns= document.querySelectorAll('.editexam');
console.log(editexambtns);
editexambtns.forEach(element => {
    element.addEventListener('click', function(event){
        event.preventDefault();
        getExam(this);
    })
});


function getExam(element){
    var xhr =new XMLHttpRequest();
    xhr.onload=function(){
        var box =document.querySelector('.manage-exam');
        box.innerHTML=this.responseText;
        box.scrollIntoView();
        loadforExam();
    }
    xhr.open("GET",element.getAttribute('href'));
    xhr.send();
}



function loadforExam(){
    var selectbox = document.getElementById('question-type');
    var forms = document.querySelectorAll('.add-question form');
    selectbox.onchange=function(){
        forms.forEach(element => {
            element.classList.add('d-none');
        });
        document.getElementById(this.value).classList.remove('d-none');
    }
    var testLabel =document.getElementById('tests');
    var addoptionbtn = document.getElementById('add-option-btn');
    addoptionbtn.addEventListener('click',function(e){
        e.preventDefault();
        var newOption = document.createElement('input');
        newOption.setAttribute('type','text');
        newOption.setAttribute('name',"content[options][]");
        newOption.setAttribute('class','form-control my-1');
        testLabel.appendChild(newOption);
    })
}