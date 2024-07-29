<link rel="shortcut icon" href="assets/images/logohecm.png" type="image/x-icon"/>
    <script defer src="assets/js/aplines.js"></script>
    <script src="assets/js/tailwind.js"></script>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/datatable.js"></script>
</head>
<body class="dark:bg-gray-800">


                <?php if ($role !=="client"): ?>
        <header> 
            
        <div class=" w-full max-w-8xl ">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl p-5 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    
                    <a class="text-lg font-bold tracking-tighter text-blue-600 transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8" href="index.php"><img class="object-cover object-center w-full h-20 rounded-lg lg:h-15" src="assets/images/logohecm.png" alt=""></a>
                    <button class="rounded-lg md:hidden dark:bg-green-400 focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-8 h-8">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden  border-green-400 md:pb-0 md:flex md:justify-end md:flex-row lg:border-l-2 lg:pl-2">
                    <a class="px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#">Catalogue</a>
                    <a class="px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#">A propos</a>
                    <a class="px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#contact">Contact</a>
                    <!-- <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm text-left text-gray-500 md:w-auto md:inline md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline">
                            <span>Catalogue</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform rotate-0 md:-mt-1">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-30 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48" style="display: none">
                            <div class="px-2 py-2 bg-white rounded-md shadow">
                                <a class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#">Link #1</a>
                                <a class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#">Link #2</a>
                                <a class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#">Link #3</a>
                            </div>
                        </div>
                    </div> -->
                    <!-- <a class="px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-green-400 focus:outline-none focus:shadow-outline" href="#">Blog</a> -->

                    <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                        <a href="login.php"><button class="items-center block px-10 py-2.5 text-base font-medium text-center text-green-400 transition duration-500 ease-in-out transform border-2 border-white shadow-md rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Se connecter</button></a>
                        <a href="register.php"><button class="items-center block px-10 py-3 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-green-400 rounded-xl hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">S'inscrire</button></a>
                    </div>
                </nav>
                <?php else: ?>
                    <header class="flex justify-between items-center p-5 text-slate-900">
    <div class="flex flex-row items-center">
        <a class="text-lg font-bold tracking-tighter text-blue-600 transition duration-500 ease-in-out transform tracking-relaxed lg:pr-8" href="index.php">
            <img class="object-cover object-center w-full h-20 rounded-lg lg:h-15" src="assets/images/logohecm.png" alt="Logo HECM">
        </a>
    </div>
    <nav class="relative" x-data="{ open: false }">
    <div class="flex relative mx-10">
        <button
            @click="open = !open"
            @click.outside="if (open) open = false"
            class="w-8 h-8 flex rounded-full bg-white text-sm  ring-2 ring-green-500 ring-offset-2">
            <img class="h-8 w-8 rounded-full" src="<?php echo ($pp ? $pp : '../assets/images/defaultpp.png'); ?>" alt="Image de profil">
            <span class="top-0 mx-1 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
        </button>   
    </div>
    
        
        <ul 
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            tabindex="-1">
            <li><a href="conf.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon compte</a></li>
            <li><a href="mes_reservations.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mes réservations</a></li>
            <li><a href="logout.php" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100">Déconnexion</a></li>
        </ul>
    </nav>
</header>


            <?php endif ?>
        
</header>
