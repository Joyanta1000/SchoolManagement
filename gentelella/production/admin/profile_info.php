

    <?php
session_start();
$id = $_SESSION['id'];
$role = $_SESSION['role'];

if($role=='1')
{
    ?>


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
                                        <span class="section">Settings</span>
                <p style="color: red;" v-if="errors.length">
                <b>Please correct the following error(s):</b>
                <br>
                <li style="color: red;" v-for="error in errors">{{ error }}</li>
                <br>
                <div v-if="successAlert" class="alert alert-success alert-dismissible">
    <a href="#" class="close" aria-label="close" @click="successAlert=false">&times;</a>
    {{ successMessage }}
   </div>

   <div v-if="errorAlert" class="alert alert-danger alert-dismissible">
    <a href="#" class="close" aria-label="close" @click="errorAlert=false">&times;</a>
    {{ errorMessage }}
   </div><br>
                </p>
                                        <!-- <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">ID <?php echo $id;?> &nbsp; <?php echo $role;?><span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input v-model="id" class="form-control" type="number"  name="id" ></div>
                                        </div>
 -->   

 <?php

//include_once("config.php");

$connect = new mysqli('localhost', 'root', '', 'evergreenschool');

$sql = "SELECT * FROM user_details RIGHT OUTER JOIN user_image ON user_details.user_id=user_image.id WHERE user_image.id = '$id'";
 $query = $connect->query($sql);
 
 if($query->num_rows>0){
  $row=$query->fetch_array();
  
?>

<!-- <div id="uploadApp"> -->
                                        <input type="hidden" name="id" value="<?php echo $id;?>">      
                                        <div class="field item form-group">




                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Image<span class="required">*</span>&nbsp;</label>
                                            <img style="
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;" src="<?php echo $row['image_url'];?>" height= "100" width= "100">

                                            <div class="col-md-6 col-sm-6"> Change Image
                                                <input class="form-control"  v-model="image" type="file" ref="file"/>
                                            </div>

                                            <button type='button' class="btn btn-primary" @click="uploadImage">Change</button>

                                        </div> 
<!-- </div> -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- <script>

var application = new Vue({
 el:'#uploadApp',
 data:{
  file:'',
  successAlert:false,
  errorAlert:false,
  uploadedImage:'',
 },
 methods:{
  uploadImage:function(){

   application.file = application.$refs.file.files[0];
console.log(application.file);
   var formData = new FormData();

   formData.append('file', application.file);

   axios.post('upload.php', formData, {
    header:{
     'Content-Type' : 'multipart/form-data'
    }
   }).then(function(response){
    if(response.data.image == '')
    {
     application.errorAlert = true;
     application.successAlert = false;
     application.errorMessage = response.data.message;
     application.successMessage = '';
     application.uploadedImage = '';
    }
    else
    {
     application.errorAlert = false;
     application.successAlert = true;
     application.errorMessage = '';
     application.successMessage = response.data.message;
     var image_html = "<img src='"+response.data.image+"' class='img-thumbnail' width='200' />";
     application.uploadedImage = image_html;
     application.$refs.file.value = '';
    }
   });
  }
 },
});
</script> -->

                                       <hr></hr>                
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Role<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control"  v-model="role" name="role" data-validate-length-range="5,15" type="text" /></div>
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

                                     <?php    }
 else{
  echo "No records";
 }


?>
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
    id: "",
    role: "",
    file:'',
  successAlert:false,
  errorAlert:false,
  uploadedImage:'',
   },
   methods: {
    uploadImage:function(){

   app.file = app.$refs.file.files[0];
console.log(app.file);
   var formData = new FormData();

   formData.append('file', app.file);

   axios.post('upload.php', formData, {
    header:{
     'Content-Type' : 'multipart/form-data'
    }
   }).then(function(response){
    if(response.data.image == '')
    {
     app.errorAlert = true;
     app.successAlert = false;
     app.errorMessage = response.data.message;
     app.successMessage = '';
     app.uploadedImage = '';
    }
    else
    {
     app.errorAlert = false;
     app.successAlert = true;
     app.errorMessage = '';
     app.successMessage = response.data.message;
     
     var image_html = "<img src='"+response.data.image+"' class='img-thumbnail' width='200' />";
     app.uploadedImage = image_html;
     app.$refs.file.value = '';
     window.location.href = 'profile_info.php';
         alert('Image Updated');
     
    }
   });
  },

    checkForm: function (e) {
      this.errors = [];
if (!this.id) {
        this.errors.push("ID required.");
      }
      if (!this.role) {
        this.errors.push('Role required.');
       }
        //else if (!this.validEmail(this.email)) {
      //   this.errors.push('Valid email required.');
      // }

      if (!this.errors.length) {
        console.log(this.id);
      console.log(this.role);
      this.errors = [];
      axios.post('../data.php', {
        request: 4,
        id: this.id,
        role: this.role
       })
       .then(function(response) {
        console.log(response);
        if (response.status == 200) {
          window.location.href = 'add_role.php';
         alert('Role Added');
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

              <?php } ?>