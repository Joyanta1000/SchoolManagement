<?php

$connect = new mysqli('localhost', 'root', '', 'evergreenschool');

if ($connect->connect_error) {
    die("DataBase Connection failed: " . $connect->connect_error);
}
else if($_GET['email']&&$_GET['token'])
{
  $email = $_GET['email'];
  $token = $_GET['token'];

  $sql = "SELECT * FROM `user` WHERE `email` LIKE '$email' AND `token` LIKE '$token'";
 $query = $connect->query($sql);
 if($query->num_rows>0)
 {
  ?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </head>
<div id="app">
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            

              <h1>Set New Password</h1>
              <p style="color: red;" v-if="errors.length">
              <b >Please correct the following error(s):</b>
              <br>
              <li style="color: red;" v-for="error in errors">{{ error }}</li>
              <br>
              </p>
              <div>
                <input type="password" class="form-control" placeholder="New Password" name="password" v-model="password" required />
              </div>
              <br>
              <div>
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" v-model="confirm_password" required />
              </div>
              <br>

                <!-- <select name="role" class="form-control" required>
                  <option>Select Role</option>
                  <option v-for="row in allData" value="{{ row.id }}">{{ row.role }}</option>
                </select>  -->

              <div>
                <button class="btn btn-default submit" @click='checkForm();'>Update</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

               <div class="separator">
                <!-- <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>  -->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
             
          </section>
        </div>

        <!-- <div id="register" class="animate form registration_form">
          <section class="login_content">
           
              <h1>Create Account</h1>
              
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <br>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <br>
              <select name="role" class="form-control">
                  <option>Select</option>
                  <option v-for="row in allData" value="{{ row.id }}">{{ row.role }}</option>
                </select> 
             <br>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            
          
          </section>
        </div> -->
      </div>
    </div>
  </body>
</div>

</html>

<?php
 }
 else
 {
  echo "You are not registered yet";
 }
}

?>

<script type="text/javascript">

  var app = new Vue({
   el: '#app',
   data: {
    errors: [],
    email: "",
    password: ""
   },
   methods: {
    checkForm: function (e) {
      this.errors = [];

      if (!this.password) {
        this.errors.push("New Password is required.");
      }
       if (!this.confirm_password) {
         this.errors.push('Confirm Password is required.');
       }
       if (this.password!=this.confirm_password) {
         this.errors.push('Password and Confirm Password are not same.');
       }
      // else if (!this.validEmail(this.email)) {
      //   this.errors.push('Valid email required.');
      // }

      if (!this.errors.length) {
        var email = "<?php echo $email;?>";
        console.log(email);
        console.log(this.password);
      console.log(this.confirm_password);
      this.errors = [];
      axios.post('data.php', {
        request: 3,
        email: email,
        password: this.password,
        //confirm_password: this.password
        //password: this.password
       })
       .then(function(response) {
        console.log(response.data[0].status);
        if (response.data[0].status == 1) {
          //window.location.href = 'index.html';
         alert('Password updated successfully');
        } else {
         alert("Password not updated");
        }
       })
       .catch(function(error) {
        console.log(error);
       });
      }

      e.preventDefault();
    },
    // validEmail: function (email) {
    //   var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //   return re.test(email);
    // },
    login: function() {
      
    }
   }
  })
              </script>