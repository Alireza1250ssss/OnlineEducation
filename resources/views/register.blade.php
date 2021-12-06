<x-header title="Register" css="register" />

<div class="register-box">
    
<form action="/register" method="post">
@csrf 
<input type="text" name="name" placeholder="Your name">
@error('name') <span class="text-danger">{{$message}}</span> @enderror
<input type="email" name="email" placeholder="Your email">
@error('email') <span class="text-danger">{{$message}}</span> @enderror
<input type="password" name="password" placeholder="Your password">
@error('password') <span class="text-danger">{{$message}}</span> @enderror
<input type="number" name="national_code" placeholder="Your national code">
@error('national_code') <span class="text-danger">{{$message}}</span> @enderror
<span>Your Role :</span>
@error('role') <span class="text-danger">{{$message}}</span> @enderror
<label >
<input type="radio" name="role" value="teacher"> Teacher
</label>
<label >
<input type="radio" name="role" value="student"> Student
</label>
<input type="submit" value="REGISTER">
</form>

</div>