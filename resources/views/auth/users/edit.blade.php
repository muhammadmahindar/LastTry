@extends('layouts.login')
@section('title','Register')
@section('cssarea')
<!-- DataTable Bootstrap  -->
    <link href="{{ asset('css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<!-- Responsive Bootstrap  -->
    <link href="{{ asset('css/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet"> 
<!-- Select2 -->
  <link rel="stylesheet" href="{{asset('css/bower_components/select2/dist/css/select2.min.css')}}">    
     
@endsection
@section('content')

<p class="login-box-msgs">Register a new user account</p>
                    <form class="form-horizontal" role="form" method="POST" action="{{route('Users.update',$userData->id)}}">
                        <input type="hidden" name="_method" value="PATCH">
                      {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $userData->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $userData->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group has-feedback form-group{{ $errors->has('companyList') ? ' has-error' : '' }}">
                            <label class="col-md-4">Associate Companies</label>
                            <div class="col-md-8">
                             <select class="form-control select2"  data-placeholder="Companies" name="companyList" id="companyList" required>
                                  <option value="">--- Select State ---</option>
                                 @foreach($CompanyData as $dpDT)
                                     <option value="{{$dpDT->id}}" @if($userData->company->name == $dpDT->name) 
                                      selected @endif>{{$dpDT->name}}</option>
                                 @endforeach
                            </select>
                            @if ($errors->has('companyList'))
                            <span class="help-block">
                                <strong>{{ $errors->first('companyList') }}</strong>
                            </span>
                            @endif
                        </div>
                        </div>

                        <div class="form-group has-feedback form-group{{ $errors->has('branchList') ? ' has-error' : '' }}">
                            <label class="col-md-4">Associate Branches</label>
                            <div class="col-md-8">                            
                             <select class="form-control select2" data-placeholder="Branches" id="branchList" name="branchList" required>
                                <option value="">--- Select Branch ---</option>
                                     <option value="{{$branchData->id}}" selected>{{$branchData->name}}</option>
                            </select>
                            @if ($errors->has('branchList'))
                            <span class="help-block">
                                <strong>{{ $errors->first('branchList') }}</strong>
                            </span>
                            @endif
                        </div>
                        </div>


                        <div class="form-group has-feedback form-group{{ $errors->has('departmentList') ? ' has-error' : '' }}">
                            <label class="col-md-4">Associate Departments</label>
                             <div class="col-md-8">
                             <select class="form-control select2" data-placeholder="Departments" name="departmentList" required>
                                <option value="">--- Select Department ---</option>
                                     <option value="{{$departmentData->id}}"
                                      selected>{{$departmentData->name}}</option>
                            </select>
                            @if ($errors->has('departmentList'))
                            <span class="help-block">
                                <strong>{{ $errors->first('departmentList') }}</strong>
                            </span>
                            @endif
                        </div>
                        </div>

                       <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Active</label>

                            <div class="col-md-8">
                                <select class="form-control select2" data-placeholder="Status" name="status" required>
                                <option value="">--- Select Status ---</option>
                                <option value="1" @if($userData->active==1) selected @endif >Enabled</option>
                                <option value="0" @if($userData->active==0) selected @endif >Disabled</option> 
                            </select>

                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button class="add_form_field test btn btn-info" type="button">Add more</button>
                        <div class="container1 form-group{{ $errors->has('roleList') ? ' has-error' : '' }}">
                           @foreach($userData->roles as $rcolect)
                            <div class="row">
                            <label for="password" class="col-md-4 control-label">Role</label>

                            <div class="col-md-8">
                                 <select class="test" name="roleList[]" required="">
                                    <option value="">--Please choose--</option>
                                     
                                     @foreach($roleData as $mater)
                                     <option value="{{$mater->name}}" @if($rcolect->name == $mater->name) selected @endif >{{$mater->name}}</option>
                                     @endforeach
                                   </select>

                                @if ($errors->has('roleList'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roleList') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          @endforeach
                        </div>
                        
                                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
@endsection
@section('scriptarea')
<!-- jQuery 3 -->
 <script src="{{ asset('css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{asset('css/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  //Initialize Select2 Elements
    $('.select2').select2()
  $(document).ready(function(){
    $("#companyCreate").click(function(){
        $("#myModal").modal();
    });
});
</script>
<script>


 $(document).ready(function() {
        var max_fields      = 10;
        var wrapper         = $(".container1");
        var add_button      = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(true){
                x++;
                $(wrapper).append('<div class="row"><label for="roleList" class="col-md-4 control-label">Role</label><div class="col-md-6"><select class="test" name="roleList[]" required=""><option value="">--Please choose--</option>@foreach($roleData as $mater)<option value="{{$mater->name}}">{{$mater->name}}</option>@endforeach</select>@if ($errors->has('roleList'))<span class="help-block"><strong>{{ $errors->first('roleList') }}</strong></span>@endif</div><a href="#" class="delete">Delete</a></div>'); //add input box
            }        });

        $(wrapper).on("click",".delete", function(e){
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

</script>
<script type="text/javascript">
   var text = "";
  var possible = "0123456789_ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_abcdefghijklmnopqrstuvwxyz0123456789_";

  for (var i = 0; i < 7; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
        $("#password").val(text);
    </script>

<script type="text/javascript">
  $("select[name='companyList']").change(function(){
      var companyList = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: '/getbranch',
          method: 'POST',
          data: {companyList:companyList, _token:token},
          success: function(data) {
            $("select[name='branchList'").html('');
            $("select[name='branchList'").html(data.options);
          }
      });
  });
</script>
<script type="text/javascript">
  $("select[name='branchList']").change(function(){
      var branchList = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: '/getdepartment',
          method: 'POST',
          data: {branchList:branchList, _token:token},
          success: function(data) {
            $("select[name='departmentList'").html('');
            $("select[name='departmentList'").html(data.options);
          }
      });
  });
</script>
@endsection
