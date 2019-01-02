
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
 

<form class="formSumbit" method="Post" action="/savePartnerQuestions"> 
    <h2>مواصفات شريكي</h2> <br>

  

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن تكون جنسية شريك حياتي</label>
    
    <div class="col-sm-9">
        <select name='nationalityId' class="form-control" required>
			@foreach($getNationalities as $key => $data)
                @if($data['country_id'] == $getPartnerQuestions['nationalityId'] )
				<option value="{{ $data['country_id']  }}" selected>{{ $data['nationality']  }}</option> 
                @else
				<option value="{{ $data['country_id']  }}"  >{{ $data['nationality']  }}</option> 
                @endif
                
			@endforeach	 
		</select>
    </div>
  </div> <br>

  <div class="form-group">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون شريك حياتي يقيم في الدولة</label>
    <div class="col-sm-9">
        <select name='residentCountryId' id='partnerResidentCountryId' class="form-control" required>
			@foreach($getCountries as $key => $data)
                @if($data['id'] == $getPartnerQuestions['residentCountryId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['name']  }}</option> 
                @else
				<option value="{{ $data['id']  }}"  >{{ $data['name']  }}</option> 
                @endif
                
			@endforeach	 
		</select>
    </div>
  </div> <br>
   
   <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون شريك حياتي يقيم في المدينة</label>
    <div class="col-sm-9">
        <select name='residentCityId'  id='partnerResidentCityId' class="form-control" required>
			@foreach($getCities as $key => $data)
                @if($data['id'] == $getPartnerQuestions['residentCityId'] )
				<option value="{{ $data['id']  }}" class='addOption' selected>{{ $data['name']  }}</option> 
                @else
				<option value="{{ $data['id']  }}" class='addOption' >{{ $data['name']  }}</option> 
                @endif
                
            @endforeach	 
            @if($getPartnerQuestions['residentCityId']=="0" )
				<option value="0" selected>لا يهم</option> 
                @else
				<option value="0"  >لا يهم</option> 
                @endif
		</select>
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> أرغب أن يكون عمر شريك حياتي</label>
    <div class="col-sm-9">
        <select name='partnerAgeId' class="form-control select" required>
            @foreach($getPartnerAge as $key => $data)
            @if($data['id']== $getPartnerQuestions['partnerAgeId'])
            <option value="{{ $data['id']  }}" selected>{{ $data['partnerAge']  }}</option> 
            @else
            <option value="{{ $data['id']  }}">{{ $data['partnerAge']  }}</option> 
            @endif
			
            @endforeach	 

            @if($getPartnerQuestions['partnerAgeId']=="0")
                <option value="0" selected>لايهم</option>
            @else
                <option value="0">لايهم</option>
            @endif
			
		</select>
    </div>
  </div> 
   
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون تخصص شريك حياتي</label>
    <div class="col-sm-9">
        <select name='specializationId'  id='' class="form-control" required>
			@foreach($getSpecializations as $key => $data)
                @if($data['id'] == $getPartnerQuestions['specializationId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['specialization']  }}</option> 
                @else
				<option value="{{ $data['id']  }}"  >{{ $data['specialization']  }}</option> 
                @endif
                
            @endforeach	 
            @if($getPartnerQuestions['specializationId']==0 )
                <option value="0" selected>لا يهم</option> 
            @else
                <option value="0" >لا يهم</option>
            @endif
		</select>
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون مؤهل شريك حياتي العلمي</label>
    <div class="col-sm-9">
        <select name='degreeId'  class="form-control" required>
			@foreach($getDegrees as $key => $data)
                @if($data['id'] == $getPartnerQuestions['degreeId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['degree']  }}</option> 
                @else
				<option value="{{ $data['id']  }}"  >{{ $data['degree']  }}</option> 
                @endif
                
            @endforeach	
            @if($getPartnerQuestions['degreeId']==0 )
                <option value="0" selected>لا يهم</option> 
            @else
                <option value="0" >لا يهم</option>
            @endif
		</select>
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون شريك حياتي</label>
    <div class="col-sm-9">
        <select class="form-control" name='jobId' required>
				    @if($getPartnerQuestions['jobId']==1 )
                    <option value="1" selected>يعمل</option> 
                    @else
                    <option value="1" >يعمل</option>
                    @endif

                    @if($getPartnerQuestions['jobId']==2 )
                    <option value="2" selected>لا يعمل</option> 
                    @else
                    <option value="2" >لا يعمل</option>
                    @endif

                    @if($getPartnerQuestions['jobId']==0 )
                    <option value="0" selected>لا يهم</option> 
                    @else
                    <option value="0" >لا يهم</option>
                    @endif
				
     	</select>
    </div>
  </div>  <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أفضل أن لا يقل دخل شريك حياتي الشهري عن</label>
     
    <div class="col-sm-9">
        <select class="form-control" name='monthlyIncomeId' required>
				@foreach($getMonthlyIncome as $key => $data)
                    @if($data['id'] == $getPartnerQuestions['monthlyIncomeId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['monthlyIncome']  }}</option> 
                    @else
                    <option value="{{ $data['id']  }}"  >{{ $data['monthlyIncome']  }}</option> 
                    @endif
                @endforeach
                @if($getPartnerQuestions['monthlyIncomeId'] == '0' )
                    <option value="0" selected>لا يهم</option> 
                    @else
                    <option value="0"  >لا يهم</option> 
                @endif	 
         </select>
          
    </div>

     
        
     
  </div>  <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">   أرغب أن يكون شريك حياتي من ذوي الإحتياجات الخاصة</label>
     
    <div class="col-sm-9">
    <select name='specialNeedId'  class="form-control select">
			@foreach($getSpecialNeeds as $key => $data)
                @if($data['id'] == $getPartnerQuestions['specialNeedId'] )
				<option value="{{ $data['id']  }}" selected>{{ $data['specialNeeds']  }}</option> 
                @else
                <option value="{{ $data['id']  }}"  >{{ $data['specialNeeds']  }}</option> 
                @endif
            @endforeach	
            @if($getPartnerQuestions['specialNeedId'] == '0' )
                    <option value="0" selected>لا يهم</option> 
                    @else
                    <option value="0"  >لا يهم</option> 
            @endif 
		</select>
    </div>
  </div>  <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون شريك حياتي</label>
    <div class="col-sm-9">
      <select name='reproductionId' class="form-control select">

            @foreach($getReproduction as $key => $data)
                @if($data['id']!=3)
                    @if($data['id'] == $getPartnerQuestions['reproductionId'] )
                        <option value="{{ $data['id']  }}" selected>{{ $data['reproduction']  }}</option> 
                    @else
                        <option value="{{ $data['id']  }}"  >{{ $data['reproduction']  }}</option> 
                    @endif
                @endif    
            @endforeach	 
            @if($getPartnerQuestions['reproductionId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون طول شريك حياتي</label>
    <div class="col-sm-9">
      <select name='lengthId' class="form-control select">
			@foreach($getLength as $key => $data)
                @if($data['id'] == $getPartnerQuestions['lengthId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['length']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['length']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['lengthId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div> 

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون وزن شريك حياتي</label>
    <div class="col-sm-9">
     	<div class=checkbox>
			@foreach($getWeight as $key => $data)
                 <label class="checkbox-inline">
                @if(in_array($data['id'], $getWeightStanderds))
                    <input type="checkbox" class="checkbox1 isSelected" name="weightId[]" value="{{ $data['id']  }}"   checked>{{ $data['weight']  }} 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected" name="weightId[]" value="{{ $data['id']  }}"   >{{ $data['weight']  }} 
                @endif
              
                </label>
            @endforeach	
            <label class="checkbox-inline">
            @if(in_array("0", $getWeightStanderds))
                    <input type="checkbox" class="checkbox1 isSelected" name="weightId[]" value="0"   checked>لا يهم 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected" name="weightId[]" value="0"   >لا يهم 
                @endif
              
            </label> 
		</div>
    </div>
  </div> 

 
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب في الزواج بـ</label>
    <div class="col-sm-9">
      <select name='religionId' class="form-control select">
			@foreach($getReligion as $key => $data)
                @if($data['id'] == $getPartnerQuestions['religionId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['religion']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['religion']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['religionId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div>


  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">يجب أن يكون شريك حياتي </label>
    <div class="col-sm-9">
      <select name='smokingId' class="form-control select">
			@foreach($getSmoking as $key => $data)
                @if($data['id'] == $getPartnerQuestions['smokingId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['smoking']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['smoking']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['smokingId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أفضل أن يكون لون بشرة شريك حياتي</label>
    <div class="col-sm-9">
     
		<div class=checkbox>
			@foreach($getSkinColor as $key => $data)
                 <label class="checkbox-inline">
                @if(in_array($data['id'], $getSkinColorStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="skinColorId[]" value="{{ $data['id']  }}"   checked>{{ $data['skinColor']  }} 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="skinColorId[]" value="{{ $data['id']  }}"   >{{ $data['skinColor']  }} 
                @endif
              
                </label>
                 
            @endforeach	
            <label class="checkbox-inline">
            @if(in_array("0", $getSkinColorStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="skinColorId[]" value="0"   checked>لا يهم 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="skinColorId[]" value="0"   >لا يهم 
                @endif
              
            </label> 
		</div>
    </div>
  </div> 

  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أفضل أن يكون شعر شريك حياتي</label>
    <div class="col-sm-9">
     
		<div class=checkbox>
			@foreach($getHairType as $key => $data)
                 <label class="checkbox-inline">
                @if(in_array($data['id'], $getHairTypeStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="hairTypeId[]" value="{{ $data['id']  }}"   checked>{{ $data['hairType']  }} 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="hairTypeId[]" value="{{ $data['id']  }}"   >{{ $data['hairType']  }} 
                @endif
              
                </label>
                 
            @endforeach	
            <label class="checkbox-inline">
            @if(in_array("0", $getHairTypeStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="hairTypeId[]" value="0"  checked>لا يهم 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="hairTypeId[]" value="0"   >لا يهم 
                @endif
              
            </label> 
		</div>
    </div>
  </div> 

  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أفضل أن يكون شريك حياتي</label>
    <div class="col-sm-9">
     
		<div class=checkbox>
			@foreach($getBeauty as $key => $data)
                 <label class="checkbox-inline">
                @if(in_array($data['id'], $getBeautyStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="beautyId[]" value="{{ $data['id']  }}"   checked>{{ $data['level']  }} 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="beautyId[]" value="{{ $data['id']  }}"   >{{ $data['level']  }} 
                @endif
              
                </label>
                 
            @endforeach	
            <label class="checkbox-inline">
            @if(in_array("0", $getBeautyStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="beautyId[]" value="0"   checked>لا يهم 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="beautyId[]" value="0"   >لا يهم 
                @endif
              
            </label> 
		</div>
    </div>
  </div> 

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">يجب أن يستحم شريك حياتي </label>
    <div class="col-sm-9">
      <select name='cleanlinessId' class="form-control select">
			@foreach($getCleanliness as $key => $data)
                @if($data['id'] == $getPartnerQuestions['cleanlinessId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['cleanliness']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['cleanliness']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['cleanlinessId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أفضل أن ينظف شريك حياتي أسنانه/ـا</label>
    <div class="col-sm-9">
      <select name='teethBrushId' class="form-control select">
			@foreach($getTeethBrush as $key => $data)
                @if($data['id'] == $getPartnerQuestions['teethBrushId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['teethBrush']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['teethBrush']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['teethBrushId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div> <br>

  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">يجب أن يكون شريك حياتي</label>
    <div class="col-sm-9">
      <select name='originId' class="form-control select">
			@foreach($getOrigin as $key => $data)
                @if($data['id'] == $getPartnerQuestions['originId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['origin']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['origin']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['originId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">يجب أن يصلي شريك حياتي</label>
    <div class="col-sm-9">
      <select name='prayId' class="form-control select">
			@foreach($getPray as $key => $data)
                @if($data['id'] == $getPartnerQuestions['prayId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['pray']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['pray']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['prayId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">يجب أن يكون شريك حياتي يصوم رمضان</label>
    <div class="col-sm-9">
      <select name='fastingId' class="form-control select">
			@foreach($getFasting as $key => $data)
                @if($data['id'] == $getPartnerQuestions['fastingId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['fasting']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['fasting']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['fastingId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div> <br>

   <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون شريك حياتي يرغب في الجماع</label>
    <div class="col-sm-9">
      <select name='intercourseId' class="form-control select">
			@foreach($getIntercourse as $key => $data)
                @if($data['id'] == $getPartnerQuestions['intercourseId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['intercourse']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['intercourse']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['intercourseId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div> <br>
  
  <div class="form-group  ">
    <label for="colFormLabelLg" class="col-sm-3 col-form-label  "> أفضل أن يكون شريك حياتي يحب الاستماع الى الموسيقى</label>
    <div class="col-sm-9">
      <select name='musicId' class="form-control select">
			@foreach($getMusic as $key => $data)
                @if($data['id'] == $getPartnerQuestions['musicId'] )
                    <option value="{{ $data['id']  }}" selected>{{ $data['music']  }}</option> 
                @else
                    <option value="{{ $data['id']  }}"  >{{ $data['music']  }}</option> 
                @endif
            @endforeach	 
            @if($getPartnerQuestions['musicId'] == '0' )
                <option value="0" selected>لا يهم </option> 
            @else
                <option value="0"  >لا يهم</option> 
            @endif
		</select>
    </div>
  </div> <br>

  @if(Session::get('genderId')==1)

    <div class="form-group  ">
        <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون حجاب زوجتي</label>
        <div class="col-sm-9">
         
        <div class=checkbox>
            @foreach($getHijab as $key => $data)
                <label class="checkbox-inline">
                @if(in_array($data['id'], $getHijabStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="hijabId[]" value="{{ $data['id']  }}"   checked>{{ $data['hijab']  }} 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="hijabId[]" value="{{ $data['id']  }}"   >{{ $data['hijab']  }} 
                @endif
                </label>
                 
            @endforeach	
            <label class="checkbox-inline">
                @if(in_array("0", $getHijabStanderds))
                        <input type="checkbox" class="checkbox1 isSelected"  name="hijabId[]" value="0"   checked>لا يهم 
                    @else 
                        <input type="checkbox" class="checkbox1 isSelected"  name="hijabId[]" value="0"   >لا يهم 
                    @endif
                
            </label> 
        </div>
        </div>
    </div> 

    <div class="form-group  ">
        <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن تكون زوجتي</label>
        <div class="col-sm-9">
        
         
        <div class=checkbox>
            @foreach($getWomanMaritalStatus as $key => $data)
                <label class="checkbox-inline">
                @if(in_array($data['id'], $getWomanMaritalStatusStanderds))
                    <input type="checkbox" class="checkbox1 isSelected"  name="womanMaritalStatusId[]" value="{{ $data['id']  }}"   checked>{{ $data['womanMaritalStatus']  }} 
                @else 
                    <input type="checkbox" class="checkbox1 isSelected"  name="womanMaritalStatusId[]" value="{{ $data['id']  }}"   >{{ $data['womanMaritalStatus']  }} 
                @endif
                </label>
                 
            @endforeach	
            <label class="checkbox-inline">
                @if(in_array("0", $getWomanMaritalStatusStanderds))
                        <input type="checkbox" class="checkbox1 isSelected"  name="womanMaritalStatusId[]" value="0"   checked>لا يهم 
                    @else 
                        <input type="checkbox" class="checkbox1 isSelected"  name="womanMaritalStatusId[]" value="0"   >لا يهم 
                    @endif
                
            </label> 
        </div>
        </div>
    </div>
 
  @endif

  @if(Session::get('genderId')==2)
    <div class="form-group  ">
        <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون زوجي</label>
        <div class="col-sm-9">
        <select name='manMaritalStatus' class="form-control select" id='partnerManMaritalStatus'>
                @foreach($getManMaritalStatus as $key => $data)
                    @if($data['id'] == $getPartnerQuestions['manMaritalStatus'] )
                        <option value="{{ $data['id']  }}" selected>{{ $data['status']  }}</option> 
                    @else
                        <option value="{{ $data['id']  }}"  >{{ $data['status']  }}</option> 
                    @endif
                @endforeach	 
                @if($getPartnerQuestions['manMaritalStatus'] == '0' )
                    <option value="0" selected>لا يهم </option> 
                @else
                    <option value="0"  >لا يهم</option> 
                @endif
            </select>
            @if($getPartnerQuestions['manMaritalStatus'] != '1' )
            <div id='manChildren' style='display:block;'>
            @else
            <div id='manChildren'>
            @endif    
                <select name='manHasChildren'  class="form-control select">
                
                @if($getPartnerQuestions['hasChildren'] == '1' )
                    <option value='1' selected>لديه أطفال</option>
                @else    
                    <option value='1'>لديه أطفال</option>
                @endif     

                @if($getPartnerQuestions['hasChildren'] == '2' )
                    <option value='2' selected>ليس لديه أطفال</option>
                @else    
                    <option value='2'>ليس لديه أطفال</option>
                @endif

                @if($getPartnerQuestions['hasChildren'] == '0' )
                    <option value='0' selected>لا يهم</option>
                @else    
                    <option value='0'>لا يهم</option>
                @endif

					
					
				</select>
			</div>
        </div>
    </div>

    <div class="form-group  ">
        <label for="colFormLabelLg" class="col-sm-3 col-form-label  ">أرغب أن يكون زوجي</label>
        <div class="col-sm-9">
        <select name='beardId' class="form-control select">
                @foreach($getBeard as $key => $data)
                    @if($data['id'] == $getPartnerQuestions['beardId'] )
                        <option value="{{ $data['id']  }}" selected>{{ $data['beard']  }}</option> 
                    @else
                        <option value="{{ $data['id']  }}"  >{{ $data['beard']  }}</option> 
                    @endif
                @endforeach	 
                @if($getPartnerQuestions['beardId'] == '0' )
                    <option value="0" selected>لا يهم </option> 
                @else
                    <option value="0"  >لا يهم</option> 
                @endif
            </select>
        </div>
    </div>

  @endif
  
  <br>
   
  <!-- weightId  skinColor  hairType beauty -->
   
  <button type="submit" class="btn btn-default">حفــظ</button>
  
  
    
  
  
</form>
<br>
<div class="alert alert-success"><strong></strong> تم الحفظ بنجاح.</div>
<div class="alert alert-danger"><strong></strong> لم يتم الحفظ جميع الاسئلة الزامية.</div>


 
</div>
 
</section>
 
 @stop
