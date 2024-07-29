<?php
  include 'setting.php';

  if (isset($_POST['envoyer'])) {
      $typeMat = htmlspecialchars($_POST['typeMaterielle']);
      $quantite = htmlspecialchars($_POST['quantite']);
      $periode = !empty($_POST['periode']) ? htmlspecialchars($_POST['periode']) : NULL;
      $message = !empty($_POST['message']) ? htmlspecialchars($_POST['message']) : NULL;
      
      if (!empty($quantite) && !empty($typeMat)) {
          try {
              $req1 = "INSERT INTO demande (typeMaterielle, quantite, periode, messageDemande, idSite, dateAdd) VALUES (?, ?, ?, ?, ?, NOW())";
              $stmt1 = $base_com->prepare($req1);
              $stmt1->execute([$typeMat, $quantite, $periode, $message, $idSite]);
              
              $message = "Demande enregistrée ! Il sera bientôt pris en charge. Consultez la section de votre candidature pour vérification.";
          } catch (PDOException $e) {
              $erreur = "Erreur lors de l'exécution de la requête: " . $e->getMessage();
          }
      } else {
          $erreur = "Certains champs sont requis.";
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
                        <a href="index.php" class="text-gray-600 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </a>
                    
                        <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    
                        <a href="resmat.php" class="flex items-center text-gray-600 -px-2 dark:text-gray-200 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                  </svg>
                    
                            <span class="mx-2">Ressources matérielles</span>
                            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="mx-2">Demande</span>

                        </a>
                    </div>       
                    <?php if (!empty($message)): ?>
                                            <div class="w-full text-white bg-emerald-500 pb-6">
                                                <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                                    <div class="flex">
                                                        <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                                                            </path>
                                                        </svg>

                                                        <p class="mx-3"><?php echo $message; ?></p>
                                                    </div>

                                                    <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (!empty($erreur)): ?>
                                            <div class="w-full text-white bg-red-500  pb-6">
                                                <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                                                    <div class="flex">
                                                        <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                                            <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z">
                                                            </path>
                                                        </svg>

                                                        <p class="mx-3"><?php echo $erreur; ?></p>
                                                    </div>

                                                    <button class="p-1 transition-colors duration-300 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <?php endif; ?>        
                    <div class="container mx-auto p-6">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                            <h2 class="text-2xl font-bold mb-6 text-green-500">Demande de Ressource Matérielle</h2>
                            <form action="demande.php" method="POST">
                                <div class="mb-4">
                                    <label for="typeMaterielle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de Matériel</label>
                                    <select id="typeMaterielle" name="typeMaterielle" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring">
                                    <?php
                                                            $sql = "SELECT * FROM categoriematerielle";
                                                            $stmt = $base_com->prepare($sql);
                                                            $stmt->execute();
                                                            if ($stmt->rowCount() > 0) {
                                            
                                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                            echo "<option value=".$row['idCategorie'].">".$row['nomCategorie']."</option>";
                                                            }
                                                            }else{
                                                                echo "<option class='text-red-500' role='alert'>Aucune type recu ! <a href'catrm.php'>Ajouter</a></option>";
                                                            }
                                                                
                                                            ?> 
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="quantite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantité</label>
                                    <input type="number" id="quantite" name="quantite" min="1" class="block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" required>
                                </div>
                                <div class="mb-4">
                                    <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Période (en jours) <span class="text-blue-700 font-bold">Laisser vide si vous souhaitez avoir la ressource (s) durant une periode indertermine</span></label>
                                    <input type="number" id="periode" name="periode" min="1" class="block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring">
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Motif (facultatif)</label>
                                    <textarea id="message" name="message" maxlength="255" rows="4" class="block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" ></textarea>
                                </div>
                                <input type="submit" name="envoyer" value="Envoyer la demande" class="w-full bg-green-500 text-white p-3 rounded hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                            </form>
                        </div>
                    </div>
                </main>
            </div>
<script src="../assets/js/main.js"></script>
</body>
</html>