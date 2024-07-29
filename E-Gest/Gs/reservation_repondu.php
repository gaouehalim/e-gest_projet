<?php
    include 'setting.php';
    $count = "SELECT COUNT(idReservation) AS nombrereservation FROM reservation rv 
    INNER JOIN utilisateur u ON u.idUtilisateur = rv.idUtilisateur 
    INNER JOIN ressourceimmobiliere ri ON rv.idLocal = ri.idLocal 
    INNER JOIN site s ON s.idSite = ri.idSite  WHERE statutReservation !='en attente' and ri.idSite = $idSite";
    $result = $base_com->prepare($count);
    $result->execute();
    $resulta = $result->fetch(PDO::FETCH_ASSOC);

    $resev = "SELECT rv.*, ri.*, s.*,u.*
              FROM reservation rv 
              INNER JOIN utilisateur u ON u.idUtilisateur = rv.idUtilisateur 
              INNER JOIN ressourceimmobiliere ri ON rv.idLocal = ri.idLocal 
              INNER JOIN site s ON s.idSite = ri.idSite 
              WHERE statutReservation !='en attente' and ri.idSite = $idSite";

    $stmt = $base_com->prepare($resev);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomSite;?></title>
    <?php
        include 'header.php';
    ?>
   <div class="container mx-auto px-4 py-8 dark:bg-gray-800">
    <h1 class="text-2xl font-bold mb-4 dark:text-white">Réservations repondu <span class="text-green-400"><?php echo $resulta['nombrereservation'];?></span></h1>
    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <?php
               if (isset($_GET['idReservation'])) {
                $idReservation = $_GET['idReservation'];
                
                $stmt = $base_com->prepare("DELETE FROM reservation WHERE idReservation = :idReservation");
                $stmt->bindParam(':idReservation', $idReservation);
                
                if ($stmt->execute()) {
                    echo "<div class='w-full text-white bg-yellow-400 mb-6'>
                            <div class='container flex items-center justify-between px-6 py-4 mx-auto'>
                                <div class='flex'>
                                    <svg viewBox='0 0 40 40' class='w-6 h-6 fill-current'>
                                        <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z'>
                                        </path>
                                    </svg>
                                    <p class='mx-3'>Votre réservation supprimée !</p>
                                </div>
                            </div>
                        </div>";
                        echo "<script>
                                setTimeout(function(){
                                    window.location.href = 'reservation_repondu.php';
                                }, 2000); 
                            </script>";
                    } else {
                        echo "Erreur de l'annulation de la réservation: " . $stmt->errorInfo()[2];
                    }
                }
                ?>
                                <?php
                                    if ($stmt->rowCount() > 0) {
                                ?>
                                
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th class="py-3 px-4 text-left dark:text-white font-bold">Client</th>
                                             <th class="py-3 px-4 text-left dark:text-white font-bold">Contact(s)</th>
                                            <th class="py-3 px-4 text-left dark:text-white font-bold">Type de local</th>
                                            <th class="py-3 px-4 text-left dark:text-white font-bold">Date et heure de début</th>
                                            <th class="py-3 px-4 text-left dark:text-white font-bold">Date et heure de fin</th>
                                            <th class="py-3 px-4 text-left dark:text-white font-bold">Prix total</th>
                                            <th class="py-3 px-4 text-left dark:text-white font-bold">Statut</th>
                                            <th class="py-3 px-4 text-center dark:text-white font-bold">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        <?php
                                         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                           $staut = $row['statutReservation'];
                                           $idReservation = $row['idReservation'];
                                        ?>
                                                
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">                
                                                        <div class="flex items-center gap-x-2">
                                                            <div>
                                                                <h2 class="font-bold dark:text-white"><?php echo $row['nomUtilisateur'].' '.$row['prenomUtilisateur'];?></h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['contactUtilisateur'];?></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['typeLocal'];?></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['dateStart'];?></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['dateEnd'];?></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['paiementReservation'];?> <span class="text-green-500">XOF</span></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo strtoupper($row['statutReservation']);?></td>
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <div class="flex items-center gap-x-6 flex">
                                                        <a href="reservation_repondu.php?idReservation=<?php echo $row['idReservation']; ?>" class="flex">
                                                            <button onclick="return confirm('Voulez-vous supprimer cette réservation ?');" class="flex font-bold bg-red-500 rounded p-3  transition-colors duration-200 text-black focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                                  <path fill-rule="evenodd" d="m6.72 5.66 11.62 11.62A8.25 8.25 0 0 0 6.72 5.66Zm10.56 12.68L5.66 6.72a8.25 8.25 0 0 0 11.62 11.62ZM5.105 5.106c3.807-3.808 9.98-3.808 13.788 0 3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788Z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </a>
                                                </div>
                                            </td>

                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    }else {
                                        echo "<p class='text-center text-blue-500 font-bold' >Aucune réservation !</p>";
                                        }
                                    ?>
                                      <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#liste').DataTable({
                                            "language": {
                                                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"
                                            }
                                        });
                                    });

                                    
                                </script>
                                </div>
                            </div>
                        </div>
                    </div>
  
  </div>


    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>