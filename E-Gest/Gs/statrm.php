<?php
    include 'setting.php';
    $queryStats = "
    SELECT 
        s.nomSite,
        cm.nomCategorie,
        COUNT(CASE WHEN rm.etatMaterielle = 'nouveau' THEN 1 END) AS Neuf,
        COUNT(CASE WHEN rm.etatMaterielle = 'bonne' THEN 1 END) AS Bon,
        COUNT(CASE WHEN rm.etatMaterielle = 'vielle' THEN 1 END) AS Mauvais,
        COUNT(*) AS Total
    FROM ressourcematerielle rm
    INNER JOIN categoriematerielle cm ON rm.typeMaterielle = cm.idCategorie
    INNER JOIN attribution a ON rm.idMaterielle = a.idMaterielle
    INNER JOIN site s ON a.idSite = s.idSite
    WHERE a.idSite = :idSite
    GROUP BY s.nomSite, cm.nomCategorie
";

$stmtStats = $base_com->prepare($queryStats);
$stmtStats->bindParam(':idSite', $idSite, PDO::PARAM_INT);
$stmtStats->execute();
$stats = $stmtStats->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>nom site</title>
    <?php
        include 'header.php';
    ?>
 <?php if (!empty($stats)): ?>
        <section class="container px-4 mx-auto mt-10">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Statistiques pour le site sélectionné</h2>
            </div>
            <div class="w-full text-black dark:text-white">
                <div class="container flex flex-col items-center gap-10 mx-auto mt-5">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-8">
                        <?php foreach ($stats as $index => $row): ?>
                            <div class="flex flex-col items-center mx-5">
                                <p class="text-2xl font-medium leading-7 text-center text-dark-grey-600 mt-4">
                                    <?php echo htmlspecialchars($row['nomSite']); ?> - <?php echo htmlspecialchars($row['nomCategorie']); ?>
                                </p>
                                <ul class="text-base font-medium leading-7 text-center dark:text-gray-300 mt-3">
                                    <li>Total: <?php echo htmlspecialchars($row['Total']); ?></li>
                                    <li>Neuf: <?php echo htmlspecialchars($row['Neuf']); ?></li>
                                    <li>Bon: <?php echo htmlspecialchars($row['Bon']); ?></li>
                                    <li>Mauvais: <?php echo htmlspecialchars($row['Mauvais']); ?></li>
                                </ul>
                                <canvas id="chart<?php echo $index; ?>" width="400" height="400"></canvas>
                            </div>
                            <script>
                                var ctx = document.getElementById('chart<?php echo $index; ?>').getContext('2d');
                                new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: ['Neuf', 'Bon', 'Mauvais'],
                                        datasets: [{
                                            data: [<?php echo $row['Neuf']; ?>, <?php echo $row['Bon']; ?>, <?php echo $row['Mauvais']; ?>],
                                            backgroundColor: ['#4CAF50', '#03A9F4', '#F44336']
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="container px-4 mx-auto mt-10">
            <div class="flex items-center gap-x-3">
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Aucune statistique disponible pour ce site</h2>
            </div>
        </section>
    <?php endif; ?>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>