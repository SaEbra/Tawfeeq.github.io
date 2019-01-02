
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
 

<form class="formSumbit" method="Post" action="/savePersonalQuestions"> 
    <h2>أسئلة شخصية</h2> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اسمي الأول</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value=" {{$getPersonalQuestions['firstName']}}" name="firstName" required>
    </div>
  </div>

   <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">اسمي الأخير</label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id="" value="{{$getPersonalQuestions['lastName']}}" name="lastName" required>
    </div>
    
  </div> 

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">جنسيتي</label>
    <div class="col-sm-9">
        <select name='nationalityId' class="form-control" required>
			@foreach($getNationalities as $key => $data)
                @if($data['country_id'] == $getPersonalQuestions['nationalityId'] )
				<option value="{{ $data['country_id']  }}" selected>{{ $data['nationality']  }}</option> 
                @else
				<option value="{{ $data['country_id']  }}"  >{{ $data['nationality']  }}</option> 
                @endif
                
			@endforeach	 
		</select>
    </div>
  </div> 

  <div class="form-group">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا أقيم في الدولة</label>
    <div class="col-sm-9">
        <select name='residentCountryId' id='residentCountryId' class="form-control" required>
			@foreach($getCountries as $key => $data)
                @if($data['id'] == $getPersonalQuestions['residentCountryId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['name']  }}</option> 
                @else
				<option value="{{ $data['id']  }}"  >{{ $data['name']  }}</option> 
                @endif
                
			@endforeach	 
		</select>
    </div>
  </div>
   
   <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا أقيم في المدينة</label>
    <div class="col-sm-9">
        <select name='residentCityId'  id='residentCityId' class="form-control" required>
			@foreach($getCities as $key => $data)
                @if($data['id'] == $getPersonalQuestions['residentCityId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['name']  }}</option> 
                @else
				<option value="{{ $data['id']  }}"  >{{ $data['name']  }}</option> 
                @endif
                
			@endforeach	 
		</select>
    </div>
  </div>
     
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> تاريخ ميلادي </label>
    <div class="col-sm-9">
      <input type="text" class="form-control  " id = "txtDate" value="{{$getPersonalQuestions['dateOfBirth']}}" name="dateOfBirth">
    </div>
  </div> 
   
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">تخصصي العلمي </label>
    <div class="col-sm-9">
        <select class="form-control" name='specializationId' required>
				@foreach($getSpecializations as $key => $data)
                    @if($data['id'] == $getPersonalQuestions['specializationId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['specialization']  }}</option> 
                    @else
                    <option value="{{ $data['id']  }}"  >{{ $data['specialization']  }}</option> 
                    @endif
				@endforeach	 
     	</select>
    </div>
  </div>  
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">مؤهلي العلمي </label>
    <div class="col-sm-9">
        <select class="form-control" name='degreeId' required>
				@foreach($getDegrees as $key => $data)
                    @if($data['id'] == $getPersonalQuestions['degreeId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['degree']  }}</option> 
                    @else
                    <option value="{{ $data['id']  }}"  >{{ $data['degree']  }}</option> 
                    @endif
				@endforeach	 
     	</select>
    </div>
  </div>  
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> أنا</label>
     
    <div class="col-sm-9">
        <select name='jobId' class="form-control select">
			@foreach($getJobs as $key => $data)
                @if($data['id'] == $getPersonalQuestions['jobId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['job']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['job']  }}</option> 
                @endif
        	@endforeach	 
		</select>
    </div>
  </div>  
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">دخلي الشهري</label>
    <div class="col-sm-9">
      <select name='monthlyIncomeId' class="form-control select">
			@foreach($getMonthlyIncome as $key => $data)
                @if($data['id'] == $getPersonalQuestions['monthlyIncomeId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['monthlyIncome']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['monthlyIncome']  }}</option> 
                @endif
        	@endforeach	 
		</select>
    </div>
  </div> 
 
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">حالتي الصحية</label>
    <!--
    <div class="col-sm-9">
        <select name='healthId'  class="form-control select">
			@foreach($getHealth as $key => $data)
                @if($data['id'] == 0)
				<option value="{{ $data['id']  }}" selected>{{ $data['case']  }}</option> 
                @else
                <option value="{{ $data['id']  }}"  >{{ $data['case']  }}</option> 
                @endif
			@endforeach	 
		</select>
        <input type="text" name="sicknessCase" placeholder="ماهو المرض" class='col-sm-9 hiddenInput' />			
    </div> -->

        @php
				  $i = 0
				@endphp
				<div class=checkbox>

				@foreach($getHealth as $key => $data)
            <label class="checkbox-inline">
              @if(in_array($data['id'], $getMembersHealthCases))
                <input type="checkbox" class="checkbox1" name="healthId[]" value="{{ $data['id']  }}" class='isSelected' checked>{{ $data['case']  }} 
              @else 
              <input type="checkbox" class="checkbox1" name="healthId[]" value="{{ $data['id']  }}" class='isSelected' >{{ $data['case']  }} 
              @endif
              
              @if($data['id']=='2' )
                <input type="text" name="chronicIllnessCase" class="healthEdit" id="chronicIllnessCase" placeholder="ما هي.."  value="{{ $getMembersHealthCases['chronicIllnessCase'] or '' }} " />
              @endif
              @if($data['id']=='3' )
                <input type="text" name="inheritedIllnessCase" class="healthEdit" id="inheritedIllnessCase" placeholder="ما هي.."  value="{{ $getMembersHealthCases['inheritedIllnessCase'] or '' }} " />
              @endif
              @if($data['id']=='4' )
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="distortionCase" class="healthEdit2" id="distortionCase" placeholder="ما هو.." value="{{ $getMembersHealthCases['distortionCase'] or '' }} "   />
              @endif
            </label> 
            @php
            $i++
            @endphp
				@endforeach	 
				</div>
 
    
     
  </div> 
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">  أنا من ذوي الاحتياجات الخاصة </label>
    <div class="col-sm-9">
        <select name='specialNeedId'  class="form-control select">
			@foreach($getSpecialNeeds as $key => $data)
                @if($data['id'] == $getPersonalQuestions['specialNeedId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['specialNeeds']  }}</option> 
                @else
                <option value="{{ $data['id']  }}"  >{{ $data['specialNeeds']  }}</option> 
                @endif
			@endforeach	 
    </select>
    @if($getPersonalQuestions['specialNeedId']==2)
      <input type="text" name="specialNeedCase" placeholder=  "اكتب الإعاقة" class='col-sm-9 hiddenInput' style="display:block;" value="{{ $getSpecialNeedMembers['specialNeedCase'] or '' }}" />
    @else
      <input type="text" name="specialNeedCase" placeholder=  "اكتب الإعاقة" class='col-sm-9 hiddenInput'  />
    @endif
				
    </div>
  </div>  
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
      <select name='reproductionId'  class="form-control  ">
			@foreach($getReproduction as $key => $data)
                @if($data['id'] == $getPersonalQuestions['reproductionId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['reproduction']  }}</option> 
                @else
                <option value="{{ $data['id']  }}"  >{{ $data['reproduction']  }}</option> 
                @endif
			@endforeach	 
		</select>      
    </div>
  </div>




  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
      <select name='policeRecordId'  class="form-control select ">
			@foreach($getPoliceRecord as $key => $data)
                @if($data['id'] == $getPersonalQuestions['policeRecordId'] )
				          <option value="{{ $data['id']  }}" selected>{{ $data['case']  }}</option> 
                @else
                  <option value="{{ $data['id']  }}"  >{{ $data['case']  }}</option> 
                @endif
			@endforeach	 
    </select> 
    @if($getPersonalQuestions['policeRecordId']==2)
      <input type="text" name="policeRecordReason" placeholder="اكتب السبب" class='hiddenInput' style="display:block;" value="{{ $getPoliceRecordMembers['policeRecordReason'] or '' }} " />     
    @else
      <input type="text" name="policeRecordReason" placeholder="اكتب السبب" class='hiddenInput'   />     
    @endif
    
    </div>
  </div>

 
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
      <select name='debtId'  class="form-control   ">
			@foreach($getDebts as $key => $data)
                @if($data['id'] == $getPersonalQuestions['debtId'] )
				          <option value="{{ $data['id']  }}" selected>{{ $data['case']  }}</option> 
                @else
                  <option value="{{ $data['id']  }}"  >{{ $data['case']  }}</option> 
                @endif
			@endforeach	 
    </select> 
    </div>
  </div>

  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
      <select name='addictionId'  class="form-control   ">
			@foreach($getAddiction as $key => $data)
                @if($data['id'] == $getPersonalQuestions['addictionId'] )
				          <option value="{{ $data['id']  }}" selected>{{ $data['case']  }}</option> 
                @else
                  <option value="{{ $data['id']  }}"  >{{ $data['case']  }}</option> 
                @endif
			@endforeach	 
    </select> 
    </div>
  </div>

  <div class="form-group">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">طولي</label>
    <div class="col-sm-9">
        <select name='lengthId' class="form-control select">	 
			@foreach($getLength as $key => $data)
                @if($data['id']==$getPersonalQuestions['lengthId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['length']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['length']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">وزني</label>
    <div class="col-sm-9">
      <select name='weightId' class="form-control select">	 
			@foreach($getWeight as $key => $data)
                @if($data['id']==$getPersonalQuestions['weightId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['weight']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['weight']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
      <select name='religionId' class="form-control select">	 
			@foreach($getReligion as $key => $data)
                @if($data['id']==$getPersonalQuestions['religionId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['religion']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['religion']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
        <select name='smokingId' class="form-control select">	 
			@foreach($getSmoking as $key => $data)
                @if($data['id']==$getPersonalQuestions['smokingId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['smoking']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['smoking']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">لون بشرتي </label>
    <div class="col-sm-9">
        <select name='skinColorId' class="form-control select">	 
			@foreach($getSkinColor as $key => $data)
                @if($data['id']==$getPersonalQuestions['skinColorId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['skinColor']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['skinColor']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>  
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">شعري</label>
    <div class="col-sm-9">
      <select name='hairTypeId' class="form-control select">	 
			@foreach($getHairType as $key => $data)
                @if($data['id']==$getPersonalQuestions['hairTypeId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['hairType']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['hairType']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
    <div class="col-sm-9">
      <select name='beautyId' class="form-control select">	 
			@foreach($getBeauty as $key => $data)
                @if($data['id']==$getPersonalQuestions['beautyId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['level']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['level']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>

  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> أنا أستحم</label>
    <div class="col-sm-9">
      <select name='cleanlinessId' class="form-control select">	 
			@foreach($getCleanliness as $key => $data)
                @if($data['id']==$getPersonalQuestions['cleanlinessId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['cleanliness']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['cleanliness']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>


   
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> أنا أنظف أسناني</label>
    <div class="col-sm-9">
      <select name='teethBrushId' class="form-control select">	 
			@foreach($getTeethBrush as $key => $data)
                @if($data['id']==$getPersonalQuestions['teethBrushId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['teethBrush']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['teethBrush']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div> 
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">  أنا </label>
    
    <div class="col-sm-9">
      <select name='originId' class="form-control select">	 
			@foreach($getOrigin as $key => $data)
                @if($data['id']==$getPersonalQuestions['originId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['origin']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['origin']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div> 
  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> أنا أصلي</label>
     
    <div class="col-sm-9">
      <select name='prayId' class="form-control select">	 
			@foreach($getPray as $key => $data)
                @if($data['id']==$getPersonalQuestions['prayId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['pray']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['pray']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div> 
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أصوم رمضان</label>
    <div class="col-sm-9">
      <select name='fastingId' class="form-control  ">	 
			@foreach($getFasting as $key => $data)
                @if($data['id']==$getPersonalQuestions['fastingId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['fasting']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['fasting']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div> 

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب في الجماع</label>
    <div class="col-sm-9">
      <select name='intercourseId' class="form-control select">	 
			@foreach($getIntercourse as $key => $data)
                @if($data['id']==$getPersonalQuestions['intercourseId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['intercourse']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['intercourse']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أحب الاستماع إلى الموسيقى</label>
    <div class="col-sm-9">
      <select name='musicId' class="form-control  ">	 
			@foreach($getMusic as $key => $data)
                @if($data['id']==$getPersonalQuestions['musicId'])
                <option value="{{ $data['id']  }}" selected>{{ $data['music']  }}</option> 
                @else
                <option value="{{ $data['id']  }}">{{ $data['music']  }}</option> 
                @endif
			@endforeach	 
		</select>
    </div>
  </div> 

 @if(Session::get('genderId')==1)
    <div class="form-group  ">
      <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">حالتي الاجتماعية</label>
      <div class="col-sm-9">
        <select name='manMaritalStatusId' class="form-control select manMaritalStatusUpdate">
        @foreach($getManMaritalStatus as $key => $data)
                  @if($data['id'] == $getPersonalQuestions['manMaritalStatusId'] )
                      <option value="{{ $data['id']  }}" selected>{{ $data['status']  }}</option> 
                  @else
                      <option value="{{ $data['id']  }}"  >{{ $data['status']  }}</option> 
                  @endif
              @endforeach	 

      </select>
      </div>
    </div>

    @if($getPersonalQuestions['manMaritalStatusId']==3)
      <div class='divorceSection' style="display:block;">
    @else     
      <div class='divorceSection'>
    @endif    
        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">سبب الطلاق</label>
            <div class="col-sm-9">
              <input type="text" class="form-control  " id="" value=" {{$getDivorcedDetails['manDivorceReason'] }}" name="manDivorceReason">
            </div>
        </div>

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">عدد الطلقات</label>
            <div class="col-sm-9">
              <select name="divorceNumber" class="form-control select">
                @for($i=1 ; $i<=3 ; $i++)	
                  @if($getDivorcedDetails['divorceNumber']==$i)
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
            </div>
        </div> 
      </div> 
    

    @if($getPersonalQuestions['manMaritalStatusId']!=1 )
      <div class='childrenSection' style="display:block;">
    @else     
      <div class='childrenSection'>
    @endif     
 

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">عدد الاطفال</label>
            <div class="col-sm-9">
              <select name="manChildrenNumber" id="manChildrenNumber"  class="form-control select">
                @for($i=0 ; $i<=10 ; $i++)	
                  @if((count($getMemberChildren)/2)==$i)
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
              <table class="table" id='manChildrenTable' >
              <tbody>
                 
              @if(count($getMemberChildren)!=0)
              <thead><tr id='childrenThead'><th></th><th>العمر</th><th>الجنس</th></tr></thead><tbody>
              @endif
              @for($i=1 ; $i<=(count($getMemberChildren)/2) ; $i++)                    
                <tr class='manChildrenTableTr' id="manChildrenTableTr{{$i}}"  >
                  <td>{{$i}}</td>
                  <td><input type='text' name="childAge_{{$i}}" value="{{ $getMemberChildren['childAge_'.$i] }}" class='numberOnly'>&nbsp;<span class='errmsg'></span></td>
                  <td>
                    @if (($getMemberChildren['childGender_'.$i])==1 )
                    <select name="childGender_{{$i}}" ><option  value="1" selected>ذكر</option><option  value="2">أنثى</option></select>
                    @else
                    <select name="childGender_{{$i}}" ><option  value="1">ذكر</option><option  value="2" selected>أنثى</option></select>
                    @endif
                    
                  </td>
                </tr>
              @endfor
              @for($i=(1+(count($getMemberChildren)/2)) ; $i<=10 ; $i++)                    
                <tr class='manChildrenTableTr' id="manChildrenTableTr{{$i}}" style="display:none;">
                  <td>{{$i}}</td>
                  <td><input type='text' name="childAge_{{$i}}"  class='numberOnly'>&nbsp;<span class='errmsg'></span></td>
                  <td><select name="childGender_{{$i}}" ><option  value="1">ذكر</option><option  value="2">أنثى</option></select></td>
                </tr>
              @endfor
              </tbody>
            </table>
            </div>
            
        
        </div> 

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تحتضن أطفال معك</label>
            <div class="col-sm-9">
                
                  
            @if($getDivorcedDetails['custodyId']=='1' || $getMarriedMen['custodyId']=='1')
                    <input type="radio" name="custodyId" class="optionsRadio" value="1"  checked /><span> نعم </span><br>
                  @elseif($getDivorcedDetails['custodyId']!='' || $getMarriedMen['custodyId']!='')
                    <input type="radio" name="custodyId" class="optionsRadio" value="1"    /><span> نعم </span><br>
                  @endif

                  @if($getDivorcedDetails['custodyId']=='2' || $getMarriedMen['custodyId']=='2' )
                    <input type="radio" name="custodyId" class="optionsRadio" value="2" checked />  لا  <br>
                    @elseif($getDivorcedDetails['custodyId']!='' || $getMarriedMen['custodyId']!='')
                    <input type="radio" name="custodyId" class="optionsRadio" value="2"   /> لا  <br>
                  @endif

                  @if($getDivorcedDetails['custodyId']=='' && $getMarriedMen['custodyId']=='')
                    <input type="radio" name="custodyId" class="optionsRadio" value="1"   /><span> نعم </span><br>
                    <input type="radio" name="custodyId" class="optionsRadio" value="2"  checked /> لا  <br>
                  @endif
                  
            </div>
        </div> 

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">كم عددهم</label>
            <div class="col-sm-9">
              <select name="custodyNumber" class="form-control  ">
                @for($i=0 ; $i<=6 ; $i++)	
                  @if(($getDivorcedDetails['custodyNumber']==$i) || ($getMarriedMen['custodyNumber']==$i))
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
            </div>
        </div>


      </div>
      @if($getPersonalQuestions['manMaritalStatusId']==4 )
      <div id='wivesNumber' style="display:block;">
      @else     
      <div id='wivesNumber' >
      @endif
         <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">عدد الزوجات</label>
            <div class="col-sm-9">
            <select name='wivesNumber' class="form-control select">
              @for($i=1;$i<=3 ;$i++)
                @if($getMarriedMen['wivesNumber']==$i)
                  <option selected>{{$i}}</option>
                @else
                  <option>{{$i}}</option>
                @endif
              @endfor
              
            </select>
            <textarea name="secondWifeReason" placeholder="سبب الرغبة في التعدد"> {{ $getMarriedMen['secondWifeReason'] }} </textarea>
            </div>
        </div>

      </div>  
  
			
				
			 

        
    <div class="form-group  ">
      <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أنا</label>
      <div class="col-sm-9">
        <select name='beardId' class="form-control select">
        @foreach($getBeard as $key => $data)
                  @if($data['id'] == $getPersonalQuestions['beardId'] )
                      <option value="{{ $data['id']  }}" selected>{{ $data['beard']  }}</option> 
                  @else
                      <option value="{{ $data['id']  }}"  >{{ $data['beard']  }}</option> 
                  @endif
              @endforeach	 
              
      </select>
      </div>
    </div>

    <div class="form-group  ">
          <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون السكن بعد الزواج</label>
          <div class="col-sm-9">
              <select name="manHouseTypeId" class="form-control  ">
                @foreach($getHouseType as $key => $data)
                  @if($data['id'] == $getPersonalQuestions['houseTypeId'] )
                      <option value="{{ $data['id']  }}" selected>{{ $data['type']  }}</option> 
                  @else
                  <option  value="{{ $data['id']  }}">{{ $data['type']  }}</option>
                  @endif
                @endforeach 
                
              </select>
          </div>
    </div>

  @endif

  @if(Session::get('genderId')==2)
    <div class="form-group  ">
      <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">حالتي الاجتماعية</label>
      <div class="col-sm-9">
        <select name='womanMaritalStatusId' class="form-control select womanMaritalStatusUpdate">
        @foreach($getWomanMaritalStatus as $key => $data)
                  @if($data['id'] == $getPersonalQuestions['womanMaritalStatusId'] )
                      <option value="{{ $data['id']  }}" selected>{{ $data['womanMaritalStatus']  }}</option> 
                  @else
                      <option value="{{ $data['id']  }}"  >{{ $data['womanMaritalStatus']  }}</option> 
                  @endif
              @endforeach	 

      </select>
      </div>
    </div>

    @if($getPersonalQuestions['womanMaritalStatusId']==3)
      <div class='divorceSection' style="display:block;">
    @else     
      <div class='divorceSection'>
    @endif    
        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">سبب الطلاق</label>
            <div class="col-sm-9">
              <input type="text" class="form-control  " id="" value=" {{$getDivorcedDetails['womanDivorceReason'] }}" name="womanDivorceReason">
            </div>
        </div>

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">عدد الطلقات</label>
            <div class="col-sm-9">
              <select name="divorceNumber" class="form-control select">
                @for($i=1 ; $i<=3 ; $i++)	
                  @if($getDivorcedDetails['divorceNumber']==$i)
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
            </div>
        </div> 
      </div> 
    

    @if($getPersonalQuestions['womanMaritalStatusId']==4 || $getPersonalQuestions['womanMaritalStatusId']==3)
      <div class='childrenSection' style="display:block;">
    @else     
      <div class='childrenSection'>
    @endif     

        <div class="form-group  ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">عدد الأزواج السابقين</label>
            <div class="col-sm-9">
              <select name="husbandNumber" class="form-control select">
                @for($i=1 ; $i<=3 ; $i++)	
                  @if($getDivorcedDetails['husbandNumber']==$i)
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
            </div>
        </div> 

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">عدد الاطفال</label>
            <div class="col-sm-9">
              <select name="womanChildrenNumber" id="womanChildrenNumber"  class="form-control select">
                @for($i=0 ; $i<=10 ; $i++)	
                  @if($getDivorcedDetails['childrenNumber']==$i)
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
              <table class="table" id='womanChildrenTable' >
              <tbody>
              @if($getDivorcedDetails['childrenNumber']!=0)
              <thead><tr id='childrenThead'><th></th><th>العمر</th><th>الجنس</th></tr></thead><tbody>
              @endif
              @for($i=1 ; $i<=$getDivorcedDetails['childrenNumber'] ; $i++)                    
                <tr class='womanChildrenTableTr' id="womanChildrenTableTr{{$i}}"  >
                  <td>{{$i}}</td>
                  <td><input type='text' name="childAge_{{$i}}" value="{{ $getMemberChildren['childAge_'.$i] }}" class='numberOnly'>&nbsp;<span class='errmsg'></span></td>
                  <td>
                    @if (($getMemberChildren['childGender_'.$i])==1 )
                    <select name="childGender_{{$i}}" ><option  value="1" selected>ذكر</option><option  value="2">أنثى</option></select>
                    @else
                    <select name="childGender_{{$i}}" ><option  value="1">ذكر</option><option  value="2" selected>أنثى</option></select>
                    @endif
                    
                  </td>
                </tr>
              @endfor
              @for($i=(1+$getDivorcedDetails['childrenNumber']) ; $i<=10 ; $i++)                    
                <tr class='womanChildrenTableTr' id="womanChildrenTableTr{{$i}}" style="display:none;">
                  <td>{{$i}}</td>
                  <td><input type='text' name="childAge_{{$i}}"  class='numberOnly'>&nbsp;<span class='errmsg'></span></td>
                  <td><select name="childGender_{{$i}}" ><option  value="1">ذكر</option><option  value="2">أنثى</option></select></td>
                </tr>
              @endfor
              </tbody>
            </table>
            </div>
            
        
        </div> 

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">هل تحضنين أطفال معك</label>
            <div class="col-sm-9">
                
                  @if($getDivorcedDetails['custodyId']=='1')
                    <input type="radio" name="custodyIdWoman" class="optionsRadio" value="1"  checked /><span> نعم </span>
                  @elseif($getDivorcedDetails['custodyId']!='')
                    <input type="radio" name="custodyIdWoman" class="optionsRadio" value="1"    /><span> نعم </span>
                  @endif

                  @if($getDivorcedDetails['custodyId']=='2')
                    <input type="radio" name="custodyIdWoman" class="optionsRadio" value="2" checked /> <span class="optionsRadioNo">لا </span>
                  @elseif($getDivorcedDetails['custodyId']!='')
                    <input type="radio" name="custodyIdWoman" class="optionsRadio" value="2"   /><span class="optionsRadioNo">لا </span>
                  @endif

                  @if($getDivorcedDetails['custodyId']=='')

                    <input type="radio" name="custodyIdWoman" class="optionsRadio" value="1"   /><span >نعم </span>
                     
                    <input type="radio" name="custodyIdWoman" class="optionsRadio" value="2" checked /> <span class="optionsRadioNo">لا </span>
                    
                  @endif
                  
            </div>
        </div> 

        <div class="form-group   ">
            <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">كم عددهم</label>
            <div class="col-sm-9">
              <select name="custodyNumber" class="form-control  ">
                @for($i=0 ; $i<=6 ; $i++)	
                  @if($getDivorcedDetails['custodyNumber']==$i)
                    <option  value="{{$i}}" selected>{{$i}}</option>
                  @else
                    <option  value="{{$i}}">{{$i}}</option>
                  @endif				
                  
                @endfor
              </select>
            </div>
        </div>
      </div>
        
    <div class="form-group  ">
      <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">حجابي</label>
      <div class="col-sm-9">
        <select name='hijabId' class="form-control select">
        @foreach($getHijab as $key => $data)
                  @if($data['id'] == $getPersonalQuestions['hijabId'] )
                      <option value="{{ $data['id']  }}" selected>{{ $data['hijab']  }}</option> 
                  @else
                      <option value="{{ $data['id']  }}"  >{{ $data['hijab']  }}</option> 
                  @endif
              @endforeach	 
              
      </select>
      </div>
    </div>

    <div class="form-group  ">
          <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون السكن بعد الزواج</label>
          <div class="col-sm-9">
              <select name="womanHouseTypeId" class="form-control  ">
                @foreach($getHouseType as $key => $data)
                  @if($data['id'] == $getPersonalQuestions['houseTypeId'] )
                      <option value="{{ $data['id']  }}" selected>{{ $data['type']  }}</option> 
                  @else
                  <option  value="{{ $data['id']  }}">{{ $data['type']  }}</option>
                  @endif
                @endforeach
                @if($getPersonalQuestions['houseTypeId']==0 )
                  <option value='0' selected>لا يهم</option>
                @else
                  <option value='0'>لا يهم</option>
                @endif
                
              </select>
          </div>
    </div>

  @endif

  <br>
   
  
   
  <button type="submit" class="btn btn-default">حفــظ</button>
  
  
    
  
  
</form>
    <br>
    <div class="alert alert-success" style="display:none;">
      <strong></strong>تم الحفظ بنجاح...
    </div>
    <br>
    <div class="alert alert-danger"><strong></strong> لم يتم الحفظ جميع الاسئلة الزامية.</div>



 
</div>
 
</section>
 
 @stop
