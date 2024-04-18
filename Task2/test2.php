<?php

/**
 * 2. Сделайте рефакторинг
 * ...
 * $questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id='. $catId);
 * $result = array();
 * while ($question = $questionsQ->fetch_assoc()) {
 * $userQ = $mysqli->query('SELECT name, gender FROM users WHERE id='. (int)$question[‘user_id’]);
 * $user = $userQ->fetch_assoc();
 * $result[] = array('question'=>$question, 'user'=>$user);
 * $userQ->free();
 * }
 * $questionsQ->free();
 * ...
 *
 */


$questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id='. $catId);
$result = array();
while ($question = $questionsQ->fetch_assoc()) {
    $userQ = $mysqli->query('SELECT name, gender FROM users WHERE id='. (int)$question[‘user_id’]);
    $user = $userQ->fetch_assoc();
    $result[] = array('question'=>$question, 'user'=>$user);
    $userQ->free();
}
$questionsQ->free();

/**
 *
 * Опять же повторюсь на чистой пыхе я давно не писал, я даже не знаю что такое $userQ->free(); я пошёл гуглить))
 *
 *
 * Не зная логики хз что делать, но я бы сделал так
 *
 * Реализация на Laravel
 * База
 * Я бы сделал модели Question и User
 * там бы настроил отношения belongTo и hasMany соответственно
 *
 * Реализацию сделал на схеме diagram.png
 * Вообще я бы перешёл на UUID $catId давно не видел int id (ничего плохого не вижу, но энивей)
 *
 * ВОЗВРАЩАТЬ БУДУ ВСЁ в DTO или DTO[] и мне пофиг что мне скажут (за исключением если метод должен возвращать bool или просто id)
 * В ответ верну ресурс куда передам дтошку
 *
 * Реализация на чистом PHP
 *
 * Понятно что нужно использовать норм подключение
 * Нужно использовать подготовленные запросы
 * Пользоваться билдером
 *
 * Надо избавиться от цикла while ибо так пишут скуфы(можно поспорить) и юзать while нужно уместно
 * Если это коллекция, давайте использовать foreach я прошу...
 *
 * Надо избегать конечно моментов с запросами в цикле, но тем не менее иногда и они нужны
 * А так да можно дописать JOIN и сразу один запросом достать всё из таблиц
 *
 * Короч рофлан поминки с такими методами
 * Можно меня поругать что я пример реализации не написал, но реализацию такого может и GPT написать
 * Лучше я буду головой всё понимать, а реализация это дело вкуса + код стайла команды
 *
 */