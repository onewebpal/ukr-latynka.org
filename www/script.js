//WINDOW
// function windows() {
//     if (window.innerWidth > 700) {
//         document.getElementById("input").style.maxWidth = "49%";
//         document.getElementById("output").style.maxWidth = "49%";
//         // document.getElementById("input").style.maxHeight = "400px";
//         // document.getElementById("output").style.maxHeight = "400px";
//     }
// }

function windowsmob() {
    if (window.innerWidth < 700) {
        var b1 = window.innerWidth;
        b1 = b1 * 0.7 + "px";
        document.getElementById("translator").style.padding = "20px";
        document.getElementById("input").style.maxWidth = b1;
        document.getElementById("output").style.maxWidth = b1;
        document.getElementById("input").style.align = "center";
        document.getElementById("output").style.align = "center";
        document.getElementById("mobbutton").style.display = "block";
        var w3agent = navigator.userAgent;
        if (w3agent.indexOf("Samsung") > -1) {
            var a1 = window.innerWidth;
            a1 = a1 * 0.7 + "px";
            document.getElementById("translator").style.padding = "20px";
            document.getElementById("input").style.maxWidth = a1;
            document.getElementById("output").style.maxWidth = a1;
            document.getElementById("input").style.align = "center";
            document.getElementById("output").style.align = "center";

        }
        // document.getElementById("submit").style.display = "none";
    }
}
/*-----------------------------------------------------------------*/


