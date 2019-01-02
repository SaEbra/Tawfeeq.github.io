
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
 

<form class="formSumbit" method="Post" action="/saveGeneralQuestions"> 
    <h2>أسئلة عامة</h2> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هدفك في الحياة</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value=" {{$getGeneralQuestions['lifeGoal']}}" name="lifeGoal">
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">نظرتك للحياة الزوجية</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['opinionOfMarriageLife']}}" name="opinionOfMarriageLife">
  </div>
    
  </div> <div class="form-group  ">
      <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">  نظرتك للأطفال</label>
      <div class="col-sm-9">
        <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['opinionOfChildren']}}" name="opinionOfChildren">
      </div>
  </div> 

  <div class="form-group">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> ماهو العمر الذي  تتحاور فيه مع أطفالك</label>
   
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['dialogueChildrenAge']}}" name="dialogueChildrenAge">
    </div>
  </div><br>

   <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تحب أن تجلس مع أطفالك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['sittingWithChildren']}}" name="sittingWithChildren">
    </div>
  </div><br> 
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ماهي مسؤليتك تجاه أطفالك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['responsibilityForChildren']}}" name="responsibilityForChildren">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ماذا تتمنى ان يكون أولادك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['hopeAboutChildren']}}" name="hopeAboutChildren">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">كيف تتعامل في الغالب مع المشاكل الي تواجهها </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['dealingWithProblems']}}" name="dealingWithProblems">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">حينما تكون مسؤل عن شخص واخطا كيف تعالج خطأه</label>
    <br> 
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['dealingWithMistakes']}}" name="dealingWithMistakes">
    </div>
  </div> <br> 
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">لو حدث لك مشكلة زوجية ماذا ستفعل </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['dealingWithMaritalProblems']}}" name="dealingWithMaritalProblems">
    </div>
  </div><br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">كيف تقضي وقت فراغك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['spendSpareTime']}}" name="spendSpareTime">
    </div>
  </div> <br>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">  كيف تقضي وقتك طوال الاسبوع </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['spendWeekTime']}}" name="spendWeekTime">
    </div>
  </div> <br>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ما هي هواياتك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['hobbies']}}" name="hobbies">
    </div>
  </div>

  <div class="form-group">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> هل انت بار في والديك    </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['parentsObedience']}}" name="parentsObedience">
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">كيف علاقتك باقاربك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['familyRelationship']}}" name="familyRelationship">
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">كيف علاقتك مع اخواتك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['siblingsRelationship']}}" name="siblingsRelationship">
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ما مدى عصبيتك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['angerLevel']}}" name="angerLevel">
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ماهي الامور التي تثير عصبيتك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['angerMatters']}}" name="angerMatters">
    </div>
  </div> <br>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ماهي اجابياتك</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['positivePoints']}}" name="positivePoints">
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ما هي سلبياتك</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['negativePoints']}}" name="negativePoints">
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ماهي الامور التي تكره ان تجدها في زوجة المستقبل </label>
    <br>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['dislikeInFuturWife']}}" name="dislikeInFuturWife">
    </div>
  </div> <br>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ما هي المواصفات الي تحب ان تكون في زوجة المستقبل </label>
    <br>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['likeInFuturWife']}}" name="likeInFuturWife">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">من هي  الزوجة المثالي </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['perfectWife']}}" name="perfectWife">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ايهما امتع لك الخروج مع اهلك او اصدقائك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['hangOutWithFamilyOrFriends']}}" name="hangOutWithFamilyOrFriends">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اذكر الاماكن التي تحب الذهاب لها</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['likedPlaces']}}" name="likedPlaces">
    </div>
  </div> <br>
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اذكر الاماكن التي لا تحب الذهاب لها </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['dislikedPlaces']}}" name="dislikedPlaces">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">في الأمور التي لا يترتب عليها ضرر تقدم مشاعرك او مشاعر الاخرين </label>
    <br> <br>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['priority']}}" name="priority">
    </div>
  </div> <br> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت كريم في المال والمشاعر والكلام الحلو </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['generous']}}" name="generous">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ما هو الغالب عليك اعطاء الاوامر او التشاور </label>
    <br>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['styleDialogue']}}" name="styleDialogue">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">ما نظرتك للخدم </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['opinionOfMaids']}}" name="opinionOfMaids">
    </div>
  </div> <br>
  
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل توافق على ان تعمل زوجتك</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['opinionOfWifeJob']}}" name="opinionOfWifeJob">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل توافق على ان تدرس زوجتك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['opinionOfWifeStudy']}}" name="opinionOfWifeStudy">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اذكر اهم المواقف التي أثرت فيك</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['affectingSituations']}}" name="affectingSituations">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت حنون </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['merciful']}}" name="merciful">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت عاطفي </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['emotional']}}" name="emotional">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت رقيق</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['gentle']}}" name="gentle">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تقدر الحياة الزوجية</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['appreciateMarriageLife']}}" name="appreciateMarriageLife">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تقدر  المرأة</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['appreciateWoman']}}" name="appreciateWoman">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت هادئ </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['calm']}}" name="calm">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت مبتسم </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['smiley']}}" name="smiley">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت متواضع  </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['humble']}}" name="humble">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت حقود</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['venomous']}}" name="venomous">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت كذاب</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['liar']}}" name="liar">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت بخيل</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['stingy']}}" name="stingy">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت متفائل </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['optimistic']}}" name="optimistic">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تهتم بلبسك واناقتك</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['stylish']}}" name="stylish">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تقدر مشاعر الناس </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['appreciateOthersFeeling']}}" name="appreciateOthersFeeling">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تتكلم في أعراض الناس </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['speakIllOfOthers']}}" name="speakIllOfOthers">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تصر على الخطأ</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['stubborn']}}" name="stubborn">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل انت مرن</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['flexible']}}" name="flexible">
    </div>
  </div> <br>
  


  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تصل لما تريد عبر الحوار</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['GettingWantsByDialogue']}}" name="GettingWantsByDialogue">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل همك الاكبر عائلتك </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['concernFamily']}}" name="concernFamily">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل عندك حب لله وخوف منه</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['afraidOfAllah']}}" name="afraidOfAllah">
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تستعجل في الحكم على الامور</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['hurryInJudging']}}" name="hurryInJudging">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اكتب نبذة عن احتياجاتك الخاصة ف الشريك الآخر</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['needsInPartner']}}" name="needsInPartner">
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اكتب نبذة توصيفية تصف بها نفسك</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getGeneralQuestions['describeYourSelf']}}" name="describeYourSelf">
    </div>
  </div> <br>


  
  
   
  <button type="submit" class="btn btn-default">حفــظ</button>
  
  
    
  
  
</form>

<br>
<div class="alert alert-success"><strong></strong> تم الحفظ بنجاح.</div>
<div class="alert alert-danger"><strong></strong> لم يتم الحفظ جميع الاسئلة الزامية.</div>

 
</div>
 
</section>
 
 @stop
