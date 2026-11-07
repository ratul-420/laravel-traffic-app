<x-mainpage>
  <h1>Admin page</h1>
  <p>Welcome, {{ Auth::user()->name }}. You have administrator rights.</p>
  <ul>
    <li><a href="/crud">Manage road restrictions (CRUD)</a></li>
    <li><a href="/messages">Read contact messages</a> ({{ \App\Models\Message::count() }} so far)</li>
  </ul>
</x-mainpage>