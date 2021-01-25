<?php session_start();?>
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
<div id="app">
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
                                <div class="x_content">
                                    <!-- <form class="" action="" method="post" novalidate> -->
                                        <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                                        </p>
                                        <span class="section">Add Subject</span>
                <p style="color: red;" v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <br>
                <li style="color: red;" v-for="error in errors">{{ error }}</li>
                <br>
                </p>
                                        <!-- <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Email <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input v-model="email" class="form-control" type="email"  name="email" ></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Password <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input v-model="password" class="form-control" type="password"  name="password" >
                                            </div>
                                        </div> -->
                                       
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Class<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control"  v-model="classes" name="classes"  type="text" >
                                                    
<?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'evergreenschool');

$roles = mysqli_query($connect,"select * from class");

$response = array();

while($row = mysqli_fetch_assoc($roles)){
?>

<option value="<?php echo $row['classes']; ?>"><?php echo $row['classes']; ?></option>
<?php
}

?>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Subject <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input v-model="subjects" class="form-control" type="text"  name="subjects" >
                                            </div>
                                        </div>

                                        <!-- <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" class='email' required="required" type="email" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Confirm email address<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="email" class='email' name="confirm_email" data-validate-linked='email' required='required' /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Number <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="number" class='number' name="number" data-validate-minmax="10,100" required='required'></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='date' type="date" name="date" required='required'></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Time<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='time' type="time" name="time" required='required'></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="password" id="password1" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 Characters Including An Upper And Lower Case Letter, A Number And A Unique Character" required />
                                                
                                                <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                                    <i id="slash" class="fa fa-eye-slash"></i>
                                                    <i id="eye" class="fa fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Repeat password<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="password" name="password2" data-validate-linked='password' required='required' /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' name="phone" required='required' data-validate-length-range="8,20" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">message<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <textarea required="required" name='message'></textarea></div>
                                        </div> -->
                                        <div class="ln_solid">
                                            <br>
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary" @click='checkForm();'>Submit</button>
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
    classes: "",
    subjects: "",
    role: ""
   },
   methods: {
    checkForm: function (e) {
      this.errors = [];
if (!this.classes) {
        this.errors.push("Class required.");
      }
      if (!this.subjects) {
        this.errors.push('Subject required.');
       }
        //else if (!this.validEmail(this.email)) {
      //   this.errors.push('Valid email required.');
      // }

      if (!this.errors.length) {
        console.log(this.classes);
        console.log(this.subjects);
      this.errors = [];
      axios.post('subjects_data_insert.php', {
        request: 'subject',
        classes: this.classes,
        subjects: this.subjects,
       })
       .then(function(response) {
        console.log(response);
        if (response.status == 200) {
          window.location.href = 'add_subject.php';
         alert('Subject Added');
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