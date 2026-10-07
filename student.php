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
                <li class="nav-item active">
                    <a class="nav-link" href="./student.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./take-quiz.php">Take Quiz</a>
                </li> -->
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

    <div id="pills-home">
        <h2 id="welcome-teacher">Welcome Student!</h2>
        <small>This is a student area where you can take quizzes, and the result will be sent to the teacher <br> area after you have submitted.</small>
        <br>
        <button id="takeQuiz">
            <a class="nav-link" href="./take-quiz.php" style="color: inherit">Take Quiz <i class="fa-solid fa-arrow-right"></i></a>
        </button>
    </div>

    </div>
</div>


<?php include ('./partials/footer.php') ?>