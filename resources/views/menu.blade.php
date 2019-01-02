<div class="container">
<div class="navbar-header arrow">
<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-right">
  <span class="fa fa-hand-o-left" aria-hidden="true"></span></button>
        </div>
        <div class="navbar-inverse side-collapse in">

        <!--<div class="panel-heading">
        
        </div>-->
        <!-- /.panel-heading -->



        <div class="panel-body">
          <div class="list-group">
            <div class="container">

<!--
https://firebasestorage.googleapis.com/v0/b/tawfeeq-zawaj.appspot.com/o/membersImages%2FprofilePhoto918142923988?alt=media&token=e31e69a3-1007-4cfe-8f9c-6c979ffcc811
-->
 
<script>
    // function showimage() {p

         var test = "";
         var storageRef = firebase.storage().ref();
         var ID = <?php echo Session::get('ID') ?>; //"{!! Session::get('phoneNumber') !!}"; 
         //alert(phone);
         //var spaceRef = storageRef.child('sweet_gift/vytcdc.png');
         storageRef.child('membersImages/profilePhoto'+ID).getDownloadURL().then(function(url) {
             test = url;
             //alert(test);
             document.querySelector('img').src = test;

         }).catch(function(error) {
            if(<?php echo Session::get('genderId') ?>==1)
              document.querySelector('img').src = '../img/user-male.png';
              if(<?php echo Session::get('genderId') ?>==2)
              document.querySelector('img').src = '../img/user-female.png';
  

         });


     //}
     
    </script> 
 
     
              <div  class="dropdown navbar-collapse">
              <ul class="nav navbar-nav"> 
                <a href="#" class="list-group-item"> <i class="fa fa-comment fa-fw user-photo"> <div class="avatar-flip">
                <img src='test' height='150' width='150' style='background-color:#eee;' >
                  <?php
                  /*
                  if(! Session::has('genderId'))
                    {
                      if(Session::get('genderId')==1 && $test!='' )
                        echo "<img src=".$test." height='150' width='150' style='background-color:#eee;' >";
                    

                      if(Session::get('genderId')==1 && $test=='')
                        echo "<img src='../img/user-male.png' height='140' width='140'style='background-color:#eee;' >";
                    
                      if(Session::get('genderId')==2 && $test!='')
                      echo ",,,,,,,,,,,,,,,,";
                        //echo "<img src='".$test."' height='150' width='150' style='background-color:#eee;' >";
                    
                      if(Session::get('genderId')==2 && $test=='')
                      echo"ddddddddddddddddddd";
                        //echo "<img src='../img/user-female.png' height='150' width='150' style='background-color:#eee;' >";
                      
                    }
                    */
                    ?>
                     

                  
                  
                  
                 </div>  <?php echo Session::get('firstName')." ".Session::get('lastName') ?> <br></a></i> 
                <div class="dropdown-content">
                  <ul class="dropdown-ul">
                    <li><a href="/profilePhoto" class="list-group-item"><i class="fa fa-comment fa-fw"></i> الصورة الشخصية</a></li>
                    <li><a href="/personalQuestions" class="list-group-item"><i class="fa fa-comment fa-fw"></i> أسئلة شخصية</a></li>
                    <li><a href="/generalQuestions" class="list-group-item"><i class="fa fa-comment fa-fw"></i> أسئلة عامة</a></li>
                    <li><a href="/partnerQuestions" class="list-group-item"><i class="fa fa-comment fa-fw"></i> مواصفات شريكي</a></li>
                  </ul>
                </div>
              </div>
 
              <a href="/interestedInMe" class="list-group-item"><i class="fa fa-user"></i> قائمة الراغبين</a>
              <a href="/matchList" class="list-group-item"><i class="fa fa-envelope fa-fw"></i> قائمة التوفيق </a>
              <a href="/servicingStop" class="list-group-item"><i class="fa fa-envelope fa-fw"></i> إيقاف الخدمة </a>
              <a href="/paymentNotification" class="list-group-item"><i class="fa fa-envelope fa-fw"></i>    إشعار التحويل </a>
              <a href="#" class="list-group-item"><i class="fa fa-tasks fa-fw"></i> المراسلة</a>
              </ul>
            </div>
          </div>
      </div>
      </div>