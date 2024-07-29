<?php 
    include 'setting.php';
    
    $recupMat = "SELECT * FROM site ";
    $stmt = $base_com->prepare($recupMat);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Gest</title>
  
          <?php
           include 'header.php';
           ?>
    <main>
        <section class="hero text-gray-600 body-font  dark:bg-gray-800">
            <div class="container mx-auto flex px-5  md:flex-row flex-col items-center">
              <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="text-4xl sm:text-5xl mb-4 font-medium text-gray-900 dark:text-white">Bienvenu sur <span class="text-yellow-400">E-</span><span class="text-red-500">Gest</span>
                  <br class="hidden lg:inline-block text-xs"><span class="text-green-500">HECM - Ecole Leader</span>
                </h1>
                <p class="mb-8 leading-relaxed">Facilitez vos réservations de locaux avec E-Gest, la plateforme intuitive de HECM pour une gestion efficace et simplifiée de vos besoins en espaces et équipements.
</p>
                <!-- <div class="flex justify-center">
                  <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                  <button class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Button</button>
                </div> -->
              </div>
              <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="assets/images/img1.jpeg">
              </div>
            </div>
          </section>
        
          <section class=" dark:bg-gray-800">
            <div class="container px-6 py-10 mx-auto">
                <div class="flex items-center justify-between">
                    <h1 class="text-2xl font-semibold 
                    capitalize lg:text-3xl text-green-500">Notre Catalogue</h1>
        
                    <!-- <button class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 transition-colors duration-300 transform dark:text-gray-400 hover:text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button> -->
                </div>
        
                <hr class="my-8 border-gray-200 dark:border-gray-700">
                <?php
                if ($stmt->rowCount() > 0) {
                ?>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
                <?php
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="flex flex-col items-center justify-center w-full max-w-sm mx-auto">
                    <div class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md" style="background-image: url('<?php echo $row['cover'];?>');"></div>

                    <div class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64 dark:bg-gray-800">
                        <h3 class="py-2 font-bold tracking-wide text-center text-green-400 uppercase"><?php echo $row['nomSite'];?></h3>

                        <div class="flex items-center justify-between px-3 py-2 bg-gray-200 dark:bg-gray-700">
                            <form action="catalogue.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['idSite'];?>">
                            <button type="submit" class="px-2 py-1 text-xs font-semibold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded hover:bg-gray-700 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-gray-600 focus:outline-none">
                                Voir les locaux 
                            </button>
                            </form>
                           
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                   
                </div>
                <?php
                    }else {
                        echo "<p class='text-center text-blue-500 font-bold' >Aucune ressource disponible</p>";
                    }
                ?>
                </div>
        </section>

        <section class=" text-gray-600 dark:bg-gray-800 relative" id="contact">
            <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
              <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe width="100%" height="100%" class="absolute inset-0" style="filter: grayscale(1) contrast(1.2) opacity(0.4);" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src=""></iframe>
                <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                  <div class="lg:w-1/2 px-6">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                    <p class="mt-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum corporis .</p>
                  </div>
                  <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                    <a class="text-green-500 leading-relaxed">info@e-gest.com</a>
                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">TELEPHONE</h2>
                    <p class="leading-relaxed">123-456-7890</p>
                  </div>
                </div>
              </div>
              <div class="lg:w-1/3 md:w-1/2 dark:bg-gray-800 flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0 p-5">
                <h2 class="text-green-500 text-lg mb-1 font-medium title-font ">Contacter-nous</h2>
                <p class="leading-relaxed mb-5 text-gray-600"></p>
                <form action="">
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600 dark:text-white">Nom</label>
                        <input type="text" id="name" name="nom" class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70  border border-green-200 rounded-lg px-1 dark:bg-gray-900 dark:text-gray-300 focus:border-green-400  focus:ring-green-300 focus:outline-none focus:ring focus:ring-opacity-40">
                      </div>
                      <div class="relative mb-4">
                        <label for="email" class="leading-7 text-sm text-gray-600 dark:text-white">Email</label>
                        <input type="email" id="email" name="email"  class="block w-full py-2.5 text-gray-700 placeholder-gray-400/70 border border-green-200 rounded-lg px-1 dark:bg-gray-900 dark:text-gray-300 focus:border-green-400  focus:ring-green-300 focus:outline-none focus:ring focus:ring-opacity-40">
                      </div>
                      <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600 dark:text-white   ">Message</label>
                        <textarea id="message" name="message" class="focus:border-green-500 focus:ring-2 focus:ring-green-200 h-32 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out block w-full text-gray-700 placeholder-gray-400/70 border border-green-200 rounded-lg dark:bg-gray-900 dark:text-gray-300 focus:outline-none focus:ring-opacity-40">
                        </textarea>
                      </div>
                <button class="text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">Envoyer</button>
            </form>
            </div>
            </div>
          </section>
     
    </main>

    <?php
           include 'footer.php';
           ?>
</body>
</html>