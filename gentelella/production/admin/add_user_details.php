<!DOCTYPE html>
<html lang="en">
<?php include_once('../admin/include/header.php');?>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">

<!-- Sidebar -->
        <?php include_once('../admin/include/sidebar.php');?>
        <!-- top navigation -->
        <?php include_once('../admin/include/navbar.php');?>
        <!-- /top navigation -->

<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Form Validation</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form validation <small>sub title</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="app">
                                <div class="x_content">
                                    <!-- <form class="" action="" method="post" novalidate> -->
                                        <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                        </p>
                                        <span class="section">User Details</span>
                                        <p style="color: red;" v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <br>
                <li style="color: red;" v-for="error in errors">{{ error }}</li>
                <br>
                </p>

                 <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">User Email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="user_id" required="required" type="text" v-model="user_id" >
                                                    <option></option>
                                                    <?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'evergreenschool');

$roles = mysqli_query($connect,"select * from user");

$response = array();

while($row = mysqli_fetch_assoc($roles)){
?>

<option value="<?php echo $row['id']; ?>"><?php echo $row['email']; ?></option>
<?php
}

?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">First Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="100" data-validate-words="2" v-model="first_name" name="first_name" placeholder="ex. John f. Kennedy" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Last Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="100" v-model="last_name" data-validate-words="2" name="last_name" placeholder="ex. John f. Kennedy" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Fathers Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" data-validate-length-range="6" data-validate-words="2" 
                                                v-model="fathers_name"
                                                name="fathers_name" placeholder="ex. John f. Kennedy" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Mothers Name<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' v-model="mothers_name" name="mothers_name" data-validate-length-range="5,15" type="text" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gender<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" name="gender" required="required" type="text" v-model="gender" >
                                                    <option></option>
                                                    <?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'evergreenschool');

$roles = mysqli_query($connect,"select * from gender");

$response = array();

while($row = mysqli_fetch_assoc($roles)){
?>

<option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
<?php
}

?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Adderss<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="address" v-model="address" required="required" type="text" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Permanent address<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" v-model="permanent_address" name="permanent_address" required='required' /></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date of Birth<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="date" v-model="date_of_birth" name="date_of_birth" required='required'></div>
                                        </div>
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <br>
                                                    <button type='submit' class="btn btn-primary" @click='checkForm();' >Submit</button>
                                                    <button type='reset' class="btn btn-success">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- </form> -->
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>

        </div>
    </div>

<?php include_once('../admin/include/script.php');?>

</body>
</html>

<script type="text/javascript">

  var app = new Vue({
   el: '#app',
   data: {
    errors: [],
    user_id: "",
    first_name: "",
    last_name: "",
    fathers_name: "",
    mothers_name: "",
    gender: "",
    address: "",
    permanent_address: "",
    date_of_birth: ""
   },
   methods: {
    checkForm: function (e) {
      this.errors = [];
      if (!this.user_id) {
        this.errors.push("Users email required.");
      }
if (!this.first_name) {
        this.errors.push("First name required.");
      }
      if (!this.last_name) {
        this.errors.push('Last name required.');
       }
       if (!this.fathers_name) {
        this.errors.push('Fathers name required.');
       }
       if (!this.mothers_name) {
        this.errors.push('Mothers name required.');
       }
      if (!this.gender) {
        this.errors.push('Gender required.');
       }
       if (!this.address) {
        this.errors.push('Adderess required.');
       }
       if (!this.permanent_address) {
        this.errors.push('Parmanent address required.');
       }
       if (!this.date_of_birth) {
        this.errors.push('Date of birth required.');
       }
        //else if (!this.validEmail(this.email)) {
      //   this.errors.push('Valid email required.');
      // }

      if (!this.errors.length) {
      //   console.log(this.email);
      //   console.log(this.password);
      // console.log(this.role);
      console.log(this.first_name);
        console.log(this.last_name);
      console.log(this.fathers_name);
      this.errors = [];
      axios.post('../data.php', {
        request: 6,
        user_id: this.user_id,
        first_name: this.first_name,
        last_name: this.last_name,
        fathers_name: this.fathers_name,
        mothers_name: this.mothers_name,
        gender: this.gender,
        address: this.address,
        permanent_address: this.permanent_address,
        date_of_birth: this.date_of_birth,
       })
       .then(function(response) {
        console.log(response);
        if (response.status == 200) {
          window.location.href = 'add_user_details.php';
         alert('User details Added');
        } else {
         alert("Failed to add.");
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