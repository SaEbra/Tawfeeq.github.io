
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
                        <div class="panel-heading">
                            <h3>:قائمة الراغبين بي </h3>
                        <div class="dropdown">
                  <ul class="dropdown-ul">
                    @if(isset($candidate))
                        @foreach($candidate as $key => $data)
                            <li><a href="/showProfile/ID/{{ $data['ID']  }}" class="list-group-item"><i class="fa fa-comment fa-fw"></i>{{ $data['ID'] }} - {{ $data['dateOfBirth'] }}</a></li>
                        @endforeach
                    @endif
                    
                  </ul>
                  </div>
                </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            </div>
            </div>

 </section>

    @stop
