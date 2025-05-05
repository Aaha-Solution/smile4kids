<?php
if (!isset($_SESSION)) {
  session_start();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keywords" content="BEST ONLINE INDIAN LANGUAGE SCHOOL, uk based indian language school, HINDI, GUJARATI ,PANJABI ">
  <meta name="description" content="We make learning languages FUN, ENGAGING and ENJOYABLE By adopting a ‘WHOLE APPROACH, to learning languages, we help students to embrace their CULTURE, as well as VOCABULARY" />
  <meta property="og:site_name" content="SMILE4KIDS BEST ONLINE INDIAN LANGUAGE SCHOOL" />
  <meta property="og:title" content="BEST ONLINE INDIAN LANGUAGE SCHOOL" />
  <meta property="og:url" content="https://smile4kids.co.uk/" />
  <meta property="og:image" content="./assets/images/logonew.png" />
  <title>Smile4Kids | Home</title>
  <link rel="icon" type="image/x-icon" href="./assets/images/logonew.png">
  <link rel="stylesheet" href="./indexStyles.css">
  <!-- TOEST SCRIPT -->
  <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- heading font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:wght@700&display=swap" rel="stylesheet">

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>

<body class="jumbotron" id="main">
  <!-- news letter start  -->
  <div class="newsLetterContainer align-items-center justify-content-center">
    <div class="card p-5 position-relative newsLetterCard">
      <img src="./assets/icons/close-n.png" alt="close" class="closeButton" width="20px">
      <h3 class="card-title colorall violet" style="font-weight: bold;">Get Your <br>FREE TOP 10 TIPS</h3>
      <form action="" id = 'newsPop' method="POST">
        <div class="mt-4">
          <input class="form-control shadow-none mb-2" type="text" name="n_name" id = 'n_name' placeholder="Name" required>
        </div>
        <div class="mt-4">
          <input class="form-control shadow-none eMail mb-2" type="email" name="n_email" id='n_email' placeholder="Email" required>
        <span class="fs-6"></span>
        </div>
        <div class="mt-4 checkBoxCon">
          <input type="checkbox" class="form-check-input shadow-none" id="privacyCheck" required> <label for="privacyCheck" class="d-inline"><small> Yes I understand that you will use the information
              provided via this form
              to be in touch and to send the freebie, and also to keep me updated with your newsletters.
              <a href="Privacy-policy">Privacy Policy</a></small></label>
        </div>
        <button type="submit" class="mt-4 btn shadow-none subscribeBtn" name="n_submit">SUBSCRIBE</button>
      </form>
    </div>
  </div>

  <!-- news letter end  -->

  <div class="sticky-lg-top">
    <?php include('navbar2.php'); ?>
  </div>
  <?php
  if (isset($_SESSION['status_code'])){
  if ($_SESSION['status_code'] == 'success') {
    //session_start();
    echo "<script type='text/javascript'>toastr.success('" . $_SESSION['status'] . "')</script>";
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
  }else{
      echo "<script type='text/javascript'>toastr.error('" . $_SESSION['status'] . "')</script>";
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
  }
      
  }
  ?>
  <style>
    #toast-container>.toast-success {
      background-color: #26b280;
      color: #fff;
    }
      #toast-container>.toast-error {
      background-color: red;
      color: #fff;
    }
  </style>

  <!-- our clases popup mesg start -->
  <div class="ourClassContainer pre-Prep">
    <div class="ourClassChild fw-bold">
      <h3 class="violet fw-bold">Pre-Prep
        Ages 4 to 6 years old</h3>
      <p>This is an introductory course, designed to teach a basic level of
        Spoken <span class="colred">PANJABI</span>, <span class="colgreen">HINDI</span>
        and <span class="violet">GUJARATI</span>, to Beginners</p>
      <p>Vocabulary is learnt through Interactive
        <span class="colgreen">SONGS</span>,
        <span class="violet">GAMES</span> and <span class="colred">ACTIVITIES</span> using actions,
        children’s toys and belongings
      </p>
      <div class="d-flex justify-content-end ourclass_close_btn_div"><button class="btn shadow-none ourclass_close_btn" type="button" id="ourClassBtn1">close</button></div>
    </div>
  </div>

  <div class="ourClassContainer junior">
    <div class="ourClassChild fw-bold">
      <h3 class="violet fw-bold">Junior
        Ages 7 to 10 years old</h3>
      <p>These classes are designed to introduce Basic and Advanced level of Spoken <span class="colred">PANJABI</span>,
        <span class="colgreen">HINDI</span>
        and <span class="colred">GUJARATI</span>, to Beginners.
      </p>
      <p>The aim is to Build <span class="violet">VOCABULARY</span> and <span class="colgreen">SPEAK</span> with <span class="violet">CONFIDENCE</span>, by using Colourful
        Flashcards,
        age related <span class="colred">ACTIVITIES</span> and <span class="violet">GAMES</span></p>
      <p>Optional Reading/writing courses are available</p>
      <div class="d-flex justify-content-end ourclass_close_btn_div"><button class="btn shadow-none ourclass_close_btn" type="button" id="ourClassBtn2">close</button></div>
    </div>
  </div>

  <div class="ourClassContainer early-Teens">
    <div class="ourClassChild fw-bold">
      <h3 class="violet fw-bold">Early Teens
        11 to 15 years old</h3>
      <p>These classes are designed to introduce Basic and Advanced level of Spoken <span class="colred">PANJABI</span>,
        <span class="colgreen">HINDI</span>
        and <span class="colred">GUJARATI</span>, to Beginners.
      </p>
      <p>The aim is to Build <span class="violet">VOCABULARY</span> and <span class="colgreen">SPEAK</span> with <span class="violet">CONFIDENCE</span>, by using Colourful
        Flashcards,
        age related <span class="colred">ACTIVITIES</span> and <span class="violet">GAMES</span></p>
      <p>Optional Reading/writing courses are available</p>
      <div class="d-flex justify-content-end ourclass_close_btn_div"><button class="btn shadow-none ourclass_close_btn" type="button" id="ourClassBtn3">close</button></div>
    </div>
  </div>

  <div class="ourClassContainer Late-teens">
    <div class="ourClassChild fw-bold">

      <h3 class="violet fw-bold"> Late Teens
        16 to 19 years old</h3>
      <p>These classes are designed to introduce Basic and Advanced level of Spoken <span class="colred">PANJABI</span>,
        <span class="colgreen">HINDI</span>
        and <span class="colred">GUJARATI</span>, to Beginners.
      </p>
      <p>The aim is to Build <span class="violet">VOCABULARY</span> and <span class="colgreen">SPEAK</span> with <span class="violet">CONFIDENCE</span>, by using Colourful
        Flashcards,
        age related <span class="colred">ACTIVITIES</span> and <span class="violet">GAMES</span></p>
      <p>Optional Reading/writing courses are available</p>
      <div class="d-flex justify-content-end ourclass_close_btn_div"><button class="btn shadow-none ourclass_close_btn" type="button" id="ourClassBtn4">close</button></div>
    </div>
  </div>

  <div class="ourClassContainer adults">
    <div class="ourClassChild fw-bold">
      <h3 class="violet fw-bold"> ADULT – AGES 20 PLUS </h3>

      <p>These classes are designed to introduce Basic and Advanced level of Spoken <span class="colred">PANJABI</span>,
        <span class="colgreen">HINDI</span>
        and <span class="colred">GUJARATI</span>, to Beginners.
      </p>
      <p>The aim is to Build <span class="violet">VOCABULARY</span> and <span class="colgreen">SPEAK</span> with <span class="violet">CONFIDENCE</span>, by using Colourful
        Flashcards, <span class="violet">POWERPOINT </span>
        age related <span class="colred">ACTIVITIES</span> and <span class="violet">GAMES</span></p>
      <p>Optional Reading/writing courses are available</p>
      <div class="d-flex justify-content-end ourclass_close_btn_div"><button class="btn shadow-none ourclass_close_btn" type="button" id="ourClassBtn5">close</button></div>
    </div>
  </div>
  <!-- our clases popup mesg end -->
  <!-- header -->
  <div class="bg-image container-fluid" style="background-size:cover">
    <div class="row ">
      <div class="col firstBannerText">
          <div class="pt-3">
            <h2p class="h2 fw-bold violet">
              THE BEST <span style="color:red ;">ONLINE</span> INDIAN LANGUAGE SCHOOL, FOR THE WHOLE
              FAMILY!</h2>
          </div>
          <div class="pt-3">
            <p class="h3" style="color:#000000;  font-weight: bold;">
              <span style="color:#d63031;">Welcome</span> <span style="color: #d63031">to <span class="colred">S</span>.<span style="color: orange;">M</span>.<span style="color: purple;">I</span>.<span style="color: green;">L</span>.<span style="color: blue;">E</span> <span style="color: purple;">4 Kids</span>
                Indian Language School</span>
            </p>
          </div>
          <div class="pt-3">
            <ul class="list-unstyled " style="font-size:17px; font-weight: bold; color:black ;">
              <li>Our <span class="colred">PASSION</span> is to keep our <span class="violet">MOTHER TONGUE</span> alive, through the generations.</li> <br>
              <li>We believe that, <span class="colred">ROOTS </span>are not the way we dress or the food we eat, but the <span class="colgreen">LANGUAGE</span>
                that
                we <span class="colgreen">SPEAK</span> .</li> <br>
              <li>Our courses are <span class="violet">PRACTICAL</span> and <span class="violet">INTERACTIVE</span>, which makes learning <span class="colred">CONVERSATIONAL</span>
                <span class="violet">HINDI</span>,
                <span class="colred">GUJARATI</span> and <span class="colgreen">PANJABI,</span> Fun and Easy, for all the Family!!
              </li><br>
              <li>Our <span class="violet">AIM</span>, is for each student to gradually build <span class="colred">CONFIDENCE</span> and <span class="violet">ENTHUSIASM</span>, so they
                will
                LOVE to show off their new Vocabulary!!</li><br>
              <li>All courses are for <span class="colred">BEGINNERS</span>.<br><br> Additional reading/writing courses are optional.
              </li>
            </ul>
          </div>
      </div>

      <div class="col firstBanner" style="
            background-image:linear-gradient(to right,white 8%, transparent 40%), url('./assets/images/familyfun.jpg');
          
            object-fit: cover;
            background-repeat: no-repeat;
            background-size:cover">

      </div>
    </div>
  </div>


  <!--------Language------>

  <div class="container">
    <div class="mt-5">
      <div class="mb-4">
        <h1 class="head2 text-center">Languages</h1>
      </div>
      <div class="row">
        <div class="col-md-4 mb-2">
          <div>
            <div class="col d-flex justify-content-center align-items-center mar-gap">
              <img src='assets/icons/dhol.png' style="width: 140px;height: 128px;">
            </div>
          </div>
          <div class="violet" style="margin-top: 20px">
            <h5 class="col d-flex justify-content-center align-items-center fw-bold">
              Panjabi
            </h5>
          </div>
          <div class="col d-flex justify-content-center align-items-center">
            <a class="btn" href="courses_panjabi?lan=<?php echo "Panjabi" ?>" role="button" style="background-color: red; color: white">Apply</a>
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <div>
            <div class="col d-flex justify-content-center align-items-center mar-gap">
              <img src='assets/icons/lotus.png' style="width: 150px;height: 128px;">
            </div>
          </div>
          <div class=" violet" style="margin-top: 20px">
            <h5 class="col d-flex justify-content-center align-items-center fw-bold">
              Hindi
            </h5>
          </div>
          <div class="col d-flex justify-content-center align-items-center">
            <a class="btn" href="courses_hindi?lan=<?php echo "Hindi" ?>" role="button" style="background-color: orange; color: white">Apply</a>
          </div>
        </div>
        <div class="col-md-4 mb-2">
          <div>
            <div class="col d-flex justify-content-center align-items-center mar-gap">
              <img src='assets/icons/elephant.png' style="width: 150px;height: 128px;">
            </div>
          </div>
          <div class="violet" style="margin-top: 20px">
            <h5 class="col d-flex justify-content-center align-items-center fw-bold">
              Gujarati
            </h5>
          </div>
          <div class="col d-flex justify-content-center align-items-center">
            <a class="btn" href="courses_gujarati?lan=<?php echo "Gujarati" ?>" role="button" style="background-color: green; color: white">Apply</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-----Our Class------>

  <div class="container pt-5">
    <div class="row">
      <div class="col text-center">
        <h1 class="head2">Our Classes</h1>
      </div>
    </div>
    <div style="margin: 2% 0">
      <div class="d-flex justify-content-center flex-wrap">
        <div class="p-2 mx-2 img-over class_bg_img1 pre-Prep-main">
          <div class="text-over violet text-start">
            <span class="fs-5 fw-bold text-white ">Pre-Prep<br />Ages 4 to 6
              years old <br>Click here</span>
          </div>
        </div>
        <div class="p-2 mx-2 img-over class_bg_img2 junior-main">
          <div class="text-over fw-bold text-start">
            <span class="fs-5 fw-bold text-white">Junior<br />Ages 7 to 10 years
              old<br>Click here</span>
          </div>
        </div>
        <div class="p-2 mx-2 img-over class_bg_img3 text-white fw-bold early-Teens-main">
          <div class="text-over text-start">
            <span class="fs-5 fw-bold">Early Teens</span><br />11 to 15
            years old
            <br>Click here
          </div>
        </div>
        <div class="p-2 mx-2 img-over class_bg_img4 text-white fw-bold late-Teens-main">
          <div class="text-over text-start">
            <span class="fs-5 fw-bold">Late Teens</span><br />16 to 19 years old
            <br>Click here
          </div>
        </div>
        <div class="p-2 mx-2 img-over class_bg_img5 text-white fw-bold adults-main">
          <div class="text-over text-start">
            <span class="fs-5 fw-bold">Adults</span><br />Ages 20 plus
            <br>Click here
          </div>
        </div>
      </div>


    </div>
  </div>

  <!---why choose us---->
  <div class="whychoose">

    <h1 class="head2" style="text-align: center;">Why choose us ? </h1>
    <div class="container" style="text-align: center;">
      <div class="row " style="margin-top: 50px;">
        <div class="col pb-3">
          <img src='assets/icons/kids1.jpg' style="height: 150px;">

          <div style="margin: 10px;">
            <!-- <p> It’s simple !</p> -->
            <p> We make learning languages <span class="colred">FUN, ENGAGING and ENJOYABLE</span></p>
            <p> By adopting a ‘<span class="violet">WHOLE APPROACH</span>, to learning languages, </p>
            <p>we help students to embrace their <span class="colgreen">CULTURE</span>, as well as <span class="colgreen">VOCABULARY</span></p>
          </div>

        </div>
        <div class="col">
          <img src='assets/icons/womens.webp' style="height: 200px;margin-top:-35px">

          <div style="margin: 10px;">
            <p>Structured, weekly ( ONLINE ) classes for all children, from age 4 to 19 years, to learn Spoken and or Written <span class="colgreen">HINDI, GUJARATI AND PANJABI</span></p>
            <p>Small group classes, where Children and Adults build <span class="colred">VOCABULARY</span> and <span class="colred">CONFIDENCE</span>, through the weeks</p>
          </div>
        </div>
        <div class="col ">

          <img src='assets/icons/kids2.jpg' style="height: 150px;">
          <div style="margin: 10px;">
            <p> Individual student <span class="violet">PORTAL OF RESOURCES</span>, linked to learning in class</p>
            <p> <span class="colred">FREE</span> trial class offered to all Students</p>
            <p><span class="colgreen">ENTHUSIASTIC TEACHERS</span><br>( DBS checked ),that love to teach !</p>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!---Try Free Class---->

  <div class="tryFreeClassBg py-3 d-flex justify-content-center align-items-center text-center">
    <div class="text-tryFreeClass-over ">
      <div class=" ">
        <p class="fw-bold text-white h1">Try a FREE Class</p>
        <div class="text-white tryFreeClassFSize p-3">
          <p>At S.M.I.L.E 4 Kids, we value EACH of our students</p>
          <p>We want EVERY student to feel COMFORTABLE, INFORMED and HAPPY, when they JOIN our courses
          </p>
          <p>This is why we offer a FREE TRIAL CLASS ( for all age groups)</p>
          <p>This ensures that each student is HAPPY, with the style of teaching that we offer</p>
          <p>In addition, it enables students to meet their prospective teacher and ask questions,
            before
            committing to a course </p>
        </div>
        <a class="btn shadow-none tryFreeClassBtn" href="tryfreeform" role="button"><span class="fs-6 fw-bold">Apply</span></a>
      </div>
    </div>
  </div>

  <!---How We Learn--->
  <div class="container">
    <div class="row" style="margin: 3% 0">
      <div class="col d-flex justify-content-center align-items-center">
        <h1 class="head2">How We Learn</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 songs_container">
        <div>
          <div>
            <div class="col d-flex justify-content-center align-items-center">
              <a href="songs"> <img src="assets/images/musichow.png" style="width: 200px; height: 200px" /></a>
            </div>
          </div>
          <div>
            <h5 class="col d-flex justify-content-center align-items-center fs-3 fw-bold colgreen">
              Songs
            </h5>
          </div>
        </div>

      </div>

      <div class="col-md-4 games_container">
        <div>
          <div>
            <div class="col d-flex justify-content-center align-items-center">
              <a href="games"><img src="./assets/images/word.jfif" style="width: 200px; height: 200px" /></a>
            </div>
          </div>
          <div>
            <h5 class="col d-flex justify-content-center align-items-center fs-3 fw-bold red">
              Games
            </h5>
          </div>

        </div>
      </div>

      <div class="col-md-4 activities_container">
        <div>
          <div>
            <div class="col d-flex justify-content-center align-items-center">
              <a href="activities"> <img src="assets/images/activites.jpg" style="width: 200px; height: 200px" /></a>
            </div>
          </div>
          <div>
            <h5 class="col d-flex justify-content-center align-items-center fs-3 fw-bold text-warning">
              Activities
            </h5>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!---Video Play--->
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col d-flex justify-content-center align-items-center mb-3">
        <h1 class="head2 ">Our Classes In Action!</h1>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <video controls width="80%" src="assets/videos/videohome.mp4" title="kids totoriyal"></video>
    </div>

  </div>

  <!-- Structure contents -->
  <section class="container font">
    <div class="row mt-5">
      <div class="col d-flex justify-content-center">
        <h1>
          Structure and Benefits
        </h1>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md d-flex align-content-center flex-wrap">
        <h5 class="head2">OUR CLASSES are 1 hour per week<br> ( 45 mins for 4 to 6 years )<br><br>
          11 weeks per term<br><br> </h5>
        <p class="fs-6">
          EACH CLASS has a maximum (or up to) 10 students, per class


        </p>
      </div>
      <div class="col-md bg_col">
        <img src="assets/images/girlthums.jpg" alt="learning" class="lear_img" />
      </div>
    </div>
    <!-- second row -->
    <div class="row mt-5">
      <div class="col-md bg_col">
        <img src="assets/images/girlandmomwithlap.jpg" alt="learning" class="lear_img" />
      </div>
      <div class="col-md d-flex align-content-center flex-wrap">
        <h5 class="head2">There is a choice of 8 optional SPOKEN terms (PLUS 2 writing/reading terms)</h5>
        <br>
        <p class="fs-6">
          The students only ‘HOMEWORK’, is to practice each weeks phrases daily, with friends and family
        </p>
      </div>
    </div>
    <!-- third row  -->
    <div class="row mt-5">
      <div class="col-md d-flex align-content-center flex-wrap">
        <h5 class="head2">All weekly learning, is on each individual STUDENT PORTAL

        </h5><br>
        <p class="fs-6">
          We offer OPTIONAL end of term ASSESSMENTS, to each student, where questions and answers are provided,
          a week before the class


        </p>
      </div>
      <div class="col-md bg_col">
        <img src="assets/images/boy710.jpg" alt="learning" class="lear_img" />
      </div>
    </div>
    <!-- forth row -->
    <div class="row mt-5">
      <div class="col-md bg_col">
        <img src="assets/images/girladultlap.jpg" alt="learning" class="lear_img" />
      </div>
      <div class="col-md d-flex align-content-center flex-wrap">
        <h5 class="head2">The idea is to PRACTICE and REINFORCE, the current terms learning, before moving to
          succeeding term </h5>
        <p class="fs-6 mt-2">
          All teachers are FULLY TRAINED, with up to date DBS checks
        </p>
      </div>
    </div>
  </section>

  <!-----Have a LOok---->

  <div class="haveLookBg pb-5 d-flex justify-content-center align-items-center text-center mt-5">
    <div class="text-tryFreeClass-over">
      <div class="text-white">
        <span class="fs-1 fw-bold">Have a look at our<br />Online Shop</span><br />
        <p style="font-size: 18px; max-width:700px" class="fw-bold lh-lg">At SMILE 4 kids Indian
          Language School, we believe in
          making learning <span class="p-1 rounded" style="background-color: #8e44ad;">FUN</span> and <span class="p-1 rounded" style="background-color: #8e44ad;">ENJOYABLE</span>  with our <a href="https://smile4kids.company.site/products/search?keyword=flashcards" target="-blank" class="text-decoration-none productName  px-1">FLASHCARDS GAMES</a> and  <a href="https://smile4kids.company.site/products/search?keyword=ebook" target="-blank" class="text-decoration-none productName">eBOOKS</a> </p>
      </div>


      <a class="btn shadow-none" href="https://smile4kids.company.site/" target="_blank" role="button"><span class="fs-5 fw-bold">SHOP NOW</span></a>
    </div>

  </div>

  <!-- -Parent says-testimonal she will addded and its shows  -->

  <div class="container mt-5">
    <div class="row mt-2">
      <div class="col d-flex justify-content-center align-items-center parentsSayHed">
        <h1 class="head2">What Our Parents Say</h1>
      </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide m-4 shadow" data-bs-ride="carousel">
      <div class="carousel-inner">

        <div class="carousel-item ">
          <div class="card ">
            <div class=" row g-0">
              <div class="col-md-4">
                <img src="assets/images/parentsays2.jpg" class="img-fluid rounded-start" alt="..." style="height: 350px;width:100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <blockquote class="blockquote text-right">
                    <p class="mb-0 fw-bold"><span style="color: red;font-size:30px" class="ml-3">&#8220;</span>Highly recommended classes!

                      Since starting at Smile 4 Kids, my son has started to converse confidently, in Hindi.

                      He has previously shyed away from this.
                      He even shares his new Hindi words and sentences with his grandmother, who lives in India.
                      It reallly makes her day and mine too!!!
                      <span style="color: red;font-size:30px">&#8221;</span>
                    </p>

                    <div class="violet mt-2 fw-bold">
                      <p>Mrs Aarti Kumar - Bristol <br>
                        "HINDI"</p>
                    </div>

                  </blockquote>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="card ">
            <div class=" row g-0">
              <div class="col-md-4">
                <img src="assets/images/parentsays1.jpg" class="img-fluid rounded-start" alt="..." style="height: 350px;width:100%">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <blockquote class="blockquote text-right">
                    <p class="mb-0 fw-bold"><span style="color: red;font-size:30px" class="ml-3">&#8220;</span>Thank you for the trial Gujarati class, Safrina!
                      My son totally enjoyed it and wants more. The group size was perfect and the teacher was great. I hope we can continue with same teacher.
                      Such great progress and we are consciously talking more in Hindi as a family, which my son, is enjoying and trying to pick up.
                      Before he used to get frustrated!<span style="color: red;font-size:30px">&#8221;</span>

                    </p>

                    <div class="violet mt-2 fw-bold">
                      <p>Mrs Asha Pathak - Hayes <br>
                        "GUJARATI"</p>
                    </div>

                  </blockquote>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="card ">
            <div class=" row g-0">

              <div class="col-md-8">
                <div class="card-body">
                  <blockquote class="blockquote text-right">
                    <p class="mb-0 fw-bold"><span style="color: red;font-size:30px" class="ml-3">&#8220;</span>Thanks for organising the Trial class, it was great!<br>They all enjoyed the class and thought the teacher was great too! Your classes come highly recommended to me and now I understand why.<br>
                      All three are happy to continue<br>
                      I didn't think I'd hear my children say that they'd be happy to attend Panjabi classes. Thank you so much!
                      <span style="color: red;font-size:30px">&#8221;</span>
                    </p>

                    <div class="violet mt-2 fw-bold">
                      <p>Mr Parvinder Singh - Bromley
                        <br><i>"PANJABI"</i>
                      </p>
                    </div>

                  </blockquote>
                </div>
              </div>
              <div class="col-md-4">
                <img src="assets/images/parentsays3.webp" class="img-fluid rounded-start" alt="..." style="height: 350px;width:100%">
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item active">
          <div class="card ">
            <div class=" row g-0">
              <div class="col-md-4">
                <img src="assets/images/parentsays4.jpg" class="img-fluid rounded-start" alt="..." style="height: 350px;width:100%;object-fit:contain">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <blockquote class="blockquote text-right">
                    <p class="mb-0 fw-bold"><span style="color: red;font-size:30px" class="ml-3">&#8220;</span>Smile for Kids has been great for my children, 7&9.
                      We were blown away by how much the children enjoyed it.
                      It's a fun interactive lesson and I must say that credit to Safrina, who is not only extremely knowledgeable in the teaching field but has a passion for ensuring children of the next generation learn Panjabi.
                      <span style="color: red;font-size:30px">&#8221;</span>

                    </p>

                    <div class="violet mt-2 fw-bold">
                      <p>Mrs Sangeet Sehmi - Milton Keynes <br>
                        "PANJABI"</p>
                    </div>

                  </blockquote>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- send it to me -->
  <div class="container p-3">
    <div class="row">
      <div class="col-sm-7">
        <div class="card-body">
          <h3 class="h3 card-title colorall violet fw-bold">FREE TOP 10 TIPS</h3>
          <div class="fs-5">
            <p>1. Are you struggling to <span class="violet">MAKE TIME</span> and FIND WAYS
              to SPEAK your <span class="colred">MOTHER TONGUE</span> with your children ?
            </p>
            <p>2. Let <span class="colred">SMILE</span> 4 Kids Indian Language School help you
            </p>
            <p>3. Get your 10 <span class="colgreen">PRACTICAL TIPS</span> – <span class="violet">EASY</span> and <span class="colred">FREE!!</span>
            </p>
            <p>4. And watch your Mother Tongue be part of your everyday Vocabulary
            </p>
            <p>5. <span class="colgreen">FREE GUIDE</span> to help your children and family to <span class="violet">SPEAK</span> your mother Tongue
            </p>

            <button type="button" class="btn shadow-none btn-danger" id="sendMeBtn">SEND ME NOW </button>

          </div>

        </div>
      </div>
      <div class="col-sm-5 rounded" style="background-image:url('assets/images/safrina.jpeg') ; background-repeat:no-repeat; background-position:center; background-size:250px">
      </div>
    </div>
  </div>
 
  <!----Footer---->
  <?php include('footer.php') ?>

  <script>
    const prePrep = document.querySelector('.pre-Prep-main');
    const junior = document.querySelector('.junior-main');
    const earlyTeens = document.querySelector('.early-Teens-main');
    const lateTeens = document.querySelector('.late-Teens-main');
    const adults = document.querySelector('.adults-main');

    const prePrepMsg = document.querySelector('.pre-Prep');
    const juniorMsg = document.querySelector('.junior');
    const earlyTeensMsg = document.querySelector('.early-Teens');
    const lateTeensMsg = document.querySelector('.Late-teens');
    const adultsMsg = document.querySelector('.adults');

    const closeBtn1 = document.getElementById('ourClassBtn1');
    const closeBtn2 = document.getElementById('ourClassBtn2');
    const closeBtn3 = document.getElementById('ourClassBtn3');
    const closeBtn4 = document.getElementById('ourClassBtn4');
    const closeBtn5 = document.getElementById('ourClassBtn5');


    prePrep.addEventListener('click', () => {
      prePrepMsg.style.display = 'flex';
    })
    closeBtn1.addEventListener('click', () => {
      prePrepMsg.style.display = 'none';
    })


    junior.addEventListener('click', () => {
      juniorMsg.style.display = 'flex';
    })
    closeBtn2.addEventListener('click', () => {
      juniorMsg.style.display = 'none';
    })



    earlyTeens.addEventListener('click', () => {
      earlyTeensMsg.style.display = 'flex';
    })
    closeBtn3.addEventListener('click', () => {
      earlyTeensMsg.style.display = 'none';
    })



    lateTeens.addEventListener('click', () => {
      lateTeensMsg.style.display = 'flex';
    })
    closeBtn4.addEventListener('click', () => {
      lateTeensMsg.style.display = 'none';
    })



    adults.addEventListener('click', () => {
      adultsMsg.style.display = 'flex';
    })
    closeBtn5.addEventListener('click', () => {
      adultsMsg.style.display = 'none';
    })

    const sendBtn = document.getElementById('sendMeBtn');
    const newsLetterContainer = document.querySelector('.newsLetterContainer');
    const closeBtn = document.querySelector('.closeButton');
    sendBtn.addEventListener('click', () => {
      newsLetterContainer.style.display = "flex";
    })
    closeBtn.addEventListener('click', () => {
      newsLetterContainer.style.display = "none";
    })

    closeBtn.addEventListener('mouseover', () => {
      closeBtn.src = "./assets/icons/close-h.png"
    })
    closeBtn.addEventListener('mouseout', () => {
      closeBtn.src = "./assets/icons/close-n.png"
    })
  </script>
 <script>
