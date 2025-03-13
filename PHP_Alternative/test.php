<?php
session_start();

define('QUESTIONS_FILE', 'questions.json');

function loadQuestions() {
    return json_decode(file_get_contents(QUESTIONS_FILE), true);
}

$questions = loadQuestions();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Тест</title>
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
        .question {
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="result.php" method="post">
            <div class="question">
                <label>Введите ваше имя: <input type="text" name="name" required></label><br>
            </div>
                <?php foreach ($questions as $index => $question): ?>
                    <p><?= htmlspecialchars($question['text']) ?></p>
                    <?php foreach ($question['options'] as $option): ?>
                        <label>
                            <input type="<?= count($question['correct']) > 1 ? 'checkbox' : 'radio' ?>" 
                                name="answer[<?= $index ?>][]" 
                                value="<?= htmlspecialchars($option) ?>">
                            <?= htmlspecialchars($option) ?>
                        </label><br>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <button type="submit" class="button">Отправить</button>
        </form>
    </div>
</body>
</html>
