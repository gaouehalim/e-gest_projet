<?php
include 'setting.php';
 
$count = "SELECT COUNT(idDemande) AS nombredemande FROM demande where idSite = $idSite ";
$result = $base_com->prepare($count);
$result->execute();
$resulta = $result->fetch(PDO::FETCH_ASSOC);

$demand= "SELECT dm.*,cm.* FROM demande as dm inner join categoriematerielle as cm on dm.typeMaterielle = cm.idCategorie where dm.idSite = $idSite ";
$stmt = $base_com->prepare($demand);
$stmt->execute();
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
                        
                        <span class=" text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="mx-2 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">local</span>
                    
                    </div>
                    <section class="container px-4 mx-auto mt-10">
                        <div class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-white mb-5 draggable">
                            <div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                            <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark font-display">
                                <span class="mr-3 font-semibold text-dark">Nombre de demande <span class="px-3 py-1 mx-2 text-5xl text-green-500 bg-green-100 rounded-full dark:text-green-500"><?php echo $resulta['nombredemande'];?></span></span>   
                                
                            </h3>
                            <div class="relative flex flex-wrap items-center my-2">
                                <a href="demande.php" class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-green-400 hover:text-white bg-white border-green-400 shadow-none border-2 py-2 px-5 hover:bg-green-400 active:bg-white focus:bg-white">Nouvelle demande</a>
                            </div>
                            </div>
                          
                            <div class="flex-auto block py-8 pt-6 px-9">
                            <div class="overflow-x-auto">
                                 <?php
                                    if ($stmt->rowCount() > 0) {
                                ?>
                                  <?php
                                if (isset($_GET['id'])) {
                                    $delete_id = $_GET['id'];
                                
                                    $delete_media_query = $base_com->prepare("DELETE FROM media WHERE idLocal = ?");
                                    $delete_media_query->execute([$delete_id]);
                                
                                    $delete_ressource_query = $base_com->prepare("DELETE FROM ressourceimmobiliere WHERE idLocal = ?");
                                    $delete_ressource_query->execute([$delete_id]);
                           
                                    echo "<div class='w-full text-white bg-yellow-400'>
                                    <div class='container flex items-center justify-between px-6 py-4 mx-auto'>
                                        <div class='flex'>
                                            <svg viewBox='0 0 40 40' class='w-6 h-6 fill-current'>
                                                <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z'>
                                                </path>
                                            </svg>
                                
                                            <p class='mx-3'>Le local a été supprimée !</p>
                                        </div> 
                                    </div>
                                </div>";
                                    echo "<script>
                                            setTimeout(function(){
                                                window.location.href = 'listelc.php';
                                            }, 2000); 
                                        </script>";
                                }
                                ?>
                                <table id="liste" class="w-full my-0 align-middle text-dark border-neutral-200 mt-5">
                                <thead class="align-bottom">
                                    <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                                    <th class="pb-3 text-start ">Type Matérielle</th>
                                    <th class="pb-3">Quantité</th>
                                    <th class="pb-3">Période</th>
                                    <th class="pb-3">Message</th>
                                    <th class="pb-3">Statut</th>
                                    <th class="pb-3">Date</th>
                                    <th class="pb-3 text-start ">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                            if ( $row['periode']==null){
                                                $periode = 'Indéterminé ';
                                            }else{
                                                $periode =$row['periode'];
                                            }   
                                            if ($row['messageDemande']==null){
                                                $message = 'Aucun';
                                            }else{
                                                $message = $row['messageDemande'];
                                            }
                                         
                                           if ($row['statutDemande'] == 'en attente') {
                                            $statut = '<td class=" py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-black">
                                                            <span class="h-1.5 w-1.5 rounded-full bg-gray-200"></span>
                                                            <h2 class="text-sm font-normal text-gray-200">' . $row['statutDemande'] . '</h2>
                                                        </div>
                                                       </td>';
                                        } elseif($row['statutDemande']=='refuser') {
                                            $statut = '<td class="py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                            <h2 class="text-sm font-normal text-red-500">' . $row['statutDemande'] . '</h2>
                                                        </div>
                                                       </td>';
                                        }else {
                                            $statut = '<td class="py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-green-100/60 dark:bg-gray-800">
                                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                                            <h2 class="text-sm font-normal text-green-500">' . $row['statutDemande'] . '</h2>
                                                        </div>
                                                       </td>';
                                        }                                    
                                    ?>
                                    <tr class="border-b border-dashed last:border-b-0 bg-blue-100">
                                        <!-- Nom -->
                                        <td class="p-1">
                                            <div class="flex items-center">
                                                <div class="flex flex-col justify-start">
                                                    <a href="javascript:void(0)" class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary"><?php echo $row['nomCategorie'];?></a>
                                                </div>
                                            </div>
                                        </td>
                                    
                                        <td class="p-1 text-center">
                                           <?php echo $row['quantite'];?>
                                        </td>
                                   
                                        <td class="p-1 text-center">
                                        <?php echo $periode;?>
                                        </td>
                                        <td class="p-1 text-center"><?php echo $message;?></td>
                                        <?php echo $statut;?>  
                                        <td class="p-1 text-center"><?php echo $row['dateAdd'];?></td>
                                        <td class="p-1 pr-0">
                                        <div class="flex">
                                        <?php if ($row['statutDemande'] == "en attente") { ?>
                                            <a href="mes_reservations.php?idDemande=<?php echo $row['idDemande']; ?>" class="flex">
                                                <button onclick="return confirm('Voulez-vous annuler cette demande ?');" class="flex font-bold bg-gray-200 rounded p-3  transition-colors duration-200 text-black focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                        <path fill-rule="evenodd" d="m6.72 5.66 11.62 11.62A8.25 8.25 0 0 0 6.72 5.66Zm10.56 12.68L5.66 6.72a8.25 8.25 0 0 0 11.62 11.62ZM5.105 5.106c3.807-3.808 9.98-3.808 13.788 0 3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788Z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </a>
                                        <?php } else{ ?>
                                            <a href="reponse_demande.php?idDemande=<?php echo $row['idDemande']; ?>" class="flex">
                                                <button class="flex font-bold bg-blue-500 rounded  text-white transition-colors duration-200 hover:text-black focus:outline-none">
                                                Voir (imprimer)
                                                </button>
                                            </a>
                                        <?php } ?>
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
                                        echo "<p class='text-center text-blue-500 font-bold' >Aucune demande en attente </p>";
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
                    </section>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>
