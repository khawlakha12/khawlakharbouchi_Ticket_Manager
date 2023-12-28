<?php
require_once 'class.php';

$ticketObj = new Conn();
$ticketId = isset($_GET['ticket_id']) ? $_GET['ticket_id'] : null;
// echo $ticketId;
$ticketData = $ticketObj->selectData('tickets', '*', $ticketId);

if ($ticketData) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- component -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <title>home</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

            .font-family-karla {
                font-family: karla;
            }

            .bg-sidebar {
                background: #3d68ff;
            }

            .cta-btn {
                color: #3d68ff;
            }

            .upgrade-btn {
                background: #1947ee;
            }

            .upgrade-btn:hover {
                background: #0038fd;
            }

            .active-nav-link {
                background: #1947ee;
            }

            .nav-item:hover {
                background: #1947ee;
            }

            .account-link:hover {
                background: #3d68ff;
            }
        </style>
    </head>

    <body class="bg-gray-100 font-family-karla flex">

        <aside class=" bg-indigo-500 dark:bg-gray-800 relative  h-screen w-64 hidden sm:block shadow-xl">
            <div class="p-6">
                <a href="index.php"><img src="img/logo H.T.S.png" alt="" class="h-10 w-28"></a>

            </div>
            <nav class="text-white text-base font-semibold pt-3">
                <a href="index.php" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Home
                </a>
                <a href="profil.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-sticky-note mr-3"></i>
                    Profil
                </a>
                <a href="support.php" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-table mr-3"></i>
                    support
                </a>

            </nav>
            <a href="#"
                class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
                <i class="fas fa-arrow-circle-up mr-3"></i>
                Khawlita
            </a>
        </aside>

        <div class="w-full flex flex-col h-screen overflow-y-auto">
            <!-- Desktop Header -->
            <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">

                <div class="w-1/2"></div>
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search branch name..." required>
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>


                <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                    <button @click="isOpen = !isOpen"
                        class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <img src="img/profil.png">
                    </button>
                    <button x-show="isOpen" @click="isOpen = false"
                        class="h-full w-full fixed inset-0 cursor-default"></button>
                    <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <a href="profil.php" class="block px-4 py-2 account-link hover:text-white">Account</a>
                        <a href="support.php" class="block px-4 py-2 account-link hover:text-white">Support</a>
                        <a href="singIn.php" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
                    </div>
                </div>

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

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="index.php" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Home
                    </a>
                    <a href="support.php"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        support
                    </a>
                    <a href="profil.php"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-user mr-3"></i>
                        My Account
                    </a>
                    <a href="singIn.php"
                        class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Sign Out
                    </a>
                    <button
                        class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-arrow-circle-up mr-3"></i> Khawlita
                    </button>
                </nav>
            </header>
            <!----------------------------------end navbar------------------------->
        <?php foreach ($ticketData as $ticket): ?>
        <div class="mb-4"></div>
        <div class="mb-4"></div>

        <div class='flex items-center justify-center '>
            <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                <div class="flex w-full items-center justify-between border-b pb-3">
                    <div class="flex items-center space-x-3">
                        <div class="h-8 w-8 rounded-full bg-slate-400 ">
                            <img src="img/issue.png" alt="profil">
                        </div>
                        <div class="text-lg font-bold text-slate-700">
                            <?= $ticket['developpeur'] ?>
                        </div>
                    </div>
                    <div class="flex items-center space-x-8">
                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">
                            <?= $ticket['status'] ?>
                        </button>
                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">
                            <?= $ticket['priorite'] ?>
                        </button>
                        <div class="text-xs text-neutral-500">
                            <?= $ticket['Date'] ?>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-6">
                    <div class="mb-3 text-xl font-bold">
                        <?= $ticket['titre'] ?>
                    </div>
                    <div class="text-sm text-neutral-600">
                        <?= $ticket['description'] ?>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between text-slate-500">
                        <div class="flex space-x-4 md:space-x-8">
                            <div onclick="showmessages(this)" <?php echo 'key="' . $ticket['id'] . '"'; ?> class=" flex
                                cursor-pointer items-center transition hover:text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                <span>125</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4"></div>
        <div class="mb-4"></div>
        <?php endforeach; ?>
        <dh-component class="hidden">

            <div class="py-12 bg-gray-700 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
                id="modal">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                    <div
                        class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                        
                            <div
                                class=" messagecontainer px-auto h-60 border-2 border-gray-300 overflow-y-auto mb-8 text-gray-600 focus:outline-none">

                            </div>


                            <div class="relative mb-5 mt-2">
                                <input id="message"
                                    class="mb-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded-lg border"
                                    placeholder="Commentaire" />
                            </div>
                       
                        <div class="flex items-center justify-start w-full">
                            <button onclick="sendmsg()"
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                            <button
                                class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                                onclick="modalHandler()">Cancel</button>
                        </div>
                        <button
                            class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                            onclick="modalHandler()" aria-label="close modal" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
    </div>
    </dh-component>

    </div>
    </div>



    <script>
        var globalid;

            
        function loadscreen(id) {
            var ajaxjdida = new XMLHttpRequest();
            ajaxjdida.open("GET", "respnose.php?id=" + id, true);
            ajaxjdida.onreadystatechange = () => {
                if (ajaxjdida.status === 200) {
                    document.querySelector(".messagecontainer").innerHTML = ajaxjdida.responseText;

                }
            }
            ajaxjdida.send()
        }

        function showmessages(element) {
            console.log("hi")
            localStorage.setItem("imad",element.getAttribute("key"));
            var idtickkket = element.getAttribute("key");
            console.log(idtickkket);
            globalid = idtickkket;
            document.querySelector("dh-component").classList.remove("hidden");
        
            var ajaxjdida = new XMLHttpRequest();
            ajaxjdida.open("GET", "respnose.php?id=" + idtickkket, true);
            ajaxjdida.onreadystatechange = () => {
                if (ajaxjdida.status === 200) {
                    document.querySelector(".messagecontainer").innerHTML = ajaxjdida.responseText;

                }
            }
            ajaxjdida.send()
        }
        var message = document.getElementById("message");
        function sendmsg(event) {
            if (message.value != "") {
                var khawla = new XMLHttpRequest();
                khawla.open("POST", "savemessage.php", true)
                khawla.onreadystatechange = () => {
                    // window.location.reload();
                    loadscreen(localStorage.getItem("imad"));
                    message.value = "";
                }
                var data = {
                    "message": message.value,
                    "id": globalid
                }
                khawla.send(JSON.stringify(data))
            }
        }
        let modal = document.getElementById("modal");
        function modalHandler(val) {
            document.querySelector("dh-component").classList.add("hidden");
        }
        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }
        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>

        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
            integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

        <script>

            var chartOne = document.getElementById('chartOne');
            var myChart = new Chart(chartOne, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var chartTwo = document.getElementById('chartTwo');
            var myLineChart = new Chart(chartTwo, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

    </body>
    </html>
    <?php
} else {
    // Handle the case where the ticket data is not found
    echo 'Ticket not found.';
}
?>