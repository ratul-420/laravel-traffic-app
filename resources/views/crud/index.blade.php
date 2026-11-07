<x-mainpage>
  <h1>Manage restrictions (CRUD)</h1>
  @if (session('success'))
    <p class="success">{{ session('success') }}</p>
  @endif
  <p><a href="{{ route('crud.create') }}" role="button">+ New restriction</a></p>
  <div style="overflow-x:auto">
  <table class="data">
    <tr>
      <th>ID</th><th>Road</th><th>From km</th><th>To km</th><th>Settlement</th>
      <th>From</th><th>To</th><th>Reason</th><th>Closure</th><th>Speed</th><th>Actions</th>
    </tr>
    @foreach ($rows as $r)
    <tr>
      <td>{{ $r->id }}</td>
      <td>{{ $r->roadnumber }}</td>
      <td>{{ $r->frompoint }}</td>
      <td>{{ $r->topoint }}</td>
      <td>{{ $r->settlement }}</td>
      <td>{{ $r->fromdate }}</td>
      <td>{{ $r->todate }}</td>
      <td>{{ $r->naming->nev }}</td>
      <td>{{ $r->extent->nev }}</td>
      <td>{{ $r->speed ?? '-' }}</td>
      <td>
        <a href="{{ route('crud.edit', $r) }}">Edit</a>
        <form method="post" action="{{ route('crud.destroy', $r) }}" style="display:inline"
              onsubmit="return confirm('Delete this restriction?')">
          @csrf
          @method('DELETE')
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  </div>
  <p class="pager">
    @if ($rows->onFirstPage())
      <span>&laquo; Prev</span>
    @else
      <a href="{{ $rows->previousPageUrl() }}">&laquo; Prev</a>
    @endif
    Page {{ $rows->currentPage() }} / {{ $rows->lastPage() }}
    @if ($rows->hasMorePages())
      <a href="{{ $rows->nextPageUrl() }}">Next &raquo;</a>
    @else
      <span>Next &raquo;</span>
    @endif
  </p>
</x-mainpage>
