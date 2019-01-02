@extends('master')
@section('main_content')

    <br>     <br>
    <section class="user-panel">
    <?php 
    require '../resources/views/menu.blade.php';
    ?>
    </section>
    

<section class="subscriber">
<div class="container" style='background-color:white;padding:20px 10px; margin:5px; width:75%'>
    <h2>قم بتحميل صورة من جهازك</h2>
    
    <form class="md-form" id='uploadFileForm' method="post" enctype="multipart/form-data">
      <input type="file" id='file'>
      <input type="hidden" id='ID' value="{{ Session::get('ID') }}">
      
      
      <br><br>
      <input type="submit" id='uploadFileSubmit' value='حفــظ' >
    </form>
    
    <div class="alert alert-success" style="display:none;">
      <strong>نجاح!</strong> تم اضافة الصورة الشخصية بنجاح حدث الصفجة لرؤية التعديلات..
    </div>

</div>
</section>


 
@stop
    
 
