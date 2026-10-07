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
                    <a class="nav-link" href="./teacher.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./quiz.php">Quiz</a>
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


    <div class="quiz-container">

        <div class="quiz">

        <nav class="mt-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Questions</button>
            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Result</button>
            </div>

        </nav>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                <button type="button" class="btn btn-dark m-2 float-left" id="add-quiz-button" data-toggle="modal" data-target="#addQuestionModal">
                    Add Question
                    </button>


                <div class="table-area">
                    <table class="table" style="color: white;">
                        <thead>
                            <tr>
                            <th scope="col">Quiz ID</th>
                            <th scope="col">Question</th>
                            <th scope="col">Correct Answer (Letter)</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

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

                                <tr>
                                    <th id="quizID-<?= $quizID ?>"><?= $quizID ?></th>
                                    <td id="quizQuestion-<?= $quizID ?>"><?= $quizQuestion ?></td>
                                    <td id="optionA-<?= $quizID ?>" hidden><?= $optionA ?></td>
                                    <td id="optionB-<?= $quizID ?>" hidden><?= $optionB ?></td>
                                    <td id="optionC-<?= $quizID ?>" hidden><?= $optionC ?></td>
                                    <td id="optionD-<?= $quizID ?>" hidden><?= $optionD ?></td>
                                    <td id="correctAnswer-<?= $quizID ?>"><?= $correctAnswer ?></td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" onclick="updateQuestion(<?= $quizID ?>)"><i class="fa-solid fa-pencil"></i></button>
                                        <button type="button" class="btn btn-danger" onclick="deleteQuestion(<?= $quizID ?>)"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </div>
                
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

            <table class="table" style="color: white;">
                    <thead>
                        <tr>
                            <th scope="col">Result ID</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Year and Section</th>
                            <th scope="col">Quiz Score</th>
                            <th scope="col">Date Taken</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) { 
                                $resultID = $row['tbl_result_id'];
                                $studentName = $row['quiz_taker'];
                                $yearSection = $row['year_section'];
                                $totalScore = $row['total_score'];
                                $dateTaken = $row['date_taken'];
                                ?>

                                <tr>
                                    <th id="resultID-<?= $resultID ?>"><?= $resultID ?></th>
                                    <td id="studentName-<?= $resultID ?>"><?= $studentName ?></td>
                                    <td id="yearSection-<?= $resultID ?>"><?= $yearSection ?></td>
                                    <td id="totalScore-<?= $resultID ?>"><?= $totalScore ?></td>
                                    <td id="dateTaken-<?= $resultID ?>"><?= $dateTaken ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="deleteResult(<?= $resultID ?>)"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                                <?php
                            }
                        ?>
                    </tbody>
                </table>


            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>
        </div>
    </div>


</div>


<?php include ('./partials/footer.php') ?>