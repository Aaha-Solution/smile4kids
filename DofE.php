<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="./assets/images/logonew.png">
    <title>Smile4Kids | D of E</title>
    <!-- font -->
    <!-- heading font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
    <!-- text font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Padauk&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="./enquiryStyle.css">
    <style>
        h3 {
            color: #6e20a7;
            font-weight: bold;
            text-align: center;
        }

        .colorall {
            color: #6e20a7;
        }
        .red {
            color: red;
            transition: 0.1s;
        }

        .green {
            color: green;
            transition: 0.1s;
        }

        /* anim */
        .colorall:hover {
            text-shadow: 2px 2px 3px #cc99f3;
            transition: 0.1s;
        }

        .red:hover {
            text-shadow: 2px 2px 3px rgb(243, 167, 167);
            transition: 0.1s;
        }

        .green:hover {
            text-shadow: 2px 2px 3px rgb(167, 233, 167);
            transition: 0.1s;
        }

        .fw li:hover {
            animation: shake .5s;
            animation-iteration-count: infinite;
        }

        @keyframes shake {
            0% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            10% {
                transform: translate(-1px, -1px) rotate(-1deg);
            }

            20% {
                transform: translate(-1px, 0px) rotate(0deg);
            }

            30% {
                transform: translate(1px, 1px) rotate(0deg);
            }

            40% {
                transform: translate(1px, -1px) rotate(1deg);
            }

            50% {
                transform: translate(-1px, 1px) rotate(0deg);
            }

            60% {
                transform: translate(-1px, 1px) rotate(0deg);
            }

            70% {
                transform: translate(2px, 1px) rotate(0deg);
            }

            80% {
                transform: translate(-1px, -1px) rotate(0deg);
            }

            90% {
                transform: translate(1px, 2px) rotate(0deg);
            }

            100% {
                transform: translate(1px, -2px) rotate(-1deg);
            }
        }

        .bg_image {
            background-image: url('assets/images/trophy.gif');
            background-repeat: no-repeat;
            background-position: right;
            background-size: 100px;
        }

        @media only screen and (max-width:619px) {
            .bg_image {
                background: none;
            }
        }

        .head_anim {
            animation: headX 0.5s;
        }

        /* animation */
        @keyframes headX {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(0);
            }
        }

        .cardX_move {
            animation: effect 1s;
            transition: 0.5s;

        }

        @keyframes effect {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .cardY_move {
            animation: effectLeft 1s;
            transition: 0.5s;
        }

        @keyframes effectLeft {
            0% {
                transform: translateX(100%)
            }

            100% {
                transform: translateY(0)
            }
        }

        .cardX_move:hover {
            transition: 0.5s;
            transform: scale(1.01, 1.01);
        }

        .cardY_move:hover {
            transition: 0.5s;
            transform: scale(1.01, 1.01);
        }

        .card_1_hover:hover {
            background-color: rgb(248, 206, 213);
            box-shadow: 5px 10px 18px gray;

        }

        .card_2_hover:hover {
            background-color: lightyellow;
            box-shadow: 5px 10px 18px gray;
        }

        .card_3_hover:hover {
            box-shadow: 5px 10px 18px gray;
        }

        .bobble_1 {
            height: 200px;
            position: absolute;
            width: 200px;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2),
                inset 0px 10px 30px 10px rgb(247, 213, 218);
            border-radius: 50%;
            animation: animn1 20s infinite;
        }

        @keyframes animn1 {
            0% {
                top: 0;
            }

            50% {
                top: 100%;
            }

            100% {
                top: 0;
            }
        }

        .bobble_2 {
            right: 0px;
            height: 100px;
            position: absolute;
            width: 100px;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2),
                inset 0px 10px 30px 10px rgb(247, 213, 218);
            border-radius: 50%;
            animation: animn2 10s infinite;
            transition-timing-function: linear;
        }

        @keyframes animn2 {
            0% {
                right: 0;
            }

            50% {
                right: 90%;
            }

            100% {
                right: 0;
            }
        }

        .bobble_3 {
            height: 150px;
            right: 50%;
            position: absolute;
            width: 150px;
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2),
                inset 0px 10px 30px 10px rgb(247, 213, 218);
            border-radius: 50%;
            animation: animn3 20s infinite;
        }

        @keyframes animn3 {
            0% {
                top: 0%;
            }

            50% {
                top: 200vh;
            }

            100% {
                top: 0;
            }
        }
    </style>
</head>

