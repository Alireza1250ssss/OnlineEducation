<x-header title="Student Dashboard" css='dashboard/managerDashboard' />

<body>

    @include('student.dashboard-parts.aside')

    <div class="box justify-content-start">
        @foreach(auth()->user()->courses as $course)
        <div class="part d-none d-flex flex-column w-100" id="course-{{$course->id}}-part">
            <h3 class="mb-3">Exams :</h3>
            <div class="row  my-3 align-content-start flex-grow-1 flex-wrap">
                @foreach($course->exams as $exam)
                @if(!in_array($exam->id,$userExams->pluck('exam_id')->toArray()))
               <div class="col-3 m-2 rounded bg-warning d-flex flex-column align-items-center exam-item">
                    <p class="fw-bold">{{$exam->title}}</p>
                    <small>{{$exam->details}}</small>
                    <a class="bg-light text-dark take-exam-btn rounded-pill px-2 my-1" 
                    href="{{route('student.start-exam',[$exam->id])}}" target="_blank" >Take</a>
               </div> 
               @endif
               @endforeach
            </div>
          
        </div>
        @endforeach

        <div class="part d-none justify-content-around align-items-center flex-wrap w-100" id="notifications">
            <x-notifications :notifs="auth()->user()->unreadNotifications" type='unread' />
            <x-notifications :notifs="auth()->user()->readNotifications" type='read' />
            
        </div>
    </div>

    <script src="{{asset('js/teacher/teacherDash.js')}}"></script>
</body>