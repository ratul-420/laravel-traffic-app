<nav>
  <ul>
    <li><strong>Traffic Restrictions</strong></li>
  </ul>
  <ul>
    <li><a href="/">Home</a></li>
    <li><a href="/introduction">Introduction</a></li>
    <li><a href="/database">Database</a></li>
    <li><a href="/contact">Contact</a></li>
    @if (Auth::check())
      <li><a href="/messages">Messages</a></li>
      <li><a href="/user">User</a></li>
      @if (Auth::user()->role == 1)
        <li><a href="/admin">Admin</a></li>
      @endif
      <li>
        <form method="post" action="/logout" style="margin:0;">
          @csrf
          <button type="submit" class="outline secondary">Logout</button>
        </form>
      </li>
    @else
      <li><a href="/login">Login</a></li>
      <li><a href="/register">Register</a></li>
    @endif
  </ul>
</nav>