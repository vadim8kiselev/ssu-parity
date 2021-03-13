$(document).ready(function (){
    $('[data-toggle="popover"]').popover({
        content:
            '<div class="information">' +
                '<span>Синий цвет - числитель</span>' +
                '<span> Красный цвет - знаменатель</span>' +
            '</div>'
    });
})

let dayFirstOfSeptember = (new Date(new Date().getFullYear(), 8, 1)).getDay();
let dateFirstMondayInSeptember = (dayFirstOfSeptember === 2) ? 7 : (9 - dayFirstOfSeptember) % 7;

let dayFirstOfJanuary = (new Date(new Date().getFullYear(), 0, 1)).getDay();
let dateFirstMondayInJanuary = (dayFirstOfJanuary === 2) ? 7 : (9 - dayFirstOfJanuary) % 7;

let currentDate = new Date().getDate();
let currentMonth = new Date().getMonth();

let countFullWeeksBeforeNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 8, dateFirstMondayInSeptember).getTime()) / 86400000 / 7);
let countFullWeeksAfterNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 0, dateFirstMondayInJanuary).getTime()) / 86400000 / 7);

let bars = {
    summer: false,
    style: 'red.css',

    swap: function () {
        this.style = 'blue.css';
    },

    off: function () {
        this.style = 'summer.css';
        this.summer = true;
    },

    setStyle: function () {
        let link = document.createElement('link');
        let attrRel = document.createAttribute('rel');
        let attrHref = document.createAttribute('href');

        attrRel.value = "stylesheet";
        attrHref.value = this.style;

        link.setAttributeNode(attrRel);
        link.setAttributeNode(attrHref);
        document.head.appendChild(link);
    },

    main: function () {
        this.setStyle();

        window.addEventListener("load", function () {
            $('#currentYear').text(new Date().getFullYear());
            if (bars.summer) {
                $('#help').hide();
                $('#summer-notification')
                    .text("Поздравляем! В летнее время нет необходимости следить за расписанием");
            }
        })
    }
};

if (currentMonth > 8 && countFullWeeksBeforeNY % 2 !== 0) {
    bars.swap();
}
else if (currentMonth === 8) {
    if (currentDate >= dateFirstMondayInSeptember && countFullWeeksBeforeNY % 2 !== 0) {
        bars.swap();
    }
    else if (currentDate < dateFirstMondayInSeptember) {
        bars.swap();
    }
}
else if (currentMonth < 8) {
    if (currentMonth <= 4 && currentMonth >= 0) {
        if ((currentMonth === 0) && (currentDate < dateFirstMondayInJanuary)) {
            if (dayFirstOfSeptember === 0 || dayFirstOfSeptember > 4) {
                bars.swap();
            }
        }
        else if (countFullWeeksAfterNY % 2 === 0) {
            bars.swap();
        }
    }
    else if (currentMonth > 4) {
        bars.off();
    }
}

bars.main();
