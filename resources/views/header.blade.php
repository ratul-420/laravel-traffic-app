<div>
  <a href="/">Home</a>
  <a href="/introduction">Introduction</a>
  <a href="/database">Database</a>
  @if (Auth::check())
    <a href="/user">User</a>
    @if (Auth::user()->role == 1)
      <a href="/admin">Admin</a>
    @endif
    <form method="post" action="/logout" style="display:inline;">
      @csrf
      <input type="submit" value="Logout">
    </form>
  @else
    <a href="/login">Login</a>
    <a href="/register">Register</a>
  @endif
</div>
