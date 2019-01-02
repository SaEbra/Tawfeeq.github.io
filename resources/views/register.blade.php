@extends('master')
@section('main_content')

    <br><br>
	<div class="alert alert-info" role="alert">
		سيُطلب منك إكمال العديد من الأسئلة المصممة لتساعدك في زيادة نسبة التوافق بين الطرفين 
		<br>أجب بكل مصداقية ووضوح لترفع نسبة التوافق بينك وبين شريك حياتك قدر المستطاع .
		<br>
		يمكنك حفظ إجاباتك والإكمال لاحقاً .
	</div>
	 
    <!-- multistep form -->
	<form id="msform" class='ajax' method="post" acrion="/">
		<!-- progressbar -->
		<ul id="progressbar">
			<li class="active"></li>
			@if(!Session::has('genderId'))
			<li></li> <li></li> <li></li> <li></li> <li></li>
			<li></li> <li></li> <li></li> <li></li> <li></li>
			@endif

			@if(!Session::has('jobId'))
			<li></li> <li></li> <li></li> <li></li> <li></li>
			<li></li> <li></li> <li></li> <li></li> <li></li>
			<li></li> 
			@endif
			@if(!Session::has('weightId'))
			<li></li> <li></li> <li></li> <li></li><li></li>
			<li></li> <li></li> <li></li> <li></li><li></li> 
			@endif
			@if(!Session::has('beautyId'))
			<li></li> <li></li> <li></li> <li></li><li></li> 
			<li></li> <li></li> <li></li> <li></li><li></li> 
			@endif
			<li></li> <li></li> <li></li> <li></li> <li></li> 
			<li></li> <li></li> <li></li> <li></li> 
		</ul>

		@if(Session::has('phoneNumber'))
			{{-- Session::get('phoneNumber') --}}

			
			
		@endif

		<script type="text/javascript">var next = "<?= trans('app.next') ?>";</script>
	
		 
		<br>
		<?php
		/*
		$i=0;
		foreach($record as $key => $dataRecord) {
		$i++;
		if($i>0) break;
		} */
		//print_r($dataRecord);
		//echo $dataRecord['phoneNumber']; 	 
		?>
		
		  
		
 
		 
		<!-- fieldsets -->

		<!--  block one -->
		@if(!Session::has('genderId'))
	   
		<fieldset class='block1'>
			<h2 class="fs-title">أنا...</h2>
		
			<br>   

			 
			<input type="radio" name="genderId" class="optionsRadio genderClass" value="1" checked/> ذكر 
			<input type="radio" name="genderId" class="optionsRadio genderClass" value="2"/>أنثى
 
			<br>
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			 <!-- <h3 class="fs-subtitle">هذه المعلومات سرية ولن يتمكن أحد من الاطلاع عليها سوى الادارة</h3>  -->
			<input type="text" name="firstName" placeholder="اسمي الأول" required />
			<input type="text" name="lastName" placeholder="اسمي الأخير" required />
			<div style='text-align:right' >*هذه المعلومات سرية ولن تظهر للأخرين.</div>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		 
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">جنسيتي</h2>
			<select name='nationalityId' class="form-control select" required>
				@foreach($getNationalities as $key => $data)
					<option value="{{ $data['country_id']  }}">{{ $data['nationality']  }}</option> 
				@endforeach	 
			</select>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">أرغب أن تكون جنسية شريك حياتي</h2>
			<select name='partnerNationalityId' class="form-control select" required>
				@foreach($getNationalities as $key => $data)
					<option value="{{ $data['country_id']  }}">{{ $data['nationality']  }}</option> 
				@endforeach	 	 
			</select>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">أنا أقيم في</h2>
			<label>الدولة: </label>
			<select name='residentCountryId' class="form-control select " id='residentCountryId' required>
				<option   ></option> 
				@foreach($getCountries as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['name']  }}</option> 
				@endforeach	 
			</select>
			<br>
			<label>المدينه: </label>
			<select name='residentCityId' class="form-control select " id='residentCityId'>
				
			</select>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block1'>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي يقيم في</h2>
			<label>الدولة: </label>
			<select name='partnerResidentCountryId' class="form-control select" id='partnerResidentCountryId' required>
				@foreach($getCountries as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['name']  }}</option> 
				@endforeach	 
				<option value="0">لايهم</option>
			</select>
			<br>
			<label>المدينه: </label>
			<select name='partnerResidentCityId' class="form-control select  "  id='partnerResidentCityId'>>
				<option value='0'>لايهم</option>
			</select>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">تاريخ ميلادي</h2>
			<!-- <input name='dateOfBirth' type = "text" id = "datepicker"> -->
			<input name='dateOfBirth' type = "text" id = "txtDate" required>	 
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">أرغب أن يكون عمر شريك حياتي</h2>
			<select name='partnerAgeId' class="form-control select" required>
				@foreach($getPartnerAge as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['partnerAge']  }}</option> 
				@endforeach	 
				<option value="0">لايهم</option>
			</select>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">تخصصي العلمي</h2>
			<select class="form-control select" name='specializationId' required>
				@foreach($getSpecializations as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['specialization']  }}</option> 
				@endforeach	 
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block1'>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي</h2>
			<select class="form-control select" name='partnerSpecializationId' required>
				@foreach($getSpecializations as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['specialization']  }}</option> 
				@endforeach	 
				<option value="0">لا يهم</option> 
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
 
		<fieldset class='block1'>
			<h2 class="fs-title">مؤهلي العلمي</h2>
			<select name='degreeId' class="form-control select" required>
				@foreach($getDegrees as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['degree']  }}</option> 
				@endforeach	 
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>	 

		<fieldset class='block1'>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي</h2>
			<select name='partnerDegreeId' class="form-control select" required>
				@foreach($getDegrees as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['degree']  }}</option> 
				@endforeach	 
				<option value='0'>لا يهم</option>
			</select>
			
			<br>
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="submit" class="submit action-button save1"   value="{{trans('app.save') }} " />
 			<!-- <input type="button" class="next action-button nextAfterSave"   value="{{trans('app.next') }} " />	-->
			<div class="alert alert-warning" id='alert-warning-save1' style='display:none'><strong>عذرًا!</strong> لا يمكن اتمام عملية الحفظ في حال عدم ادخال جميع البيانات.</div>
		</fieldset>
 
		@endif
		<!--  End of block one -->

	
    	 <!--  block Two  -->
		@if(!Session::has('jobId'))
 
		<fieldset class='block2'>
			<h2 class="fs-title">أنا...</h2>
			<select name='jobId' class="form-control select">
				@foreach($getJobs as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['job']  }}</option> 
				@endforeach	 
			</select>
			<br>
			@if(!Session::has('genderId'))
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			@endif
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		<fieldset class='block2'>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي</h2>
			<select name='partnerJobId' class="form-control select">
				<option value="1">يعمل</option>
				<option value="2">لا يعمل</option>
				<option value="0">لايهم</option>
			</select>
			<br>
			<input type="button"  class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button"  class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		

		<fieldset class='block2'>
			<h2 class="fs-title">دخلي الشهري</h2>
			<div class="currency">
				<select name='monthlyIncomeId'  >
					@foreach($getMonthlyIncome as $key => $data)
						<option value="{{ $data['id']  }}">{{ $data['monthlyIncome']  }}</option> 
					@endforeach	 
				</select>
		
			</div>
			<input type="button"  class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button"  class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title">أفضل أن لا يقل دخل شريك حياتي الشهري عن</h2>
			<div class="currency">
			<select name='partnerMonthlyIncomeId'  >
				@foreach($getMonthlyIncome as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['monthlyIncome']  }}</option> 
				@endforeach	 
				<option value='0'>لا يهم</option>
			</select>
			</div>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
				<h2 class="fs-title">حالتي الصحية  </h2>
				<!--
				<select name='healthId'  class="form-control select">
					@foreach($getHealth as $key => $data)
						<option value="{{ $data['id']  }}">{{ $data['case']  }}</option> 
					@endforeach	 
				</select>
					<input type="text" name="sicknessCase" placeholder="ماهو..." class='hiddenInput' />
				<br>
				-->
				@php
				$i = 0
				@endphp
				<div class=checkbox>
				@foreach($getHealth as $key => $data)
				<label class="checkbox-inline">
					<input type="checkbox" class="checkbox1" name="healthId[]" value="{{ $data['id']  }}" class='isSelected'>{{ $data['case']  }} 
					@if($data['id']=='2' )
						<input type="text" name="chronicIllnessCase"  class="healthEdit" id="chronicIllnessCase" placeholder="ما هي.."  />
					@endif
					@if($data['id']=='3' )
						<input type="text" name="inheritedIllnessCase"  class="healthEdit" id="inheritedIllnessCase" placeholder="ما هي.."   />
					@endif
					@if($data['id']=='4' )
						<input type="text" name="distortionCase"  class="healthEdit1" id="distortionCase" placeholder="ما هو.."   />
					@endif
				</label> 
				@php
				$i++
				@endphp
				@endforeach	 
				</div>

				<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
				<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		<fieldset class='block2'>
			<h2 class="fs-title">  أنا من ذوي الاحتياجات الخاصة </h2>	
				<select  name='specialNeedId' class="form-control select">
					<option value='1'>لا</option>
					<option value='2'>نعم</option>
					
				</select>
				<input type="text" name="specialNeedCase" placeholder=  "اكتب الإعاقة" class='hiddenInput'  />
				<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title"> أرغب أن يكون شريك حياتي من ذوي الإحتياجات الخاصة </h2>	
				<select  name='partnerSpecialNeedId' class="form-control select">
					<option value='2'>لا</option>
					<option value='1'>نعم</option>
					<option value='0'>لا يهم</option>
				</select>
				
				<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block2'>
			<h2 class="fs-title">أنا...</h2>
			<select name='reproductionId'class="form-control select">
				@foreach($getReproduction as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['reproduction']  }}</option> 
				@endforeach
			
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي</h2>
			<select name='partnerReproductionId' class="form-control select">
				<option value='1' >غير عقيم</option>
				<option value='2'>عقيم</option>
				<option value='0' >لا يهم</option>
			</select>
			<br>
			<input type="button"  class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button"  class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title">أنا</h2>
			<select name='policeRecordId' class="form-control select">
			@foreach($getPoliceRecord as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['case']  }}</option> 
				@endforeach
			</select>
			<input type="text" name="policeRecordReason" placeholder="اكتب السبب" class='hiddenInput' />
			<br>
			<input type="button"  class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button"  class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title">أنا</h2>
			<select name='debtId' class="form-control select">
			@foreach($getDebts as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['case']  }}</option> 
				@endforeach
			</select>
			<br>
			<input type="button"  class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button"  class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title">أنا</h2>
			<select name='addictionId' class="form-control select">
			@foreach($getAddiction as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['case']  }}</option> 
				@endforeach
			</select>
			<br>
			<input type="button"  class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button"  class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block2'>
			<h2 class="fs-title">طولي</h2>
			<select name='lengthId' class="form-control select">	 
				@foreach($getLength as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['length']  }}</option> 
				@endforeach	 
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block2'>
			<h2 class="fs-title">أرغب أن يكون طول شريك حياتي</h2>
			<select name='partnerLengthId' class="form-control select">
				@foreach($getLength as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['length']  }}</option> 
				@endforeach	 
				<option value='0' >لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="submit" class="submit action-button save2"   value="{{trans('app.save') }} " />
			
			<div class="alert alert-warning" id='alert-warning-save2' style='display:none'><strong>عذرًا!</strong> لا يمكن اتمام عملية الحفظ في حال عدم ادخال جميع البيانات.</div>

		</fieldset> 
		@endif

	<!-- End block Tow -->



	<!--  Block Three  -->
	
	@if(!Session::has('weightId'))
	 
		<fieldset class='block3'>
			<h2 class="fs-title">وزني</h2>
			<select name='weightId' class="form-control select">
				@foreach($getWeight as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['weight']  }}</option> 
				@endforeach	 
			</select>
			<br>
			@if(!Session::has('jobId'))
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			@endif
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
			
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">أرغب أن يكون وزن شريك حياتي</h2>
			<div class="checkbox">
			@foreach($getWeight as $key => $data)
				<label class="checkbox-inline">
					<input type="checkbox" name="partnerWeightId[]" value="{{ $data['id']  }}" class='isSelected'>{{ $data['weight']  }}
				</label>
			@endforeach	
			<label class="checkbox-inline">
				<input type="checkbox" name="partnerWeightId[]" value="0" class='isSelected'>لا يهم
			</label>
			</div>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">أنا...</h2>
			<select name='religionId' class="form-control select">
				@foreach($getReligion as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['religion']  }}</option> 
				@endforeach	 
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">أرغب في الزواج بـ</h2>	 
			<select name='partnerReligionId' class="form-control select">
				@foreach($getReligion as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['religion']  }}</option> 
				@endforeach	 
				<option>لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">أنا... </h2>
			<select name='smokingId' class="form-control select">
				@foreach($getSmoking as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['smoking']  }}</option> 
				@endforeach	 
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button"     value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">يجب أن يكون شريك حياتي </h2>	
			<select name='partnerSmokingId' class="form-control select">
				@foreach($getSmoking as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['smoking']  }}</option> 
				@endforeach
				<option value='0' >لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title"> لون بشرتي</h2>	
			<select name='skinColorId' class="form-control select">
				@foreach($getSkinColor as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['skinColor']  }}</option> 
				@endforeach
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">أفضل أن يكون لون بشرة شريك حياتي</h2>
			<div class="checkbox">
				@foreach($getSkinColor as $key => $data)		
					<label class="checkbox-inline">
						<input type="checkbox" value="{{ $data['id']  }}" name='partnerSkinColorId[]'  class="isSelected">{{ $data['skinColor']  }}
					</label>
				@endforeach
				<label class="checkbox-inline">
					<input type="checkbox"  value="0" name='partnerSkinColorId[]' class="isSelected">لا يهم
				</label>
			</div>	 
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block3'>
			<h2 class="fs-title">شعري</h2>
			<select name='hairTypeId' class="form-control select">
				@foreach($getHairType as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['hairType']  }}</option> 
				@endforeach
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		
		<fieldset class='block3'>
			<h2 class="fs-title">أفضل أن يكون شعر شريك حياتي</h2>
			<div class="checkbox">
				@foreach($getHairType as $key => $data)
					<label class="checkbox-inline">
						<input value="{{ $data['id']  }}" name='partnerHairTypeId[]' type="checkbox" class='isSelected'>{{ $data['hairType']  }}
					</label>		
				@endforeach
				<label class="checkbox-inline">
					<input value="0" name='partnerHairTypeId[]' type="checkbox" class='isSelected'>لا يهم
				</label>
			</div>	
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="submit" class="submit action-button save3"   value="{{trans('app.save') }} " />
			
			<div class="alert alert-warning" id='alert-warning-save3' style='display:none'><strong>عذرًا!</strong> لا يمكن اتمام عملية الحفظ في حال عدم ادخال جميع البيانات.</div>
		</fieldset>
		@endif	
 

	<!-- End Block Three -->



	<!--  Block Four -->
	@if(!Session::has('beautyId'))

		<fieldset class='block4'>
			<h2 class="fs-title">أنا...</h2>
 			<select class="form-control select"  name='beautyId'>
			 	@foreach($getBeauty as $key => $data)
					<option value="{{ $data['id']  }}">{{ $data['level']  }}</option> 
				@endforeach
			</select>
			<br>
			@if(!Session::has('weightId'))
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			@endif
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		 
		<fieldset class='block4'>
			<h2 class="fs-title">أفضل أن يكون شريك حياتي</h2>
			<div class="checkbox">
				@foreach($getBeauty as $key => $data)
					<label class="checkbox-inline">
						<input value="{{ $data['id']  }}" name='partnerBeautyId[]' type="checkbox" class='isSelected'>{{ $data['level']  }}
					</label>		
				@endforeach
				<label class="checkbox-inline">
					<input value="0" name='partnerBeautyId[]' type="checkbox" class='isSelected'>لا يهم
				</label>
			</div>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
			
		<fieldset class='block4'>
			<h2 class="fs-title">أنا أستحم</h2>
			<select class="form-control select"  name='cleanlinessId'>
				@foreach($getCleanliness as $key => $data)
				<option  value="{{ $data['id']  }}">{{ $data['cleanliness']  }}</option>
				@endforeach
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block4'>
			<h2 class="fs-title">أفضل أن يستحم شريك حياتي</h2>
			<select class="form-control select"  name='partnerCleanlinessId'>
				@foreach($getCleanliness as $key => $data)
				<option  value="{{ $data['id']  }}">{{ $data['cleanliness']  }}</option>
				@endforeach
				<option  value="0">لا يهم</option>
			</select>
		
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
	 
		<fieldset class='block4'>
			<h2 class="fs-title">أنظف أسناني</h2>
			<select class="form-control select"  name='teethBrushId'>
				@foreach($getTeethBrush as $key => $data)
				<option  value="{{ $data['id']  }}">{{ $data['teethBrush']  }}</option>
				@endforeach
			</select>
			
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		<fieldset class='block4'>
			<h2 class="fs-title">أفضل أن يكون شريك حياتي ينظف أسنانه/ـا</h2>
			<select class="form-control select"  name='partnerTeethBrushId'>
				@foreach($getTeethBrush as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['teethBrush']  }}</option>
				@endforeach
				<option  value="0">لا يهم</option>
			</select>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block4'>
			<h2 class="fs-title">أنا...</h2>
			<select class="form-control select"  name='originId'>
				@foreach($getOrigin as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['origin']  }}</option>
				@endforeach
 			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		 <fieldset class='block4'>
			<h2 class="fs-title">يجب أن يكون شريك حياتي</h2>
			<select class="form-control select"  name='partnerOriginId'>
				@foreach($getOrigin as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['origin']  }}</option>
				@endforeach
 			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		 </fieldset>
		 
		<fieldset class='block4'>
			<h2 class="fs-title">أنا أصلي</h2>
 			<select class="form-control select" name="prayId">
		 		@foreach($getPray as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['pray']  }}</option>
				@endforeach
			</select>
		   <br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block4'>
			<h2 class="fs-title">يجب أن يصلي شريك حياتي</h2>
 			<select class="form-control select" name="partnerPrayId">
		 		@foreach($getPray as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['pray']  }}</option>
				@endforeach
			</select>
		   <br>
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="submit" class="submit action-button save4" value="{{trans('app.save') }} " />
			
			
			<div class="alert alert-warning" id='alert-warning-save4' style='display:none'><strong>عذرًا!</strong> لا يمكن اتمام عملية الحفظ في حال عدم ادخال جميع البيانات.</div>
		</fieldset>
		@endif

	<!-- End Block Four -->



    <!--  Block Five -->
	
	@if(!Session::has('fastingId'))

		<fieldset class='block5'>
			<h2 class="fs-title">أنا أصوم رمضان</h2>
			<select class="form-control select" name="fastingId">
				@foreach($getFasting as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['fasting']  }}</option>
				@endforeach
			</select>
			<br>
			@if(!Session::has('beautyId'))
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			@endif
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block5'>
			<h2 class="fs-title">يجب أن يكون شريك حياتي يصوم رمضان</h2>
			<select class="form-control select" name="partnerFastingId">
				@foreach($getFasting as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['fasting']  }}</option>
				@endforeach
					<option value='0'>لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block5'>
			<h2 class="fs-title">أرغب في الجماع</h2>
			<select class="form-control select" name='intercourseId'>
				@foreach($getIntercourse as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['intercourse']  }}</option>
				@endforeach
				
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>
		 
		<fieldset class='block5'>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي</h2>
			<select class="form-control select" name='partnerIntercourseId'>
				@foreach($getIntercourse as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['intercourse']  }}</option>
				@endforeach
				<option value='0'>لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
 		</fieldset>

		<fieldset class='block5'>
			<h2 class="fs-title">أحب أن أستمع للموسيقى</h2>
			<select class="form-control select" name="musicId">
				@foreach($getMusic as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['music']  }}</option>
				@endforeach
			</select>
		   <br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block5'>
			<h2 class="fs-title">أفضل أن يكون شريك حياتي يحب الاستماع الى الموسيقى</h2>
			<select class="form-control select" name="partnerMusicId">
					@foreach($getMusic as $key => $data)
						<option  value="{{ $data['id']  }}">{{ $data['music']  }}</option>
					@endforeach
					<option value='0'> لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" id='ChooseFMale' value="{{trans('app.next') }} " />
		</fieldset>

        <!--  Female case   -->
		@if(!Session::has('genderId') || Session::get('genderId')==2)
		<fieldset class='block5 female' id='#FirstFieldFemale'>  
			<h2 class="fs-title">حالتي الاجتماعية</h2>			
			<select class="form-control select womanMaritalStatus" name="womanMaritalStatusId">
				@foreach($getWomanMaritalStatus as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['womanMaritalStatus']  }}</option>
				@endforeach
			</select>
			<br>
			<div class='divorceSection'>
				<label>سبب الطلاق:</label><input name="womanDivorceReason"  />
				<label>عدد الطلاقات:</label>
				<select name="divorceNumber" class="form-control select">
					@for($i=1 ; $i<=3 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<label>عدد الأزواج السابقين:</label>
				<select name='husbandNumber' class="form-control select">
					@for($i=1 ; $i<=4 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
			</div>	
			<div class='childrenSection'>
				<label>عدد الاطفال: </label>
				<select name='womanChildrenNumber' id="womanChildrenNumber" class="form-control select">
					@for($i=0 ; $i<=10 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<table class="table" id='womanChildrenTable' >
					<tbody>
					@for($i=1 ; $i<=10 ; $i++)                    
					<tr class='womanChildrenTableTr' id="womanChildrenTableTr{{$i}}" style="display:none;">
						<td>{{$i}}</td>
                        <td><input type='text' name="childAge_{{$i}}"  class='numberOnly'>&nbsp;<span class='errmsg'></span></td>
                        <td><select name="childGender_{{$i}}" ><option  value="1">ذكر</option><option  value="2">أنثى</option></select></td>
                    </tr>
					@endfor
					</tbody>
				</table>

				<h4>هل تحضنين أطفال معك </h4>
				<input type="radio" name="custodyIdWoman" class="optionsRadio" value="1"  /> نعم
				<input type="radio" name="custodyIdWoman" class="optionsRadio" value="2" checked />لا

				
				<br>
				<label>كم عددهم:</label>
				<select name='custodyNumber' class="form-control select">
					@for($i=0 ; $i<=6 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
					<option>أكثر من 6</option>
				</select>
				<br>
			</div>	
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

  		<fieldset class='block5 female'>
			<h2 class="fs-title">أنا...</h2>
			<select name='hijabId' class="form-control select">
				@foreach($getHijab as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['hijab']  }}</option>
				@endforeach
				</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block5 female'>
			<h2 class="fs-title">أرغب أن يكون زوجي</h2>
			<select name='partnerManMaritalStatus' class="form-control select" id='partnerManMaritalStatus'>
				@foreach($getManMaritalStatus as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['status']  }}</option>
				@endforeach
				<option value='0'>لا يهم</option>
				</select>
				<div id='manChildren'>
					<select name='partnerHasChildren' class="form-control select">
						<option value='1'>لديه أطفال</option>
						<option value='2'>ليس لديه أطفال</option>
						<option value='0'>لا يهم</option>
					</select>
				</div>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset  class='block5 female'>
			<h2 class="fs-title">أرغب أن يكون زوجي</h2>
			
			<select name='partnerBeardId' class="form-control select">
				@foreach($getBeard as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['beard']  }}</option>
				@endforeach
				<option value='0'>لا يهم</option>
			</select>
			<br>
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
			
		</fieldset>

		<fieldset  class='block5 female'>
			<h2 class="fs-title">أرغب أن يكون السكن بعد الزواج</h2>
			
			<select name='womanHouseTypeId' class="form-control select">
				@foreach($getHouseType as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['type']  }}</option>
				@endforeach
				<option value='0'>لا يهم</option>
			</select>
			
			<br>  
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="button" class="submit action-button save5Woman"   value="{{trans('app.save') }} " />
			<div class="alert alert-warning" id='alert-warning-save5' style='display:none'><strong>عذرًا!</strong> لا يمكن اتمام عملية الحفظ في حال عدم ادخال جميع البيانات.</div>
			
			
			
		</fieldset>

		
		<fieldset class='block5 female'>
			<h3 class="fs-subtitle"></h3>
			<div class="checkmark">
				<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
			<path class="path" fill="none" stroke="#7DB0D5" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
				c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
				c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
			<circle class="path" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
			<polyline class="path" fill="none" stroke="#7DB0D5" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
				74.1,108.4 48.2,86.4 "/>
			
			<circle class="spin" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
			</svg>
			<h2 class="fs-title">تمت أضافة ملفك بنجاح</h2>
			<a>المراسلة</a>
			<a>الراغبين</a>
			<a href="/matchList">قائمة التوفيق</a>
			<a>ملفي</a>
			</div>
		</fieldset>	
		@endif
 
		<!-- End Female Case  -->

		<!-- Male Case  -->

		@if(!Session::has('genderId') || Session::get('genderId')==1)
		<fieldset class='block5 male' id='FirstFieldMale'>  
			<h2 class="fs-title">حالتي الاجتماعية</h2>
			<select name='manMaritalStatusId' class="form-control select manMaritalStatus" >	
				@foreach($getManMaritalStatus as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['status']  }}</option>
				@endforeach
			</select>
			<div class='divorceSection'>
				<label>سبب الطلاق:</label><input name="manDivorceReason"  />
				<label>عدد الطلاقات:</label>
				<select name="divorceNumber" class="form-control select">
					@for($i=1 ; $i<=3 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
			</div>
				
			<div class='childrenSection'>
				<label>عدد الاطفال: </label>
				<select name='manChildrenNumber' id="manChildrenNumber" class="form-control select">
					@for($i=0 ; $i<=10 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<table class="table" id='manChildrenTable'>
					<tbody>
					@for($i=1 ; $i<=10 ; $i++)                    
					<tr class='manChildrenTableTr' id="manChildrenTableTr{{$i}}" style="display:none;">
						<td>{{$i}}</td>
                        <td><input type='text' name="childAge_{{$i}}"  class='numberOnly'>&nbsp;<span class='errmsg'></span></td>
                        <td><select name="childGender_{{$i}}" ><option  value="1">ذكر</option><option  value="2">أنثى</option></select></td>
                    </tr>
					@endfor
					</tbody>	
				</table>

				<h4>هل تحضن أطفال معك </h4>
				<input type="radio" name="custodyId" class="optionsRadio" value="1" /> نعم
				<input type="radio" name="custodyId" class="optionsRadio" value="2"checked />لا
				<br>
				<label>كم عددهم:</label>
				<select name='custodyNumber' class="form-control select">
					@for($i=0 ; $i<=6 ; $i++)					
						<option  value="{{$i}}">{{$i}}</option>
					@endfor
					<option>أكثر من 6</option>
				</select>
			</div>
			<div id='wivesNumber'>
				<label>عدد الزوجات: </label>
				<select name='wivesNumber' class="form-control select">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
				<textarea name="secondWifeReason" placeholder="سبب الرغبة في التعدد"></textarea>
			</div>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block5 male'  > 
			<h2 class="fs-title">أنا...</h2>
			<select name='beardId' class="form-control select" >	
				@foreach($getBeard as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['beard']  }}</option>
				@endforeach
			</select>
			<br>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

		<fieldset class='block5 male'>
			<h2 class="fs-title">أرغب أن يكون حجاب زوجتي</h2>
			<div class="checkbox">
				@foreach($getHijab as $key => $data)
					<label class="checkbox-inline">
						<input value="{{ $data['id']  }}" name='partnerHijabId[]' type="checkbox" class='isSelected'>{{ $data['hijab']  }}
					</label>		
				@endforeach
				<label class="checkbox-inline">
					<input value="0" name='partnerHijabId[]' type="checkbox" class='isSelected'>لا يهم
				</label>
			</div>
			<input type="button" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" class="next action-button" value="{{trans('app.next') }} " />
		</fieldset>

			
		<fieldset class='block5 male'>
			<h2 class="fs-title">أرغب أن يكون السكن بعد الزواج</h2>
			
			<select name='manHouseTypeId' class="form-control select">
				@foreach($getHouseType as $key => $data)
					<option  value="{{ $data['id']  }}">{{ $data['type']  }}</option>
				@endforeach
				
			</select>
			<br>
			<input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="button" class="next action-button" value="{{trans('app.next') }} " /> 
 		</fieldset>

		<fieldset class='block5 male'>
			<h2 class="fs-title">أرغب أن تكون زوجتي</h2>
			<div class="checkbox">
				@foreach($getWomanMaritalStatus as $key => $data)
					<label class="checkbox-inline">
						<input value="{{ $data['id']  }}" name='partnerWomanMaritalStatusId[]' type="checkbox" class='isSelected'>{{ $data['womanMaritalStatus']  }}
					</label>
				@endforeach
				<label class="checkbox-inline">
					<input value="0" name='partnerWomanMaritalStatusId[]' type="checkbox" class='isSelected'>لا يهم
				</label>
			</div>
			<br><input type="button" class="previous action-button previousBeforeSave"  value="{{trans('app.previous') }} "  /> 
			<input type="submit" class="submit action-button save6"   value="{{trans('app.save') }} " />
			 
			<div class="alert alert-warning" id='alert-warning-save6' style='display:none'><strong>عذرًا!</strong> لا يمكن اتمام عملية الحفظ في حال عدم ادخال جميع البيانات.</div>
		</fieldset>

		
		<fieldset class='block5 male'>
			<h3 class="fs-subtitle"></h3>
			<div class="checkmark">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
			<path class="path" fill="none" stroke="#7DB0D5" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
				c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
				c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
			<circle class="path" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
			<polyline class="path" fill="none" stroke="#7DB0D5" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
				74.1,108.4 48.2,86.4 "/>
			
			<circle class="spin" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
			</svg>
			<h2 class="fs-title">تمت أضافة ملفك بنجاح</h2>
			<a>المراسلة</a>
			<a>الراغبين</a>
			<a href="/matchList">قائمة التوفيق</a>
			<a>ملفي</a>
			</div>
		</fieldset>	
	    @endif	

		<!-- End Male Case  -->
	@endif

	<!--  End Block Five -->

	
	<!--fieldset>
	    	<h2 class="fs-title">Personal Details</h2>
			<h3 class="fs-subtitle">We will never sell it</h3>
			<input type="text" name="fname" placeholder="First Name" />
			<input type="text" name="lname" placeholder="Last Name" />
			<input type="text" name="phone" placeholder="Phone" />
			<textarea name="address" placeholder="Address"></textarea>
			<input type="button"   class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="save" class="save action-button" value="{{trans('app.save') }} " />
		    <input type="submit" name="submit" class="submit action-button" value="Submit" />
		</fieldset-->	
 
</form>

@stop
    
 
