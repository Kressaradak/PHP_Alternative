<?php
session_start();

define('RESULTS_FILE', 'results.json');

function loadResults() {
    return file_exists(RESULTS_FILE) ? json_decode(file_get_contents(RESULTS_FILE), true) : [];
}

$results = loadResults();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Результаты тестов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .button {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .nav {
            margin-bottom: 20px;
        }
        .nav a {
            margin: 0 10px;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Таблица результатов</h1>
        <div class="nav">
            <a href="index.php" class="button">Главная</a>
            <a href="test.php" class="button">Пройти тест</a>
        </div>
        <table>
            <tr>
                <th>Имя</th>
                <th>Правильные ответы</th>
                <th>Всего вопросов</th>
                <th>Процент</th>
            </tr>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= htmlspecialchars($result['name']) ?></td>
                    <td><?= $result['score'] ?></td>
                    <td><?= $result['total'] ?></td>
                    <td><?= $result['percentage'] ?>%</td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
