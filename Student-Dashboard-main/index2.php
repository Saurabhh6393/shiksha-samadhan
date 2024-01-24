<?php
 
 $_server="localhost";
 $_username ="root";
 $_password = "";
 $_database = "db project";
 
 $con = mysqli_connect($_server , $_username , $_password , $_database);
      if(!$con){
         die("database connection due to failed" . mysqli_connect_error());
      }
     
      session_start();


     $name =  $_SESSION['name'];
//  $sql = "select * from `st full detail` where name ='$name";
$sql = "SELECT * FROM `st full detail`" ;
 
 $result = mysqli_query($con,$sql);
 $num = mysqli_num_rows($result);

 echo $num;
    
 //while( $row = mysqli_fetch_array($result)){
  while( $row = mysqli_fetch_array($result)){
    
     
     $email = $row['email'];
     $phone = $row['phone'];
     $course = $row['course'];
     $address = $row['address'];

    
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>

.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  background: rgb(130, 106, 251);
}
.form button:hover {
  background: rgb(88, 56, 250);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}
</style>
</head>
<body>
    <header>
        <div class="logo" title="University Management System">
            <img src="./images/logo.png" alt="">
            <h2>U<span class="danger">M</span>S</h2>
        </div>
        <div class="navbar">
            <a href="index.html" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            <a href="timetable.html" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a> 
            <a href="exam.html">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a>
            <a href="password.html">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <a href="/LearnEd_E-learning_Website-master/Studentlogin.php">
                <span class="material-icons-sharp" onclick="">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        
    </header>
    <div class="container">
       
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg" alt="">
                    </div>
                    
                    
                     <div class="info">
                        <p>Hey, <b> <?php echo $name; ?> </b> </p>
                       
                    </div>
                    
                </div>
                <div class="about">
                    <h5>Course</h5>
                    <p><?php echo $course?></p>
                    <h5>DOB</h5>
                    <p></p>
                    <h5>Contact</h5>
                    <p><?php echo $phone?></p>
                    <h5>Email</h5>
                    <p><?php echo $email?></p>
                    <h5>Address</h5>
                    <p><?php echo $address?></p>
                </div>
            </div>
        </aside>
        
        

        <main>
        <div>
                <form action="/LearnEd_E-learning_Website-master/backend/stfulldetail.php" class="form" method="post">
                    <div class="input-box">
                      <label>Full Name</label>
                      <input type="text" name="name" placeholder="Enter full name" required />
                    </div>
                    <div class="input-box">
                      <label>Email Address</label>
                      <input type="text" name ="email" placeholder="Enter email address" required />
                    </div>
                    <div class="column">
                      <div class="input-box">
                        <label>Phone Number</label>
                        <input type="number" name="phone" placeholder="Enter phone number" required />
                      </div>
                      <div class="input-box">
                        <label>Birth Date</label>
                        <input type="date" name="dob"  placeholder="Enter birth date" required />
                      </div>
                    </div>
                    <div class="gender-box">
                      <h3>Gender</h3>
                      <div class="gender-option">
                        <div class="gender">
                          <input type="radio" id="check-male" name="gender" checked />
                          <label for="check-male">male</label>
                        </div>
                        <div class="gender">
                          <input type="radio" id="check-female" name="gender" />
                          <label for="check-female">Female</label>
                        </div>
                        <div class="gender">
                          <input type="radio" id="check-other" name="gender" />
                          <label for="check-other">prefer not to say</label>
                        </div>
                      </div>
                    </div>
                    <div class="input-box">
                        <label>Course</label>
                        <input type="text" name="course" placeholder="Enter course name" required />
                    </div>                    
                    <div class="input-box address">
                      <label>Address</label>
                      <input type="text" name="address" placeholder="Enter street address" required />
                     
                      
                        
                       
                    </div>
                    <button>Submit</button>
                  </form>   
            </div>
            <!--<h1>Attendance</h1>
            <div class="subjects">
                <div class="eg">
                    <span class="material-icons-sharp">architecture</span>
                    <h3>Web Development</h3>
                    <h2>12/14</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>86%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="mth">
                    <span class="material-icons-sharp">functions</span>
                    <h3>Data Structures</h3>
                    <h2>27/29</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>93%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="cs">
                    <span class="material-icons-sharp">computer</span>
                    <h3>Operating System</h3>
                    <h2>27/30</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>81%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="cg">
                    <span class="material-icons-sharp">dns</span>
                    <h3>Soft Skills.......</h3>
                    <h2>24/25</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>96%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <div class="net">
                    <span class="material-icons-sharp">router</span>
                    <h3>Internet Of Things</h3>
                    <h2>25/27</h2>
                    <div class="progress">
                        <svg><circle cx="38" cy="38" r="36"></circle></svg>
                        <div class="number"><p>92%</p></div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>-->

            <div class="timetable" id="timetable">
                <div>
                    <span id="prevDay">&lt;</span>
                    <h2>Today's Timetable</h2>
                    <span id="nextDay">&gt;</span>
                </div>
                <span class="closeBtn" onclick="timeTableAll()">X</span>
                <table>
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Room No.</th>
                            <th>Subject</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </main>

        <div class="right">
            <div class="announcements">
                <h2>Announcements</h2>
                <div class="updates">
                    <div class="message">
                        <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                        <small class="text-muted">2 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Co-curricular</b> Global internship oportunity by Student organization.</p>
                        <small class="text-muted">10 Minutes Ago</small>
                    </div>
                    <div class="message">
                        <p> <b>Examination</b> Instructions for Mid Term Examination.</p>
                        <small class="text-muted">Yesterday</small>
                    </div>
                </div>
            </div>

            <div class="leaves">
                <h2>Teachers on leave</h2>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-2.jpeg" alt=""></div>
                    <div class="info">
                        <h3>The Professor</h3>
                        <small class="text-muted">Day Span : Full Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-3.jpg" alt=""></div>
                    <div class="info">
                        <h3>Lisa Manobal</h3>
                        <small class="text-muted">Day Span : Half Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-4.jpeg" alt=""></div>
                    <div class="info">
                        <h3>Saif Khan</h3>
                        <small class="text-muted">Day Span : Full Day</small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="timeTable.js"></script>
    <script src="app.js"></script>
</body>
</html>