<x-header title="Exam Hint !" css='dashboard/managerDashboard' />
<div class="container bg-light text-center py-3">
<h3>your exam is starting... </h3>
<h4 class="fw-bold">you won't be able to take it again !</h4>
<form action="{{route('student.send-exam-form',[$exam->id])}}" method="post">
    @csrf 
    <input type="submit" value="Enter" class="px-3 py-1 m-3 w-25 rounded-pill">
</form>
</div>

<style>
    input[type=submit]{
        border: none;
        outline: none;
        background-color: #009F94;
        color: #fff;
    }
    input[type=submit]:hover{
        background-color: #333;
    }
    .container{
        border: 3px solid red;
        border-radius: 10px;
    }
    body{
        background-color: #ff6666;
    }
</style>