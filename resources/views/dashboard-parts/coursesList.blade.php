@foreach($courses as $course)
<div class="course-item p-3 d-flex flex-column justify-content-between bg-dark text-light my-2" id="{{$course->id}}" >
    <h3>{{$course->title}}</h3>
    <h4>{{'Instructor : '.$course->teacher->name}}</h4>
    <span>{{$course->filled.' of '.$course->capacity}}</span>
    <form action="/dashboard/course/{{$course->id}}" method="get" target="_blank">
        <input type="submit" value="Manage">
    </form>
</div>
@endforeach