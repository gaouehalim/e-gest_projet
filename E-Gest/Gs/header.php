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
<aside id="sidebar" class="dark:bg-gray-800 text-white w-64 hidden md:block h-auto">
            <div class="flex flex-col w-41 h-screen px-4 py-8 overflow-y-auto border-r rtl:border-r-0 rtl:border-l dark:bg-gray-800 dark:border-gray-700" >
                <a href="index.php">
                    <img class="w-40 h-14 mx-auto rounded" src="../assets/images/logohecm.png" alt="">
                </a>
            
                <hr class="my-5 border-green-500 dark:border-green-500" />

            
                <div class="flex flex-col justify-between flex-1 mt-6">
                    <nav >
                    <a href="site.php" class="flex items-center p-3 rounded dark:border-2  text-black bg-green-500 text-white dark:text-green-500 dark:border-gray-800 dark:bg-green-500 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 0 0-1.032 0 11.209 11.209 0 0 1-7.877 3.08.75.75 0 0 0-.722.515A12.74 12.74 0 0 0 2.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 0 0 .374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 0 0-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08Zm3.094 8.016a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    </svg>

                         <span class="mx-4 text-bold"><?php echo $nomSite; ?></span>
                    </a>
                        <a class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M5.566 4.657A4.505 4.505 0 0 1 6.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0 0 15.75 3h-7.5a3 3 0 0 0-2.684 1.657ZM2.25 12a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3v-6ZM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 0 1 6.75 6h10.5a3 3 0 0 1 2.683 1.657A4.505 4.505 0 0 0 18.75 7.5H5.25Z" />
                        </svg>
                        <span class="mx-4 text-lg">Dashboard</span>
                        </a>

                        <a class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="listelc.php">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
                        <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
                        </svg>
                        <span class="mx-4 text-lg">Local</span>
                        </a>
               
                        <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                            <a @click="isOpen = !isOpen" class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                            <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                            </svg>

            
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="mx-4 text-lg">Materielle</span>
                               
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="materielle.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Nos Materielle</a>
                                <a href="statrm.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Statistique Materielle</a>
                                <a href="historique_demande.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Historique demande</a>
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
                                <span class="mx-4 text-lg">Réservation</span>    
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">En attente</a>
                                <a href="reservation_repondu.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Répondu</a>
                            </div>
                        </div>
                    
                        <!-- <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                          
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Attribuer</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Non Attribuer</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Par catégorie</a>
                            </div>
                        </div> -->
                     
            
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
                            <img class="w-10 h-10 rounded-full" src="<?php echo ($pp ? $pp : '../assets/images/defaultpp.png'); ?>" alt="">
                            <span class="top-0 mx-1 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                            <span class="mt-2 mx-4 font-bold">Profil</span>
                        </div>
                        </a>
                     <a class="flex items-center px-5 py-2 mt-2  rounded border-2 text-red-500 border-red-500 hover:bg-red-500 hover:text-white" href="../logout.php">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                          </svg>
                            <span class="mx-4 text-lg">Déconnexion</span>
                        </a>
                </div>
            </div>
    
        </aside>
        <main id="main" class="flex-1 p-4 dark:bg-gray-800">
            <button id="toggleSidebar" class="rounded-lg bg-green-500 text-gray-800 dark:bg-green-500 dark:text-white px-3 py-2 mb-4 md:hidden">  
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>