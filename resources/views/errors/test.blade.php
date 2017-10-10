<!DOCTYPE html>
<html>

<head>
    <title>Resume</title>

    <style>
        .container {
            width: 95%;
            margin: 0 auto;
        }

        .main .title {
            font-size: 2.0em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        #contact {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #contact > li {
            display: inline-block;
            margin-right: 10px;
        }

        #contact > li > img {
            width: 20px;
            height: 20px;
            margin-right: 2px;
        }

        .profile {
            width: 120px;
            height: 120px;
            margin-left: 30px;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        #contact > li > img,
        #contact > li > span {
            display: inline-block;
            vertical-align: middle;
        }

        a,
        a:visited {
            color: #3333CC;
            text-decoration: none;
        }

        .section .title {
            text-transform: uppercase;
            background-color: #CCCCFF;
        }

        .inline {
            display: inline-block;
            vertical-align: top;
        }

        .width-70 {
            width: 68%;
        }

        .width-60 {
            width: 58%;
        }

        .width-50 {
            width: 48%;
        }

        .width-40 {
            width: 38%;
        }

        .width-30 {
            width: 28%;
        }

        .width-20 {
            width: 18%;
        }

        .width-10 {
            width: 8%;
        }

        .section {
            font-size: 13px;
        }

        .title {
            margin-bottom: 5px;
            font-size: 15px;
        }

        .content {
            margin-top: 5px;
        }

        .content p {
            margin: 0;
        }

        .content h1,
        .content h2,
        .content h3,
        .content h4,
        .content h5,
        .content h6 {
            margin: 0;
        }

        .project,
        .work {
            margin: 7px 0px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="inline width-70">
        <div class="main">
            <h1 class="title">'.$_POST['name'].'</h1>
            <div class="content">

                <strong>Email: </strong><span> '.$_POST['email'].'</span> <br />

                <!--<strong>Web: </strong><a href="http://johndoe.com"> johndoe.com</a></span>
                    <br /> -->

                <strong>Phone: </strong><span>'.$_POST['mobile'].'</span>
                <br />

                <strong>Address: </strong> <span> '.$_POST['address'].', &nbsp;'.$_POST['city'].',&nbsp;'.$_POST['district'].'-'. $_POST['pincode'].'</span>

            </div>
        </div>
    </div>
    <div class="inline width-30">
        <img class="profile" src="uploads/profile/profile.png" alt="" />
    </div>
    <hr>

    <div class="section">
        <h2 class="title">Career Objective</h2>
        <div class="content">
            <p>'.$_POST['carrer_objective'].'</p>
        </div>
    </div>
    <div class="section">
        <h2 class="title">Education</h2>
        <div class="content">
            <div class="inline width-30">
                <p>'.$_POST['deg_course'].'</p>
            </div>
            <div class="inline width-30">
                <p>'.$_POST['deg_institution'].'</p>
            </div>
            <div class="inline width-20">
                <p>'.$_POST['deg_place'].'</p>
            </div>
            <div class="inline width-10">
                <p>'.$_POST['deg_yop'].'</p>
            </div>
            <div class="inline width-10">
                <p>'.$_POST['deg_parcentage'].'</p>
            </div>
        </div>
        <div class="content">
            <div class="inline width-30">
                <p>'.$_POST['hsc_course'].'</p>
            </div>
            <div class="inline width-30">
                <p>'.$_POST['hsc_institution'].'</p>
            </div>
            <div class="inline width-20">
                <p>'.$_POST['hsc_place'].'</p>
            </div>
            <div class="inline width-10">
                <p>'.$_POST['hsc_yop'].'</p>
            </div>
            <div class="inline width-10">
                <p>'.$_POST['hsc_parcentage'].'</p>
            </div>
        </div>
        <div class="content">
            <div class="inline width-30">
                <p>'.$_POST['sslc_course'].'</p>
            </div>
            <div class="inline width-30">
                <p>'.$_POST['sslc_institution'].'</p>
            </div>
            <div class="inline width-20">
                <p>'.$_POST['sslc_place'].'</p>
            </div>
            <div class="inline width-10">
                <p>'.$_POST['sslc_yop'].'</p>
            </div>
            <div class="inline width-10">
                <p>'.$_POST['sslc_parcentage'].'</p>
            </div>
        </div>
    </div>

    <div class="section">
        <h2 class="title">Technical Skills</h2>
        <div class="content">
            <p>'.$_POST['tech_skill'].' </p>
            <!--<p><strong>Frameworks/Tools:</strong> Punch Cards</p> -->
        </div>
    </div>

    <div class="section">
        <h2 class="title">Inplant Training</h2>
        <div class="content">
            <p>'.$_POST['inplant_train'].'</p>
        </div>
    </div>

    <div class="section">
        <h2 class="title">Conference/Journals</h2>
        <div class="content">
            <h4>'.$_POST['conference_title'].'</h4>
            <p>'.$_POST['conference_disc'].'</p>
            <!--<p><a href="#">conference.com/conference/conference_title</a></p> -->
        </div>
    </div>

    <div class="section">
        <h2 class="title">Acadamic Projects</h2>
        <div class="content">
            <div class="project">
                <h4>'.$_POST['project_title'].'</h4>
                <p>'.$_POST['project_disc'].'</p>
                <!--<p><a href="#">protects.com/projects/projectname</a></p>-->
            </div>
            <!-- <div class="project">
            <h4></h4>
            <p></p>
            <p><a href=""></a></p>
        </div> -->
        </div>
    </div>

    <div class="section">
        <h2 class="title">Achievements</h2>
        <div class="content">
            <p>'.$_POST['achievements'].'</p>
        </div>
    </div>

    <div class="section">
        <h2 class="title">Areas of Interest</h2>
        <div class="content">
            <p>'.$_POST['aoi'].'</p>
        </div>
    </div>

    <div class="section">
        <h2 class="title">Languages Known</h2>
        <div class="content">
            <p>'.$_POST['language'].'</p>
        </div>
    </div>

    <div class="section">
        <h2 class="title">Personal Details</h2>
        <div class="content">

            <strong>Date of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['dob'].'</span>
            <br />

            <strong>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong><span>'.$_POST['gender'].'</span>
            <br />

            <strong>Material Status&nbsp;&nbsp;&nbsp;: </strong><span> '.$_POST['material_status'].' </span>
            <br />

            <strong>Nationality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </strong> <span>'.$_POST['nationality'].'</span>

        </div>
    </div>

    <div class="section">
        <h2 class="title">Declaration</h2>
        <div class="content">
            <p>'.$_POST['declaration'].'</p>
        </div>
    </div>
    <br />
    <br />

    <div class="section">
        <div class="content">
            <div class="inline width-60">
                <br />
                <strong>Date: </strong><span><?php echo date("d-m-Y"); ?></span>
                <br />
                <strong>Place: </strong><span>Current Place</span>
                <br />
            </div>
            <div class="inline width-40">
                <p>Yours Faithfully,</p>
                <br />
                <p>'.$_POST['sign'].'</p>
                <br />
                <strong>('.$_POST['name'].')</strong>
            </div>
        </div>
    </div>

    <!--	<div class="section">
    <h2 class="title">Work Experience</h2>
    <div class="content">
        <div class="work">
            <h4>Stark Industries</h4>
            <p>Major upgrades Iron Man armors flight system.</p>
        </div>
        <div class="work">
            <h4>S.H.I.E.L.D.</h4>
            <p>Worked on a containment module for The Hulk.</p>
        </div>
         <div class="work">
            <h4></h4>
            <p></p>
        </div>
    </div>
</div>

<div class="section">
    <h2 class="title"></h2>
    <div class="hr"></div>
    <div class="content">
        <p></p>
    </div>
</div> -->
</div>
</body>

</html>