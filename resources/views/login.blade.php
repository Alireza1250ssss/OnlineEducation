<x-header title="Login" css="login" />
@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
<h3 >Login To Your Dashboard</h3>
<form action="/login" method="post">
    @csrf
    <input type="email" name="email" placeholder="E-mail">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="LOG IN">
</form>
<a href="/register">Make an Account</a>