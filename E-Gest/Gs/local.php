<?php
include 'setting.php';

$idLocal = $_GET['id'];


$sql = "SELECT * FROM ressourceimmobiliere WHERE idLocal = ?";
$requete = $base_com->prepare($sql);
$requete->execute([$idLocal]);

$sql1 = "SELECT * FROM media WHERE idLocal = ?";
$requete1 = $base_com->prepare($sql1);
$requete1->execute([$idLocal]); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <style>
        .carousel-caption {
            left: 0;
            right: 0;
            bottom: 0;
            padding: 10px;
        }
    </style>
    <title><?php echo $nomSite;?></title>
    <!-- Sidebar -->
    <?php
    include 'header.php';

    if (isset($_GET['id_supp'])) {
        $delete_id = $_GET['id_supp'];
        $idLocal = $_GET['id'];
        $delete_query = $base_com->prepare("DELETE FROM media WHERE idMedia  = ?");
        $delete_query->execute([$delete_id]);
        echo "<div class='w-full text-white bg-yellow-400'>
        <div class='container flex items-center justify-between px-6 py-4 mx-auto'>
            <div class='flex'>
                <svg viewBox='0 0 40 40' class='w-6 h-6 fill-current'>
                    <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z'>
                    </path>
                </svg>
    
                <p class='mx-3'>L'image a été supprimée !</p>
            </div>
        </div>
    </div>";
        echo "<script>
                setTimeout(function(){
                    window.location.href = 'local.php?id=$idLocal';
                }, 2000); 
            </script>";
    }
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
<div class="shadow mt-5 shadow-green-200 rounded p-3 ">

<div id="custom-controls-gallery" class="relative w-full" data-carousel="">
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
        <?php
                $isFirst = true;
                while ($row = $requete1->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="' . ($isFirst ? 'block' : 'hidden') . ' duration-700 ease-in-out" data-carousel-item>
                        <img src="' . $row['url'] . '" class="absolute block max-w-full h-full rounded -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                        <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-red-500 px-2 py-1 rounded focus:outline-none" onclick="return confirm(\'Voulez-vous supprimer cette image ?\');">
                            <a href="local.php?id_supp='.$row['idMedia'].'&id='.$idLocal.'">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </button>
                    </div>';
                    $isFirst = false;
                }
                ?>
        </div>
        <div class="flex justify-center items-center pt-4">
            <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                    <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

    <?php while ($row = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="text-gray-700 dark:text-white carousel-caption dark:bg-gray-800 bg-opacity-75 p-4 w-auto shadow ">
            <h5 class="text-xl font-bold text-blue-500 dark:text-yellow-400"><?php if ($row['nomLocal']==null){echo "Pas de nom";} else{echo $row['nomLocal'];} ?></h5>
            <p class="flex mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                </svg>
            <span class="mx-2 text-gray-600 dark:text-gray-300"><?php echo $row['typeLocal'] ;?></span>
            </p>

            <p class="text-gray-600 dark:text-gray-300 mt-3"><?php echo $row['description'] ;?> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium ratione ipsam doloribus, officia fugit illo, eum unde dolorum itaque iusto sequi veniam cumque veritatis. Blanditiis quod labore dignissimos assumenda deleniti.</p>

            <p class="text-gray-600 dark:text-gray-300 flex mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                </svg>
            <span class="mx-2 text-gray-600 dark:text-gray-300"><?php echo $row['capaciteLocal'] ;?></span>
            </p>

            <p class="text-gray-600 dark:text-gray-300 mt-3">XOF par heure : <span class="text-green-400 "><?php if ($row['tarifLocal']==null){echo "0";} else{echo $row['tarifLocal'];}?></span></p>
           
            <p class="text-gray-600 dark:text-gray-300 flex mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                </svg>
                <span class="mx-2 text-gray-600 dark:text-gray-300"><?php echo $row['dateAdd'] ;?></span>
            </p>
        </div>
        <button class="mt-5 items-center m-auto px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-600 rounded-lg hover:bg-gray-500 ">
            <a href="modiflc.php?id=<?php echo $row['idLocal'];?>">   
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            </a> 
        </button>
    <?php } ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
