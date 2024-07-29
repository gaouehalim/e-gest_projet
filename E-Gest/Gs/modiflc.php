<?php
include 'setting.php';
if(isset($_POST['envoyer'])) {
    $idLocal = $_GET['id'];
    $nomLocal = htmlspecialchars($_POST['nomLocal']);
    $typeLocal = strtoupper(htmlspecialchars($_POST['typeLocal']));
    $capaciteLocal = htmlspecialchars(intval($_POST['capaciteLocal']));
    $etatLocal = htmlspecialchars($_POST['etatLocal']);
    $tarifLocal = htmlspecialchars(floatval($_POST['tarifLocal']));
    $description = htmlspecialchars($_POST['description']);
    $codeLocal = "";
    if( !empty($typeLocal) && !empty($capaciteLocal) && !empty($etatLocal)){

        $stmt_annonce = $base_com->prepare("UPDATE ressourceimmobiliere SET nomLocal = :nomLocal, typeLocal = :typeLocal, capaciteLocal = :capaciteLocal, etatLocal = :etatLocal, description = :description, reservable = :reservable, tarifLocal = :tarifLocal WHERE idLocal = :idLocal");
        $stmt_annonce->execute(array(
            ':nomLocal' => $nomLocal,
            ':typeLocal' => $typeLocal,
            ':capaciteLocal' => $capaciteLocal,
            ':etatLocal' => $etatLocal,
            ':description'=> $description,
            ':reservable' => isset($_POST['reservable']) ? 'oui' : 'non',
            ':tarifLocal' => $tarifLocal,
            ':idLocal' => $idLocal
        ));        

    $message = "Mise à jour réussi du local de type $typeLocal";

    if(isset($_FILES['images']) && !empty($_FILES['images']['tmp_name'])) {
        $dossier = "../ImageLocal/";
        if (!file_exists($dossier)) {
            mkdir($dossier, 0777, true);
        }
        foreach($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $nom_image = $idLocal.$nomSite.'_' . $_FILES['images']['name'][$key];
            $chemin_image = $dossier.$nom_image;
            if(move_uploaded_file($tmp_name, $chemin_image)) {
                $stmt_image = $base_com->prepare("INSERT INTO media (url, idLocal) VALUES (:url, :idLocal)");
                $stmt_image->execute(array(
                    ':url' => $chemin_image,
                    ':idLocal' => $idLocal 
                ));
            } 
        }
    }
    
    }else{
        $erreur = "Tous les champs sont requis";
    }
}
  

    $idLocal = $_GET['id'];


    $sql = "SELECT * FROM ressourceimmobiliere WHERE idLocal = ?";
    $requete = $base_com->prepare($sql);
    $requete->execute([$idLocal]);
    $rlc = $requete->fetch(PDO::FETCH_ASSOC);

    $sql1 = "SELECT url FROM media WHERE idLocal = ?";
    $requete1 = $base_com->prepare($sql1);
    $requete1->execute([$idLocal]); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nomSite;?></title>
    <style>
           .thumbnail {
            margin-left: 5px;
            max-width: 100px;
            max-height: 100px; 
        }
    </style>
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
                        <span class="text-gray-600 dark:text-gray-200">Ajout d'un nouveau local</span>
                    
                    </div>
                     <section class="container px-5 mx-auto mt-5">
                        <div class="flex flex-col mt-6">
                            <div class="mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <section class="mt-5 max-w-4xl p-6 mx-auto bg-white border-2 border-green-400 rounded-md shadow-md dark:bg-gray-800">
                                            <h1 class="text-center text-lg font-semibold text-green-400 capitalize dark:text-green-400">Ajout d'un local</h1>
                                                <div class=" justify-center">

                                            <form  method="post" enctype="multipart/form-data" action="">
                                            <?php if (!empty($message)): ?>
                                            <div class="w-full text-white bg-emerald-500 mt-2">
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
                                            <div class="w-full text-white bg-red-500 mt-2">
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
                                            <div style="position: relative;" class="mb-5 pb-5 mt-5">
                                                <h1 class="bg-white dark:bg-green-400" style="position: absolute; top: 0; left: 0; padding: 10px; border: 1px solid #ccc;">
                                                    Code Local : <span class="text-red-500"><?php echo $rlc['codeLocal']; ?></span>
                                                </h1>
                                            </div>
                                                    <div class="mb-4 w-70 pt-2">
                                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                                                        <input type="text" name="nomLocal" id="company" class=" block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" value="<?php echo $rlc['nomLocal']; ?>"  />
                                                    </div>
                                                    <div class="mb-4 w-70">
                                                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type de local</label>
                                                        <input type="text" name="typeLocal" id="company" class=" block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" value="<?php echo $rlc['typeLocal']; ?>"/>
                                                    </div>
                                                    <div class="mb-4 w-70">
                                                        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacité</label>
                                                        <input type="number" name="capaciteLocal" id="company" class=" block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" value="<?php echo $rlc['capaciteLocal']; ?>" />
                                                    </div>  
                                                    <div class="mb-4 w-70">
                                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etat du local</label>
                                                        <select name="etatLocal" id="etat" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring">
                                                           
                                                            <option value="bon" <?php echo ($rlc['etatLocal'] === 'bon') ?'selected' : '';?>>Bon</option>
                                                            <option value="moyen" <?php echo ($rlc['etatLocal'] === 'moyen') ?'selected' : ''; ?>>Moyen</option>
                                                            <option value="mauvais" <?php echo ($rlc['etatLocal'] === 'mauvais') ?'selected' : ''; ?>>Mauvais</option>
                                                        </select>                                                    
                                                    </div>
                                                    <div class="mb-4 w-70">
                                                        <label class="inline-flex items-center cursor-pointer">
                                                            <input type="checkbox" name="reservable" value="oui" class="sr-only peer" <?php echo ($rlc['reservable'] === 'oui') ? 'checked' : ''; ?>>
                                                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-400"></div>
                                                            <span class="ms-3 text-sm font-medium <?php echo ($rlc['reservable'] === 'oui') ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-500'; ?>">Réservable</span>
                                                        </label>
                                                    </div>

                                                    <div class="mb-4 w-70">
                                                        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarif (heure) en XOF</label>
                                                        <input type="number" name="tarifLocal" id="company" class=" block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" value="<?php echo $rlc['tarifLocal']; ?>"/>
                                                    </div>
                                                    <div class="mb-4 w-70">
                                                        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description du Local</label>
                                                        <textarea name="description" id="company" class=" block w-full  px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-400 focus:ring-green-300 focus:ring-opacity-40 dark:focus:border-green-300 focus:outline-none focus:ring" ><?php echo $rlc['description']; ?></textarea>
                                                    </div>
                                                    <div class="mb-4 w-70">
                                                        <label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image(s) "facultatif"</label>
                                                        <input type="file" id="images" name="images[]" accept="image/*" multiple class="block w-full px-3 py-2 mt-2 text-sm text-gray-600 bg-white border border-gray-200 rounded-lg file:bg-gray-200 file:text-gray-700 file:text-sm file:px-4 file:py-1 file:border-none file:rounded-full dark:file:bg-gray-800 dark:file:text-gray-200 dark:text-gray-300 placeholder-gray-400/70 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:focus:border-blue-300" />
                                                        <small class="text-yellow-500">Ajoutez jusqu'à quatre images</small>
                                                    </div>
                                                    <div id="image-preview" class="flex gap-x-2 mb-3"></div>
                                                <input type="submit" name="envoyer" class="text-white bg-green-400 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-green-400 dark:hover:bg-green-700 dark:focus:ring-green-800" value="Ajouter">
                                            </form>
                                        </div>                                    
                                          
                                        <script>
                                                document.getElementById('images').addEventListener('change', function(event) {
                                                    var input = event.target;
                                                    var files = input.files;

                                                    var preview = document.getElementById('image-preview');
                                                    preview.innerHTML = '';

                                                    for (var i = 0; i < files.length; i++) {
                                                        var file = files[i];
                                                        var reader = new FileReader();

                                                        reader.onload = function(e) {
                                                            var img = document.createElement('img');
                                                            img.src = e.target.result;
                                                            img.classList.add('thumbnail'); 
                                                            preview.appendChild(img);
                                                        }

                                                        reader.readAsDataURL(file);
                                                    }
                                                });

                                        </script>
                                        </section>

                                    </div>
                                </div>
                            </div>
                     </section>

   
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>