/*if (window.innerWidth>700){
*   alert("456");
*   document.getElementById("input").style.maxWidth = "49%";
*   document.getElementById("output").style.maxWidth = "49%";
} * else if (window.innerWidth<700){
alert("123");
document.getElementById("input").style.maxWidth = inherit;
document.getElementById("output").style.maxWidth = inherit;
}*/
//__________________________________________________________________
//MAIN MAGIC FUNCTION
function splitterjoiner(list1, list2, starter) {
    var resultglobal = '';
    var charglobal = starter;
    for (var k = 0; k < list1.length; k++) {
        resultglobal = charglobal.split(list1[k]).join(list2[k]);
        charglobal = resultglobal;
    }
    return charglobal;
}
/*--------------------------------------------------------------*/
//FUNCTION FOR KYR->LAT
function mainFunction(text) {
    var text = document.getElementById('input').value;
    var ryomistake = ["рйо", "РЙО", "Рйо", "'"]
    var ryoright = ["р`йо", "Р`ЙО", "Р`йо", "`"]
    text = splitterjoiner(ryomistake, ryoright, text)

    var translit = {
        'а': 'a',
        'б': 'b',
        'в': 'v',
        'г': 'g',
        'ґ': 'ĝ',
        'д': 'd',
        'е': 'e',
        'є': 'je',
        'ж': 'ž',
        'з': 'z',
        'и': 'y',
        'і': 'i',
        'ї': 'ji',
        'й': 'j',
        'к': 'k',
        'л': 'l',
        'м': 'm',
        'н': 'n',
        'о': 'o',
        'п': 'p',
        'р': 'r',
        'с': 's',
        'т': 't',
        'у': 'u',
        'ф': 'f',
        'х': 'h',
        'ц': 'c',
        'ч': 'č',
        'ш': 'š',
        'щ': 'šč',
        'ь': "'",
        'ю': 'ju',
        'я': 'ja',
        ' ': ' ',
        'А': 'A',
        'Б': 'B',
        'В': 'V',
        'Г': 'G',
        'Ґ': 'Ĝ',
        'Д': 'D',
        'Е': 'E',
        'Є': 'Je',
        'Ж': 'Ž',
        'З': 'Z',
        'И': 'Y',
        'І': 'I',
        'Ї': 'Ji',
        'Й': 'J',
        'К': 'K',
        'Л': 'L',
        'М': 'M',
        'Н': 'N',
        'О': 'O',
        'П': 'P',
        'Р': 'R',
        'С': 'S',
        'Т': 'T',
        'У': 'U',
        'Ф': 'F',
        'Х': 'H',
        'Ц': 'C',
        'Ч': 'Č',
        'Ш': 'Š',
        'Щ': 'Šč',
        'Ь': "'",
        'Ю': 'Ju',
        'Я': 'Ja'
    };

    var result = '';
    var char = '';
    for (var i = 0; i < text.length; i++) {
        if (/[а-яА-ЯієґїЇҐІЄ'`]/.test(text[i])) {
            char = text[i].toLowerCase();
            if (translit[char]) {
                if (/[а-яієґї]/.test(text[i])) {
                    result += translit[char];
                } else if (/[А-ЯЇҐІЄ]/.test(text[i + 1])) {
                    result += translit[char.toUpperCase()].toUpperCase();
                } else if (/[А-ЯЇҐІЄ]/.test(text[i - 1])) {
                    result += translit[char.toUpperCase()].toUpperCase();
                } else if (/[А-ЯЇҐІЄ]/.test(text[i])) {
                    result += translit[char.toUpperCase()];
                } else {
                    result += translit[char];
                }
            } else {
                result += char;
            }
        } else {
            char = text[i];
            result += char;
        }
    }

    var golosnimistake = ["'o", "'O", "`"];
    var golosniright = ["jo", "JO", "'"];
    var final = splitterjoiner(golosnimistake, golosniright, result)

    document.getElementById('output').value = final;
}



/*-----------------------------------*/
//FUNCTION FOR LAT->KYR
function secondFunction(textlat) {
    var textlat = document.getElementById('input').value;
    var roundlat = ['je', 'ji', 'šč', 'ju', 'ja', 'JE', 'Je', 'Ji', 'JI', 'ŠČ', 'Šč', 'JU', 'Ju', 'JA', 'Ja', 'a', 'b', 'v', 'g', 'ĝ', 'd', 'e', 'ž', 'z', 'y', 'i', 'j',
        'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'č', 'š', ' ', 'A',
        'B', 'V', 'G', 'Ĝ', 'D', 'E', 'Ž', 'Z', 'Y', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P',
        'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Č', 'Š'
    ]

    var roundkyr = ['є', 'ї', 'щ', 'ю', 'я', 'Є', 'Є', 'Ї', 'Ї', 'Щ', 'Щ', 'Ю', 'Ю', 'Я', 'Я', 'а', 'б',
        'в', 'г', 'ґ', 'д', 'е', 'ж', 'з', 'и', 'і', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с',
        'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', ' ', 'А', 'Б', 'В', 'Г', 'Ґ', 'Д', 'Е', 'Ж', 'З', 'И',
        'І', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш'
    ]

    var mistake = ["л’к", "нйо", "с’", "уд’", "н’", "л'к", "л'н", "уд'", "с'", "ц'", "д'",
        "цй", "л'", "н'", "т'", "з'м", "з'б", " ' ", " ':", "р'к", "р'йо", "з'к", "т’", "л’"
    ]

    var right = ["льк", "ньо", "сь", "удь", "нь", "льк", "льн",
        "удь", "сь", "ць", "дь", "ць", "ль", "нь", "ть", "зьм", "зьб", " ь ", " ':", "рьк", "рйо", "зьк", "ть", "ль"
    ]
    textlat = splitterjoiner(roundlat, roundkyr, textlat);
    document.getElementById('output').value = splitterjoiner(mistake, right, textlat)
}
//___________________________________________________________________________________


//Knopka "Kopijuvatz"
function copytoCipboard() {
    var copyText = document.getElementById("output");
    copyText.select();
    document.execCommand("copy");
}


//Knopka "Očystyty"
function clearTextArea() {
    document.getElementById("input").value = "";
    document.getElementById("output").value = "";
}
/*PASS*/

//KNOPKA CHANGE (KYR->LAT, LAT->KYR)
function change() {
    clearTextArea()
    if (document.getElementById("input").placeholder == 'Введіть свій текст кирилицею та натисніть \'Змінити\' або CTRL + ENTER') {
        document.getElementById("submit").onclick = function() {
            secondFunction()
        };
        document.getElementById("submitmob").onclick = function() {
            secondFunction()
        };
        document.getElementById("input").placeholder = 'Vvedit\' svij tekst latynyceju ta natysnit` \'ZMINYTY\' abo CTRL+ENTER';
        document.querySelector("#submit").innerHTML = 'zminyty';
        document.querySelector("#submitmob").innerHTML = 'zminyty';
        document.querySelector("#latukr").innerHTML = 'lat->kyr';
        document.querySelector("#clear").innerHTML = 'očystyty';
        document.querySelector("#copytext").innerHTML = 'kopijuvaty';
    } else {
        document.getElementById("submit").onclick = function() {
            mainFunction()
        };
        document.getElementById("submitmob").onclick = function() {
            mainFunction()
        };
        document.getElementById("input").placeholder = 'Введіть свій текст кирилицею та натисніть \'Змінити\' або CTRL + ENTER';
        document.querySelector("#submit").innerHTML = 'змінити';
        document.querySelector("#submitmob").innerHTML = 'змінити';
        document.querySelector("#latukr").innerHTML = 'кир->лат';
        document.querySelector("#clear").innerHTML = 'очистити';
        document.querySelector("#copytext").innerHTML = 'копіювати';
    }
}



// UI JS

let allAccordions = document.getElementsByClassName("accordion");
let allListNames = document.getElementsByTagName("li");
for (i = 0; i < allAccordions.length; i++) {
    allAccordions[i].addEventListener("click", function() {

        let panel = this.nextElementSibling;
        let listItem = this.parentElement;
        if (panel.style.display == "block") {
            panel.style.display = "none";
            listItem.classList.remove("opened");
        } else {
            panel.style.display = "block";
            listItem.classList.add("opened");
        }
    });
};

function goUp() {
    window.scroll({
        top: 0,
        behavior: "smooth"
    });
}


function upButton() {
    let upButton = document.getElementById('up_button');
    let scrolls = [
        ["100", "0.1"],
        ["200", "0.2"],
        ["300", "0.3"],
        ["400", "0.4"],
        ["500", "0.5"],
        ["600", "0.6"],
    ];
    

    addEventListener("scroll", (event) => {
        console.log(window.scrollY);
        scrolls.forEach(element => {
            if (window.scrollY < 100) {
                upButton.style.display = "none";
            }
            if (window.scrollY >100){
                upButton.style.display = "block";
            }
        });

    });
}



const originalTexts = new Map(); 

// Заповнюємо початкові значення при завантаженні сторінки
document.querySelectorAll(".translate").forEach(el => {
    originalTexts.set(el, el.textContent);
});

// Функція для зміни мови та збереження в localStorage
function changeLang(id) {
    localStorage.setItem("language", id); // Зберігаємо вибрану мову
    loadLanguage(id);
}

// Функція завантаження текстів
function loadLanguage(lang_now) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "index.php?lang_now=" + lang_now + "&nocache=" + Date.now(), true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let langData = JSON.parse(xhr.responseText);

            document.querySelectorAll(".translate").forEach(el => {
                let originalText = originalTexts.get(el);
                if (langData[originalText]) {
                    el.textContent = langData[originalText];
                }
            });

            document.getElementById("lat").style.display = (lang_now === "lat") ? "none" : "block";
            document.getElementById("kyr").style.display = (lang_now === "kyr") ? "none" : "block";
        }
    };

    xhr.send();
}

