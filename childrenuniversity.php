<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="smile4kids" />
    <link rel="icon" type="image/x-icon" href="./assets/images/logonew.png">
    <title>Smile4Kids | CHILDREN UNIVERSITY</title>
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

        .head2 {
            color: #6E20A7;
            font-weight: 900;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }

        .blue {
            color: blue;
        }

        .purple {
            color: #6E20A7;
        }

        /* animation */
        .head_anim {
            animation: headX 0.5s;
        }

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

        .card_hover:hover {
            box-shadow: 5px 10px 18px gray;

        }
    </style>
</head>

<body>
    <div class="sticky-sm-top">
        <?php include('navbar2.php') ?>
    </div>
    <div class="container-fluid overflow-hidden ">
        <div class="column mt-3">
            <h3 style="font-family: 'Cinzel', serif" class="head_anim fw-bold mt-3">THE CHILDREN'S UNIVERSITY (AGES 5 TO 14 YEARS)
            </h3>
            <div class="d-flex justify-content-center"><img src="assets/images/chuniver.jpg" alt="childrenuniversity" style="max-width: 1000px; width:100%;"></div>

            <div class="card mt-3 fs-5 shadow-lg cardY_move">

                <div class="card-body  card_hover">
                    <h4 class="card-title colorall" style="font-weight: bold;">The CHILDREN’S UNIVERSITY</h4>
                    <ul>
                        <li>We are proud to be an accredited <span style="color: red;font-weight:bold">LEARNING DESTINATION,</span> in the Children’s University.</li>
                        <li>We are part of a growing network of Children’s Universities across the UK, so children can earn stamps wherever they are in the country!</li>

                    </ul>
                </div>
            </div>
            <div class="card mt-3 fs-5 shadow-lg cardX_move" style="width:100%;">

                <div class="card-body  card_hover">
                    <h4 class="card-title colorall" style="font-weight: bold;">WHAT IS IT ?</h4>
                    <ul>
                        <li>The Children’s University is an award programme that encourages children aged 5-14, to get involved in lots of exciting activities and experiences, in their area. This is a nationwide Scheme</li>
                        <li>The Children’s University is an organisation that works in partnership with schools and celebrating participation in extra-curricular activities, in and outside of school</li>



                </div>
            </div>
            <div class="card mt-3 fs-5 shadow-lg cardY_move" style="width:100%;">

                <div class="card-body  card_hover">
                    <h4 class="card-title colorall" style="font-weight: bold;">HOW IT WORKS</h4>

                    <ul>
                        <li>The Children's University Learners are issued with their own Passport to Learning.</li>
                        <li>Students gain a stamp for ‘every hour’ of activity completed at a validated Learning Destination, as they work towards their Children’s University Award, Certificate, Diploma, Degree and eventually Fellowship.</li>
                        <li>Certificates are presented at a Children's University Graduation Ceremony, university-style graduation ceremonies to celebrate their success. These are held at various venues in their area.</li>

                    </ul>


                </div>
            </div>
            <div class="card mt-3 fs-5 shadow-lg cardX_move" style="width:100%;">

                <div class="card-body  card_hover">
                    <h4 class="card-title colorall" style="font-weight: bold;">WHAT ARE THE BENEFITS?</h4>
                    <p>These awards are key to show prospective future employers, Schools, colleges or Universities that applicants have acquired a variety of Skills</p>
                    <p>These include</p>
                    <ul>
                        <li class="fw-bold red">Communication</li>

                        <li class="fw-bold green">Teamwork</li>
                        <li class="fw-bold blue">Problem Solving skills</li>
                        <li class="fw-bold purple">Multi tasking</li>
                        <li class="fw-bold red">And lots more !</li>
                    </ul>
                </div>



                <div class="container">
                    <div class="d-flex flex-wrap justify-content-center pb-5">
                        <div class="m-2">
                            <img src="assets/images/5to144.jpg" style="width: 350px;height: 250px;object-fit:cover" />
                        </div>
                        <div class="m-2">
                            <img src="assets/images/chuni1.jpg" style="width: 350px;height: 250px" />
                        </div>
                        <div class="m-2">
                            <img src="assets/images/chuni2.jpg" style="width: 350px;height: 250px" />
                        </div>
                    </div>
                </div>


            </div>

            <div>
                <?php include('enquirychilduniversity.php') ?>
            </div>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>