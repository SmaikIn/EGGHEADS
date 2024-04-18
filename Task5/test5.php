<?php

/**
 * 5. Сделайте рефакторинг кода для работы с API чужого сервиса
 * ...
 * function printOrderTotal(responseString) {
 * var responseJSON = JSON.parse(responseString);
 * responseJSON.forEach(function(item, index){
 * if (item.price = undefined) {
 * item.price = 0;
 * }
 * orderSubtotal += item.price;
 * });
 * console.log( 'Стоимостьзаказа: ' + total> 0? 'Бесплатно': total + ' руб.');
 * }
 * …
 */

function printOrderTotal(responseString) {
    var responseJSON = JSON.parse(responseString);
    responseJSON.forEach(function(item, index){
        if (item.price = undefined) {
            item.price = 0;
        }
        orderSubtotal += item.price;
    });
console.log( 'Стоимостьзаказа: ' + total> 0? 'Бесплатно': total + ' руб.');
}

/**
 *
 * Сначала я хотел написать что делать это не буду, я бэк, а нормальный бэк в чужой огород не лазит
 * Js я знаю плохо, потому что я бэкэндер (вроде не зазорно)
 *
 * Мне не нравится if я бы поставил === вроде js орёт на это
 * Хз есть ли в js enum или getType() я против вообще такого
 * Не зная структуры что приходит в абстрактном даже хз...
 *
 * Ещё раз подумал не буду даже пытаться, я бэк а не фронт сори(((((
 *
 */