# Альтернативная работа по PHP
# Инструкция по запуску проекта
1. Установить PHP, VSCode и плагин PHP
2. Скачать прикрепленный архив с необходимыми файлами, затем разархивировать его в отдельную папку(например, PHP_Alternative).
3. Указать рабочую папку PHP_Alternative для корректной работы и отображения файлов проекта.
4. Открыть терминал и вписать следующую команду:
   php -S localhost:8000
5. Проект запущен.
# Краткое описание функционала приложения
Приложение представляет собой интерфейс прохождения теста с просмотром результатов и дешбордом прохождений.

# Пример теста
Вопросы к тесту сохранены в файле questions.json
[
    {
        "text": "Какой язык программирования используется в данном проекте?",
        "options": ["PHP", "Python", "JavaScript", "C++"],
        "correct": ["PHP"]
    },
    {
        "text": "Какие из этих языков являются динамическими?",
        "options": ["C", "Python", "JavaScript", "Java"],
        "correct": ["Python", "JavaScript"]
    },
    {
        "text": "Какой HTTP-метод используется для отправки формы?",
        "options": ["GET", "POST", "DELETE", "PATCH"],
        "correct": ["POST"]
    },
    {
        "text": "Какой тег используется для создания гиперссылки в HTML?",
        "options": ["<link>", "<a>", "<href>", "<url>"],
        "correct": ["<a>"]
    },
    {
        "text": "Какой оператор используется для строгого сравнения в PHP?",
        "options": ["==", "===", "!=", "<>"],
        "correct": ["==="]
    }
]

# Скриншоты работы приложения
1. Главная страница
![изображение](https://github.com/user-attachments/assets/78ddec94-326b-4839-9bca-dbeeb2f7de86)

2. Страница с тестом
![изображение](https://github.com/user-attachments/assets/9293baf1-76b1-41ae-8d9c-213452911a9f)

3. Страница с результатом
![изображение](https://github.com/user-attachments/assets/04964d32-36d7-434f-b17c-d2e8964d108f)

4. Страница с таблицей результатов
![изображение](https://github.com/user-attachments/assets/bb2bb451-67ef-4b3c-bf85-d49458f775e5)
