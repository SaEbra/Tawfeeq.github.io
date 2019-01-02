@extends('master')
@section('main_content')

    <br>     <br>
    <section class="user-panel">
 
    <?php 
    require '../resources/views/menu.blade.php';
    ?>

    </section>
    <?php 
    require '../resources/views/chat.blade.php';
    ?>
 

<section class="subscriber">
<div class="container">


    <script>
    function memberPhoto(number,id) {
         var storageRef = firebase.storage().ref();
           
         var phone = number; 
         var spaceRef = storageRef.child('sweet_gift/vytcdc.png');
         storageRef.child('membersImages/profilePhoto'+phone).getDownloadURL().then(function(url) {
             var test = url;
             document.getElementById(id).src = test;
         }).catch(function(error) {
              if(<?php echo Session::get('genderId') ?>==1)
                document.getElementById(id).src = '/img/user-female.png';
              if(<?php echo Session::get('genderId') ?>==2)
                document.getElementById(id).src = '/img/user-male.png';
         });
         
      }   
      </script> 
<script type="text/javascript">var myId = "<?= Session::get('ID') ?>";</script>


    @for($i=0;$i< count($matchList);$i++)
    <?php  $partnerid =$matchList[$i]['userUid'] ;?> 
    
    <script> memberPhoto( <?php echo $matchList[$i]['ID']; ?>,"id_<?php echo $i;?>"); </script> 
      <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
        <div class="card h-100">  
          <a href="/showProfile/ID/{{$matchList[$i]['ID']}}"><img class="card-img-top" height="150" width="150" id="id_<?php echo $i;?>" src="test" alt=""></a>
          <div class="card-body">
             <input type='hidden' name='partnerid' value="<?php echo "$partnerid" ?>" >
            <h4 class="card-title"><a href="/showProfile/ID/{{$matchList[$i]['ID']}}">{{$matchList[$i]['ID']}}</a></h4>
            <p class="card-text">age: {{$matchList[$i]['age']}}</p>
            <a href="#" id='interstedInButton' data-value="{{$matchList[$i]['ID']}}" title="اعلان الرغبة في الزواج">  
              <p class="card-text"><img src='img/intersting-heart.png' width='50' hight='50' alt="اعلان الرغبة في الزواج" /></p>
              
            </a>
            @if($onChatCase === "false")
              <a href="#" class='chatLink' data-value="{{$matchList[$i]['ID']}}" title="">  
                <p class="card-chat" Onclick="chat1( '{{$partnerid}}'  )"  id="{{$matchList[$i]['ID']}}">chat</p>
              </a>
            @endif
             
            
             
          </div>
        </div>
      </div>
      
    @endfor

    <script type="text/javascript"> 

      
</script> 
@stop
    
 
