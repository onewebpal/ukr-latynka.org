<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.5/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <meta name="description" content="Абетка української латинки, конвертер, правила української латинки, розкладка клавіатури, поширенні запитання та сфери використання"/>
	<link rel="canonical" href="https://www.ukr-latynka.org/"/>
	<meta property="og:locale" content="uk_UA"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Українська латинка - Українська латинка"/>
	<meta property="og:description" content="Абетка української латинки, конвертер, правила української латинки, розкладка клавіатури, поширенні запитання та сфери використання"/>
	<meta property="og:url" content="https://www.ukr-latynka.org/"/>
	<meta property="og:site_name" content="Українська латинка"/>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Українська латинка</title>
</head>


<body x-data="switchTheme()" 
        :class="[darkMode ? 'ui-dark-theme' : 'ui-light-theme']">
    <header>
    </header>

    <div class="l-container">
        <div class="c-theme-switch" @click="toggleTheme()">
        <div class="c-theme-light-icon"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></div>
        <div class="c-theme-dark-icon"><i class="fa fa-moon-o" aria-hidden="true"></i></div>
        <div class="c-theme-switch__toggle"></div>
    </div>
        
    <footer>

    </footer>
    </div>
</body>




</html>