<?php
    include 'setting.php';
    $count = "SELECT COUNT(idReservation) AS nombrereservation FROM reservation where statutReservation = 'en attente' ";
    $result = $base_com->prepare($count);
    $result->execute();
    $resulta = $result->fetch(PDO::FETCH_ASSOC);

    $resev = "SELECT rv.*, ri.*,u.* FROM reservation rv inner join utilisateur as u on u.idUtilisateur = rv.idUtilisateur inner join ressourceimmobiliere as ri on rv.idLocal = ri.idLocal inner join site as s on s.idSite = ri.idSite where s.idSite = $idSite and rv.statutReservation ='en attente'";

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
   <section class="bg-white dark:bg-gray-800 h-full">
    <div class="container px-6 py-10 mx-auto h-full">
        <h2 class="text-lg font-medium text-green-500 mb-5">Demande de réservation en attente
            <span class="px-3 py-1 text-3xl text-green-500 bg-green-100 rounded-full dark:text-green-500">
                <?php echo $resulta['nombrereservation'];?>
            </span>
        </h2>

        <div class="flex flex-col gap-8 mx-auto mt-8 xl:mt-10 max-w-7xl">
            <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $pp = '../'.$row['photoUtilisateur'];
            ?>
            <div class="w-full p-6 bg-gray-100 rounded-lg dark:bg-gray-900 md:p-8">
            <?php
                if (isset($_GET['id_delet'])) {
                    $idReservation = $_GET['id_delet'];
                    
                    $stmt = $base_com->prepare("UPDATE reservation SET statutReservation = 'refuser' WHERE idReservation = :idReservation");
                    $stmt->bindParam(':idReservation', $idReservation);
                    
                    if ($stmt->execute()) {
                        echo "<div class='w-full text-white bg-yellow-400'>
                        <div class='container flex items-center justify-between px-6 py-4 mx-auto'>
                            <div class='flex'>
                                <svg viewBox='0 0 40 40' class='w-6 h-6 fill-current'>
                                    <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z'>
                                    </path>
                                </svg>
                    
                                <p class='mx-3'>Refus demande de réservation éffectué</p>
                            </div>
                        </div>
                    </div>";
                        echo "<script>
                                setTimeout(function(){
                                    window.location.href = 'index.php';
                                }, 2000); 
                            </script>";
                    } else {
                        echo "Erreur du refus de la réservation: " . $stmt->errorInfo()[2];
                    }
                }

                if (isset($_GET['con_id'])) {
                    $idReservation = $_GET['con_id'];
                    
                    $stmt = $base_com->prepare("UPDATE reservation SET statutReservation = 'en attente de validation' WHERE idReservation = :idReservation");
                    $stmt->bindParam(':idReservation', $idReservation);
                    
                    if ($stmt->execute()) {
                        echo "<div class='w-full text-white bg-yellow-400'>
                        <div class='container flex items-center justify-between px-6 py-4 mx-auto'>
                            <div class='flex'>
                                <svg viewBox='0 0 40 40' class='w-6 h-6 fill-current'>
                                    <path d='M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z'>
                                    </path>
                                </svg>
                    
                                <p class='mx-3'>Réservation acceptée avec succès.</p>
                            </div>
                        </div>
                    </div>";
                        echo "<script>
                                setTimeout(function(){
                                    window.location.href = 'index.php';
                                }, 2000); 
                            </script>";
                    } else {
                        echo "Erreur lors de l'acceptation de la réservation: " . $stmt->errorInfo()[2];
                    }
                }
                ?>

                <h1 class="text-xl font-semibold text-gray-800 dark:text-white">
                    <?php echo $row['typeLocal'];?>
                </h1>
                <a href="local.php?id=<?php echo $row['idLocal'];?>">
                <p class="py-2 text-violet-700">
                    <?php echo $row['codeLocal'];?>
                </p>
                </a>
                <p class="leading-loose text-gray-500 dark:text-gray-300 flex-grow">
                    <?php echo $row['message'];?>
                </p>
                <p class="py-2 text-gray-700 dark:text-gray-400">
                    <?php echo $row['dateStart'];?>
                </p>
                <p class="py-2 text-gray-700 dark:text-gray-400">
                    <?php echo $row['dateEnd'];?>
                </p>
                <div class="flex items-center mt-6">
                    <img class="object-cover rounded-full w-14 h-14" src="<?php echo ($pp ? $pp : '../assets/images/defaultpp.png'); ?>" alt="">
                    <div class="mx-4 flex flex-col w-full">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-y-2 md:gap-y-0 md:gap-x-6">
                            <div>
                                <h1 class="font-bold dark:text-white">
                                    <?php echo $row['nomUtilisateur'].' '.$row['prenomUtilisateur'];?><br>
                                    <small class="text-gray-500">
                                    <?php echo $row['contactUtilisateur'];?>
                                    </small>
                                  </h1>         
                            </div>
                            <div class="flex items-center gap-x-6">
                                <button class="flex text-bold text-yellow-600">
                                    <span><?php echo $row['daterev'];?></span>
                                </button>
                                <button onclick="return confirm('Voulez-vous refuser cette demande ?');" class="transition-colors duration-200 text-red-500 focus:outline-none hover:bg-red-500 hover:text-white" style=" border: 2px solid red;">
                                    <a href="index.php?id_delet=<?php echo $row['idReservation'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </button>
                                <button onclick="return confirm('Voulez-vous accepter cette demande ?');" class="transition-colors duration-200 text-green-600 focus:outline-none hover:bg-green-600 hover:text-white" style=" border: 2px solid green; ">
                                    <a href="index.php?con_id=<?php echo $row['idReservation'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                } 
            } else {
                echo "<p class='text-center text-blue-500 font-bold'>Aucune annonce en attente de validation.</p>";
            }
            ?>
        </div>
    </div>
</section>


    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>