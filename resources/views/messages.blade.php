<x-mainpage>
  <h1>Messages</h1>
  @forelse ($messages as $m)
    <div class="msg">
      <strong>{{ $m->subject }}</strong>
      <small>{{ $m->created_at->format('Y-m-d H:i:s') }}</small><br>
      From: {{ $m->name }} ({{ $m->email }})
      <p>{{ $m->message }}</p>
    </div>
  @empty
    <p>No messages yet.</p>
  @endforelse
</x-mainpage>
