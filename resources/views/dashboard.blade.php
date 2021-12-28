<!DOCTYPE html>
<html lang="en">
<x-header title="Manager Dashboard" css='dashboard/managerDashboard' />
<body>
   
    @include('dashboard-parts.aside')

    <div class="box">
        <div class="part d-none" id="users-list">


            <div class="searchbox">
                <form action="manager/users" method="GET" id="searchform">
                    <input type="text" name="name" placeholder="name">
                    <input type="number" name="national_code" placeholder="national_code">
                    <label>Role
                        <select name="role" >
                            <option  disabled selected value> -- select an option -- </option>
                            <option value="manager">Manager</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                    </label>
                    <input type="submit" value="search">
                </form>
            </div>
            <div class="container" id="list-of-users">
            @include('dashboard-parts.usersList')
            </div>
        </div>

      @include('dashboard-parts.userConfirm')

        <div class="part d-none" id="courses">
            <form action="{{route('manager.courses.store')}}" method="post" >
                <h2>Create a Course</h2>
                @csrf 
                <input type="text" name="title" placeholder="title">
                <input type="number" name="capacity" placeholder="capacity">
                <select name="teacher_id" >
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="create">
            </form>
            <div  id="list-of-courses">
            @include('dashboard-parts.coursesList')
            </div>
        </div>

    </div>


    <script src="{{asset('js/dashboard.js')}}"></script>
</body>
</html>