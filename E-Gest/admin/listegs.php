<?php
    include 'setting.php';
    $count = "SELECT COUNT(u.idUtilisateur) AS nombregs FROM utilisateur as u INNER JOIN site as s ON u.idUtilisateur = s.idUtilisateur where u.role = 'gs'";
    $result = $base_com->prepare($count);
    $result->execute();
    $resulta = $result->fetch(PDO::FETCH_ASSOC);

    $recupUser = "SELECT u.*, s.* FROM utilisateur as u INNER JOIN site as s ON u.idUtilisateur = s.idUtilisateur where u.role = 'gs'";

    $stmt = $base_com->prepare($recupUser);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - E-Gest</title>

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
                    
                        <a href="#" class="flex items-center text-gray-600 -px-2 dark:text-gray-200 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                  </svg>
                    
                            <span class="mx-2">HECM</span>
                            <span class="mx-5 text-gray-500 dark:text-gray-300 rtl:-scale-x-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="mx-2">Gestionaire de site</span>

                        </a>
                    </div>  
                    <section class="container px-4 mx-auto mt-10">
                    <div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
                        <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark font-display">
                            <span class="mr-3 font-semibold text-dark dark:text-white">Nos gestionnaire de site<span class="px-3 mx-2 py-1 text-5xl text-green-500 bg-green-100 rounded-full dark:text-green-500"><?php echo $resulta['nombregs'];?></span></span>   
                            
                        </h3>
                        <div class="relative flex flex-wrap items-center my-2">
                            <a href="addgs.php" class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-green-400 hover:text-white bg-white border-green-400 shadow-none border-2 py-2 px-5 hover:bg-green-400 active:bg-white focus:bg-white"> Nouveau gestionnaire </a>
                        </div>
                    </div>
                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <?php
                                if (isset($_GET['iduser']) ) {
                                    $iduser = $_GET['iduser'];
                                    
                                    $req1 = "UPDATE utilisateur u INNER JOIN site s ON u.idUtilisateur = s.idUtilisateur SET u.role = 'client', s.idUtilisateur = NULL WHERE u.idUtilisateur = ?";
                                    $stmt1 = $base_com->prepare($req1);
                                    $stmt1->execute([$iduser]); 


                                    echo "<div class='w-full text-white bg-yellow-400'>
                                            <div class='container flex items-center justify-between px-6 py-4 mx-auto'>
                                                <div class='flex'>
                                                    <svg viewBox='0 0 40 40' class='w-6 h-6 fill-current'>
                                                        <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z'>
                                                        </path>
                                                    </svg>
                                                    <p class='mx-3'>Le gestionnaire a été supprimé !</p>
                                                </div>
                                            </div>
                                        </div>";
                                    echo "<script>
                                            setTimeout(function(){
                                                window.location.href = 'listegs.php';
                                            }, 2000); 
                                        </script>";
                                    }
                                ?>
                                <?php
                                    if ($stmt->rowCount() > 0) {
                                ?>
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="">
                                        <thead class="bg-gray-50 dark:bg-gray-800">
                                            <tr>
                                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <div class="flex items-center gap-x-3">
                                                        <span>Nom & Prénom (s)</span>
                                                    </div>
                                                </th>

                                                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <button class="flex items-center gap-x-2">
                                                        <span>Site</span>
                
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                        </svg>
                                                    </button>
                                                </th>

                                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <button class="flex items-center gap-x-2">
                                                        <span>Contact</span>
                
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                                        </svg>

                                                    </button>
                                                </th>
                
                                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <button class="flex items-center gap-x-2">
                                                        <span>Addresse Email</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                                    </svg>
                                                    </button>
                                                </th>
                
                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"></th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        <?php
                                         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            $role = '';
                                            if($row['role']=='gs'){
                                                $role = 'Gestionnaire de site';
                                            }elseif($row['role']=='cm'){
                                                $role = 'Comptable des matières';
                                            }elseif($row['role']=='admin'){
                                                $role = 'Administrateur';
                                            }else{
                                                $role = 'Client';
                                            }
                                        ?>
                
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">                
                                                        <div class="flex items-center gap-x-2">
                                                            <img class="object-cover w-10 h-10 rounded-full" src="<?php $pp = $row['photoUtilisateur']; echo ($pp ? $pp : '../assets/images/defaultpp.png'); ?>" alt="">
                                                            <div>
                                                                <h2 class="font-medium text-gray-800 dark:text-white "><?php echo $row['nomUtilisateur'];?> <?php echo $row['prenomUtilisateur'];?></h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['nomSite'];?></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['contactUtilisateur'];?></td>
                                                <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?php echo $row['emailUtilisateur'];?></td>
                                               
                                                <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">
                                                       <a href="listegs.php?iduser=<?php echo $row['idUtilisateur'];?>" class="flex">
                                                        <button onclick="return confirm('Voulez-vous retirer ce gestionnaire ?');" class="flex font-bold bg-red-500 rounded p-3 text-white transition-colors duration-200 hover:text-black focus:outline-none">                      
                                                            Retirer
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
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
                                        echo "<p class='text-center text-blue-500 font-bold' >Aucun utilisateur !</p>";
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
                     </section>
<script src="../assets/js/main.js"></script>
</body>
</html>