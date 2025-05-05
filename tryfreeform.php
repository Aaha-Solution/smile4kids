<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="smile4kids" />
    <title>Smile4Kids | Try FREE Class</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        form .input_enter {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: px solid #ccc;
            outline: none;
        }

        form .input_enter:focus {
            border: 1px solid #6e20a7;
        }


        .header {
            color: #6e20a7;

        }

        .txt {
            font-weight: bold;
            color: black;
        }

        /* login */
        .box_shad {
            box-shadow: 3px 3px 20px 10px #e5caf7;
            margin-top: 10%;
            align-items: center;
        }

        .colred {
            color: red;
        }
    </style>
</head>

<body>
    <div class="sticky-sm-top">
        <?php include('navbar2.php') ?>
    </div>
    <div class="container">
        <div class="row box_shad d-flex mt-sm-5 mb-sm-5 p-3">
            <div class="col-lg" style="background-color: #fff; padding: 10px">
                <h1 class="header" style="font-weight: bold;text-align:center">Try <span class="colred">FREE</span> Class</h1>

                <form action="./enqcode.php" method="POST">
                    <label for="fname" class="txt"> Name</label>
                    <input type="text" id="fname" name="eqName" class="input_enter" placeholder="Enter your Name" required />
                    <label for="email" class="txt">Email-Id</label>
                    <input type="email" id="email" name="eqMail" class="input_enter" placeholder="Enter your Email" required />
                    <label for="phn" class="txt">Phone Number</label>
                    <input type="text" id="phn" name="eqPhone" class="input_enter" pattern="[0-9]+" placeholder="Enter your Phone Number" required />
                    <label for="Applying" class="txt">Applying For</label>
                    <input type="text" id="apfor" name="eqApply" class="input_enter" placeholder="(Language And Age)" required />
                    <label for="msg" class="txt">Message</label>
                    <input type="text" id="msg" name="eqMsg" class="input_enter" placeholder="Enter your Message" required />


                    <button type="submit" name="eqTry" class="btn btn-lg btn-block" style="
                    background-color: #6e20a7;
                    color: #fff;
                    width: 100%;
                    margin-top: 25px;
                  ">
                        <span class="d-flex justify-content-center">APPLY</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

</body>

</html>