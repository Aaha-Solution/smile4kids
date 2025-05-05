    <?php
    include('database/dbconfig.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="./assets/images/logonew.png">
        <!-- boostrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- font awasom -->
        <script src="https://kit.fontawesome.com/398c77c1ca.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/navbar2.css">
        <title>Smile4Kids</title>
    </head>

    <body>
        <nav class="nav_col navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- logo -->
                <a href="./index" class="p-1"> <img src="./assets/images/log2.png" width="230px"><!-- height="110px"--></a>

                <!-- nav list -->
                <button class="navbar-toggler nav_button shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navItem" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="nav_icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse  navbar-collapse nav_collapse " id="navItem" style="right:0;flex-grow: 0;">
                    <ul class="navbar-nav nav_list col">
                        <li class="nav-item"><a class="nav-link" href="https://smile4kids.co.uk/">Home</a></li>
                        <li class="nav-item position-relative show_drop dropdown"><a class="nav-link dropdown-toggle" id="classDropdownlist" role="button" aria-expanded="false">Classes</a>
                            <ul class="dropdown_list" aria-labelledby="classDropdownlist">
                                <li><a class="dropdown-item" href="courses_panjabi?lan=<?php echo "Panjabi" ?>">Panjabi</a></li>
                                <li><a class="dropdown-item" href="courses_hindi?lan=<?php echo "Hindi" ?>">Hindi</a></li>
                                <li><a class="dropdown-item" href="courses_gujarati?lan=<?php echo "Gujarati" ?>">Gujarati</a></li>
                                <li><a class="dropdown-item" href="courses_spanish?lan=<?php echo "Spanish" ?>">Spanish</a></li>
                            </ul>
                        </li>
                        <li class="nav-item position-relative show_drop dropdown"><a class="nav-link  dropdown-toggle" id="classDropdownlist" role="button" aria-expanded="false">Policies</a>
                            <ul class="dropdown_list" aria-labelledby="classDropdownlist">
                                <li><a class="dropdown-item" href="Remoteteaching">Remote Teaching and Online Safety Policy</a></li>
                                <li><a class="dropdown-item" href="Privacy-policy">Privacy Policy</a></li>
                                <li><a class="dropdown-item" href="TermsAndCondition">Terms and Conditions</a></li>
                                <li><a class="dropdown-item" href="Safeguarding">Safeguarding Children Policy</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="https://smile4kids.company.site/" target="_blank">Shop</a></li>
                        <li class="nav-item nav_li_wi"><a class="nav-link" href="DofE">Duke of <br> Edinburgh</a></li>

                        <!--<li class="nav-item nav_li_wi"><a class="nav-link" href="#">Animated <br>Songs/Video</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="About">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="childrenuniversity">Children's<br>University</a></li>
                        <li><a href="Login"><button class="button">Sign In</button></a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </body>

    </html>