<body>
    <div class="sticky-sm-top">
        <?php include('navbar2.php') ?>
    </div>
    <div class="bobble_1"></div>
    <div class="bobble_2"></div>
    <div class="bobble_3"></div>
    <div class="sticky-sm-top">

    </div>
    <div class="container-fluid overflow-hidden" style="background-color: #fff; font-family: 'Cinzel', serif;
    font-family: 'Padauk', sans-serif;">
        <div class="column">
            <h3 style="font-family: 'Cinzel',serif;font-weight:bold;margin-top:10px" class="head_anim">D OF E ONLINE COURSES (AGES 14 TO 24 YEARS)</h3>
            <img src="./assets/images/dofe.jpg" alt="dofe" style="object-fit: contain ;width:100%;height:500px">
            <div class="card cardX_move mt-3 shadow-lg" style="width:100%; ">

                <div class="card-body  card_1_hover">
                    <h4 class="card-title colorall" style="font-weight: bold;">DUKE of EDINBURGH Award - ONLINE Courses</h4>
                    <p class="card-text fs-5">Complete your life skills Duke of Edinburgh requirements at home and from
                        anywhere in the world! It’s <span class="red fw">CONVENIENT</span> to access and an <span class="fw green">ENJOYABLE</span> way
                        to learn a valuable LIFE SKILL. Our <span class="fw colorall">FUN</span>, <span class="fw green">EASY</span> and
                        <span class="fw red">PRACTICAL</span> Indian Language courses, are highly rated from across the
                        globe
                    </p>
                </div>
            </div>
            <div class="card mt-3 fs-5 cardY_move shadow-lg" style="width:100%;">

                <div class="card-body   card_2_hover">
                    <ul>
                        <li>As established course providers for the Duke of Edinburgh award, we are proud to have
                            achieved <span class="red fw">Approved Award Provider</span> (AAP) status for the <span class="fw colorall">BRONZE</span>, <span class="fw green">SILVER</span> & <span class="fw red">GOLD</span> awards.</li>
                        <li>We have the largest selection of on-line and <span class="fw red">ZOOM INDIAN LANGUAGE</span> courses in
                            the UK.</li>
                        <li>We understand the requirements of the course and students are guided with our friendly,
                            helpful and qualified Teachers.</li>
                        <li>Our Duke of Edinburgh courses are delivered <span class="green fw">ONLINE</span> only.
                        <li>This allows students to complete the skills part of your Duke of Edinburgh award, from the
                            comfort of your own home anywhere in the world.</li>
                    </ul>
                </div>
            </div>
            <div class="card mt-3 fs-5 cardX_move shadow-lg" style="width:100%;">

                <div class="card-body   card_3_hover">
                    <h4 class="card-title colorall" style="font-weight: bold;">Languages offered:</h4>
                    <ul>
                        <li><span class="fw colorall">HINDI</span>, <span class="fw green">GUJARATI</span> and <span class="fw red">PANJABI</span></li>
                        <li>Our 10 (optional) terms of Spoken and Reading/Writing courses are for Beginners</li>
                        <li>Each Term is 12 weeks</li>
                        <li>Courses /classes are in small groups of up to 10 students and 1 hour per week ( online )

                        <li>Skills gained /developed include</li>
                        <ul class="fw">
                            <li style="color: red;">Teamwork skills</li>
                            <li style="color: green;">Communication skills</li>
                            <li style="color: orange;">Commitment and Leadership skills</li>
                            <li style="color: blue;">Social skills</li>
                            <li style="color: crimson;">Lateral and critical Thinking</li>
                            <li style="color: sienna;">Problem solving</li>
                        </ul>
                    </ul>
                    <p>Each student has an <span class="red fw">ONLINE</span> portal, where Homework Notes and Resources are uploaded for each term,
                        to practice in your own time</p>
                </div>
            </div>
            <div class="card mt-3 fs-5  shadow-lg" style="width:100%;">

                <div class="card-body bg_image" style="font-weight: bold;">
                    <h4 class="card-title colorall" style="font-weight: bold;">There are 3 awards :</h4>
                    <ol class="fs-5">
                        <li style="color: red;"> GOLD (72 weeks /6 terms 18 months )PRICE £870 </li><!--PRICE £870 + VAT -->
                        <li style="color: green;"> SILVER ( 24 weeks /2 terms/6 months ) PRICE £290</li>
                        <li style="color: orange;">BRONZE ( 12 weeks /1 term /3 months ) PRICE £155</li>

                    </ol>
                </div>
            </div>
            <div class="container my-5">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="m-3">
                        <img src="./assets/images/teens6.jpg" style="width: 100%;height: 250px;" />
                    </div>
                    <div class="m-3">
                        <img src="./assets/images/teenboy.png" style="width: 100%;height: 250px" />
                    </div>
                    <div class="m-3">
                        <img src="./assets/images/dofe2.jpg" style="width: 100%;height: 250px" />
                    </div>
                </div>
            </div>
            <div>
                <?php include('Enquiry.php') ?>
            </div>
        </div>
    </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>