window.addEventListener('scroll', function () {
    document.getElementById('header-nav').classList.toggle('headers-scroll', window.scrollY > 135);
})

/*Кнопка наверх*/
$(function () {
    $('.buttonUp').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    })
})
$(document).scroll(function () {

    if ($(this).scrollTop() > 300) {
        $('.buttonUp').fadeIn();
    } else {
        $('.buttonUp').fadeOut();
    }
});


// Пример стартового JavaScript для отключения отправки формы, если есть недопустимые поля
(() => {
    'use strict'

    // Получить все формы, к которым мы хотим применить пользовательские стили проверки Bootstrap.
    const forms = document.querySelectorAll('.needs-validation')

    // Перебираем их и предотвращаем отправку
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})();

$(document).ready(function () {

    $('.phone').inputmask("+7 (999) 999-99-99");
});

//! Ajax запрос на отправку формы на сервер
$('.my-form').submit(function (e) {
    e.preventDefault();
    let th = $(this);
    let mess = $('.mess');
    let btn = th.find('.btn');

    $.ajax({
        url: 'functions/sender.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data) {
            if (data == 1) {
                btn.removeClass('progress-bar-striped progress-bar-animated');
                mess.html('<div class="alert alert-danger mt-3">Email введен нe Верно!</div > ');
                return false;
            } else {
                btn.removeClass('progress-bar-striped progress-bar-animated');
                mess.html('<div class="alert alert-success mt-3">Сообщение успешно отправлено!</div > ');
                setTimeout(function () {
                    th.trigger('reset');
                }, 2000)
            }
        }, error: function () {
            mess.html('<div class="alert alert-danger mt-3">Ошибка оправки!</div>');
            btn.removeClass('progress-bar-striped progress-bar-animated');
        }
    })
});

//! Реализация  поиска на сайте

var lastResFind = ""; // последний удачный результат
var copy_page = ""; // копия страницы в исходном виде
function TrimStr(s) {
    s = s.replace(/^\s+/g, '');
    return s.replace(/\s+$/g, '');
}
function FindOnPage(inputId) {//ищет текст на странице, в параметр передается ID поля для ввода
    var obj = window.document.getElementById(inputId);
    var textToFind;

    if (obj) {
        textToFind = TrimStr(obj.value);//обрезаем пробелы
    } else {
        alert("Введенная фраза не найдена");
        return;
    }
    if (textToFind == "") {
        alert("Вы ничего не ввели");
        return;
    }

    if (document.body.innerHTML.indexOf(textToFind) == "-1")
        alert("Ничего не найдено, проверьте правильность ввода!");

    if (copy_page.length > 0)
        document.body.innerHTML = copy_page;
    else copy_page = document.body.innerHTML;


    document.body.innerHTML = document.body.innerHTML.replace(eval("/name=" + lastResFind + "/gi"), " ");//стираем предыдущие якори для скрола
    document.body.innerHTML = document.body.innerHTML.replace(eval("/" + textToFind + "/gi"), "<a name=" + textToFind + " style='color:red'>" + textToFind + "</a>"); //Заменяем найденный текст ссылками с якорем;
    lastResFind = textToFind; // сохраняем фразу для поиска, чтобы в дальнейшем по ней стереть все ссылки
    window.location = '#' + textToFind;//перемещаем скрол к последнему найденному совпадению
}



//! Сортировка товаров

document.addEventListener("DOMContentLoaded", function () {
    // Находим выпадающий список сортировки
    const sortBySelect = document.querySelector('select[aria-label="Sort by:"]');

    // Находим контейнер, в котором находятся товары
    const productsContainer = document.getElementById('shoes-products');

    // Получаем все товары
    const products = Array.from(productsContainer.children);

    // Функция для сортировки товаров по имени от A до Я
    function sortByNameAsc() {
        products.sort((a, b) => {
            const nameA = a.querySelector('h4 a').textContent.trim().toUpperCase();
            const nameB = b.querySelector('h4 a').textContent.trim().toUpperCase();
            return nameA.localeCompare(nameB);
        });
    }

    // Функция для сортировки товаров по имени от Я до A
    function sortByNameDesc() {
        products.sort((a, b) => {
            const nameA = a.querySelector('h4 a').textContent.trim().toUpperCase();
            const nameB = b.querySelector('h4 a').textContent.trim().toUpperCase();
            return nameB.localeCompare(nameA);
        });
    }

    // Функция для сортировки товаров по цене от низкой к высокой
    function sortByPriceLowToHigh() {
        products.sort((a, b) => {
            const priceA = parseFloat(a.querySelector('.product-price').textContent.trim());
            const priceB = parseFloat(b.querySelector('.product-price').textContent.trim());
            return priceA - priceB;
        });
    }

    // Функция для сортировки товаров по цене от высокой к низкой
    function sortByPriceHighToLow() {
        products.sort((a, b) => {
            const priceA = parseFloat(a.querySelector('.product-price').textContent.trim());
            const priceB = parseFloat(b.querySelector('.product-price').textContent.trim());
            return priceB - priceA;
        });
    }

    // Функция для обновления отображения товаров в контейнере
    function updateProductsDisplay() {
        // Очищаем контейнер от текущих элементов
        while (productsContainer.firstChild) {
            productsContainer.removeChild(productsContainer.firstChild);
        }
        // Добавляем отсортированные элементы обратно в контейнер
        products.forEach(product => {
            productsContainer.appendChild(product);
        });
    }

    // Обработчик изменения значения выпадающего списка
    sortBySelect.addEventListener('change', function () {
        const selectedValue = sortBySelect.value;

        // Проверяем выбранное значение
        if (selectedValue === 'default') {
            return; // Если выбрано "По умолчанию", ничего не делаем
        }

        // Определяем, какую функцию сортировки вызывать на основе выбранной опции
        switch (selectedValue) {
            case '1':
                sortByNameAsc();
                break;
            case '2':
                sortByNameDesc();
                break;
            case '3':
                sortByPriceHighToLow();
                break;
            case '4':
                sortByPriceLowToHigh();
                break;
            default:
                // По умолчанию (не сортировать)
                break;
        }

        // Обновляем отображение товаров после сортировки
        updateProductsDisplay();
    });

});




