<table class="table">
            <thead class="thead-dark table-striped">
                    <th scope="col">name</th>
                    <th scope="col">role</th>
                    <th  class="d-none d-md-block" scope="col">email</th>
                    <th scope="col">action</th>
                </thead>
            @foreach($all as $person)
                <tr>
                    <td class="d-none"><form action="manager/users/{{$person->id}}" method="post" id="{{'form'.$person->id}}">
                        @csrf @method('put')
                    </form></td>
                    <td><input type="text" name="name" form="{{'form'.$person->id}}" value="{{$person->name}}"></td>
                    <td><select name="role" form="{{'form'.$person->id}}" value="{{$person->role}}">
                        <option value="manager">Manager</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select></td>
                    <td class="d-none d-md-block"><input type="email" name="email" form="{{'form'.$person->id}}" value="{{$person->email}}"></td>
                    <td >
                        <input type="submit" value="Update" class="bg-primary text-light" form="{{'form'.$person->id}}">
                        <form action="manager/users/{{$person->id}}" method="post" class="d-inline-block">
                            @csrf @method('delete')
                            <input type="submit" value="delete" class="bg-danger text-light mx-1">
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                {{$all->links()}}
            </tr>
            </table>