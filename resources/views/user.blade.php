<x-mainpage>
  <h1>My account</h1>
  <article>
    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Role:</strong> {{ Auth::user()->role == 1 ? 'Administrator' : 'Registered visitor' }}</p>
    <p><strong>Member since:</strong> {{ Auth::user()->created_at?->format('Y-m-d') ?? '-' }}</p>
  </article>
  <p>As a registered visitor you can read the <a href="/messages">Messages</a> sent through the contact form.</p>
</x-mainpage>