<?php
    include 'setting.php';

$query = "
    SELECT 
        COUNT(*) AS Total,
        COUNT(CASE WHEN statutMaterielle = 'disponible' THEN 1 END) AS Disponibles,
        COUNT(CASE WHEN statutMaterielle = 'indisponible' THEN 1 END) AS Attribués,
        COUNT(CASE WHEN etatMaterielle = 'nouveau' THEN 1 END) AS Neuf,
        COUNT(CASE WHEN etatMaterielle = 'bonne' THEN 1 END) AS Bon,
        COUNT(CASE WHEN etatMaterielle = 'vielle' THEN 1 END) AS Mauvais
    FROM ressourcematerielle
";

$stmt = $base_com->prepare($query);
$stmt->execute();
$globalStats = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptable-Matière - E-Gest | Statistique Générale</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Sidebar -->
            <?php
            include 'header.php';
            ?>


<div class="flex items-center py-4 overflow-x-auto whitespace-nowrap">
    <a href="#" class="text-gray-600 dark:text-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
    </a>

    <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
    </span>

    <a href="listedemande.html" class="flex items-center text-gray-600 -px-2 dark:text-gray-200 hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605" />
            </svg>

        <span class="mx-2">Statistique</span>
        <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </span>
        <span class="mx-2">Générale</span>

    </a>
    


</div>               
<section class="container px-4 mx-auto mt-10">
        <div class="flex items-center gap-x-3">
            <h2 class="text-lg font-medium text-gray-800 dark:text-white">Statistiques Globales </h2>
            <span class="px-3 py-1 text-4xl text-green-500 bg-green-100 rounded-full dark:bg-gray-800 dark:text-green-500">HECM</span>
        </div>

        <div class="w-full text-black dark:text-white">
            <div class="container flex flex-col items-center gap-10 mx-auto mt-5">
                <div class="grid grid-cols-1 w-full lg:grid-cols-2 gap-y-8">
                    <div class="flex flex-col items-center mx-5">
                    <p class="text-4xl font-medium leading-7 text-center text-dark-grey-600 mt-4">Statistiques Globales</p>  
                        <ul class="text-base font-medium leading-7 text-center dark:text-gray-300 mt-3">
                            <li>Total: <?php echo htmlspecialchars($globalStats['Total']); ?></li>
                        </ul>
                        <canvas id="globalChart" width="20" height="20"></canvas>
                    
                    </div>
                    <script>
                        var ctx = document.getElementById('globalChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Disponibles', 'Attribués', 'Neuf', 'Bon', 'Mauvais'],
                                datasets: [{
                                    data: [
                                        <?php echo $globalStats['Disponibles']; ?>, 
                                        <?php echo $globalStats['Attribués']; ?>, 
                                        <?php echo $globalStats['Neuf']; ?>, 
                                        <?php echo $globalStats['Bon']; ?>, 
                                        <?php echo $globalStats['Mauvais']; ?>
                                    ],
                                    backgroundColor: ['#4CAF50', '#FFC107', '#03A9F4', '#8BC34A', '#F44336']
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: 'top',
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(tooltipItem) {
                                                return tooltipItem.label + ': ' + tooltipItem.raw;
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
        </main>
    </div>
    <script src="../assets/js/main.js"></script>
  </body>
</html>