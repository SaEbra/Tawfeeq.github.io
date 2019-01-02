
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
 

<form class="formSumbit" method="Post" action="/servicingStop"> 
    <h2>:توقيف الخدمة</h2> 
    <input type="radio" name="servicingStopStatus" class="optionsRadio genderClass" value="1" checked/> أرغب بإيقاف الخدمة لأني تزوجت عبر برنامج الزواج	 
    <br>
	<input type="radio" name="servicingStopStatus" class="optionsRadio genderClass" value="2"/> أرغب بإيقاف الخدمة لأني تزوجت بدون البرنامج
    <br>
    <input type="radio" name="servicingStopStatus" class="optionsRadio genderClass" value="3"/>أرغب بإيقاف الخدمة لأنها غير مناسبة 
    <br>
    <input type="radio" name="servicingStopStatus" class="optionsRadio genderClass" value="4"/>أرغب بإيقاف الخدمة لسبب آخر
    <input type="text" name="servicingStopReason" class="healthEdit2" id="servicingStopReason" placeholder="ما هو.."    />  
    <br> <br> 
 
       
  <button type="submit" class="btn btn-default">حفــظ</button>
  
    
</form>

<br>
<div class="alert alert-success"><strong></strong> تم الحفظ بنجاح.</div>
<div class="alert alert-danger"><strong></strong> لم يتم الحفظ جميع الاسئلة الزامية.</div>

 
</div>
 
</section>
 
 @stop
 