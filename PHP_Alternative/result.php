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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questions = loadQuestions();
    $name = $_POST['name'] ?? 'Аноним';
    $score = 0;
    $total = count($questions);
    
    foreach ($questions as $index => $question) {
        $correctAnswers = $question['correct'];
        $userAnswers = $_POST['answer'][$index] ?? [];
        if (!is_array($userAnswers)) {
            $userAnswers = [$userAnswers];
        }
        if (array_diff($correctAnswers, $userAnswers) === array_diff($userAnswers, $correctAnswers)) {
            $score++;
        }
    }
    
    saveResults($name, $score, $total);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Результаты</title>
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
        <h1>Ваш результат</h1>
        <p>Правильных ответов: <?= $score ?> из <?= $total ?></p>
        <p>Набранные баллы: <?= round(($score / $total) * 100, 2) ?>%</p>
        <a href="index.php"><button>На главную</button></a>
    </div>
</body>
</html>
