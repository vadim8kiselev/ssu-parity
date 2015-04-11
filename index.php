<!DOCTYPE html>
<html>
<head>
    <title>SSU Parity </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="Styles.css" />
    <script type="text/javascript" src='http://code.jquery.com/jquery-latest.js'></script>
    <script type="text/javascript" src="http://vk.com/js/api/share.js?90" charset="windows-1251"></script>
    <script type="text/javascript">
        function f_proover() {
            $('#comment').css({ 'opacity': '1' })
        }
        function f_proout() {
            $('#comment').css({ 'opacity': '0' })
        }
        function f_datE() {
            var months = ["", " января ", " февраля ", " марта ", " апреля ", " мая ", " июня ", " июля ", " августа ", " сентября ", " октября ", " ноября ", " декабря "];
            var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', '']
            var time = new Date();
            var lmonth = months[time.getMonth() + 1];
            var date = time.getDate();
            var year = time.getFullYear();
            var day = time.getDay() + 1;
            var h = time.getHours();
            var tod = days[time.getDay()];
            var welcome;
            if (h >= 0 && h < 6) welcome = "Доброй ночи!";
            if (h >= 6 && h < 12) welcome = "Доброе утро!";
            if (h >= 12 && h < 18) welcome = "Добрый день!";
            if (h >= 18 && h <= 23) welcome = "Добрый вечер!";
            document.getElementById("hello").innerHTML = welcome + " Сегодня " +  date + lmonth + year + " года"+" ("+ tod + ")";
        }
    </script>
    <script type="text/javascript">

        var currentYear = new Date().getFullYear();
        var FirstDay = new Date(currentYear, 8, 01);
        var firstDate = FirstDay.getDay();
        if (firstDate == 0)
            firstDate = 7;
        var count = (7 - firstDate);
        var FirstMonday = new Date(currentYear, 8, 1 + count + 1);
        var DayX = FirstMonday.getDate();
        var MonthX = FirstMonday.getMonth()
        var Today = new Date().getDate();
        var TodayMonth = new Date().getMonth();
        var stopKnow = new Date(currentYear, 6, 30);
        var endKnowDay = stopKnow.getDate() + 1;
        var endKnowMonth = stopKnow.getMonth();
        var ms = Math.floor((new Date().getTime() - new Date(currentYear, MonthX, DayX).getTime()) / 86400000 / 7);
        var DayJan = new Date(currentYear, 0, 1);
        var MondayJan = DayJan.getDay();
        if (MondayJan == 0)
            MondayJan = 7;
        var countJan = (7 - MondayJan);
        var MondayJanDate = new Date(currentYear, 0, 1 + countJan + 1);
        var JanMonth = MondayJanDate.getMonth() + 1;
        var JanDate = MondayJanDate.getDate();
        var mss = Math.floor((new Date().getTime() - new Date(currentYear, 0, JanDate).getTime()) / 86400000 / 7);
        var AR = Math.floor((new Date('12/31/' + new Date().getFullYear()).getTime() - new Date('09/01/' + new Date().getFullYear()).getTime()) / 86400000 / 7);


        function f_week() {
            f_datE();
            if (TodayMonth > MonthX) {
                if ((ms) % 2 == 0) {
                    document.getElementById('firstBar').style.opacity = '.2'
                    document.getElementById('secondBar').style.opacity = '1'
                }
                else {
                    document.getElementById('firstBar').style.opacity = '1'
                    document.getElementById('secondBar').style.opacity = '.2'
                }
            }
            else if (TodayMonth == MonthX) {
                if (Today >= DayX) {
                    if ((ms) % 2 == 0) {
                        document.getElementById('firstBar').style.opacity = '.2'
                        document.getElementById('secondBar').style.opacity = '1'
                    }
                    else {
                        document.getElementById('firstBar').style.opacity = '1'
                        document.getElementById('secondBar').style.opacity = '.2'
                    }
                }
                else if (Today < DayX && Today >= 1) {
                    document.getElementById('firstBar').style.opacity = '1'
                    document.getElementById('secondBar').style.opacity = '.2'
                }
            }
            else if (TodayMonth < MonthX) {
                if (TodayMonth <= endKnowMonth && TodayMonth >= 0) {
                    if ((TodayMonth == 0) && (Today < JanDate)) {
                        if (firstDate == 1 && AR == 17) {
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                        else if (firstDate != 1 && AR == 17) {
                            document.getElementById('firstBar').style.opacity = '.2'
                            document.getElementById('secondBar').style.opacity = '1'
                        }
                        else if (firstDate != 1 && AR == 16) {
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                    }
                    else {
                        if ((mss) % 2 == 1) {
                            document.getElementById('firstBar').style.opacity = '.2'
                            document.getElementById('secondBar').style.opacity = '1'
                        }
                        else {
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                    }

                }
                else if (TodayMonth > endKnowMonth) {
                    document.getElementById('firstBar').style.opacity = '.2'
                    document.getElementById('secondBar').style.opacity = '.2'
                }
            }
        }


    </script>
</head>
<body onload="f_week()">
    <div class="body">
        <div class="header">
            <span class="brand">  SSU Parity  </span>
        </div>
        <a class="class1" href="eng.php"> Eng</a>
        <a class="class1" href="http://www.sgu.ru/structure/computersciences"> / </a>
        <a class="class1" href="http://ssuparity.16mb.com/">Rus</a>
        <div class="content">
            <div id="hello" class='appeal'></div>
            <div id="firstBar" class="leftButton">Числитель</div>
            <div id="secondBar" class="rightButton">Знаменатель</div>
        </div>
        <div class="footer">
<span class="info"> SSU Parity &#169 Copyright 2014 Vadim Kiselev</span>
<div class="share" style=" margin-top:6px">
                <script type="text/javascript" style="float:right">
                    document.write(VK.Share.button(
                    {
                        url: 'http://ssuparity.16mb.com/',
                        title: "SSU Parity",
                        description: 'SSU Parity is the project dedicated to make your timetable much clearer.',
                        image: 'https://pp.vk.me/c622727/v622727364/303c/NEzQ4Nf5T9U.jpg',
                        noparse: true
                    },
                    {
                        type: " custom",
                        text: '<img src=\"http://vk.com/images/share_32.png\" width=\"32\" height=\"32\" />'
                    }));

                </script>
            </div>

            <div class="metrika">
                <!-- Yandex.Metrika informer -->
                <a href="https://metrika.yandex.ru/stat/?id=26567799&amp;from=informer"
                   target="_blank" rel="nofollow">
                    <img src="//bs.yandex.ru/informer/26567799/3_0_81A1C6FF_6181A6FF_1_pageviews"
                         style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="" onclick="try{Ya.Metrika.informer({i:this,id:26567799,lang:'ru'});return false}catch(e){}" />
                </a>
                <!-- /Yandex.Metrika informer -->
                <!-- Yandex.Metrika counter -->
                <script type="text/javascript">
                    (function (d, w, c) {
                        (w[c] = w[c] || []).push(function () {
                            try {
                                w.yaCounter26567799 = new Ya.Metrika({
                                    id: 26567799,
                                    webvisor: true,
                                    clickmap: true,
                                    trackLinks: true
                                });
                            } catch (e) { }
                        });

                        var n = d.getElementsByTagName("script")[0],
                            s = d.createElement("script"),
                            f = function () { n.parentNode.insertBefore(s, n); };
                        s.type = "text/javascript";
                        s.async = true;
                        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

                        if (w.opera == "[object Opera]") {
                            d.addEventListener("DOMContentLoaded", f, false);
                        } else { f(); }
                    })(document, window, "yandex_metrika_callbacks");
                </script>
                <noscript><div><img src="//mc.yandex.ru/watch/26567799" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                <!-- /Yandex.Metrika counter -->
            </div>
 <div class="quest">
                <div id="about_the_project" onmouseover="f_proover()" onmouseout="f_proout()">
                    <img src="icons.png">
                </div>

            </div>
        </div>
    </div>

        <div id="info">
            <div id="comment">
                <div id="triangle"></div>
                <div id="triangle2"></div>
                Небольшой проект в помощь студентам СГУ, способный автоматически определить четность недели, от которой зависит расписание занятий
            </div>
        </div>

</body>
</html>
