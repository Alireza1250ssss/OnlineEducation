
<x-header title="{{$course->title}}" css="coursePage" />
<div class="cnt">
<h2>{{$course->title}}</h2>
<h4>Course Students : </h4>
{{$courseUsers->links()}}
<ul>
    <form action="http://127.0.0.1:8000/manager/course-user/{{$course->id}}" method="post" class="d-flex justify-content-around flex-wrap" id="{{$course->id}}">
        @csrf
        <input type="hidden" name="action" value="remove">
        @foreach($courseUsers as $user)
        <li class="box">
            <p>{{'name: '.$user->name}}</p>
            <p>{{'national_code: '.$user->national_code}}</p>
            <input type="checkbox" name="students[]" value="{{$user->id}}">
        </li>
        @endforeach
    </form>
        <input type="submit" value="delete" class="bg-danger text-light w-25 mx-auto mt-4 p-1 rounded-pill" form="{{$course->id}}">
    
</ul>
</div>
<div class="cnt">
<h3 class="my-4">Add New Students</h3>
{{$students->links()}}
<form action="http://127.0.0.1:8000/manager/course-user/{{$course->id}}" method="post">
    @csrf
    <input type="hidden" name="action" value="add">
    @foreach($students as $student)
    @if(!in_array($student->id,$courseUsers->modelKeys()))
    <div class="box d-inline-block mx-3 my-1">

        <p>{{'name: '.$student->name}}</p>
        <p>{{'national_code: '.$student->national_code}}</p>
        <input type="checkbox" name="students[]" value="{{$student->id}}">

    </div>
    @endif
    @endforeach
    <input type="submit" value="add" class="bg-primary text-light w-25 my-4 mx-auto p-2 clearfix d-block">
</form>
</div>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Exo 2',sans-serif;
    list-style: none;
 
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-flow: column;
    min-height: 100vh;
    background: #fff;
}
.cnt{
    width: 100%;
    height: 50%;
    border-radius: 15px;
    box-shadow: 0 0 15px #333;
    padding: .5rem .3rem;
}
.cnt ul{
    display: flex;
    flex-direction: column;
    text-align: center;
}
.box{
    border: 1px solid black;
    padding: .25rem;
}
form input[type='submit']{
    clear: both;
}
</style>