$(document).ready(function() {
    $(document).on('blur', '#n_email', function(){
        var valmail=$(this).val();
        $.ajax({
            url: "tipAction.php",
            method: "POST",
            data: {
                valmail: valmail
            },
            success: function(rep){
                if(rep == "Already Subscribed, Thank You."){
                        $("#n_email").val('');
                        $('#n_email').parent().removeClass();
                            $('#n_email').parent().addClass("form_error");
                            $('#n_email').siblings("span").text(rep);
                }else{
                    $('#n_email').parent().removeClass();
                     $('#n_email').siblings("span").text("");
                }
            }
        })
    })
    
        $(document).on('submit', '#newsPop', function(e) {
          e.preventDefault();
        
        var name = $("#n_name").val();
        var email = $("#n_email").val();
        
        $('.subscribeBtn').prop('disabled', true);
            var action = 'newsletter';
              $.ajax({
                type: "POST",
                url: "tipAction.php",
                data: {
                    name: name,
                    email : email,
                    action : action
                },
                success: function(response) {
                    console.log(response);
                    if(response == 'error'){
                        $("#n_name").val('');
                        $("#n_email").val('');
                    }else{
                        $("#n_name").val('');
                        $("#n_email").val('');
                        $('.subscribeBtn').prop('disabled', false);
                        newsLetterContainer.style.display = "none";
                       
                        toastr.success('Subscribed', {timeOut: 5000});  
                    }
                }
              });
        });
});
 </script>
</body>
</html>