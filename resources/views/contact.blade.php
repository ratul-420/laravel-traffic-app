<x-mainpage>
  <h1>Contact</h1>
  @if (session('success'))
    <p class="success">{{ session('success') }}</p>
  @endif
  <form method="post" action="/contact" class="contact">
    @csrf
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name') <div class="error">{{ $message }}</div> @enderror

    <label>Email</label>
    <input type="text" name="email" value="{{ old('email') }}">
    @error('email') <div class="error">{{ $message }}</div> @enderror

    <label>Subject</label>
    <input type="text" name="subject" value="{{ old('subject') }}">
    @error('subject') <div class="error">{{ $message }}</div> @enderror

    <label>Message</label>
    <textarea name="message" rows="6">{{ old('message') }}</textarea>
    @error('message') <div class="error">{{ $message }}</div> @enderror

    <input type="submit" value="Send">
  </form>
</x-mainpage>
