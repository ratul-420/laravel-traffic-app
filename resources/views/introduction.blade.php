<x-mainpage>
  <h1>About this application</h1>
  <p>This website shows <strong>road traffic restrictions in Hungary (2010)</strong>:
     where roadworks happened, why, how the road was closed and the speed limit.
     It currently holds <strong>{{ \App\Models\Restriction::count() }}</strong> restrictions.</p>
  <article>
    <h3>What you can do</h3>
    <ul>
      <li><strong>Everyone:</strong> browse the <a href="/database">Database</a>, see the <a href="/graph">Graph</a>, and send us a note via <a href="/contact">Contact</a>.</li>
      <li><strong>Registered visitors:</strong> also read the <a href="/messages">Messages</a> sent through the contact form.</li>
      <li><strong>Administrators:</strong> also manage the data (create, edit, delete) in the CRUD menu.</li>
    </ul>
  </article>
  <p>Made by Ratul Fahim Muntashir (H1566N) and Islam Md Aminul (PQFBDZ) for Web Programming II.</p>
</x-mainpage>