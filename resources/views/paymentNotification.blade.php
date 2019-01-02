
@extends('master')
@section('main_content')
<br>     <br>
    <section class="user-panel">
    <?php 
    require '../resources/views/menu.blade.php';
    ?>
      </div>
    </section>

<section class="subscriber">
 
<div class="container" style='background-color:white;padding:20px 10px; width:77%;margin-right:25%;'>
 

<!-- <form class="formSumbit" method="Post" action="/savePartnerQuestions"> -->
<form class="md-form" id='uploadFileForm' method="post" enctype="multipart/form-data">
    <h2>إشعار التحويل  </h2> <br>

    <div class="form-group  ">
        <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">المبلغ المحول</label>
        <div class="col-sm-9">
        <input type="text" class="form-control numberOnly " id="amount" value="{{$getGeneralQuestions['afraidOfAllah'] or ''}}" name="amount">
         
        <span class='errmsg'></span>
        </div>
    </div> 

    <div class="form-group  ">
        <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">   إرفاق صورة التحويل</label>
        <div class="col-sm-9">
        <input type="file" id='file'>
        </div>
    </div> 



      
      <input type="hidden" id='ID' value="{{ Session::get('ID') }}">
       

    <button type="submit" id='uploadFileSubmit' class="btn btn-default">حفــظ</button>
  
  
    
  
  
  </form>
  <br>
  <div class="alert alert-success"><strong></strong> تم الحفظ بنجاح.</div>
  <div class="alert alert-danger"><strong></strong> لم يتم الحفظ جميع الاسئلة الزامية.</div>
  
  
   
  </div>
   
  </section>
   
   @stop
  