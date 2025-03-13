<?php
session_start();

define('QUESTIONS_FILE', 'questions.json');
define('RESULTS_FILE', 'results.json');

function loadQuestions() {
    return json_decode(file_get_contents(QUESTIONS_FILE), true);
}

function saveResults($name, $score, $total) {
    $results = file_exists(RESULTS_FILE) ? json_decode(file_get_contents(RESULTS_FILE), true) : [];
    $results[] = [
        'name' => htmlspecialchars($name),
        'score' => $score,
        'total' => $total,
        'percentage' => round(($score / $total) * 100, 2)
    ];
    file_put_contents(RESULTS_FILE, json_encode($results, JSON_PRETTY_PRINT));
}
?>

<!-- Главная страница -->
<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Добро пожаловать!</h1>
        <a href="test.php" class="button">Пройти тест</a>
        <a href="dashboard.php" class="button">Результаты</a>
    </div>
</body>
</html>

