<?php
 include 'setting.php';

 if (isset($_GET['idDemande'])) {
     $idDemande = $_GET['idDemande'];
     $demand = "SELECT dm.*, cm.*, s.* 
                FROM demande AS dm 
                INNER JOIN categoriematerielle AS cm ON dm.typeMaterielle = cm.idCategorie 
                INNER JOIN site AS s ON s.idSite = dm.idSite 
                WHERE dm.idDemande = ?";
     $stmt = $base_com->prepare($demand);
     $stmt->execute([$idDemande]);
     $demande = $stmt->fetch(PDO::FETCH_ASSOC);
 
     if ($demande['periode'] == null) {
         $periode = 'Indéterminé';
     } else {
         $periode = $demande['periode'] . ' jour(s)';
     }
 
   
 }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomSite;?></title>
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
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                              </svg>
                    
                            <span class="mx-2">Reponse Demande</span>
                        </a>
                    
                    </div>                

                    <button onclick="printSection()" class="flex bg-blue-500 text-white mt-5 p-2">Imprimer 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                </svg>
                </button>
                    <section class="flex flex-col bg-white dark:bg-gray-800 mt-5 rounded-lg shadow-md mb-2">
            <div class="w-full px-8 py-4 bg-white dark:bg-gray-800 mt-2">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-light text-yellow-600"><?php echo $demande['dateAdd']; ?></span>
                    <a href="#" class="px-3 py-1 text-sm font-bold text-green-400 bg-gray-600 rounded"><?php echo $demande['nomSite']; ?></a>
                </div>

                <div class="mt-2">
                    <h1 class="text-gray-800 dark:text-white">Type : <span class="text-xl font-semibold"><?php echo $demande['nomCategorie']; ?></span></h1>
                    <p class="p-2 text-gray-800 dark:text-white ">Période : <span class="text-green-600"><?php echo $periode; ?></span></p>
                    <p class="p-2 text-gray-800 dark:text-white">Quantité : <span class="text-red-500"><?php echo $demande['quantite']; ?></span></p>
                    <p class="mt-2 p-2 text-blue-400 text-gray-800 dark:text-white"><?php echo $demande['messageDemande']; ?></p>        
                </div>
            </div>
            <div class="w-auto px-8 py-4 bg-white dark:bg-gray-800">
                <div class="relative flex items-center mt-2">
                    <h1 class="text-gray-700 dark:text-gray-200" for="statut">Décision : 
                        <span class="<?php echo ($demande['statutDemande'] == 'accepter') ? 'text-green-600' : 'text-red-600'; ?>">
                            <?php echo ucfirst($demande['statutDemande']); ?>
                        </span>
                    </h1>
                </div>                  
                <div class="mt-4">
                    <h1 class="text-gray-700 dark:text-gray-200" for="reponse">Réponse:</h1>
                    <p class="text-gray-800 dark:text-white">
                        <?php echo (!empty($demande['reponseDemande'])) ? $demande['reponseDemande'] : 'Aucun'; ?>
                    </p>
                </div>
                  <div class="mt-4">
                    <h1 class="text-black dark:text-white text-2xl font-bold" for="reponse">Signer la comptabilité des matières <span class="text-green-500">HECM BENIN</span></h1>                  
                </div>
               

            </div>
        </section>

        </main>
    </div>
    <script>
function printSection() {
    var sectionToPrint = document.querySelector('.flex.flex-col.bg-white.dark\\:bg-gray-800.mt-5.rounded-lg.shadow-md.mb-2');

    if (sectionToPrint) {
        var printWindow = window.open('', '', 'height=600,width=800');

        var styles = `
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                .text-yellow-600 { color: #D97706; }
                .text-green-400 { color: #10B981; }
                .bg-gray-600 { background-color: #4B5563; }
                .text-gray-800 { color: #1F2937; }
                .dark .text-white { color: #FFFFFF; }
                .text-green-600 { color: #059669; }
                .text-red-500 { color: #EF4444; }
                .text-blue-400 { color: #60A5FA; }
                .text-red-600 { color: #DC2626; }
                .text-black { color: #000000; }
                .text-3xl { font-size: 1.875rem; }
                .font-bold { font-weight: 700; }
                .font-light { font-weight: 300; }
                .rounded { border-radius: 0.375rem; }
                .px-3 { padding-left: 0.75rem; padding-right: 0.75rem; }
                .py-1 { padding-top: 0.25rem; padding-bottom: 0.25rem; }
                .px-8 { padding-left: 2rem; padding-right: 2rem; }
                .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
                .mt-2 { margin-top: 0.5rem; }
                .mt-4 { margin-top: 1rem; }
                .mt-5 { margin-top: 1.25rem; }
                .mb-2 { margin-bottom: 0.5rem; }
                .shadow-md { box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
                .rounded-lg { border-radius: 0.5rem; }
                .bg-white { background-color: #FFFFFF; }
                .dark .bg-gray-800 { background-color: #1F2937; }
            </style>
        `;

        printWindow.document.write(`
            <html>
                <head>
                    <title>Impression de la reponse de la demande</title>
                    ${styles}
                </head>
                <body>
                    ${sectionToPrint.outerHTML}
                </body>
            </html>
        `);

        printWindow.document.close();

        printWindow.print();
    } else {
        alert('Section non trouvée!');
    }
}
</script>

    <script src="../assets/js/main.js"></script>
</body>
</html>
