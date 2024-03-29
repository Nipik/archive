<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin/detail.css') }}">
</head>
<body>
    <div class="container">
        <h1>Statistiques de l'application</h1>
        <div class="chart-container">
            <h2>Gestion des Courriers</h2>
            <canvas id="mailsChart" width="400" height="400"></canvas>
        </div>
        <div class="chart-container">
            <h2>Gestion des Utilisateurs</h2>
            <canvas id="usersChart" width="400" height="400"></canvas>
        </div>
        <div class="chart-container">
            <h2>Nombre de Visiteurs</h2>
            <canvas id="visitorsChart" width="400" height="400"></canvas>
        </div>
    </div>

    <script>
        var ctxMails = document.getElementById('mailsChart').getContext('2d');
        var mailsChart = new Chart(ctxMails, {
            type: 'pie',
            data: {
                labels: ['Nombre total de courriers', 'Nombre total de catégories', 'Nombre total d\'organismes'],
                datasets: [{
                    label: 'Gestion des Courriers',
                    data: [{{ $totalCourriers }}, {{ $totalCategories }}, {{ $totalOrganisms }}],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true
            }
        });

        var ctxUsers = document.getElementById('usersChart').getContext('2d');
        var usersChart = new Chart(ctxUsers, {
            type: 'bar',
            data: {
                labels: ['Utilisateurs', 'Administrateurs'],
                datasets: [{
                    label: 'Gestion des Utilisateurs',
                    data: [{{ $totalUsers }}, {{ $totalAdmins }}],
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 159, 64, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var ctxVisitors = document.getElementById('visitorsChart').getContext('2d');
        var visitorsChart = new Chart(ctxVisitors, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Nombre de Visiteurs',
                    data: [{{ $uniqueVisitorsCount }}],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
