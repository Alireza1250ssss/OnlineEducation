<x-header title="Student Dashboard" css='dashboard/managerDashboard' />
<body>
    

<div class="container d-flex flex-column align-items-center p-3">
    <h3>The Exam Finished ! <br>
    Click Here To Get Your Dashboard</h3>

    <a href="{{route('student.dashboard')}}" class="d-block rounded-pill bg-info text-light fs-4 px-2">Dashboard</a>
</div>

</body>

<style>
    .container {
        background-color: paleturquoise !important;
    }
    body {
        background-color: burlywood;
    }
</style>