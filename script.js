//WINDOW
function windows() {
    if (window.innerWidth > 700) {
        document.getElementById("input").style.maxWidth = "49%";
        document.getElementById("output").style.maxWidth = "49%";
        document.getElementById("input").style.maxHeight = "400px";
        document.getElementById("output").style.maxHeight = "400px";

    }
}

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
    if (document.getElementById("input").placeholder == 'Введіть свій текст кирилицею') {
        document.getElementById("submit").onclick = function() {
            secondFunction()
        };
        document.getElementById("submitmob").onclick = function() {
            secondFunction()
        };
        document.getElementById("input").placeholder = 'Vvedit\' svij tekst latynyceju';
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
        document.getElementById("input").placeholder = 'Введіть свій текст кирилицею';
        document.querySelector("#submit").innerHTML = 'змінити';
        document.querySelector("#submitmob").innerHTML = 'змінити';
        document.querySelector("#latukr").innerHTML = 'кир->лат';
        document.querySelector("#clear").innerHTML = 'очистити';
        document.querySelector("#copytext").innerHTML = 'копіювати';
    }
}



// UI JS

let allAccordions = document.getElementsByClassName("accordion");
for (i = 0; i < allAccordions.length; i++) {
    allAccordions[i].addEventListener("click", function() {

        let panel = this.nextElementSibling;
        if (panel.style.display == "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
};