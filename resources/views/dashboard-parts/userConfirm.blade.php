<div class="part d-none" id="users-confirm">
    <table class="table">
        <thead class="thead-dark">
            <th scope="col">name</th>
            <th scope="col">role</th>
            <th scope="col">email</th>
            <th scope="col">created at</th>
            <th scope="col">action</th>
        </thead>
        @foreach($waitingList as $person)
        <tr>
            <td class="d-none">
                <form action="manager/users/{{$person->id}}" method="post" id="{{'form'.$person->id}}">
                    @csrf @method('put')
                </form>
            </td>
            <td><input type="text" name="name" form="{{'form'.$person->id}}" value="{{$person->name}}"></td>
            <td><select name="role" form="{{'form'.$person->id}}" value="{{$person->role}}">
                    <option value="manager">Manager</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select></td>
            <td><input type="email" name="email" form="{{'form'.$person->id}}" value="{{$person->email}}"></td>
            <td><input type="datetime" name="created_at" form="{{'form'.$person->id}}" value="{{$person->created_at}}"></td>
            <td>
                <input type="hidden" name="is_confirmed" value="1" form="{{'form'.$person->id}}">
                <input type="submit" value="Accept" class="bg-primary text-light" form="{{'form'.$person->id}}">
                <form action="manager/users/{{$person->id}}" method="post" class="d-inline-block">
                    @csrf @method('delete')
                    <input type="submit" value="delete" class="text-light bg-danger mx-1">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>