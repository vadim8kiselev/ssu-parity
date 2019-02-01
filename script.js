function date() {
    var months = [" января ", " февраля ", " марта ", " апреля ", " мая ", " июня ", " июля ", " августа ", " сентября ", " октября ", " ноября ", " декабря "];
    var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

    var welcome;
    var hour = new Date().getHours();
    if (hour >= 0 && hour < 6) welcome = "Доброй ночи!";
    if (hour >= 6 && hour < 12) welcome = "Доброе утро!";
    if (hour >= 12 && hour < 18) welcome = "Добрый день!";
    if (hour >= 18 && hour <= 23) welcome = "Добрый вечер!";
    document.getElementById("hello").innerHTML = welcome + " Сегодня " + new Date().getDate() + months[new Date().getMonth()] +
        new Date().getFullYear() + " года" + " (" + days[new Date().getDay()] + ")";
}


var dayFirstOfSeptember = (new Date(new Date().getFullYear(), 8, 1)).getDay();
var dateFirstMondayInSeptember = (dayFirstOfSeptember == 2) ? 7 : (9 - dayFirstOfSeptember) % 7;

var dayFirstOfJanuary = (new Date(new Date().getFullYear(), 0, 1)).getDay();
var dateFirstMondayInJanuary = (dayFirstOfJanuary == 2) ? 7 : (9 - dayFirstOfJanuary) % 7;

var currentDate = new Date().getDate();
var currentMonth = new Date().getMonth();

var countFullWeeksBeforeNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 8, dateFirstMondayInSeptember).getTime()) / 86400000 / 7);
var countFullWeeksAfterNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 0, dateFirstMondayInJanuary).getTime()) / 86400000 / 7);

var bars = {

    leftOpacity: '.2',
    rightOpacity: '1',

    summer: false,
    swapped: false,

    style: 'red.css',

    swap: function () {
        this.leftOpacity = [this.rightOpacity, this.rightOpacity = this.leftOpacity][0];
        this.style = 'blue.css';
        this.swapped = true
    },

    off: function () {
        this.leftOpacity = this.rightOpacity = '1';
        this.style = 'summer.css';
        this.summer = true;
    },

    setStyle: function () {
        var link = document.createElement('link');
        var attrRel = document.createAttribute('rel');
        var attrHref = document.createAttribute('href');

        attrRel.value = "stylesheet";
        attrHref.value = this.style;

        link.setAttributeNode(attrRel);
        link.setAttributeNode(attrHref);
        document.head.appendChild(link);
    },

    main: function () {
        this.setStyle();

        window.addEventListener("load", function () {
            document.getElementById('currentYear').innerHTML = new Date().getFullYear();
            date();
            if (bars.summer) {
                document.getElementById('firstBar').innerHTML = "Лето";
                document.getElementById('secondBar').innerHTML = "Лето";
            }

            if (bars.swapped) {
                $('#firstBar').removeClass('disabled');
                $('#secondBar').addClass('disabled');
            }

            document.getElementById('firstBar').style.opacity = bars.leftOpacity;
            document.getElementById('secondBar').style.opacity = bars.rightOpacity;
        })
    }
};

if (currentMonth > 8 && countFullWeeksBeforeNY % 2 != 0) {
    bars.swap();
}
else if (currentMonth == 8) {
    if (currentDate >= dateFirstMondayInSeptember && countFullWeeksBeforeNY % 2 != 0) {
        bars.swap();
    }
    else if (currentDate < dateFirstMondayInSeptember) {
        bars.swap();
    }
}
else if (currentMonth < 8) {
    if (currentMonth <= 4 && currentMonth >= 0) {
        if ((currentMonth == 0) && (currentDate < dateFirstMondayInJanuary)) {
            if (dayFirstOfSeptember == 0 || dayFirstOfSeptember > 4) {
                bars.swap();
            }
        }
        else if (countFullWeeksAfterNY % 2 == 1) { // Fix for 2019 year
            bars.swap();
        }
    }
    else if (currentMonth > 4) {
        bars.off();
    }
}

bars.main();
