<?php
include 'setting.php';
 
$count = "SELECT COUNT(idLocal) AS nombreLocal FROM ressourceimmobiliere ";
$result = $base_com->prepare($count);
$result->execute();
$resulta = $result->fetch(PDO::FETCH_ASSOC);

$recupMat = "SELECT * FROM ressourceimmobiliere ";

$stmt = $base_com->prepare($recupMat);
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
                            <!-- card header -->
                            <div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                            <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark font-display">
                                <span class="mr-3 font-semibold text-dark">Nos Locaux<span class="px-3 py-1 mx-2 text-5xl text-green-500 bg-green-100 rounded-full dark:text-green-500"><?php echo $resulta['nombreLocal'];?></span></span>   
                                
                            </h3>
                            <div class="relative flex flex-wrap items-center my-2">
                                <a href="addlc.php" class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-green-400 hover:text-white bg-white border-green-400 shadow-none border-2 py-2 px-5 hover:bg-green-400 active:bg-white focus:bg-white"> Ajout nouveau Local </a>
                            </div>
                            </div>
                            <!-- end card header -->
                            <!-- card body  -->
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
                                    <th class="pb-3 text-start ">NOM</th>
                                    <th class="pb-3">CODE</th>
                                    <th class="pb-3">TYPE</th>
                                    <th class="pb-3">ETAT</th>
                                    <th class="pb-3">STATUT</th>
                                    <th class="pb-3">RESERVABLE</th>
                                    <th class="pb-3  ">TARIF(heure)</th>
                                    <th class="pb-3  ">DATE AJOUT</th>
                                    <th class="pb-3 text-start ">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                                         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                           if($row['nomLocal'] == null){
                                            $nom = "<span class='text-violet-400'>Aucun</span>";
                                           }else{
                                            $nom = $row['nomLocal'];
                                           }

                                           if ($row['statutLocal'] == 'disponible') {
                                            $statut = '<td class=" py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                            <h2 class="text-sm font-normal text-emerald-500">' . $row['statutLocal'] . '</h2>
                                                        </div>
                                                       </td>';
                                        } else {
                                            $statut = '<td class="py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                            <h2 class="text-sm font-normal text-red-500">' . $row['statutLocal'] . '</h2>
                                                        </div>
                                                       </td>';
                                        }
                                        if ($row['reservable'] == 'oui') {
                                            $res = '<td class=" py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                <h2 class="text-sm font-normal text-emerald-500">' . $row['reservable'] . '</h2>
                                            </div>
                                           </td>';
                                        } else {
                                            $res = '<td class=" py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                        <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-red-100/60 dark:bg-gray-800">
                                                            <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                            <h2 class="text-sm font-normal text-red-500">' . $row['reservable'] . '</h2>
                                                        </div>
                                                       </td>';
                                        }
                                    ?>
                                    <tr class="border-b border-dashed last:border-b-0 bg-blue-100">
                                        <!-- Nom -->
                                        <td class="p-1">
                                            <div class="flex items-center">
                                                <div class="flex flex-col justify-start">
                                                    <a href="javascript:void(0)" class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary"><?php echo $nom;?></a>
                                                </div>
                                            </div>
                                        </td>
                                        <!-- Code -->
                                        <td class="p-1 text-center">
                                           <?php echo $row['codeLocal'];?>
                                        </td>
                                        <!-- Satut -->
                                        <td class="p-1 text-center">
                                              <?php echo $row['typeLocal'];?>
                                        </td>
                                        <td class="p-1 text-center"><?php echo $row['etatLocal'];?></td>
                                        <?php echo $statut;?>  
                                        <?php echo $res;?>      
                                        <td class="p-1 text-center"><?php echo $row['tarifLocal'];?></td>
                                        <td class="p-1 text-center"><?php echo $row['dateAdd'];?></td>
                                        <td class="p-1 pr-0">
                                        <div class="flex">
                                        <button class=" transition-colors duration-20 text-blue-500 focus:outline-none">
                                                <a href="local.php?id=<?php echo $row['idLocal'];?>"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                            <button class=" transition-colors duration-200 text-yellow-500 focus:outline-none">
                                            <a href="modiflc.php?id=<?php echo $row['idLocal'] ;?>">   
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                        </a>
                                                    </button>
                                                    <button class="transition-colors duration-200 text-red-500  focus:outline-none" onclick="return confirm('Voulez-vous supprimer ce local ?');" >
                                                        <a href="listelc.php?id=<?php echo $row['idLocal'];?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                        </a>
                                                    </button>
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
                                        echo "<p class='text-center text-blue-500 font-bold' >Aucune local enregistrer </p>";
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
