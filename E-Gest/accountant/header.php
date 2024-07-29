<link rel="shortcut icon" href="../assets/images/logohecm.png" type="image/x-icon"/>
    <script defer src="../assets/js/aplines.js"></script>
    <script src="../assets/js/tailwind.js"></script>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/datatable.css">
    <script type="text/javascript" src="../assets/js/jquery.js"></script>
    <script type="text/javascript" src="../assets/js/datatable.js"></script>
</head>
<body class="h-screen dark:bg-gray-800">
    <div class="flex">
        <!-- Sidebar -->
<aside id="sidebar" class="dark:bg-gray-800 text-white w-64 hidden md:block">
            <div class="flex flex-col w-41 h-screen px-4 py-8 overflow-y-auto border-r rtl:border-r-0 rtl:border-l dark:bg-gray-800 dark:border-gray-700" >
                <a href="index.php">
                    <img class="w-40 h-14 mx-auto rounded" src="../assets/images/logohecm.png" alt="">
                </a>
            
                <hr class="my-6 border-green-500 dark:border-green-500" />

            
                <div class="flex flex-col justify-between flex-1 mt-6">
                    <nav >
                        <a class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="index.php">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            
                            <span class="mx-4 text-lg">Dashboard</span>
                        </a>
                        <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                            <a @click="isOpen = !isOpen" class="flex items-center px-4 py-2 mt-5  rounded dark:border-2 text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                            <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>
                            
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="mx-4 text-lg">Ressource</span>         
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="resmat.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Toute les ressources</a>
                                <a href="resmatna.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Non Attribuer</a>
                                <a href="resmata.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Attribuer</a>
                                <a href="histoatt.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Historique Attribution</a>
                            </div>
                        </div>      
                        <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                            <a @click="isOpen = !isOpen" class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                                <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                                </svg>
   
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="mx-4 text-lg">Demandes</span>    
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="listedemande.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">En attente</a>
                                <a href="listedemandt.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Traité</a>
                            </div>
                        </div>
                        <!-- <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                            <a @click="isOpen = !isOpen" class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                  </svg>
                                  
                                  
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="mx-4 font-medium">Demandes</span>
                               
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">En attende</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 2</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 3</a>
                            </div>
                        </div> -->
                        <!-- <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                          
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Attribuer</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Non Attribuer</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Par catégorie</a>
                            </div>
                        </div> -->
                     
                        <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                            <a @click="isOpen = !isOpen" class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 13.5a8.25 8.25 0 0 1 8.25-8.25.75.75 0 0 1 .75.75v6.75H18a.75.75 0 0 1 .75.75 8.25 8.25 0 0 1-16.5 0Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M12.75 3a.75.75 0 0 1 .75-.75 8.25 8.25 0 0 1 8.25 8.25.75.75 0 0 1-.75.75h-7.5a.75.75 0 0 1-.75-.75V3Z" clip-rule="evenodd" />
                            </svg>

                                  
                                  
                                  
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="mx-4 text-lg">Statistique</span>         
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="statsg.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Générale</a>
                                <a href="statsc.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Par catégorie</a>
                                <a href="site.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Par site</a>
                            </div>
                        </div>
            
                        <a class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="catrm.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                        </svg>


                              
                            <span class="mx-4 text-lg">Catégorie</span>
                        </a>
            
                        <hr class="my-6 border-green-500 dark:border-green-500" />
            
                        <!-- <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            
                            <span class="mx-4 font-medium">Tickets</span>
                        </a> -->
            
                 
                    </nav>
            
                    <a href="confi.php">
                         <div class="flex relative mx-6 shadow p-1 rounded bg-green-500">
                            <img class="object-cover mx-2 rounded-full h-9 w-9" src="<?php echo ($pp ? $pp : '../assets/images/defaultpp.png'); ?>" alt="">
                            <span class="top-0 mx-1 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                            <span class="mt-2 mx-4 font-bold">Profil</span>
                        </div>
                        </a>
                     <a class="flex items-center px-5 py-2 mt-5  rounded border-2 text-red-500 border-red-500 hover:bg-red-500 hover:text-white" href="../logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                          </svg>
                          
                              
            
                            <span class="mx-4 text-lg">Déconnexion</span>
                        </a>
                </div>
            </div>
    
        </aside>
        <main id="main" class="flex-1 p-4">
            <button id="toggleSidebar" class="rounded-lg bg-green-500 text-gray-800 dark:bg-green-500 dark:text-white px-3 py-2 mb-4 md:hidden">  
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>