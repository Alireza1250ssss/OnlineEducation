
<table class="table .table-bordered w-75 text-center">
    <thead class="thead-dark text-light">
        <tr>
            <th scope="col">Student</th>
            <th scope="col">Score</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody class="table-light ">
        @foreach($usersTaken as $userTaken)
        <tr>
            <td>{{$userTaken->user->name}}</td>
            <td>{{$userTaken->result}}</td>
            <td><a href="{{route('teacher.get-user-exam',[$userTaken->id])}}">Correct</a></td>
        </tr>
        @endforeach
    </tbody>
</table>