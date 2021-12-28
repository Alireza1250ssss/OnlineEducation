<x-header title="Student Dashboard" css='dashboard/managerDashboard' />

<body>

    @include('student.dashboard-parts.aside')

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

        <div class="part d-none justify-content-around align-items-center flex-wrap w-100" id="notifications">
            <x-notifications :notifs="auth()->user()->unreadNotifications" type='unread' />
            <x-notifications :notifs="auth()->user()->readNotifications" type='read' />
            
        </div>
    </div>

    <script src="{{asset('js/teacher/teacherDash.js')}}"></script>
</body>