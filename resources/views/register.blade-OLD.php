@extends('master')
 @section('main_content')

                 

                <br><br>
                


                <!-- multistep form -->
	<div class="alert alert-info" role="alert">
  	
سيُطلب منك إكمال العديد من الأسئلة المصممة لتساعدك في زيادة نسبة التوافق بين الطرفين 
<br>أجب بكل مصداقية ووضوح لترفع نسبة التوافق بينك وبين شريك حياتك قدر المستطاع .
<br>
يمكنك حفظ إجاباتك والإكمال لاحقاً .
	</div>
	 
 
<form id="msform" class='ajax'>
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active"></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	<!-- fieldsets -->

	 <!--  block one -->
    <fieldset>
		<h2 class="fs-title">أنا..</h2>
		<input type="radio" name="male" class="optionsRadio" value="option1" checked/> ذكر 
		<input type="radio" name="female" class="optionsRadio" value="option2"/>أنثى
		<br>
		 
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<input type="submit" name="submit"   class="submit action-button save"   value="{{trans('app.save') }} " />

        
	</fieldset>
	<fieldset>
		<!-- <h3 class="fs-subtitle">هذه المعلومات سرية ولن يتمكن أحد من الاطلاع عليها سوى الادارة</h3> -->
		<input type="text" name="firstName" placeholder="اسمي الأول" />
		<input type="text" name="lastBame" placeholder="اسمي الأخير" />
		<div style='text-align:right' >*هذه المعلومات سرية ولن تظهر للأخرين.</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
 
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
		
	</fieldset>
	<fieldset>
		<h2 class="fs-title">جنسيتي</h2>
             <select name='nationality_id' class="form-control select">
				@foreach($getNationalities as $key => $data)
                	<option>{{ $data['nationality']  }}</option> 
				@endforeach	 
			</select>
			 <p></p>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
        <input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">أرغب أن تكون جنسية
شريك حياتي</h2>
		
			<select name='partner_nationality_id' class="form-control select">
				@foreach($getNationalities as $key => $data)
                	<option>{{ $data['nationality']  }}</option> 
				@endforeach	 	 
			</select>
			 <p></p>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
        <input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">أنا أقيم في</h2>
		<label>الدولة: </label>
		<select name='resident_country_id' class="form-control select">
				@foreach($getCountries as $key => $data)
                	<option>{{ $data['name']  }}</option> 
				@endforeach	 
			</select>
				<br>
		<label>المدينه: </label>
		<select name='resident_city_id' class="form-control select">
				@foreach($getCities as $key => $data)
                	<option>{{ $data['name']  }}</option> 
				@endforeach	 
			</select>
			 <p></p>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">أرغب أن يكون شريك حياتي يقيم
في</h2>

			<label>الدولة: </label>
			<select name='partner_resident_country_id' class="form-control select">
				@foreach($getCountries as $key => $data)
                	<option>{{ $data['name']  }}</option> 
				@endforeach	 
				<option>لايهم</option>
			</select>
				<br>
				<label>المدينه: </label>
				<select name='partner_resident_city_id' class="form-control select">
				@foreach($getCities as $key => $data)
                	<option>{{ $data['name']  }}</option> 
				@endforeach	 
                 <option>لايهم</option>
			 </select>
			 <p></p>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">تاريخ ميلادي</h2>
 			<input name='date_of_birth' type = "text" id = "datepicker">
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
	    	<h2 class="fs-title">أرغب أن يكون عمر شريك حياتي</h2>
 		     
			 <select name='partnerAge_id' class="form-control select">
			 @foreach($getPartnerAge as $key => $data)
                	<option>{{ $data['partnerAge']  }}</option> 
				@endforeach	 
                 <option>لايهم</option>
				</select>
			 <p></p>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
					<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">تخصصي العلمي</h2>
			
			<select class="form-control select">
				@foreach($getSpecializations as $key => $data)
                	<option>{{ $data['specialization']  }}</option> 
				@endforeach	 
                 
			
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
						<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">مؤهلي العلمي</h2>
			 
			<select class="form-control select">
			
				@foreach($getDegrees as $key => $data)
                	<option>{{ $data['degree']  }}</option> 
				@endforeach	 
				</select>
			   <br>

			<!-- <input type="submit" name="submit" class="submit action-button" value="{{trans('app.save') }} " /> -->
			<input type="button" name="next"   class="next action-button"   value="{{trans('app.next') }} " />
			
	</fieldset>	

	<!--  End of block one -->


	<fieldset>
			<h2 class="fs-title">المهنه</h2>
			<h3 class="fs-subtitle"></h3>
			<select class="form-control select">
				@foreach($getJobs as $key => $data)
                	<option>{{ $data['job']  }}</option> 
				@endforeach	 
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">مهنة الشريك</h2>
		<h3 class="fs-subtitle">ماذا ترغب ان تكون مهنة شريكك</h3>
		<select class="form-control select">
				 <option>يعمل</option>
				<option>لا يعمل</option>
				<option>لايهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
