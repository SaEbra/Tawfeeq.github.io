@extends('Admins/adminMaster')
@section('main_content')
	<div class="grids">
		<div class="panel panel-widget forms-panel">
			<div class="forms">
				<div class=" form-grids form-grids-right">
					<div class="widget-shadow " data-example-id="basic-forms"> 
						<div class="form-title">
							<h4> التحذيرات</h4>
						</div> 
						<div class="form-body">
                         
							{!! Form::open(['id' => 'aboutUsForm','class' => 'form-horizontal formSumbit'],['action' => '/warnings']) !!}	
								<div class="form-group"> 
									{!! Form::label('Text', 'Text:',['class'=>'col-sm-2 control-label required-field']) !!}
									<div class="col-sm-9"> 
										{!! Form::textarea('text', "$text",['class'=>'form-control','rows'=>'10', 'name'=>'text', 'id'=>'text']) !!}
									</div>	 
								</div>
								<div class="col-sm-offset-2"> 
									{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
								</div>
							{!! Form::close() !!}
						</div>
					</div> 
				</div>
			</div>	
		</div>
		
        <br>
			<div class="alert alert-success" style="display: none;"><strong></strong> تم الحفظ بنجاح.</div>
            <div class="alert alert-danger"  style="display: none;"><strong></strong> لم يتم الحفظ جميع الاسئلة الزامية.</div>
            
	</div> 

       				
@endsection