document.addEventListener("DOMContentLoaded", () => {
    let savedLanguage = localStorage.getItem("language") || "kyr"; // Встановлюємо латиницю як мову за замовчуванням
    loadLanguage(savedLanguage);

    // Спочатку приховуємо обидві кнопки
    document.getElementById("lat").style.display = "none";
    document.getElementById("kyr").style.display = "none";

    // Потім показуємо лише потрібну кнопку
    document.getElementById(savedLanguage).style.display = "block";
});




    
document.addEventListener("keydown", function(event) {
    if (event.ctrlKey && event.key === "Enter") {
        document.getElementById("submit").click(); // Симуляція кліку на кнопку
    }
});


function changeTheme() {
    let switcher = document.getElementById("switcher");
    let isLight = switcher.classList.contains("light-theme-switcher");
    let rootElement = document.documentElement;


    switcher.classList.toggle("light-theme-switcher");
    switcher.classList.toggle("dark-theme-switcher");

    if(switcher.classList.contains("light-theme-switcher")){ //DARK THEME
        rootElement.style.setProperty('--primary-background', "#070b1b");
        rootElement.style.setProperty('--primary-font-color', "#fff");
        rootElement.style.setProperty('--secondary-font-color', "#F6F6F9");
        rootElement.style.setProperty('--third-font-color', "#F6F6F9");
        let Icons = document.getElementsByTagName('img');
        Array.from(Icons).forEach((icon) => icon.style.filter = "");
        document.getElementById('main_logo').src="./logo-dark.svg";
        document.getElementById('main_logo').style.filter = "";


        
    }else{ //LIGHT THEME
        rootElement.style.setProperty('--primary-background', "#fff");
        rootElement.style.setProperty('--primary-font-color', "#060A1B")        
        rootElement.style.setProperty('--secondary-font-color', "#3E4C7C");
        rootElement.style.setProperty('--third-font-color', "#3E4C7C");
        let Icons = document.getElementsByTagName('img');
        Array.from(Icons).forEach((icon) => icon.style.filter = "invert(100%)");

        let appsLogos = document.getElementsByClassName('appsLogo');
        Array.from(appsLogos).forEach((appLogo) => appLogo.style.filter = "brightness(0) saturate(100%) invert(16%) sepia(19%) saturate(3496%) hue-rotate(164deg) brightness(94%) contrast(99%)");

        document.getElementById('night-icon').style.filter = "brightness(0) saturate(100%) invert(16%) sepia(19%) saturate(3496%) hue-rotate(164deg) brightness(94%) contrast(99%)";
        document.getElementById('main_logo').src="./logo-light.svg";
        document.getElementById('main_logo').style.filter = "";
    }

    localStorage.setItem("theme", isLight ? "dark" : "light");
}



