<x-mainpage>
  <h1>Restrictions per reason</h1>
  <div style="position:relative; max-width:900px; height:420px;">
    <canvas id="chart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
  <script>
    new Chart(document.getElementById('chart'), {
      type: 'bar',
      data: {
        labels: @json($labels),
        datasets: [{
          label: 'Number of restrictions',
          data: @json($counts),
          backgroundColor: '#2a5298'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
      }
    });
  </script>
</x-mainpage>