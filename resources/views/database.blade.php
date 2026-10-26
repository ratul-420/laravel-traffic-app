<x-mainpage>
  <h1>Traffic restrictions (2010)</h1>
  <table class="data">
    <tr>
      <th>Road</th><th>From km</th><th>To km</th><th>Settlement</th>
      <th>From</th><th>To</th><th>Reason</th><th>Closure</th><th>Speed</th>
    </tr>
    @foreach ($rows as $r)
    <tr>
      <td>{{ $r->roadnumber }}</td>
      <td>{{ $r->frompoint }}</td>
      <td>{{ $r->topoint }}</td>
      <td>{{ $r->settlement }}</td>
      <td>{{ $r->fromdate }}</td>
      <td>{{ $r->todate }}</td>
      <td>{{ $r->naming->nev }}</td>
      <td>{{ $r->extent->nev }}</td>
      <td>{{ $r->speed ?? '-' }}</td>
    </tr>
    @endforeach
  </table>
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
