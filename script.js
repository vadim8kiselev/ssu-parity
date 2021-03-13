$(document).ready(function (){
    $('[data-toggle="popover"]').popover({
        content:
            '<div class="information">' +
                '<span>Синий цвет - числитель</span>' +
                '<span> Красный цвет - знаменатель</span>' +
            '</div>'
    });
})

var dayFirstOfSeptember = (new Date(new Date().getFullYear(), 8, 1)).getDay();
var dateFirstMondayInSeptember = (dayFirstOfSeptember == 2) ? 7 : (9 - dayFirstOfSeptember) % 7;

var dayFirstOfJanuary = (new Date(new Date().getFullYear(), 0, 1)).getDay();
var dateFirstMondayInJanuary = (dayFirstOfJanuary == 2) ? 7 : (9 - dayFirstOfJanuary) % 7;

var currentDate = new Date().getDate();
var currentMonth = new Date().getMonth();

var countFullWeeksBeforeNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 8, dateFirstMondayInSeptember).getTime()) / 86400000 / 7);
var countFullWeeksAfterNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 0, dateFirstMondayInJanuary).getTime()) / 86400000 / 7);

var bars = {
    summer: false,
    swapped: false,

    style: 'blue.css',

    swap: function () {
        this.style = 'red.css';
        this.swapped = true
    },

    off: function () {
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
            if (bars.summer) {
                document.getElementById('summer-notification').innerHTML =
                    "Поздравляем! В летнее время нет необходимости следить за расписанием";
                $('#help').hide();
            }
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
