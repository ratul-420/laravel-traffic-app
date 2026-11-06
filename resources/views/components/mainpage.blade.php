<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Traffic Restrictions</title>
    <link rel="stylesheet" href="/css/pico.min.css">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <header class="container">@include('header')</header>
    <main class="container">{{ $slot }}</main>
    <footer class="container site-footer">
      <small>
        &copy; 2026 Ratul Fahim Muntashir (H1566N) &amp; Islam Md Aminul (PQFBDZ)
      </small>
    </footer>
  </body>
</html>