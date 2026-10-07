<?php
include ('./partials/header.php');
include ('./conn/conn.php');
include ('./partials/modal.php');
?>

<div class="main">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">Online Quiz System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./student.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./take-quiz.php">Take Quiz</a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse mr-4" id="navbarSupportedContent">
            <div class="ml-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="take-quiz-area">
        <h3 class="mt-4">Multiple Choice!</h3>
        <small>Put the letter of the correct answer in the blank input provided.</small>
        <div class="questions">
            <?php
            $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
            $stmt->execute();
            $result = $stmt->fetchAll();

            foreach ($result as $row) {
                $quizID = $row['tbl_quiz_id'];
                $quizQuestion = $row['quiz_question'];
                $optionA = $row['option_a'];
                $optionB = $row['option_b'];
                $optionC = $row['option_c'];
                $optionD = $row['option_d'];
                $correctAnswer = $row['correct_answer'];
            ?>
            <div class="question">
                <p><?= $quizID ?>. <?= $quizQuestion ?></p>
                <ol class="choices">
                    <li><?= $optionA ?></li>
                    <li><?= $optionB ?></li>
                    <li><?= $optionC ?></li>
                    <li><?= $optionD ?></li>
                </ol>
                <div class="answer-input">
                    <label for="answer">Answer:</label>
                    <input class="col-1" type="text" maxlength="1">
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <button type="button" class="btn btn-secondary" id="submitAnswer">Submit <i class="fa-sharp fa-solid fa-share"></i></button>
    </div>

    </div>

    </div>
</div>

<?php
$stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<script>';
echo 'var quizData = ' . json_encode($result) . ';';
echo '</script>';
?>

<script>
    
    document.getElementById("submitAnswer").addEventListener("click", function() {
        var questions = document.querySelectorAll(".question");
        var correctAnswers = 0;

        questions.forEach(function(question, index) {
            var answerInput = question.querySelector("input");
            if (answerInput) {
                var userAnswer = answerInput.value.toUpperCase();
                var correctAnswer = quizData[index].correct_answer;

                if (userAnswer === correctAnswer) {
                    correctAnswers++;
                    question.classList.add("correct");
                }
            }
        });

        $("#resultModal").modal("show");

        $("#totalScore").val(correctAnswers);
        
        
    });

</script>

<?php include ('./partials/footer.php') ?>