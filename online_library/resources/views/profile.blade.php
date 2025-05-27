<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Dashboard</title>
  </head>
  <style>
    .result-content{
        align-items: center;
        position: relative;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        border-radius: 10px;
        padding: 0px; 
    }
    .result-content img {
        width: 50px;
        height: 50px;
        cursor: pointer;
        border-radius: 50%;
    }
    .result-box {
        width:100%;
        align-items: center;
        margin-bottom: 1rem;
    }
    .result-box li {
        list-style: none;
        border-radius: 3px;
        padding: 15px;
        cursor: pointer;
    }
    .result-box table {
        width: 100%;
        background: #e9f3ff;
        border-radius: 20px;
        padding: 20px;
        gap: 5px;
        list-style: none;
        cursor: pointer;
    }
    .result-box table:hover{
        background-color:rgba(133, 194, 243, 0.822);
    }
    .result-box tr {
        height:50px;
    }
    .search-box-id  {
        display: flex;
        flex-flow: row;
    }
    /*.pro-div table , th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }*/
    .pro-div table{
        width: 100%;
    }
    .pro-div img {
        width: 200px;
        height: 200px;
        cursor: pointer;
        border-radius: 50%;
    }
    .pro-div p {
        color: #2554C7;
    }
    .pro-div .tag {
        display: inline-block;
        background-color: #e0f7c1;
        padding: 5px;
        margin-right: 5px;
        margin-bottom: 5px;
        border-radius: 5px;
    }
    /*  */
    .pro-div input, textarea {
        padding: 10px;
        font-size: 12px;
        border: 1px solid #ccc;
        background: rgb(237, 237, 237);
        border-radius: 10px;
        align-items: center;
        gap: 5px;
        width: 100%;
    }
    .btn-div input [type="submit"]{
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-div input [type="submit"]:hover{
        background-color: #0056b3;
    }
    .pro-div .select-box{
        background: transparent;
    }
    .pro-div .select-box .sel-input {
        align-items: center;
        gap: 5px;
        width: 100%;
    }
    .pro-div .add-box{
        padding: 10px;
        max-height: 300px;
        overflow-y: scroll;
    }
    .pro-div .add-box ul li{
        list-style: none;
        border-radius: 3px;
        padding:10px;
        cursor: pointer;
        background: rgb(237, 237, 237);
        align-items: center;
        gap: 5px;
        margin-bottom: 5px;
    }
    .pro-div .add-box ul li:hover{
        background-color:rgba(133, 194, 243, 0.822);
    }
    /*Pop-up*/
    /* Popup container */
    .popup {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    /* Popup content */
    .popup-content {
        background-color: #fefefe;
        margin: 5% auto; /* 5% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
    }
    textarea {
        padding: 10px;
        font-size: 12px;
        border: 1px solid #ccc;
        background: rgb(237, 237, 237);
        border-radius: 10px;
        align-items: center;
        gap: 5px;
        width: 100%;
    }

  </style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body>
  <div class="sidebar">
    <div class = "logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="profile">
                    <i class="ifas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="borrowed">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>History</span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
  </div>

  <div class= "main-content">
    <div class= "header-wrapper">
        <div class="header-title">
            <span style="vertical-align: text-top;"></span><br>
            <h3 style="vertical-align: text-top;">Dashboard</h3>
        </div>
        <div calss="user-info">
            <div class= "search-box" >
                <input type="search" name="searchid" id="live_search" placeholder="Search" style="width:93%" autocomplete="off"/>
                <button type="submit" name="search"><i class= "fa-solid fa-search" style="color: rgba(96, 175, 240, 0.822);"></i></button>
            </div>
        </div>
        <?php if (!empty($userprofile)) { echo "<img src='../upload/" . $userprofile . "' width='250px'>";
                }else  echo "<img src='icon/default_profile.png' /> " ?>
    </div>

    <div class="result-content">
        <div class="result-box" id="resultbox"></div> 
    </div>
    <div class= "chat-content">
        <div class="chat-header-wrapper">
            <div id="chat-box" class="pro-div">
                        <table>
                            <tr style="height:300px; text-align: center;">
                                <th colspan ="4">
                                    <form class="form" method="post" enctype='multipart/form-data'>
                                        <div>
                                            <?php if (!empty($row["profile_image"])) { echo "<img src='../upload/" . $row["profile_image"] . "' width='250px'>";
                                                }else echo "<img src='icon/default_profile.png' /> " ?>                                        
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name='image' class="custom-file-input" id="profilepic" aria-describedby="profilepicinput">
                                                <label class="custom-file-label" for="profilepic">Change Photo</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit" name='but_upload' id="profilepicinput">Upload Picture</button>
                                            </div>
                                        </div>
                                    </form>
                                </th>
                            </tr>
                            <tr style="height:30px;"><td style="text-align: center;"><b></b></td></tr>
                            <tr style="height:30px;"><td style="text-align: center;"><p>Contect_No: <b></b></p></td></tr>
                            <tr style="height:30px;"><td style="text-align: center;"><p>Email_ID: <b></b></p></td></tr>
                        </table><br><br>
                <!--Main profile display End here--> 
                <br><br><br><table>
                    <tr style="height:30px;"><td style="text-align: center;"><p style="color: #2554C7;"><button style="background: transparent;" onclick="setPassword()"><i><u>Reset_Password</u></i></button></p></td></tr>
                    <tr style="height:30px;"><td style="text-align: center;"><p style="color: #2554C7;"><button style="background: transparent;" onclick="openReport()"><i><u>Report</u></i></button></p></td></tr>
                </table>           
            </div>
        </div>
    </div>
        <!-- Message chat-bar-->
        <!-- Pop-Up window for Reset Password-->
        <div id="resetform" class="popup">
            <div id="popup-content" class="popup-content">
                <span class="close" onclick="offPassword()">&times;</span>
                    <h2 style="text-align:center">Reset Password</h2>
                
                <form method="POST">
                    <label>Current Password</label><br>
                    <input type="password" id="serid" class="form-control" name="currentpass" placeholder ="Type your Current Password" required><br>
                    <label>New Password</label><br>
                    <input type="password" id="itemtype" class="form-control" name="newpass" placeholder ="New Password"><br>
                    <label>confirm Password</label><br>
                    <input type="password" id="itemtype" class="form-control" name="confirmpass" placeholder ="*confirm Password"><br>
                    <input type="submit" class="btn btn-primary" name="confirm" value="Confirm">  
                    <input type="close" class="btn btn-secondary" value= "Close" onclick="offPassword()">
                </form>
            </div>
        </div>
        <!-- Pop-Up window for Reset Password close-->
        <!-- Pop-Up window for Reporting-->
        <div id="reportForm" class="popup">
            <div id="popup-content" class="popup-content">
                <span class="close" onclick="closeReport()">&times;</span>
                    <h2 style="text-align:center"><b>Report</b></h2>
                
                <form method="POST" action="../reporting.php" style="display: inline;">
                    <label for="useremail">From:</label>
                    <input type="text" id="from" style="border-radius:5%; text-align: center; flex: 1; padding: 10px; border: 1px solid #ccc; width: 50%;" name="useremail" value="" placeholder ="" readonly ><br><br>
                    <label>Report:</label><br>
                    <textarea name="report" id="report" style="height: 250px;"></textarea>
                    <input type="submit" class="btn btn-primary" name="send" value="Send">  
                    <input type="close" class="btn btn-secondary" value= "Close" onclick="closeReport()">
                </form>
            </div>
        </div>
        <!-- Pop-Up window for Reset Password close-->
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>