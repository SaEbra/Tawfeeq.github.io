 @extends('master')
 @section('main_content')
    <div class="text" >
      <h1 > </h1>
      <form class="registerFormClass" id="msform" method="POST" action='registerPhone' >
      <fieldset >
      {{ csrf_field() }}
        <div id="firstStage">
		<h2 class="fs-title">  {{ trans('app.Register') }} </h2>
		<h3 class="fs-subtitle"></h3>
        <input type="text" name="phoneNumber" id="phoneNoId" autocomplete="off" placeholder="{{ trans('app.placeholderPhoneNo') }}" />
        <input type="hidden" name="countryCode" id="countryCode"  />
          

        <!-- <input class="input-btn" type="button"  value="تسجيل" id='signUp' onclick="signIn();" > -->
        <input class="input-btn " type="button"  value="تسجيل" id='signUp'  onclick="signIn();" >
         
         
        
		
        <div id="recaptcha-container"></div>
		<!--         <input type="button" name="save" id='signUp' class="next action-button" value="تسجيل " />
        -->
        </div>
         

        <div id="secondStage" style="display:none">
		<h2 class="fs-title">رمز التحقق</h2>
		<h3 class="fs-subtitle"></h3>
		<input type="text" name="verificationcode" autocomplete="off" id="verificationcode" placeholder="ادخل رمز التحقق" />
		<div id="recaptcha-container"></div>
		<input type="button" name="save" id='signUpWithCode' class="next action-button" value="تسجيل " onclick="myFunction()" />
		</div>

     </fieldset>
     </form>  	

    </div>
    @stop
    