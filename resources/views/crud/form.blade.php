<x-mainpage>
  <h1>{{ $restriction->exists ? 'Edit restriction #' . $restriction->id : 'New restriction' }}</h1>
  <form method="post" class="contact"
        action="{{ $restriction->exists ? route('crud.update', $restriction) : route('crud.store') }}">
    @csrf
    @if ($restriction->exists) @method('PUT') @endif

    <label>Road number</label>
    <input type="text" name="roadnumber" value="{{ old('roadnumber', $restriction->roadnumber) }}">
    @error('roadnumber') <div class="error">{{ $message }}</div> @enderror

    <label>From km</label>
    <input type="text" name="frompoint" value="{{ old('frompoint', $restriction->frompoint) }}">
    @error('frompoint') <div class="error">{{ $message }}</div> @enderror

    <label>To km</label>
    <input type="text" name="topoint" value="{{ old('topoint', $restriction->topoint) }}">
    @error('topoint') <div class="error">{{ $message }}</div> @enderror

    <label>Settlement</label>
    <input type="text" name="settlement" value="{{ old('settlement', $restriction->settlement) }}">
    @error('settlement') <div class="error">{{ $message }}</div> @enderror

    <label>From date</label>
    <input type="date" name="fromdate" value="{{ old('fromdate', $restriction->fromdate) }}">
    @error('fromdate') <div class="error">{{ $message }}</div> @enderror

    <label>To date</label>
    <input type="date" name="todate" value="{{ old('todate', $restriction->todate) }}">
    @error('todate') <div class="error">{{ $message }}</div> @enderror

    <label>Reason</label>
    <select name="namingid">
      <option value="">-- choose --</option>
      @foreach ($namings as $n)
        <option value="{{ $n->id }}" @selected(old('namingid', $restriction->namingid) == $n->id)>{{ $n->nev }}</option>
      @endforeach
    </select>
    @error('namingid') <div class="error">{{ $message }}</div> @enderror

    <label>Closure type</label>
    <select name="extentid">
      <option value="">-- choose --</option>
      @foreach ($extents as $e)
        <option value="{{ $e->id }}" @selected(old('extentid', $restriction->extentid) == $e->id)>{{ $e->nev }}</option>
      @endforeach
    </select>
    @error('extentid') <div class="error">{{ $message }}</div> @enderror

    <label>Speed limit (km/h, optional)</label>
    <input type="text" name="speed" value="{{ old('speed', $restriction->speed) }}">
    @error('speed') <div class="error">{{ $message }}</div> @enderror

    <input type="submit" value="Save">
    <a href="{{ route('crud.index') }}">Cancel</a>
  </form>
</x-mainpage>
