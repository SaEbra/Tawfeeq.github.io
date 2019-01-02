
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
        <div class="col-lg-9">
            <div class="panel-body intereted">
                <div class="list-group">
                    <div class="container">
                        
                        <table class="table table-striped">
                            <thead>
                            </thead>
                            <tbody> foreach ($options as $o) {
    echo $new_m[$o];
}
                                <tr><th scope="row">الجنسية:</th><td>   {{ $getNationalities['0']['nationality'] }}</td></tr>
                                <tr><th scope="row">بلد الإقامة:</th><td>{{ $getCountries[0]['name'] }}</td></tr>
                                <tr><th scope="row">مدينة الإقامة:</th><td>{{ $getCities[0]['name'] }}</td></tr>
                                <tr><th scope="row">تاريخ الميلاد:</th><td>{{ $profileDetails['dateOfBirth'] }}</td></tr>
                                <tr><th scope="row">التخصص العلمي:</th><td>{{ $getSpecializations['0']['specialization'] }}</td></tr>
                                <tr><th scope="row">المؤهل العلمي:</th><td>{{ $getDegrees['0']['degree'] }}</td></tr>
                                <tr><th scope="row">العمل:</th><td>{{ $getJobs['0']['job'] }}</td></tr>
                                <tr><th scope="row">دخلي الشهري:</th><td>{{ $getMonthlyIncome['0']['monthlyIncome'] }}</td></tr>
                                <tr><th scope="row">الحالة الصحية:</th><td>
                                    @foreach($healthText as $key => $value)
                                        {{ $value }} <br> 
                                    @endforeach
                                     
                                    </td></tr>
                                <tr><th scope="row">من ذوي الاحتياجات الخاصة:</th><td>{{ $getSpecialNeeds['0']['specialNeeds'] }}</td></tr>
                                <tr><th scope="row"> </th><td>{{ $getReproduction['0']['reproduction'] }}</td></tr>
                                <tr><th scope="row"> </th><td>{{ $getPoliceRecord['0']['case'] }}</td></tr>
                                <tr><th scope="row"> </th><td>{{ $getDebts['0']['case'] }}</td></tr>

                                <tr><th scope="row"> </th><td>{{ $getAddiction['0']['case'] }}</td></tr>
                                <tr><th scope="row"> طولي</th><td>{{ $getLength['0']['length'] }}</td></tr>
                                <tr><th scope="row"> وزني</th><td>{{ $getWeight['0']['weight'] }}</td></tr>

                                <tr><th scope="row"> أنا</th><td>{{ $getReligion['0']['religion'] }}</td></tr>
                                <tr><th scope="row"> أنا</th><td>{{ $getSmoking['0']['smoking'] }}</td></tr>
                                <tr><th scope="row"> بشرتي</th><td>{{ $getSkinColor['0']['skinColor'] }}</td></tr>

                                <tr><th scope="row"> شعري</th><td>{{ $getHairType['0']['hairType'] }}</td></tr>
                                <tr><th scope="row"> أنا</th><td>{{ $getBeauty['0']['level'] }}</td></tr>
                                <tr><th scope="row"> أستحم</th><td>{{ $getCleanliness['0']['cleanliness'] }}</td></tr>
                                <tr><th scope="row"> أنظف أسناني</th><td>{{ $getTeethBrush['0']['teethBrush'] }}</td></tr>
                                <tr><th scope="row"> أنا</th><td>{{ $getOrigin['0']['origin'] }}</td></tr>

                                <tr><th scope="row"> أصلي</th><td>{{ $getPray['0']['pray'] }}</td></tr>
                                <tr><th scope="row"> أصوم رمضان</th><td>{{ $getFasting['0']['fasting'] }}</td></tr>
                                <tr><th scope="row"> أرغب بالجماع</th><td>{{ $getIntercourse['0']['intercourse'] }}</td></tr>
                                <tr><th scope="row"> أحب الاستماع الى الموسيقى</th><td>{{ $getMusic['0']['music'] }}</td></tr>
                                <tr><th scope="row">حالتي الاجتماعية</th><td>{{ $getMaritalStatus['0']['status'] }}</td></tr>
                                @if(Session::get('genderId')==1)
                                <tr><th scope="row">أنا</th><td>{{ $getHijab['0']['hijab'] }}</td></tr>
                                @endif
                                @if(Session::get('genderId')==2)
                                <tr><th scope="row">أنا</th><td>{{ $getBeard['0']['beard'] }}</td></tr>
                                @endif
                                <tr><th scope="row">أرغب أن يكون السكن بعد الزواج</th><td>{{ $getHouseType['0']['type'] }}</td></tr>

                                <tr><th scope="row">هدفك في الحياة</th><td>{{$getGeneralQuestions['lifeGoal']}}</td></tr>
                                <tr><th scope="row">نظرتك للحياة الزوجية</th><td>{{$getGeneralQuestions['opinionOfMarriageLife']}}</td></tr>
                                <tr><th scope="row">نظرتك للأطفال</th><td>{{$getGeneralQuestions['opinionOfChildren']}}</td></tr>
                                <tr><th scope="row">ماهو العمر الذي  تتحاور فيه مع أطفالك</th><td>{{$getGeneralQuestions['dialogueChildrenAge']}}</td></tr>
                                <tr><th scope="row">هل تحب أن تجلس مع أطفالك</th><td>{{$getGeneralQuestions['sittingWithChildren']}}</td></tr>
                                <tr><th scope="row">ماهي مسؤليتك تجاه أطفالك</th><td>{{$getGeneralQuestions['responsibilityForChildren']}}</td></tr>
                                <tr><th scope="row">ماذا تتمنى ان يكون أولادك</th><td>{{$getGeneralQuestions['hopeAboutChildren']}}</td></tr>
                                <tr><th scope="row">كيف تتعامل في الغالب مع المشاكل الي تواجهها</th><td>{{$getGeneralQuestions['dealingWithProblems']}}</td></tr>
                                <tr><th scope="row">حينما تكون مسؤل عن شخص واخطا كيف تعالج خطأه</th><td>{{$getGeneralQuestions['dealingWithMistakes']}}</td></tr>
                                <tr><th scope="row">لو حدث لك مشكلة زوجية ماذا ستفعل </th><td>{{ $getGeneralQuestions['dealingWithMaritalProblems'] }}</td></tr>
                                <tr><th scope="row">كيف تقضي وقت فراغك</th><td>{{ $getGeneralQuestions['spendSpareTime'] }}</td></tr>
                                <tr><th scope="row"> كيف تقضي وقتك طوال الاسبوع </th><td>{{ $getGeneralQuestions['spendWeekTime'] }}</td></tr>
                                <tr><th scope="row"> ما هي هواياتك </th><td>{{ $getGeneralQuestions['hobbies'] }}</td></tr>
                                <tr><th scope="row"> هل انت بار في والديك</th><td>{{ $getGeneralQuestions['parentsObedience'] }}</td></tr>
                                <tr><th scope="row"> كيف علاقتك باقاربك</th><td>{{ $getGeneralQuestions['familyRelationship'] }}</td></tr>
                                <tr><th scope="row">كيف علاقتك مع اخواتك </th><td>{{ $getGeneralQuestions['siblingsRelationship'] }}</td></tr>
                                <tr><th scope="row">ما مدى عصبيتك  </th><td>{{ $getGeneralQuestions['angerLevel'] }}</td></tr>
                                <tr><th scope="row">ماهي الامور التي تثير عصبيتك </th><td>{{ $getGeneralQuestions['angerMatters'] }}</td></tr>
                                <tr><th scope="row"> ماهي اجابياتك</th><td>{{ $getGeneralQuestions['positivePoints'] }}</td></tr>
                                <tr><th scope="row">ما هي سلبياتك </th><td>{{ $getGeneralQuestions['negativePoints'] }}</td></tr>
                                <tr><th scope="row">ماهي الامور التي تكره ان تجدها في زوجة المستقبل</th><td>{{ $getGeneralQuestions['dislikeInFuturWife'] }}</td></tr>
                                <tr><th scope="row">ما هي المواصفات الي تحب ان تكون في زوجة المستقبل </th><td>{{ $getGeneralQuestions['likeInFuturWife'] }}</td></tr>
                                <tr><th scope="row"> من هي  الزوجة المثالي </th><td>{{ $getGeneralQuestions['perfectWife'] }}</td></tr>
                                <tr><th scope="row"> ايهما امتع لك الخروج مع اهلك او اصدقائك </th><td>{{ $getGeneralQuestions['hangOutWithFamilyOrFriends'] }}</td></tr>
                                <tr><th scope="row"> اذكر الاماكن التي تحب الذهاب لها</th><td>{{ $getGeneralQuestions['likedPlaces'] }}</td></tr>
                                <tr><th scope="row"> اذكر الاماكن التي لا تحب الذهاب لها</th><td>{{ $getGeneralQuestions['dislikedPlaces'] }}</td></tr>
                                <tr><th scope="row"> في الأمور التي لا يترتب عليها ضرر تقدم مشاعرك او مشاعر الاخرين</th><td>{{ $getGeneralQuestions['priority'] }}</td></tr>
                                <tr><th scope="row"> هل انت كريم في المال والمشاعر والكلام الحلو</th><td>{{ $getGeneralQuestions['generous'] }}</td></tr>
                                <tr><th scope="row"> ما هو الغالب عليك اعطاء الاوامر او التشاور </th><td>{{ $getGeneralQuestions['styleDialogue'] }}</td></tr>
                                <tr><th scope="row"> ما نظرتك للخدم </th><td>{{ $getGeneralQuestions['opinionOfMaids'] }}</td></tr>


                                <tr><th scope="row">هل توافق على ان تعمل زوجتك</th><td>{{$getGeneralQuestions['opinionOfWifeJob']}}</td></tr>
                                <tr><th scope="row">هل توافق على ان تدرس زوجتك</th><td>{{$getGeneralQuestions['opinionOfWifeStudy']}}</td></tr>
                                <tr><th scope="row"> اذكر اهم المواقف التي أثرت فيك</th><td>{{$getGeneralQuestions['affectingSituations']}}</td></tr>
                                <tr><th scope="row"> هل انت حنون</th><td>{{$getGeneralQuestions['merciful']}}</td></tr>
                                <tr><th scope="row">هل انت عاطفي </th><td>{{$getGeneralQuestions['emotional']}}</td></tr>
                                <tr><th scope="row"> هل انت رقيق</th><td>{{$getGeneralQuestions['gentle']}}</td></tr>
                                <tr><th scope="row"> هل تقدر الحياة الزوجية</th><td>{{$getGeneralQuestions['appreciateMarriageLife']}}</td></tr>
                                <tr><th scope="row"> هل تقدر  المرأة</th><td>{{$getGeneralQuestions['appreciateWoman']}}</td></tr>
                                <tr><th scope="row"> هل انت هادئ</th><td>{{$getGeneralQuestions['calm']}}</td></tr>
                                <tr><th scope="row"> هل انت مبتسم</th><td>{{$getGeneralQuestions['smiley']}}</td></tr>
                                <tr><th scope="row"> هل انت متواضع </th><td>{{$getGeneralQuestions['humble']}}</td></tr>
                                <tr><th scope="row"> هل انت حقود</th><td>{{$getGeneralQuestions['venomous']}}</td></tr>
                                <tr><th scope="row">هل انت كذاب </th><td>{{$getGeneralQuestions['liar']}}</td></tr>
                                <tr><th scope="row"> هل انت بخيل</th><td>{{$getGeneralQuestions['stingy']}}</td></tr>
                                <tr><th scope="row">هل انت متفائل </th><td>{{$getGeneralQuestions['optimistic']}}</td></tr>
                                <tr><th scope="row">هل تهتم بلبسك واناقتك </th><td>{{$getGeneralQuestions['stylish']}}</td></tr>
                                <tr><th scope="row"> هل تقدر مشاعر الناس</th><td>{{$getGeneralQuestions['appreciateOthersFeeling']}}</td></tr>
                                <tr><th scope="row">هل تتكلم في أعراض الناس </th><td>{{$getGeneralQuestions['speakIllOfOthers']}}</td></tr>
                                <tr><th scope="row"> هل تصر على الخطأ</th><td>{{$getGeneralQuestions['stubborn']}}</td></tr>
                                <tr><th scope="row"> هل انت مرن</th><td>{{$getGeneralQuestions['flexible']}}</td></tr>

                                <tr><th scope="row">هل تصل لما تريد عبر الحوار </th><td>{{$getGeneralQuestions['GettingWantsByDialogue']}}</td></tr>
                                <tr><th scope="row"> هل عندك حب لله وخوف منه</th><td>{{$getGeneralQuestions['afraidOfAllah']}}</td></tr>
                                <tr><th scope="row"> هل همك الاكبر عائلتك</th><td>{{$getGeneralQuestions['concernFamily']}}</td></tr>
                                <tr><th scope="row"> هل تستعجل في الحكم على الامور</th><td>{{$getGeneralQuestions['hurryInJudging']}}</td></tr>
                                <tr><th scope="row"> اكتب نبذة عن احتياجاتك الخاصة ف الشريك الآخر</th><td>{{$getGeneralQuestions['needsInPartner']}}</td></tr>
                                <tr><th scope="row"> اكتب نبذة توصيفية تصف بها نفسك</th><td>{{$getGeneralQuestions['describeYourSelf']}}</td></tr>

                                
                            </tbody>
                            
                        </table>    
                    </div>
                </div>
                         
            </div>
             
        </div>
    
    </section>

    @stop