</fieldset>
<fieldset>
	<h2 class="fs-title">الدخل الشهري</h2>
	<h3 class="fs-subtitle"></h3>
	<div class="currency">
			<select class="currency-select">
			  <option></option>
			  <option value="one">one</option>
			  <option value="two">two</option>
			  <option value="three">three</option>
			</select>
			<input type="text" name="displayValue" placeholder="اختار العمله" class="currency-input">
			<input name="idValue" id="idValue" type="hidden">
		  </div>
	<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
	<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
	<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
</fieldset>
<fieldset>
		<h2 class="fs-title">دخل شريكك</h2>
		<h3 class="fs-subtitle">أفضل أن لا يقل دخل شريك حياتي الشهري عن</h3>
		<div class="currency">
				<select class="currency-select">
				  <option></option>
				  <option value="one">one</option>
				  <option value="two">two</option>
				  <option value="three">three</option>
				</select>
				<select class="select">
					<option>3000</option>
					<option>6000</option>
					<option>9000</option>
					<option>12000</option>
					<option>15000</option>
					<option>50000</option>
					<option>لا يهم</option>
				</select>
			  </div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">حالة الصحيه </h2>
			<h3 class="fs-subtitle">ما هيا حالتك الصحيه</h3>
			<select class="form-control select">
		     		<option>سليم ونشيط</option>
					<option>أعاني أمراض مزمنه</option>
					<option>أعاني أمراض وراثية</option>
				</select>
				<input type="text" name="fname" placeholder="ماهوا المرض" />
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">الإعاقة </h2>
			<h3 class="fs-subtitle"></h3>
			<select class="form-control select">
		     		<option>لست من ذوي الاحتياجات الخاصه</option>
					<option>من ذوي الاحتياجات الخاصه</option>
				</select>
				<input type="text" name="fname" placeholder= "ما هيا الإعاقة " />
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">الإعاقة </h2>
			<h3 class="fs-subtitle"></h3>
			<select class="form-control select">
		     		<option>ليس من ذوي الاحتياجات الخاصه</option>
					<option>من ذوي الاحتياجات الخاصه</option>
					<option>لا يهم</option>
				</select>
				<input type="text" name="fname" placeholder= "ما هيا الإعاقة " />
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">العقم</h2>
			<h3 class="fs-subtitle">هل انت </h3>
			<select class="form-control select">
		     		<option>غير عقيم</option>
					<option>عقيم</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">شريك حياتيك</h2>
			<h3 class="fs-subtitle">ماذا تريد ان يكون شريك حياتك </h3>
			<select class="form-control select">
		     		<option>غير عقيم</option>
					<option>عقيم</option>
					<option>لا يهم</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">المقاييس</h2>
			<h3 class="fs-subtitle">ماهو طولك </h3>
			<select class="form-control select">
		     		<option>اقصر من 150سم</option>
					<option>155-151</option>
					<option>160-156</option>
					<option>165-161</option>
					<option>170-166</option>
					<option>175-171</option>
					<option>اطول من 175سم</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">مقاييش شريك حياتك</h2>
			<h3 class="fs-subtitle">ماهو الطول المفضل لديك ليكون شريك حياتك</h3>
			<select class="form-control select">
		     		<option>اقصر من 150سم</option>
					<option>155-151</option>
					<option>160-156</option>
					<option>165-161</option>
					<option>170-166</option>
					<option>175-171</option>
					<option>اطول من 175سم</option>
					<option>لا يهم</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">المقاييس</h2>
			<h3 class="fs-subtitle">ماهو وزنك </h3>
			<select class="form-control select">
		     		<option>أقل من 50 كيلو</option>
					<option>60-51</option>
					<option>70-61</option>
					<option>80-71</option>
					<option>90-81</option>
					<option>100-91</option>
					<option>110-101</option>
					<option>120-111</option>
					<option>130-121</option>
					<option>اكثر من 130 كيلو</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">مقاييس شريك حياتك</h2>
		<h3 class="fs-subtitle">كم وزن شريك حياتك التي ترغبها </h3>
		<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">أقل من 50 كيلو
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">60-51
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">70-61
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">80-71
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">90-81
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">100-91
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">110-101
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">120-111
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">130-121
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">اكثر من 130 كيلو
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">لا يهم
		</label>
	</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
    </fieldset>
	<fieldset>
			<h2 class="fs-title">الديانة</h2>
			<h3 class="fs-subtitle">ماهيا ديانتك </h3>
			<select class="form-control select">
		     		<option>مسلم/ سني</option>
					<option>مسلم/ شيعي</option>
					<option>مسلم/ أخرى</option>
					<option>ديانة أخرى</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
			<h2 class="fs-title">ديانة شريك حياتك </h2>
			<h3 class="fs-subtitle">ماذا ترغب ان يكون شريك حياتك </h3>
			<select class="form-control select">
		     		<option>مسلم/ سني</option>
					<option>مسلم/ شيعي</option>
					<option>مسلم/ أخرى</option>
					<option>ديانة أخرى</option>
					<option>لا يهم</option>
				</select>
			   <br>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
			<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">العادات </h2>
		<h3 class="fs-subtitle">ماهيا عادتك </h3>
		<select class="form-control select">
				 <option>لا أدخن مطلقاً</option>
				<option>أدخن سيجارة</option>
				<option>أدخن شيشة</option>
				<option>أدخن معسل</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">عادة شريك حياتك </h2>
		<h3 class="fs-subtitle">ماذا يجب أن يكون شريك حياتك</h3>
		<select class="form-control select">
				 <option>لا يدخن</option>
				<option>يدخن سيجارة</option>
				<option>يدخن شيشة</option>
				<option>يدخن معسل</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title"> بشرتك</h2>
		<h3 class="fs-subtitle">ماهيا لون بشرتك</h3>
		<select class="form-control select">
				<option>أبيض فاتح</option>
				<option>أبيض متوسط</option>
				<option>حنطي فاتح</option>
				<option>حنطي غامق</option>
				<option>أسود فاتح</option>
				<option>أسود غامق</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">بشرت شريكك</h2>
		<h3 class="fs-subtitle">ماذا تفضل أن يكون لون بشرة شريك حياتك</h3>
		<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">أبيض فاتح
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">أبيض متوسط
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">حنطي فاتح
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">حنطي غامق
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">أسود فاتح
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">أسود غامق
		</label>
	</div>
    <div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">لا يهم
		</label>
	</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">شعرك</h2>
		<h3 class="fs-subtitle">ماهوا لون شعرك</h3>
		<select class="form-control select">
				<option>ناعم جداً</option>
				<option>ناعم</option>
				<option>متجعد</option>
				<option>متجعد جداً</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">شعر شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا تفضل أن يكون شعر شريك حياتك</h3>
		<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">ناعم جداً
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">ناعم
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">متجعد
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">متجعد جداً
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">لا يهم
		</label>
	</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">المظهر</h2>
		<h3 class="fs-subtitle">ماهوا مظهرك</h3>
		<select class="form-control select">
				<option>وسيم جداً</option>
				<option>وسيم</option>
				<option>متوسط الجمال</option>
				<option>مقبول</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">مظهر شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا تفضل أن يكون مظهر شريك حياتك</h3>
		<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">وسيم جداً
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">وسيم
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">متوسط الجمال 
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">مقبول
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">لا يهم
		</label>
	</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">الاصل</h2>
		<h3 class="fs-subtitle">ماهوا اصلك</h3>
		<select class="form-control select">
				<option>من السادة و الأشراف</option>
				<option>قبيلي</option>
				<option>غير قبيلي</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">أصل شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا تفضل أن يكون أصل شريك حياتك</h3>
		<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">من السادة و الأشرافً
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">قبيلي
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">غير قبيلي 
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">لا يهم
		</label>
	</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">التزاماتي</h2>
		<h3 class="fs-subtitle">ماهوا التزامتك</h3>
		<select class="form-control select">
				<option>أحافظ على الصلاة</option>
				<option>أصلي أحياناً</option>
				<option>لا أصلي</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">التزامات شريك حياتك</h2>
		<h3 class="fs-subtitle">ماهيا الاتزامات التي ترغبها أن تكون في شريك حياتك</h3>
		<select class="form-control select">
				<option>أحافظ على الصلاة</option>
				<option>أصلي أحياناً</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">التزاماتي</h2>
		<h3 class="fs-subtitle">ماهيا التزامتك</h3>
		<select class="form-control select">
				<option>أصوم رمضان</option>
				<option>لا أصوم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">التزامات شريك حياتك</h2>
		<h3 class="fs-subtitle">ماهيا الاتزامات التي ترغبها أن تكون في شريك حياتك</h3>
		<select class="form-control select">
				<option>يصوم رمضان</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">الرغبات</h2>
		<h3 class="fs-subtitle">ماهيا رغبنك في الجماع</h3>
		<select class="form-control select">
				<option>عدة مرات في اليوم</option>
				<option>مرة وادة في اليوم</option>
				<option>مرات في الأسبوع3</option>
				<option>مرة في الأسبوع</option>
				<option>مرة في الشهر</option>
				<option>لا أرغب في الجماع</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">الهوايات</h2>
		<h3 class="fs-subtitle">ماهيا هواياتك</h3>
		<select class="form-control select">
				<option>أستمع للموسيقى</option>
				<option>لا أستمع للموسيقى</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">هوايات شريك حياتك</h2>
		<h3 class="fs-subtitle">ماهيا الهواية التي ترغب أن تكون في شريك حياتك</h3>
		<select class="form-control select">
				<option>أستمع للموسيقى</option>
				<option>لا أستمع للموسيقى</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">حالتي الاجتماعية</h2>
		<h3 class="fs-subtitle">في حال كان المشترك امرأة تظهر الاسئلع التاليه</h3>
		<select class="form-control select">
				<option>بكر لم أتزوج</option>
				<option>مطلقة بكر</option>
				<option>مطلقه ثيب</option>
				<option>أرملة</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">سبب الطلاق</h2>
		<h3 class="fs-subtitle">عند اختيار مطلقه بكر او ثيب تظهر الشاشه التالية</h3>
		<textarea name="address" placeholder="سبب الطلاق"></textarea>
		<label>عدد الطلاقات:</label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			<br>
			<label>عدد الأزواج السابقين:</label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">عدد الاطفال</h2>
		<h3 class="fs-subtitle">عند اختيار مطلقه ثيب او ارمله تظهر الشاشه التالية</h3>
		<textarea name="address" placeholder="سبب الطلاق"></textarea>
		<label>عدد الاطفال: </label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
			</select>
			<p>تنويه: يظهر جدول حسب العدد المختار أعلاه</p>
			<h4>هل تحضن أطفال معك </h4>
			<input type="radio" name="optionsRadios" class="optionsRadio" value="option1" checked/> نعم
			<input type="radio" name="optionsRadios" class="optionsRadio" value="option2"/>لا
            <br>
			<label>كم عددهم:</label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
			</select>
			<br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">عنك</h2>
		<h3 class="fs-subtitle">هل انتي </h3>
		<select class="form-control select">
				<option>متحجبه</option>
				<option>أغطي وجهي</option>
				<option>أكشف وجهي وشعري</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">عن شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا ترغب أن يكون شريك حياتك</h3>
		<select class="form-control select">
				<option>أعزب</option>
				<option>مطلق</option>
				<option>أرمل</option>
				<option>متزوج</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">عن شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا ترغب أن يكون زوجك</h3>
		<h5>تنويه في حالة اختيار مطلق, أرمل, متزوج, تظهر الشاشه التالية</h5>
		<select class="form-control select">
				<option>لديه أطفال</option>
				<option>ليس لديه أطفال</option>
				<option>لا يهم</option>
			</select>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">عن شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا ترغب أن يكون شريك حياتك</h3>
		<select class="form-control select">
				<option>حليق اللحية</option>
				<option>يعفي اللحية ويشذبها</option>
				<option>يعفيها ولا يقص منها</option>
				<option>لا يهم</option>
			</select>
			<h5>تنويه: بعد انتها المرة من ادخال هذه المعلومات يتم الحفظ وتتوجه الى الصفه تم بنجاح </h5>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">الحالة الاجتماعية</h2>
		<h3 class="fs-subtitle">ماهيا حالتك الاجتماعية</h3>
		<select class="form-control select">
				<option>أعزب لم أتزوج</option>
				<option>أرمل</option>
				<option>مطلق</option>
				<option>متزوج</option>
			</select>
			<h5>تنويه: اذا كان المشترك رجل تظهر له هذه الشاشه  </h5>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">الحالة الاجتماعية</h2>
		<h3 class="fs-subtitle">ماهو سبب الطلاق</h3>
		<textarea name="address" placeholder="سبب الطلاق"></textarea>
		<label>عدد الطلقات: </label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			<h5>تنويه: عند اختيار مطلق  تظهر الشاشة التالية  </h5>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">الحالة الاجتماعية</h2>
		<h3 class="fs-subtitle">ماهو سبب الطلاق</h3>
		<textarea name="address" placeholder="سبب الطلاق"></textarea>
		<label>عدد الأطفال: </label>
		<select class="form-control select">
				<option>0</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
			</select>
			<h5>يظهر جدول حسب عدد الاطفال </h5>
			<h4>هل تحضن أطفال معك </h4>
			<input type="radio" name="optionsRadios" class="optionsRadio" value="option1" checked/> نعم
			<input type="radio" name="optionsRadios" class="optionsRadio" value="option2"/>لا
			<br>
			<label>كم عددهم:</label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
			</select>

			<h5>تنويه: عند اختيار مطلق أو أرملة  أو متزوج تظهر الشاشة التالية   </h5>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">التعدد</h2>
		<h3 class="fs-subtitle"></h3>
		<textarea name="address" placeholder="سبب الطلاق"></textarea>
		<label>عدد الزوجات: </label>
		<select class="form-control select">
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			<textarea name="address" placeholder="سبب الرغبة في التعدد"></textarea>
			<h5>تنويه: عند اختيار متزوج  تظهر الشاشة التالية ايضا   </h5>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">شريك حياتك </h2>
		<h3 class="fs-subtitle">ماذا ترغب أن تكون شريك حياتك</h3>
		<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">متحجبة تكشف وجهها وتغطي شعرها
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">تغطي وجهها
		</label>
	</div>
	<div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">تكشف شعرها 
		</label>
	</div>
    <div class="checkbox">
		<label class="checkbox-inline">
			<input type="checkbox">لا يهم
		</label>
	</div>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
		<h2 class="fs-title">شريك حياتك</h2>
		<h3 class="fs-subtitle">ماذا ترغب ان تكون شريك حياتك </h3>
		<textarea name="address" placeholder="سبب الطلاق"></textarea>
		<select class="form-control select">
				<option>بكر لم تتزوج</option>
				<option>مطلقة بكر</option>
				<option>مطلقة ثيب</option>
				<option>أرملة</option>
				<option>لا يهم</option>
			</select>
			<textarea name="address" placeholder="سبب الرغبة في التعدد"></textarea>
			<h5>تنويه: عند اختيار متزوج  تظهر الشاشة التالية ايضا   </h5>
		   <br>
		<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
		<input type="button" name="next" class="next action-button" value="{{trans('app.next') }} " />
		<!-- <input type="submit" name="submit" class="submit action-button" value="Submit" /> -->
	</fieldset>
	<fieldset>
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
		  <h2 class="fs-title">تمت أضافة طلبك بنجاح</h2>
	</fieldset>	
	<!--fieldset>
	    	<h2 class="fs-title">Personal Details</h2>
			<h3 class="fs-subtitle">We will never sell it</h3>
			<input type="text" name="fname" placeholder="First Name" />
			<input type="text" name="lname" placeholder="Last Name" />
			<input type="text" name="phone" placeholder="Phone" />
			<textarea name="address" placeholder="Address"></textarea>
			<input type="button" name="previous" class="previous action-button" value="{{trans('app.previous') }} " />
			<input type="button" name="save" class="save action-button" value="{{trans('app.save') }} " />
		    <input type="submit" name="submit" class="submit action-button" value="Submit" />
		</fieldset-->	
 
</form>

<form class='ajax1'>
<input type="submit" name="submit" class="submit action-button" value="Submit" />

</form>




@stop
    
 
