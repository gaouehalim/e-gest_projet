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
<aside id="sidebar" class="dark:bg-gray-800 text-white w-64 hidden md:block h-auto">
<div class="flex flex-col w-41 h-screen px-4 py-8 overflow-y-auto border-r rtl:border-r-0 rtl:border-l dark:bg-gray-800 dark:border-gray-700" >
                <a href="index.php">
                    <img class="w-40 h-14 mx-auto rounded" src="../assets/images/logohecm.png" alt="">
                </a>
            
                <hr class="my-6 border-green-500 dark:border-green-500" />

            
                <div class="flex flex-col justify-between flex-1 mt-6">
                    <nav >
                        <a class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="index.php">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            
                            <span class="mx-4 font-medium">Dashboard</span>
                        </a>
                       
                        <div x-data="{ isOpen: false }" @click.away="isOpen = false" class="relative">
                            <a @click="isOpen = !isOpen" class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                            </svg>

                                  
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': isOpen, 'rotate-0': !isOpen}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="mx-4 font-medium">Utilisateurs</span>
                               
                            </a>
                        
                            <div x-show="isOpen" class="absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <a href="users.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Utilisateurs</a>
                                <a href="listeclient.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Clients</a>
                                <a href="listegs.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Gestionnaire de site</a>
                            </div>
                        </div>
                       
            
                        <a class="flex items-center px-4 py-2 mt-5  rounded dark:border-2  text-black hover:bg-green-500 hover:text-white dark:text-green-500 dark:border-gray-800 dark:hover:bg-green-500 dark:hover:text-white" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" />
                        </svg>

                            <span class="mx-4 font-medium">Message</span>
                        </a>
            
                        <hr class="my-6 border-green-500 dark:border-green-500" />
            
                        <!-- <a class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="#">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            
                            <span class="mx-4 font-medium">Tickets</span>
                        </a> -->
            
                 
                        </nav>
            
            <a href="confi.php" class="flex items-center px-4 rounded mx-2 border-2 bg-green-400 p-1">
                 <img class="object-cover mx-2 rounded-full h-9 w-9" src="<?php echo ($pp ? $pp : '../assets/images/defaultpp.png'); ?>" alt="avatar" />
                <span class="mx-2 font-medium text-gray-800 dark:text-gray-200">PROFIL</span>
            </a>
             <a class="flex items-center px-5 py-2 mt-2 rounded border-2 text-red-500 border-red-500 hover:bg-red-500 hover:text-white" href="../logout.php">
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