document.addEventListener("DOMContentLoaded", () => {
    let switcher = document.getElementById("switcher");
    let savedTheme = localStorage.getItem("theme");
    let rootElement = document.documentElement;

    if (savedTheme === "dark") {
        switcher.classList.add("dark-theme-switcher");
        switcher.classList.remove("light-theme-switcher");
        rootElement.style.setProperty('--primary-background', "#fff");
        rootElement.style.setProperty('--primary-font-color', "#060A1B")        
        rootElement.style.setProperty('--secondary-font-color', "#3E4C7C");
        rootElement.style.setProperty('--third-font-color', "#3E4C7C");
        let Icons = document.getElementsByTagName('img');
        Array.from(Icons).forEach((icon) => icon.style.filter = "invert(100%)");

        let appsLogos = document.getElementsByClassName('appsLogo');
        Array.from(appsLogos).forEach((appLogo) => appLogo.style.filter = "brightness(0) saturate(100%) invert(16%) sepia(19%) saturate(3496%) hue-rotate(164deg) brightness(94%) contrast(99%)");

        document.getElementById('night-icon').style.filter = "brightness(0) saturate(100%) invert(16%) sepia(19%) saturate(3496%) hue-rotate(164deg) brightness(94%) contrast(99%)";
        document.getElementById('main_logo').src="./logo-light.svg";
        document.getElementById('main_logo').style.filter = "";

    } else {
        switcher.classList.add("light-theme-switcher");
        switcher.classList.remove("dark-theme-switcher");
        rootElement.style.setProperty('--primary-background', "#070b1b");
        rootElement.style.setProperty('--primary-font-color', "#fff");
        rootElement.style.setProperty('--secondary-font-color', "#F6F6F9");
        rootElement.style.setProperty('--third-font-color', "#F6F6F9");
        let Icons = document.getElementsByTagName('img');
        Array.from(Icons).forEach((icon) => icon.style.filter = "");
        document.getElementById('main_logo').src="./logo-dark.svg";
        document.getElementById('main_logo').style.filter = "";
        
    }
});




upButton();