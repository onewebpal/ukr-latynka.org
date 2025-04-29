
<!-- id="translateContent" -->


<!DOCTYPE html>
<html lang="ua">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css?ver=<?php echo time();?>">
    

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
    <!-- <link rel="manifest" href="/site.webmanifest"> -->
    <title class = "translate">Українська латинка</title>
    
</head>


<body>

    
    <header class="d-flex flex-column" >
        <div class="d-flex logo-social-block">
            <section class="logo_header">
                <a href="">
                    <img class="main_logo" id="main_logo" src="logo-dark.svg" alt="">
                </a>
            </section>

            <section class="socials-buttons-block">
                <div class="d-flex socials-block">
                    <div class="social_block">
                        <a href="https://t.me/latynka_ukr">
                            <img class="social-icon" src="icons/telegram.svg" alt="">
                            <span>Telegram</span>
                        </a> 
                    </div>
                    <div class="social_block">
                        <a href="https://www.youtube.com/watch?v=nHeE2x2UNw4">
                            <img class = "social-icon" src="icons/youtube.svg" alt="">
                            <span>YouTube</span>
                        </a> 
                    </div>
                </div>

                <div class="buttons-block">
                    <span class = "changerLang" value="lat" id="lat" onclick="changeLang('lat')">A-Z</span>
                    <span class = "changerLang" value="kyr" id="kyr" onclick="changeLang('kyr')">А-Я</span>

                    <?php
                        if (isset($_GET["lang_now"])) {
                            $act_lang = $_GET["lang_now"];
                            // Завантажуємо центральний файл з мовами
                            $langArray = require 'locale/languages.php';
                            $translatedTexts = [];
                            foreach ($langArray as $original => $translations) {
                                // Перевіряємо, чи існує переклад для вибраної мови
                                if (isset($translations[$act_lang])) {
                                    $translatedTexts[$original] = $translations[$act_lang];
                                }
                            }
                            // Встановлюємо заголовок для JSON-відповіді
                            header("Content-Type: application/json");
                            ob_clean();
                            echo json_encode($translatedTexts, JSON_UNESCAPED_UNICODE);
                            flush();
                            exit;
                        }
                    ?>
                        
                    <div class="theme-changer" onclick=changeTheme()>
                        <div class = ""><img class = "theme-changer-icon" src="icons/light.svg" alt=""></div>
                        <div class="switcher light-theme-switcher" id = "switcher"></div>
                        <div class=""><img class="theme-changer-icon" id="night-icon" src="icons/night.svg" alt=""></div>
                    </div>
                </div>
            </section>
        </div>
    </header>

    
    <section class="main-block" id = "translateContent" >
        <div class="d-flex navigation-block">
            <nav class="navigation-tag">
                <ul class="navigation-menu">
                    <li class="nav-element"><a href = "#converter" class="translate">конвертер</a></li>
                    <li class="nav-element"><a href="#dljačogo" class="translate">для чого нам латинка</a></li>
                    <li class="nav-element"><a href="#abetka" class="translate">абетка</a></li>
                    <li class="nav-element"><a href="#korysniZastosunky" class="translate">корисні застосунки</a></li>
                </ul>
            </nav>
        </div>
        <div id = "up_button" onclick="goUp()">↑</div>
        <div class="title">
            <h1 class="h1 translate" >Українська латинка</h1>
            <p class="subtitle translate">сучасно, зручно, інтуїтивно</p>
        </div>
    
        <div id="converter">
            <div id="changebutton" align="center">
                <button type="button" id="latukr" class="btn btn-primary" onclick="change()">кир->лат</button>
            </div>
            <div class = "primary_inputs">
                <div id="translator" class="translator_input">
                    <textarea id="input" rows="4" cols="50" placeholder="Введіть свій текст кирилицею та натисніть 'Змінити' або CTRL + ENTER"></textarea>
                </div>
                <div id="mobbutton">
                    <button type="button" id="submitmob" class="btn btn-success" onclick="mainFunction()">змінити</button>
                </div>
                <div class = "translator_input">
                    <textarea id="output" readonly rows="4" cols="50"></textarea>
                </div>
            </div>
    
            <div id="button_block">
                <button type="button" id="clear" class="btn btn-secondary" onclick="clearTextArea()">очистити</button><br />
                <button type="button" id="submit" class="btn btn-success" onclick="mainFunction()">змінити</button><br />
                <button type="button" id="copytext" class="btn btn-info" onclick="copytoCipboard()">копіювати</button>
            </div>
            </div>
        </div>
    
        <div class = "content" id = "dljačogo">
            <h2 class="h2 translate">Для чого українцям латинка?</h2>
            <hr>
            <div>
                <ul>
                    <li class = "accordion-list">
                        <span class="accordion translate">Негативний імідж кирилиці у світі</span>
                        <span class="panel translate">Більш ніж половина користувачів кирилиці — росіяни. Попри те що кирилицю винайшли та вперше використали болгари, переважна частина іноземців називає кирилицю «російська абетка» або «російські літери». Для них українці, які використовують «російську абетку», закономірно є частиною «російського світу», а не Європи, яка майже вся пише латинкою. Через деструктивні дії росіян імідж кирилиці у світі вкрай негативний. До текстів, написаних «російськими літерами», ставляться вороже. На жаль, змінити абетку значно простіше, ніж пояснити всій планеті, що кирилицю винайшли болгари.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate">Лідер серед слов’ян, які використовують латинку</span>
                        <span class="panel translate">Якщо запровадити латинку, українська мова стане лідером (поряд із польською) за кількістю носіїв серед слов’янських мов з латинською абеткою.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate">Іноземні інвестиції</span>
                        <span class="panel translate">Латинка полегшить вивчення української мови іноземцями, що за сприятливих умов для ведення бізнесу збільшить іноземні інвестиції в українську економіку. Ми станемо зрозуміліші цивілізованим країнам, адже латинські літери вміє читати вся планета.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Порозуміння з іншими слов’янами</span>
                        <span class="panel translate">Поляки, чехи, словаки, словенці, македонці та хорвати зможуть читати та розуміти українські тексти, як-от наші новини, жарти або українську історію, що швидко зблизить нас і зробить «своїми» в європейській слов’янській спільноті.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Менше російського вмісту для дітей</span>
                        <span class="panel translate">По-перше, діткам, які вчитимуться писати латинкою, буде легше вивчити англійську та інші міжнародні мови. А по-друге, вони робитимуть запити в пошуковиках латинкою, що зменшить кількість російської пропаганди, російської музики та російських блогерів у їхньому інформаційному просторі.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" id = "poštovh">Поштовх до розвитку та осучаснення нашої мови</span>
                        <span class="panel translate">Після переходу на латинку слова іншомовного походження, які нині засмічують нашу мову (наприклад, скопіпастити, загуглити, хейтити, креативний, лайкати, булінг тощо), стане незручно використовувати. Тоді ми побачимо, що українська мова потребує власних слів для новітніх речей та явищ. Мова осучасниться, адже тепер виникне потреба. І одного дня ми нарешті почнемо називати баскетбол кошиківкою, а саме так нині роблять слов’яни, які пишуть латинкою, наприклад поляки та хорвати.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Кращий зовнішній вигляд (дизайн) усіх написів українською</span>
                        <span class="panel translate">Дизайнери, як ніхто інший, відчувають потребу використовувати латинську абетку, адже гарних шрифтів, які підтримують кирилицю, катма. Перехід на латинку дасть поштовх до розвитку й нашій творчій галузі.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Один уклад клавіатури</span>
                        <span class="panel translate">Усі, хто працює з іноземцями, знають, як дратує постійне перемикання укладів. Особливо коли треба переписувати текст наново. Після переходу на латинку ми нарешті зможемо не перемикатися між українським та англійським укладами клавіатури.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" id = "bezpeka">Безпека</span>
                        <span class="panel translate">Обираючи між різними абетками, ми маємо враховувати історичні події навколо України та обрати інакшу від абеток наших найбільших сусідів, а це Росія (кирилиця), Польща (латинка) і Туреччина (латинка). Саме тому проєкт української латинки Максима Прудеуса розроблений на основі хорватської абетки. Нею послуговуються слов’яни, які живуть аж на кордоні з Італією.</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class = "content">
            <h2 class="h2 translate">Відповіді на поширені запитання про латинку</h2>
            <hr>
            <div>
                <ul>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Ми втратимо свою історію, якщо перейдемо на латинку?</span>
                        <span class="panel">
                            <p class = "translate">Це дуже маніпулятивне запитання, адже одне не виключає іншого. Не можна відмовитися від історії, змінивши абетку. Ось ідентичне маніпулятивне запитання: якщо в нас народиться друга дитина, то чи зникне перша? Очевидно, що ні. Навіть якщо у вас змінився партнер, обидві дитини однаково ваші. Це все — ваше минуле.</p>
                            <p class = "translate">Історію неможливо видалити, запровадивши нову абетку. Абетка — це лише одяг для будь-якої мови. Якщо ви змінюєте одяг, ви залишаєтеся тою самою людиною з тією ж історією. Змінюється за такої умови тільки ваш зовнішній вигляд, тобто те, як вас сприймають інші.</p>
                            <p class = "translate">Хорвати, наприклад, користувалися власною версією глаголиці, але перейшли на латинку. Тепер вони встановлюють пам’ятники літерам із глаголиці та продають свою «квадратну» глаголицю як сувеніри. Їхня історія залишилася їхньою історією. І таких прикладів дуже багато. Норвежці, шведи й данці нині пишуть латинкою, але руни є їхньою історією. Вона нікуди не зникла й не стерлася зі зміною абетки. Аналогічно й петрогліфи Кам’яної могили нині є українською історією незалежно від того, якою абеткою ми з вами тепер пишемо.</p>
                        </span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Ми втратимо свою культуру, адже вся українська література написана кирилицею?</span>
                        <span class="panel translate">Ми не втратимо своєї культури після переходу на латинку, як і нашої історії: це неможливо. Усі потрібні нам у майбутньому кириличні тексти легко адаптуються за допомогою штучного інтелекту вже сьогодні. Їх не треба переписувати чи передруковувати вручну. Приклад такого «автоматичного перекладача» вже працює на цьому сайті. До того ж тексти українських класиків уже давно адаптують до чинної версії української кирилиці. Ми не читаємо їх в оригіналі. Котляревський, Сковорода, Франко та Шевченко не писали на 100 % так, як ми читаємо їх тепер. Тож нічого нового: ми як адаптували твори наших класиків до чинної абетки та правопису, так і адаптуватимемо, але робитимемо це не кирилицею, а латинкою.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Наші діти не зможуть прочитати графіті на стінах Софії Київської?</span>
                        <span class="panel translate">Це теж маніпуляція, тому що без фахової освіти їх не зможете прочитати й ви. Однак ніхто не забороняє нам запровадити в усіх школах факультатив із вивчення давньоукраїнської кирилиці для дітей 5–6 класів і заразом звозити їх у собор, щоби почитати графіті на стінах.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" id = "cyrylicja">Кирилиця — ідеальна абетка для української мови?</span>
                        <span class="panel translate"><p><span class = "translate">На жаль, це не так. По-перше, не всі звуки в ній подані логічно. Наприклад, літери Я, Ю, Є та Ї позначають два звуки або один із пом’якшенням попереднього приголосного, що можна записати відповідно літерами ЙА/ЬА, ЙУ/ЬУ, ЙЕ/ЬЕ, ЙІ/ЬІ, а про літеру Ё в українській кирилиці забули. І ми чомусь пишемо ЙО або ЬО замість Ё. Ми звикли писати</span> ц<strong>ьо</strong>го, <strong>йо</strong>го <span class = "translate">тощо, а логічно було б писати</span> <strong>цё</strong>го та <strong>ё</strong>го. <span class = "translate">Ми ж не пишемо</span> <strong>ць</strong>а <span class = "translate">та</span> <strong>йа</strong>ма <span class = "translate">замість</span> ц<strong>я</strong> <span class = "translate">та</span> <strong>я</strong>ма, <span class = "translate">правда?</span></p>
                        <p class = "translate">По-друге, кирилиця важче читається, адже має багато схожих «квадратних» літер, які складніше розрізняти.</p>
                        <p class = "translate">По-третє, кириличні тексти займають більше місця, ніж написані латинкою, що збільшує витрати на друк.</p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Чому українці мають змінювати абетку й підлаштовуватися під іноземців?</span>
                        <span class="panel"><span class = "translate">Не варто називати перехід на латинку підлаштовуванням під потреби іноземців, адже такий перехід — це насамперед інвестиція в інтересах українців. Більше можна прочитати в розділі </span><a href="#dljačogo" class = "translate">«Для чого українцям латинка?».</a></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Україна — православна країна, а всі православні пишуть кирилицею?</span>
                        <span class="panel translate">Переважна більшість українців дійсно православна. Ми переконані, що Православна церква України підтримає осучаснення української абетки. Наприклад, мусульмани в Туреччині пишуть латинкою, так само як і мешканці Ватикану. Це нікому з них не заважає.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Треба зробити англійську другою державною, а не переходити на латинку?</span>
                        <span class="panel"><span class = "translate">Державний статус англійської мови, як і збільшення кількості англомовного вмісту в Україні, загрожує існуванню української мови. Наочним прикладом тут може бути історія зникнення ірландської мови в Ірландії. А от перехід на латинку — це лише зміна абетки (зовнішньої форми), яка, навпаки, дасть </span><a href="#poštovh" class = "translate">поштовх до розвитку та осучаснення української мови.</a></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Латинка змінить українську мову?</span>
                        <span class="panel translate">Проєкт української латинки Максима Прудеуса не змінює вимови українських слів. Абетку розроблено відповідно до мовних традицій,а не навпаки. Поряд із «правилом дев’ятки» абетка закріплює твердість приголосних у деяких словах іншомовного походження.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Немає прикладів, коли перехід на латинку позитивно вплинув на розвиток країни?</span>
                        <span class="panel translate">Швеція, Данія, Норвегія, Туреччина, Хорватія та багато інших країн відмовилися від застарілих абеток на користь латинки.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Перехід на латинку потребує багато витрат?</span>
                        <span class="panel translate">Витрати — це те, що не окуповується та не дає прибутку. Тому перехід на латинку — це не витрати. Це радше внесок у майбутнє, який не лише убезпечить українців від розчинення в інших етносах, а й принесе фінансовий зиск від туризму та іноземних інвестицій в економіку України. До того ж перехід на латинку необов’язково оплачувати тільки українцям. Наші європейські партнери своїми грантами можуть допомогти нам здійснити такий перехід, адже це в наших спільних інтересах.</span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Вчитися писати й читати латинкою дуже довго?</span>
                        <span class="panel"><span class = "translate">Переважна більшість глядачів після перегляду сорокахвилинного </span><a href="https://www.youtube.com/watch?v=nHeE2x2UNw4" class = "translate">відео Максима Прудеуса на ютубі</a><span class = "translate"> пише латинкою без помилок. Отже, потрібна лише одна година, щоби перейти на латинку: сорок хвилин на перегляд відео і двадцять хвилин на практику.</span></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Зрілому поколінню буде дуже важко?</span>
                        <span class="panel"><span class = "translate">Наприкінці ХХ століття українці писали смс переважно латинкою, тому для зрілого покоління такий перехід не буде складним. Це підтверджують і коментарі від літніх людей під </span><a class = "translate" href="https://www.youtube.com/watch?v=nHeE2x2UNw4">відео Максима на ютубі</a></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Чим погана офіційна транслітерація, як у паспорті?</span>
                        <span class="panel"><p><span class = "translate">По-перше, її неправильно читають.</span> <i>Oleh</i><span class = "translate"> читають як Олех або взагалі як Олей. Слово holod — це </span><strong>х</strong><span class = "translate">олод чи </span><strong>г</strong><span class = "translate">олод? А holodomor як прочитати? Це риторичні запитання щодо проблем «паспортної» транслітерації. По-друге, офіційна «паспортна» транслітерація робить слова надзвичайно довгими.</span></p>
                        <p class = "translate">Так, слово борщ перетворюється на borshch, а якщо — на yakshcho. Проєкт української латинки Максима Прудеуса розв’язує ці проблеми.</p></span>
                    </li>
                </ul>
            </div>
        </div>
        <div class = "content" id = "abetka">
            <h2 class="font-gold translate">Абетка</h2>
            <hr>
            <div class = "img_wrapper">
                <img src="ABETKA.svg" alt="">
            </div>
        </div>
        <div class = "content">
            <h2 class="h2 translate">Правила вживання латинки</h2>
            <hr>
            <div>
                <span class="text-p"><p class = "translate">Цю абетку розроблено для того, щоб максимально спростити перехід з кирилиці на латинку.</p>
                <p class = "inner_p"><span class = "translate">Під час розроблення автор керувався </span><strong><span class = "translate">трьома критеріями ефективності</span></strong>.
                <span class = "translate">Українська латинка має:</span></p>
                <p class = "inner_p translate">1) відповідати традиції мовлення;</p>
                <p class = "inner_p translate">2) бути інтуїтивно зрозумілою;</p>
                <p class = "inner_p translate">3) бути зручною для друкування.</p>
                <p><span class = "translate">Працюючи над проєктом, автор виявив </span><a href = "#cyrylicja" class = "translate">недоліки кирилиці</a><span class = "translate">, а також дійшов висновку, що </span><a href="#apostrof" class = "translate">апостроф і м’який знак можна позначати однаково.</a></p>
                <p><span class = "translate">Зрештою чинний проєкт абетки Максима Прудеуса має лише одне правило:</span> <strong><span class = "translate">між приголосним і J апостроф розділяє, в усіх інших випадках — пом’якшує.</span></strong>
                <span class = "translate">Усе інше читається та друкується інтуїтивно й не потребує додаткового роз’яснення.</span></span></p>
            </div>
        </div>
        <div class = "content">
            <h2 class="font-gold translate">Поширені запитання щодо абетки та правопису</h2>
            <hr>
            <div>
                <ul>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Якими літерами позначають голосні звуки?</span>
                        <span class="panel smaller_panel translate"><p><strong><span class  = "translate">Кирилична</span> А</strong> — <span class = "translate">це</span> A, <strong>І</strong> — <span class = "translate">це</span> I, <strong>У</strong> — <span class = "translate">це</span> U, <strong>И</strong> — <span class = "translate">це</span> Y, <strong>О</strong> — <span class = "translate">це</spann> O, а <strong>Е</strong> — <span class = "translate">це</span> E.
                        <span class = "translate">Це просто.</span></p>
                        <p><strong>Я, Ю, Є</strong> <span class = "translate"> та Ї позначають кілька звуків, які можна записати окремими літерами.</span></p>
                        <p><strong>Я</strong> — ЙА <span class = "translate">або</span> ЬА</p>
                        <p>(ЙАблуко <span class = "translate">та</span> цЬАтка — <strong>я</strong>блуко <span class = "translate">та</span> ц<strong>я</strong>тка);</p>
                        <p><strong>Ю</strong> — ЙУ <span class = "translate">або</span> ЬУ</p>
                        <p>(ЙУний <span class = "translate">та</span> менЬУ — <strong>ю</strong>ний <span class = "translate">та</span> мен<strong>ю</strong>);</p>
                        <p><strong>Є</strong> — ЙЕ <span class = "translate">або</span> ЬЕ</p>
                        <p>(ЙЕдиний <span class = "translate">та</span> мужнЬЕ — <strong>є</strong>диний <span class = "translate">та</span> мужн<strong>є</strong>);</p>
                        <p><strong>Ї</strong> — ЙІ</p>
                        <p>(ЙІжа — <strong>ї</strong>жа).</p>
                        <p><span class = "translate">Але ж є ще</span> ЙО <span class = "translate">або</span> ЬО<span class = "translate">, для яких у кирилиці окремої літери немає.</span></p>
                        <p class = "translate">Про неї забули! А мало би бути так:</p>
                        <p><strong>Ё</strong> — ЙО <span class = "translate">або</span> ЬО</p>
                        <p>(ЙОго <span class = "translate">та</span> цЬОго — <strong>ё</strong>го <span class = "translate">та</span> ц<strong>ё</strong>го).</p>
                        <p class = "translate">Саме цей недолік кирилиці спричиняє найбільшу проблему під час переходу на латинку. Українська кирилиця має помилку, яка створює всім труднощі. У результаті дослідження автор дійшов висновку, що для спрощення переходу на латинку літери Я, Ю, Є, Ї та Ё (йо/ьо) потрібно замінити відповідно:</p>
                        <p><strong>Я — ja</strong> (яблуко <span class = "translate">та</span> цятка = jabluko ta cjatka);</p>
                        <p><strong>Ю — ju</strong> (юний <span class = "translate">та</span> меню = junyj ta menju);</p>
                        <p><strong>Є — je</strong> (єдиний <span class = "translate">та</span> мужнє = jedynyj ta mužnje);</p>
                        <p><strong>Ї — ji</strong> (їжа = jiža);</p>
                        <p><strong>Ё — jo</strong> (його <span class = "translate">та</span> цього = jogo ta cjogo).</p>
                        <p><span class = "translate">Більше про те, чому обрані саме такі варіанти для позначення, можна прочитати в розділі </span><a href="#apostrof?" class = "translate">про апостроф.</a></p>
                    </span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Якими літерами позначають приголосні звуки?</span>
                        <span class="panel"><p><strong><span class = "translate">Кирилична</span> В</strong> <span class = "translate">має два варіанти прочитання, які відповідають латинським V та W. Мета цієї латинки — бути максимально простою, тому автор залишив тільки одну літеру для позначення обох звуків (так само як у кирилиці є тепер). І ця літера V, адже вона займає менше місця в тексті.</span></p>
                        <p class = "translate">Наприклад: Володимир — Volodymyr, вчора — včora.</p>
                        <p><strong><span class = "translate">Кириличну</span> Г</strong> <span class = "translate">українці читають інакше від росіян, хоча пишуть так само. Цей випадок дуже нагадує латинську літеру R, яку французи, німці, англійці та італійці пишуть однаково, а читають інакше — кожен на свій лад. Тому немає потреби щось ускладнювати. Ми просто передаємо Г як G.</span></p>
                        <p><span class = "translate">Наприклад: голод — це golod, а холод — це holod.</span></p>
                        <p id = "literaG"><strong><span class = "translate">Кириличну</span> Ґ</strong> <span class = "translate">(тобто Г з діакритиком) ми пишемо аналогічно: це Ĝ (тобто G з діакритиком).</span></p>
                        <p><span class = "translate">Наприклад:</span> ґрати — ĝraty, грати — graty.</p>
                        <p class = "translate">Усе просто та інтуїтивно зрозуміло.</p>
                        <p><strong><span class = "translate">Кирилична</span> Д</strong> <span class = "translate">стає латинською</span> D.</p>
                        <p><strong><span class = "translate">Кирилична</span> З</strong> <span class = "translate">стає латинською</span> Z.</p>
                        <p><strong><span class = "translate">Кирилична</span> Ж</strong> <span class = "translate">стає латинською</span> Ž.<span class = "translate"> Так Ж позначають у всіх абетках, які походять від чеської абетки Яна Гуса. А це більшість слов’янських латинок.</span></p>
                        <p><span class = "translate">Наприклад:</span> жало — žalo, жовтий — žovtyj.</p>
                        <p><strong><span class = "translate">Кирилична</span> Й</strong> <span class = "translate">стає J. Саме так йот позначають у більшості мов, для яких використовують латинку.</span></p>
                        <p><span class = "translate">Наприклад:</span> червоний — červonyj, красний — krasnyj.</p>
                        <p><strong><span class = "translate">Кирилична</span> К</strong> <span class = "translate">стає</span> K, <strong>Л</strong> <span class = "translate">стає</span> L, <strong>М</strong> <span class = "translate">стає</span> M, <strong>Н</strong> <span class = "translate">стає</span> N, <strong>П</strong> <span class = "translate">стає</span> P, <strong>Р</strong> <span class = "translate">стає</span> R, <strong>С</strong> <span class = "translate">стає</span> S, <strong>Т</strong> <span class = "translate">стає</span> T, а <strong>Ф</strong> <span class = "translate">стає</span> F<span class = "translate">. Тут усе інтуїтивно, адже інакше просто не може бути.</span></p>
                        <p><span class = "translate">Наприклад:</span> крокодил — krokodyl, форма — forma, нота — nota.</p>
                        <p><strong><span class = "translate">Кирилична</span> Х</strong> <span class = "translate">стає</span> H. <span class = "translate">Чому так, пояснено вище в </span><a href="#literaG"><span class = "translate">частині про літеру</span> Г</a>. <span class = "translate">Отже</span>, холод — <span class = "translate">це</span> holod, а голод — <span class = "translate">це</span> golod. <span class = "translate">Усе інтуїтивно зрозуміле й не потребує додаткових правил.</span></p>
                        <p><strong><span class = "translate">Кирилична</span> Ц</strong> <span class = "translate">стає</span> C. <span class = "translate">Саме так її пишуть у більшості мов.</span></p>
                        <p><span class = "translate">Наприклад:</span> цинк — cynk, цифра — cyfra, цей — cej, цятка — cjatka.</p>
                        <p><strong><span class = "translate">Кирилична</span> Ч</strong> <span class = "translate">стає</span> Č. <span class = "translate">Так її позначають у всіх абетках, що походять від чеської. Це дуже логічно, адже якщо ви спробуєте прочитати літеру Ц значно глухіше, ніж зазвичай, то ви отримаєте Ч. Трикутник над літерою Č ніби показує правильний напрям вимови. Така логіка діє для всіх літер з діакритиком у цій абетці.</span></p>
                        <p><span class = "translate">Наприклад:</span> чинний — čynnyj, час — čas, чарка — čarka.</p>
                        <p><strong><span class = "translate">Кирилична</span> Ш</strong> <span class = "translate">стає</span> Š. <span class = "translate">Діакритик вказує напрям вимови. Нам потрібно оглушити звук S, щоб отримати Š. Це також відповідає всім латинським абеткам, які походять від чеської, зокрема хорватській гаєвиці.</span></p>
                        <p><span class = "translate">Наприклад:</span> школа — škola, шахи — šahy, шинок — šynok.</p>
                        <p><strong><span class = "translate">Кирилична</span> Щ</strong> <span class = "translate">стає</span> ŠČ. <span class = "translate">Саме таке написання нарешті зумовить правильне прочитання цієї літери. В українській мові Щ позначає два тверді звуки [шч], тому Щ — це ŠČ.</span></p>
                        <p><span class = "translate">Наприклад:</span> борщ — boršč, щоб — ščob, щиро — ščyro.</p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" id = "apostrof?">Чи потрібен апостроф?</span>
                        <span class="panel translate"><p><span class = "translate">Апостроф потрібен. Автор розглядав варіанти з різним позначенням літер </span><strong>Я, Ю, Є, Ї</strong> <span class = "translate">та</span> <strong>Ё</strong> <span class = "translate">після приголосного, наприклад</span> ця — c’a, цього — c’ogo або ця — cia, цього — ciogo, <span class = "translate">й відкинув їх.</span></p>
                        <p class = "translate">По-перше, у цьому просто немає потреби, це ускладнює. А по-друге, якщо писати ця як c’a замість cja, s’omga замість sjomga, zl’us’a замість zljusja, то:</p>
                        <p class = "translate">1) слів з апострофами (як-от zl’us’a) стане в десятки разів більше, адже слів з йотованими та пом’якшеними значно більше за слова, де дійсно потрібен апостроф;</p>
                        <p class = "translate">2) читати та писати стане складніше;</p>
                        <p class = "translate">3) друкувати стане повільніше, адже апострофи сповільнюють, особливо на смартфонах;</p>
                        <p class = "translate">4) текст із купою апострофів матиме жахливий вигляд.</p>
                        <p class = "translate">Якщо ж писати ця як cia, а не cja, siomga, а не sjomga, zliusia, а не zljusja, то:</p>
                        <p><span class = "translate">1) слова klaviatura, funkcional, avianosec’, proviant, čempion, dializ (і такі інші) стають словами</span> клавятура, функцьонал, авяносець, провянт, чемпьон, дяліз;</p>
                        <p class = "translate">2) треба додати нові правила до правопису, щоб уникнути неправильного прочитання;</p>
                        <p class = "translate">3) навіть за новими правилами часто читатимуть ІА (іа), а не Я (ja), тобто втрачається інтуїтивність;</p>
                        <p><span class = "translate">4) логіка абетки стає схожою на польську, а не на хорватську. У розділі </span><a href="#bezpeka" class = "translate">«Безпека»</a><span class = "translate"> йдеться про те, чому цього варто уникати.</span></p>
                        <p class = "translate">Отже, для апострофа в цій абетці є лише одне правило:</p>
                        <p><strong><span class = "translate">між приголосним і J апостроф розділяє, в усіх інших випадках пом’якшує.</span></strong></p>
                        <p><span class = "translate">Наприклад:</span></p>
                        <p>пам’ятати — pam’jataty, серйозний — ser’joznyj, об’єкт — ob’jekt, курйоз — kur’joz, Соловйов — Solov’jov тощо.</p>
                        </span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" id = "apostrof">Апостроф і м’який знак тепер плутатимуть?</span>
                        <span class="panel"><p><span class = "translate">Переплутати прочитання досить складно, адже в українських словах випадки вживання апострофа та м’якого знака не перетинаються. </span><strong><span class = "translate">Між приголосним і J апостроф завжди розділяє, а в усіх інших випадках — пом’якшує.</span></strong></p>
                        <p><span class = "translate">Винятком є слова іншомовного походження, наприклад</span> мільйон — mil’jon, конферансьє — konferans’je, бульйон — bul’jon <span class = "translate">тощо.</span></p>
                        <p class = "translate">У цих запозичених словах автор абетки пропонує вимовляти приголосний, що стоїть перед апострофом, твердіше, адже це доповнює чинний український правопис, який містить «правило дев’ятки». Це правило застосовується до слів іншомовного походження й вимагає читати в них приголосні твердо.</p>
                        <p class = "translate">Наприклад, за чинним правописом чип — мікросхема, а чіп — пробка.</p>
                        <p><span class = "translate">Автор не виключає й варіанта вимови слів мільйон і конферансьє так, як є тепер. На запропоновану абетку це жодним чином не вплине. Mil’jon і konferans’je в обох випадках прочитання пишуться однаково. Але якщо читати їх як тепер (тобто м’яко), то додається виняток до правила з апострофом. І воно звучатиме так: </span><strong><span class = "translate">між приголосним і J апостроф розділяє, в усіх інших випадках — пом’якшує; виняток: апостроф пом’якшує у словах іншомовного походження, коли пишеться після м’яких D, T, Z, S, L, N перед J: ad’je, konferans’je, monpans’je, pas’jans, atel’je, barel’jef, batal’jon, mil’jard, mil’jon, buton’jerka, vin’jetka, kan’jon тощо.</span></strong><span class = "translate"> Усе відповідно до мовної традиції. Але трошки складніше.</span></p>
                        <p class = "translate">Варто також зазначити, що нині ми не вимовляємо приголосні перед апострофом ідеально твердо. Це стосується, наприклад, слів об’єкт, кур’єр, серйозний, пам’ятати й таких інших. Саме тому, на думку автора проєкту, є сенс позначати апостроф і м’який знак однаково.</p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Для чого нам літери з діакритиком?</span>
                        <span class="panel"><p><span class = "translate">Для полегшення переходу на латинку в цьому проєкті використана мінімально можлива кількість літер з діакритиком. Кожна така літера — це ускладнення для прочитання, друкування та вивчення мови. У наявній абетці їх лише чотири: це літери </span><strong>č, š, ĝ</strong> <span class = "translate">та</span> <strong>ž</strong><span class = "translate">. Запропоновані діакритики дають змогу зменшити кількість літер у деяких словах порівняно із чинною «паспортною» транслітерацією.</span></p>
                        <p class = "translate">Наприклад:</p>
                        <p>борщ — boršč — borshch;</p>
                        <p>якщо — jakščo — yakshcho;</p>
                        <p>Чернівці — Černivci — Chernivtsi тощо.</p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Чому не можна позначати літеру Я (і такі інші) як JA на початку слів та IA або ’A після приголосних?</span>
                        <span class="panel translate"><p><span class = "translate">Це створює додаткові правила, а тому ускладнює процес переходу з кирилиці на латинку. Детальна відповідь є в розділі </span><a href="#apostrof?" class = "translate">про апостроф.</a></p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Чому ми пишемо Г як G, а не як H?</span>
                        <span class="panel"><p class = "translate">Тому що саме так ми нині пишемо кирилицею. Ми пишемо літеру Г так само, як в інших мовах, але читаємо її інакше. Це наша мовна традиція. Те саме відбувається з прочитанням літери R у французькій, англійській, німецькій та італійській мовах. Усі ці народи пишуть літеру R однаково, а читають інакше.</p>
                        <p class = "translate">Тому маємо писати:</p>
                        <p class = "translate">knjagynja Ol’ga, а <span class = "translate">не</span> kniahynia Olha;</p>
                        <p>knjaz’ Oleg, а <span class = "translate">не</span> kniaz Oleh;</p>
                        <p>Golodomor, а <spam class = "translate">не</spam> Holodomor, <span class = "translate">адже</span> holod і golod — <span class = "translate">це різні слова</span>.</p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Чому в цьому проєкті немає літери Ї?</span>
                        <span class="panel translate"><p class = "translate">Літера Ї не унікальна для української мови. Нею послуговуються французи, англійці, каталонці, нідерландці та навіть греки. Вона трапляється не лише у словах Україна та Київ, а також в інших міжнародних власних назвах, як-от: Hawaї, Zaїre, Dubaї, Hanoї, Haїfa тощо. Автор проєкту не рекомендує вживати літеру Ї з трьох причин:</p>
                        <p class = "translate">1. Потрібна окрема клавіша на укладі, і літер з діакритиком стане більше.</p>
                        <p class = "translate">2. Порушується логіка абетки. Якщо ми залишаємо Ї, то логічно було б залишити або знайти відповідники також для літер Я, Ю, Є та Ё. А це вже 5 нових літер з діакритиком.</p>
                        <p><span class = "translate">3. Введення Ї ускладнює єдине правило цієї абетки (правило вживання апострофа), яке без Ї звучить максимально просто:</span> <strong><span class = "translate">між приголосним і J апостроф розділяє, в усіх інших випадках — пом’якшує.</span></strong> <span class = "translate">Проте, якщо суспільство наполягатиме на збереженні літери Ї як чинної української писемної традиції, автор абетки, попри наведені вище рекомендації, не заперечуватиме.</span></p></span>
                    </li>
                    <li class = "accordion-list">
                        <span class="accordion translate" >Як писати іншомовні слова?</span>
                        <span class="panel"><p class = "translate">Це питання окремого великого дослідження незалежно від того, яку саме версію латинки ми будемо використовувати.</p>
                        <p class = "translate">Автор пропонує не транслітерувати на наш лад тільки імена та інші власні назви. Тобто латинкою ми пишемо їх так, як є в оригіналі: George Bush, Jack Black, Joe Biden, Emmanuel Macron, Olaf Scholz, Google, YouTube, Twitter, McDonald’s, Windows, Apple, New York, Riga, Madrid, Miami, Seville, Chicago, London, Berlin, Bucharest тощо.</p>
                        <p class = "translate">У назвах міст будуть і винятки через нашу певну традицію. Наприклад: Viden’, а не Wіеn; Paryž, а не Paris; Varšava, а не Warsaw тощо.</p>
                        <p class = "translate">Для решти іншомовних слів рекомендовано використовувати українські відповідники: mavpuvaty замість kopіpastyty, c’kuvaty замість bulyty, kerivnyk замість menedžer, košykivka замість basketbol тощо.</p>
                    </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class = "content" id = "korysniZastosunky">
            <h2 class="h2 translate">Уклади клавіатури та корисні застосунки</h2>
            <hr>
            <div>
                <div class = "applications keys">
                    <span class = "translate">Уклади клавіатури</span>
                    <div class = "win-key-icon">
                        <div>
                            <a class = "logo_block" href="files/Ukr-latynka-Win.zip">
                                <img class = "appsLogo" src="applications/win-key-logo.webp" alt="">
                                <span>WindowsXP+</span>
                            </a>
    
                        </div>
                        <div>
                                <a class = "logo_block" href="files/Ukrainian - Latynka-Mac.dmg">
                                    <img class = "appsLogo" src="applications/mac-key-icon.png" alt="">
                                    <span>MacOS</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class = "applications telegram-add">
                    <span class = "translate">Застосунки Телеграм</span>
                    <div class = "telegram-icon-all">
                        <div class = "telegram-up-icons">
                            <div class = "telegram-icon">
                                    <a class = "logo_block" href="https://t.me/ukr_lat_bot">
                                        <img class = "appsLogo" src="applications/chat-telegram-icon.png" alt="">
                                        <span class = "telegram-span translate">Бот-перекладач</span>
                                    </a>
                            </div>
                            <div class = "telegram-icon">
                                    <a class = "logo_block" href="https://t.me/addstickers/ukrlatynka">
                                        <img class = "appsLogo" src="applications/stickers-telegram-icon.png" alt="">
                                        <span class = "telegram-span translate">Наліпки для телеграм</span>
                                    </a>
                            </div>
                        </div>
                        <div class = "telegram-icon">
                                <a class = "logo_block" href="http://t.me/setlanguage/latynkau">
                                    <img class = "appsLogo" src="applications/language-telegram-logo.png" alt="">
                                    <span class = "telegram-span translate">Змінити кирилицю у телеграм на латинку</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class = "applications browser-add">
                    <span class = "translate">Застосунки для браузерів</span>
                    <div class = "browser-icon">
                            <a class = "logo_block" href="https://chrome.google.com/webstore/detail/ukrajinska-latynka-transl/dflniejibinlfcafclbjfdjlcpgkkfhe?hl=en-GB&authuser=0">
                                <img class = "appsLogo" src="applications/chrome-icon.png" alt="">
                                <span class="translate">Перекладач сторінок для Chrome</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    
    <footer class="d-flex">
        <span>
        © <a href="https://creativecommons.org/licenses/by/4.0/">CCMY 4.0</a> {2023 - <?php echo date("Y");?>}
        </span>
        <a href="" class = "translate">Політика конфіденційності</a>
    </footer>
    </div>



    <script type="text/javascript" src="script.js?ver=<?php echo time();?>"></script>
</body>




</html>