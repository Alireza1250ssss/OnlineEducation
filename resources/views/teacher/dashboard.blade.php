<x-header title="Teacher Dashboard" css='dashboard/managerDashboard' />
<body>
  
<aside>
<div class="titles">
            <h3>Dashboard</h3>
            <a href="/logout" >Log Out <i class='fas fa-reply'></i></a>
        </div>
        <ul>
            <li class="title">Courses</li>
            <li class="d-none">
                <ul>
                    <li onclick="show('courses-list')">manage courses</li>
                </ul>
            </li>
        
        </ul>
</aside>

<div class="box">
    <div class="part d-none" id="courses-list">
        <div class="cnt">
        @foreach($courses as $course)
        <div class="coursebox bg-dark text-light">
            <h3>{{$course->title}}</h3>
            <a href="{{'dashboard/course/'.$course->id}}" target="_blank">Enter</a>
        </div>
        @endforeach
        </div>
    </div>
</div>

<script src="{{asset('js/teacher/teacherDash.js')}}"></script>
</body>