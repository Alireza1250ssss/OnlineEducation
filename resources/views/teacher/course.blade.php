<x-header title="{{$course->title}}" css="teacher/course" />

<body>
    
<div class="addcourse d-flex flex-column align-items-stretch justify-content-center">
    <h3>Add a New Exam :</h3>
    <form action="{{route('teacher.exams.store')}}" method="post" class="container d-flex flex-column align-items-stretch">
        @csrf 
        <div class="row">
        <label class="flex-fill">
            <span>Title</span><br>
        <input type="text" name="title" >
        @error('title') <span class="text-danger">{{$message}}</span> @enderror
        </label>
        <label class="flex-fill">
            <span>Duration (in minute)</span><br>
        <input type="number" name="duration" >
        @error('duration') <span class="text-danger">{{$message}}</span> @enderror
        </label>
        </div>
        <label class="flex-grow-1 clearfix">
            <span>Details</span><br>
        <textarea name="details" cols="20" rows="5"></textarea>
        </label>
        <br>
        <input type="hidden" name="course_id" value="{{$course->id}}"><br>
        <input type="submit" value="Create" class="w-100 rounded-pill">
    </form>
</div>

<div class="exams d-flex flex-wrap justify-content-around align-items-center p-3">
    @if(isset($exams))
        @foreach($exams as $exam)
        <div class="exam  p-2 mx-1">
            <h4>{{$exam->title}}</h4>
            <p>{{'Details : '.$exam->details}}</p>
            <a href="" class="rounded-pill w-25 d-inline-block bg-primary">Edit</a>
            <form action="{{route('teacher.exams.destroy',$exam->id)}}" method="post" class="d-inline-block w-25">@csrf @method('delete')
            <button type="submit"  class="rounded-pill w-100 text-light d-inline-block bg-danger">Delete</button></form>
        </div>
        @endforeach
    @else
    <h4>There is No Exams Set</h4>
    @endif
</div>

</body>