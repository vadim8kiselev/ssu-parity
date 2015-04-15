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
            var months = [" января ", " февраля ", " марта ", " апреля ", " мая ", " июня ", " июля ", " августа ", " сентября ", " октября ", " ноября ", " декабря "];
            var days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота']

            var hour = new Date().getHours();
            var welcome;
            if (hour >= 0 && hour < 6) welcome = "Доброй ночи!";
            if (hour >= 6 && hour < 12) welcome = "Доброе утро!";
            if (hour >= 12 && hour < 18) welcome = "Добрый день!";
            if (hour >= 18 && hour <= 23) welcome = "Добрый вечер!";
            document.getElementById("hello").innerHTML = welcome + " Сегодня " + new Date().getDate() + months[new Date().getMonth()] + new Date().getFullYear() + " года" + " (" + days[new Date().getDay()] + ")";
        }
    </script>
    <script type="text/javascript">
        
        
        var dayFirstSeptember = (new Date(new Date().getFullYear(), 8, 01)).getDay();         
        if (!dayFirstSeptember) dayFirstSeptember = 7;                                               
        
        var dateFirstMondaySeptember = 9 - dayFirstSeptember; 
        if (dayFirstSeptember == 1) dateFirstMondaySeptember = 1;                             
       

        var currentDate = new Date().getDate(); 
        var currentMonth = new Date().getMonth();
                
        var countFullWeaksBeforeNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 8, dateFirstMondaySeptember).getTime()) / 86400000 / 7);
       
        var dayFirstJanuary = (new Date(new Date().getFullYear(), 0, 1)).getDay(); 
        if (!dayFirstJanuary) dayFirstJanuary = 7;
        
        var dayFirstJanuaryMonday = 9 - dayFirstJanuary; 
        if (dayFirstJanuary == 1) dayFirstJanuaryMonday = 1;
       
        var countFullWeaksAfterNY = Math.floor((new Date().getTime() - new Date(new Date().getFullYear(), 0, dayFirstJanuaryMonday).getTime()) / 86400000 / 7);

        var countFullWeeksStartSemestr = Math.floor((new Date('12/31/' + new Date().getFullYear()).getTime() - new Date('09/01/' + new Date().getFullYear()).getTime()) / 86400000 / 7);

        

        function f_week() {
            f_datE();
            if (currentMonth > 8) {
                if ((countFullWeaksBeforeNY) % 2 == 0) {
                    document.getElementById('firstBar').style.opacity = '.2'
                    document.getElementById('secondBar').style.opacity = '1'
                }
                else {
                    document.getElementById('firstBar').style.opacity = '1'
                    document.getElementById('secondBar').style.opacity = '.2'
                }
            }
            else if (currentMonth == 8) {
                if (currentDate >= dateFirstMondaySeptember) {
                    if ((countFullWeaksBeforeNY) % 2 == 0) {
                        document.getElementById('firstBar').style.opacity = '.2'
                        document.getElementById('secondBar').style.opacity = '1'
                    }
                    else {
                        document.getElementById('firstBar').style.opacity = '1'
                        document.getElementById('secondBar').style.opacity = '.2'
                    }
                }
                else if (currentDate< dateFirstMondaySeptember && currentDate >= 1) { 
                    document.getElementById('firstBar').style.opacity = '1'
                    document.getElementById('secondBar').style.opacity = '.2'
                }
            }
            else if (currentMonth < 8) {
                if (currentMonth <= 6 && currentMonth >= 0) {
                    if ((currentMonth == 0) && (currentDate < dayFirstJanuaryMonday)) {
                        if (dayFirstSeptember == 1 && countFullWeeksStartSemestr == 17) {
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                        else if (dayFirstSeptember != 1 && countFullWeeksStartSemestr == 17) {  
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                        else if (dayFirstSeptember != 1 && countFullWeeksStartSemestr == 16) {
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                    }
                    else {
                        if ((countFullWeaksAfterNY) % 2 == 0) {
                            document.getElementById('firstBar').style.opacity = '1'
                            document.getElementById('secondBar').style.opacity = '.2'
                        }
                        else {
                            document.getElementById('firstBar').style.opacity = '.2'
                            document.getElementById('secondBar').style.opacity = '1'
                        }
                    }
                }
                else if (currentMonth > 6) {
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
        
        <div class="content">
            <div id="hello" class='appeal'></div>
            <div id="firstBar" class="leftButton">Числитель</div>
            <div id="secondBar" class="rightButton">Знаменатель</div>
        </div>
        <div class="footer">
            <span class="info"> SSU Parity &#169 Copyright 2014 - 2015 Vadim Kiselev</span> 
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
                    <img src="https://pp.vk.me/c623718/v623718855/27723/Hu_CHWEqWaQ.jpg">
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
