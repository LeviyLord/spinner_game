<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Test task - Ilya Timofeev</h1>
    <br>
</p>

В данном проекте, мною было принято решение отказаться от реализации ДДД, а использовать сервис-ориентированную архитектуру. 
Создав таблицу призов с несколькими типами сущностей, я увидел возможность продемонстрировать паттерн стратегия,
 так я выделил три стратегии поведения для получения и обработки призов. 
 На данный момент в проекте готово из запланированного:
 1. получение одного из 3-х типов случайных призов.
 2. отказ от предварительно полученного приза.
 3. т.к. у нескольких людей одновременно может выпасть один и тот же вещественный приз 
 или если 2-х людей выпадет Денежный приз, а суммы их выигрышей уже не окажется на счету, то приз получит первый, кто нажал принять приз. 
 "Проигравшему"(Не успевшему) конкуренту будет предложено конвертировать денежный приз в бонусы.

Ссылка на таск доску 
https://trello.com/b/9sXqINGS
