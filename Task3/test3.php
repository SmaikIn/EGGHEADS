<?php

/**
 * 3. Напиши SQL-запрос
 * Имеем следующие таблицы:
 * 1. users — контрагенты
 * 1. id
 * 2. name
 * 3. phone
 * 4. email
 * 5. created — дата создания записи
 * 2. orders — заказы
 * 1. id
 * 2. subtotal — сумма всех товарных позиций
 * 3. created — дата и время поступления заказа (Y-m-d H:i:s)
 * 4. city_id — город доставки
 * 5. user_id
 *
 * Необходимо выбрать одним запросом список контрагентов в следующем формате (следует учесть, что будет включена опция only_full_group_by в MySql):
 * 1. Имя контрагента
 * 2. Его телефон
 * 3. Сумма всех его заказов
 * 4. Его средний чек
 * 5. Дата последнего заказа
 *
 */

$result = DB::select('
            select u.name,
                   u.phone,
                   SUM(o.subtotal),
                   AVG(o.subtotal),
                   MAX(o.created_at),
            from users as u
                     join orders as o on u.id = o.user_id
            GROUP BY u.id');


/**
 *
 * Пример похожего того что в таске проверяете дропнул в папке с таской
 * Опять же на ларе я бы сделал это по разному в зависимости от подхода
 *
 * Но возвращать массив буэ... Сделал запрос в репе ну и выкинул его обратно DTO[]
 * Не уверен на счёт MAX(o.created_at), ибо дата там Carbon или timestamp, но вроде норм
 *
 * А так да миграции написать, сиды написать для развёртки тестовой бд (если девопсы сделали dev сервак)
 *
 */