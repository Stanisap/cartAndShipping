Тестовое задание

Прежде чем приступать, внимательно ознакомьтесь со всем документом. По
завершению выполнения тестового задания, разместите код в публичном github
репозитории и вышлите ссылку на него. Не забудьте добавить readme с инструкцией
по запуску проекта.

Задача:

    Реализовать 2 шага оформления заказа - страницы cart и shipping.
    Условия:
    
        ● Респонсив верстка.
        ● Не использовать готовых UI фреймворков (типа bootstrap).
        
Опционально:

    1. Использование на стороне клиента ReactJS+Redux / VueJS+Vuex /
    Angular+NgRx будет большим плюсом.
    2. Реализация собственного API сервера с использованием Express / Laravel /
    Django будет большим плюсом.
    3. Реализация Skeleton loader для страницы Cart будет большим плюсом.
    4. Получать информацию о продуктах с внешнего API (например www.mockapi.io ).
    
Спецификация - шаг 1 - Cart

    ● Количество продуктов отображать в input поле (type number). Максимальное
    возможное значение 50.
    ● Кнопки +/-, увеличивают/уменьшают количество продукта в корзине.
    ● Иконка “trash” удаляет продукт из корзины.
    ● Нажатие на кнопку “buy” переводит на следующий шаг - страница Shipping.
    ● Страница Cart должна быть доступна по url - /cart .
    
Спецификация - шаг 2 - Shipping

    ● Предусмотреть валидацию полей.
    ● Кнопка “pay” не активна (disabled), если хотя бы одно из полей не валидно.
    ● Shipping options может иметь 3 значения:
    Free shipping (значение по умолчанию)
    Express shipping- additional 9.99 €
    Courier shipping - additional 19.99 €
    Если сумма заказа превышает 300 €, доставка будет “Free express shipping”.
    ● Страница Shipping должна быть доступна по url - /shipping .
    
Как запустить проект

    Нужно:
    
        1 - PHP;
        2 - GIT;
        2 - Composer;
        3 - Laravel;
        
    Запуск проекта:
    
        1 - выпонеям команду git clone https://https://github.com/Stanisap/cartAndShipping.git
        2 - создаем в корне проeкта файд .env и копируем содержимое зи файла .env.examplе в соданный файл
        3 - в файле .env указываем настройки подключения к вашей бд
        4 - выполняем команду "php artisan migrate" для миграции таблиц базы данных
        5 - заполняем таблыцы тестовами данными (есть test.sql файл в корне проекта с запросом для их заполнения)
        6 - выплняем команду "php artisan serve" или "php artisan serve --port=<number free port>"
        7 - копируем сгенерированую ссылку и переходим по ней (добавляеь "/cart")
        8 - проект должен запуститься
