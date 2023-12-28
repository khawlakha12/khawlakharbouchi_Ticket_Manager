<?php
include_once 'class.php';

$connection = new Conn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titre = $_POST["titre"];
    $probleme = $_POST["probleme"];
    $status = $_POST["status"];
    $description = $_POST["description"];
    $developpeurs = isset($_POST["dev"]) ? $_POST["dev"] : [];
    $priorite = $_POST["number-input"];


    $ticket = new Ticket();


    $ticket->insertFormData($titre, $probleme, $status, $description, $developpeurs, $priorite);
}

$developers = $connection->selectData("developpeur", "First_name, Last_name", "");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
    <title>support </title>

</head>

<body>

    <section class="bg-indigo-500 dark:bg-gray-800 font-poppins">
        <div class="max-w-6xl px-4 mx-auto" x-data="{open:false}">
            <nav class="flex items-center justify-between py-3">
                <a href="index.php"><img src="img/logo H.T.S.png" alt="" class="h-10 w-28"></a>
                <div class="lg:hidden">
                    <button
                        class="flex items-center px-3 py-2 text-blue-200 border border-blue-200 rounded dark:text-gray-400 hover:text-blue-300 hover:border-blue-300 lg:hidden"
                        @click="open =true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                </div>
                <ul class="hidden lg:w-auto lg:space-x-12 lg:items-center lg:flex ">
                    <li><a href="index.php"
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">Home</a>
                    </li>
                    <li><a href="support.php"
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">Support</a>
                    </li>
                    <li><a href="profil.php"
                            class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">Profil</a>
                    </li>
                    <li>
                        <button><a href="singIn.php"
                                class="text-sm text-gray-200 dark:text-gray-300 hover:text-blue-200 dark:hover:text-blue-200">Lougot</a>
                        </button>
                    </li>

                    </header>

                    <!-- Mobile Header & Nav -->
                    <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
                        <div class="flex items-center justify-between">
                            <a href="index.php"><img src="img/logo H.T.S.png" alt="" class="h-10 w-28"></a>
                            <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                                <i x-show="!isOpen" class="fas fa-bars"></i>
                                <i x-show="isOpen" class="fas fa-times"></i>
                            </button>
                        </div>

                </ul>



                <div class="hidden lg:block">
                    <a href=""
                        class="inline-block px-4 py-3 mr-2 text-xs font-medium leading-none text-gray-100 border border-gray-200 rounded-full dark:text-gray-300 dark:border-gray-400 hover:bg-blue-200 dark:hover:text-gray-700 hover:text-gray-700">
                        Profil
                    </a>
                </div>

            </nav>
            <!-- Mobile Sidebar -->
            <div class="absolute inset-0 z-10 h-screen p-3 text-gray-700 duration-500 transform shadow-md dark:bg-gray-800 bg-blue-50 w-80 lg:hidden lg:transform-none lg:relative"
                :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}">
                <div class="flex justify-between px-5 py-2">
                    <a class="text-2xl font-bold dark:text-gray-400" href="#">Logo</a>
                    <button class="rounded-md hover:text-blue-300 lg:hidden dark:text-gray-400" @click="open=false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
                <ul class="px-5 text-left mt-7">
                    <li class="pb-3">
                        <a href="index.php"
                            class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">home</a>
                    </li>
                    <li class="pb-3">
                        <a href="support.php"
                            class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">support</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400">About us</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400 dark:text-gray-400"></a>
                    </li>
                </ul>
                <div class="flex items-center mt-5 lg:hidden">
                    <a href=""
                        class="inline-block w-full px-4 py-3 mr-2 text-xs font-medium leading-none text-center text-gray-100 bg-blue-800 rounded-full dark:bg-blue-400 dark:text-gray-700 dark:border-gray-400 hover:bg-blue-200 dark:hover:text-gray-700 hover:text-gray-700">
                        Profil
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!------------------------------------ formulaire --------------------------------->
    <form method="POST" action="support.php" class="max-w-6xl px-4 h-screen mx-auto">
        <div
            class="mt-20 p-6 bg-white border border-indigo-600 rounded-lg shadow-lg shadow-blue-100 dark:bg-gray-900 dark:border-gray-900">
            <div class="pb-6 border-b border-gray-100 dark:border-gray-700 ">
                <h2 class=" text-center text-xl font-mono text-gray-800 md:text-3xl dark:text-gray-300">
                    Info Ticket
                </h2>
                <p class=" font-mono text-center text-base text-gray-500">
                    ajouter votre declaration
                </p>
            </div>
            <div class="py-6 border-b border-gray-100 dark:border-gray-800">
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap -m-3">
                        <div class="w-full p-3 md:w-1/3">
                            <p class="text-lg font-mono text-gray-800 dark:text-gray-400">titre</p>
                        </div>
                        <div class="w-full p-3 md:flex-1">
                            <input name="titre" rows="4" type="text" placeholder="your text here.." required
                                class="rounded-lg block w-full px-3 py-3 leading-tight placeholder-gray-400 border rounded dark:placeholder-gray-500 dark:text-gray-400 dark:border-gray-800 dark:bg-gray-800 "></input>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 border-b border-gray-100 dark:border-gray-800">
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap -m-3">
                        <div class="w-full p-3 md:w-1/3">

                            <label class="text-lg font-mono text-gray-700 dark:text-gray-400">
                                probléme
                            </label>
                        </div>
                        <div class="w-full p-3 md:flex-1">
                            <select name="probleme" id="probleme" multiple>
                                <option value="Front-end">Front-end</option>
                                <option value="Back-end">Back-end</option>

                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-6 border-b border-gray-100 dark:border-gray-800">
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap -m-3">
                        <div class="w-full p-3 md:w-1/3">

                            <label class="text-lg font-mono text-gray-700 dark:text-gray-400">
                                status
                            </label>
                        </div>
                        <div class="w-full p-3 md:flex-1">
                            <select id="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Done">Done</option>
                                <option value="in progress">in progress</option>
                                <option value="to do">to do</option>

                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-6 border-b border-gray-100 dark:border-gray-800">
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap -m-3">
                        <div class="w-full p-3 md:w-1/3">
                            <p class="text-lg font-mono text-gray-800 dark:text-gray-400">description</p>
                        </div>
                        <div class="w-full p-3 md:flex-1">
                            <textarea name="description" rows="4" type="message" placeholder="your text here.." required
                                class="block w-full px-4 py-4 leading-tight placeholder-gray-400 border rounded dark:placeholder-gray-500 dark:text-gray-400 dark:border-gray-800 dark:bg-gray-800 "></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-6 border-b border-gray-100 dark:border-gray-800">
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap -m-3">

                        <div class="w-full p-3 md:w-1/3">

                            <label class="text-lg font-mono text-gray-700 dark:text-gray-400">
                                developpeur
                            </label>
                        </div>

                        <div class="w-full p-3 md:flex-1">

                            <select name="dev[]" id="dev" multiple>
                                <?php foreach ($developers as $developer): ?>
                                <option value="<?= $developer['First_name'] . ' ' . $developer['Last_name']; ?>">
                                    <?= $developer['First_name'] . ' ' . $developer['Last_name']; ?>
                                </option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-6 border-b border-gray-100 dark:border-gray-800">
                <div class="w-full md:w-9/12">
                    <div class="flex flex-wrap -m-3">
                        <div class="w-full p-3 md:w-1/3">
                            <p class="text-lg font-mono text-gray-800 dark:text-gray-400">priorité</p>
                        </div>
                        <div class="w-full p-3 md:flex-1">
                            <input name="number-input" rows="4" type="number" aria-describedby="helper-text-explanation"
                                placeholder="entrer number" required
                                class="block w-full px-3 py-3 leading-tight placeholder-gray-400 border rounded dark:placeholder-gray-500 dark:text-gray-400 dark:border-gray-800 dark:bg-gray-800 rounded-lg "></input>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex pt-6 flex-wrap -m-1.5">
                <div class="w-full md:w-auto p-1.5">
                    <button
                        class="flex flex-wrap justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-md dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-800 dark:border-gray-700 hover:border-gray-300 ">
                        <p>Cancel</p>
                    </button>
                </div>
                <div class="w-full md:w-auto p-1.5">
                    <button type="submit" name="save"
                        class="flex flex-wrap justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-blue-500 rounded-md hover:bg-blue-600 ">
                        <p>Save</p>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </form>

    <!------------------------------------ end formulaire --------------------------------->
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('dev')
        new MultiSelectTag('probleme') 
    </script>
</body>

</html>