@extends('layouts.app')

@section('content')

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->




<section id="services">


 
 
 
                                                     
 <center><h1>REGISTER YOUR ACCOUNT NOW</h1><br>
 <b>Already Have An Account?</b> <a href="{{url('/login')}}">Login Now</a></center><br>
 <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="{{asset('images/investment3.jpg')}}"  alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h4 class="column-title"><p style="font-family:georgia,garamond,serif;" > <b>REGISTER</b></p></h4>
                    <P style="font-family:georgia,garamond,serif;">
                    <div id="app">
                    @if(!$errors->isEmpty())
                    <div class="alert alert-error">
                        There was an error in processing your request.
                        
                        @foreach($errors as $err)
                            <p>{{ $err }}</p>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" autocomplete="off" action="{{ route('register')}}" >
                    {{ csrf_field() }}


<div class="row">

<div class="col-md-6 form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
<label>FIRST NAME:</label>
<input type= "text"  name="first_name"  class="form-control input-lg {{ $errors->has('first_name') ? ' has-error' : '' }}" value="{{ old('first_name') }}" required="required">
@if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
@endif
</div>

<div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
<label>LAST NAME:</label>
<input name="last_name" class="form-control input-lg {{ $errors->has('last_name') ? ' has-error' : '' }}" value="{{ old('last_name') }}" type="text" required="required">
                               
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
</div>

</div>
<br />

<div class="row">

<div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label>EMAIL ADDRESS:</label>
<input id="email" name="email" class="form-control input-lg {{ $errors->has('email') ? ' has-error' : '' }}" type="email" value="{{ old('email') }}" required="required">
                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
</div>

<div class="col-md-6 form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
<label>PHONE NUMBER:</label>
<input id="phone" name="phone" class="form-control input-lg {{ $errors->has('phone') ? ' has-error' : '' }}" type="text" required="required" value="{{ old('phone') }}" maxlength="15">
                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
</div>


</div>
<br /><hr />

<div class="row">

<div class="col-md-4 form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
<label>BANK NAME:</label>
<input name="bank_name" class="form-control input-lg {{ $errors->has('bank_name') ? ' has-error' : '' }}" type="text" required="required" value="{{ old('bank_name') }}">
                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif
</div>
<div class="col-md-4 form-group{{ $errors->has('acc_name') ? ' has-error' : '' }}">
<label>ACCOUNT NAME:</label>
<input name="acc_name" class="form-control input-lg {{ $errors->has('acc_name') ? ' has-error' : '' }}" type="text" required="required" value="{{ old('acc_name') }}">
                                @if ($errors->has('acc_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_name') }}</strong>
                                    </span>
                                @endif
</div>
<div class="col-md-4 form-group {{ $errors->has('acc_number') ? ' has-error' : '' }}">
<label>ACCOUNT NUMBER:</label>
<input name="acc_number" class="form-control input-lg {{ $errors->has('acc_number') ? ' has-error' : '' }}" type="text" required="required" value="{{ old('acc_number') }}">
                                @if ($errors->has('acc_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_number') }}</strong>
                                    </span>
                                @endif
</div>


</div>


<br />
<hr />
<br />

<div class="row">

<div class="col-md-6 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
<label>PASSWORD:</label>
<input name="password" class="form-control input-lg {{ $errors->has('password') ? ' has-error' : '' }}" type="password" required="required">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
</div>
<div class="col-md-6 form-group">
<label>RE-ENTER PASSWORD:</label>
<input name="password_confirmation" class="form-control input-lg" type="password" required="required">
</div>



</div>
<br /><hr /><br />


<div class="row form-group{{ $errors->has('category') ? ' has-error' : '' }}">

<label for="category" class="col-md-4 control-label ">SELECT A PLAN:</label>

<div class="col-md-8">
<select name="plan" id="category" class="form-control input-lg {{ $errors->has('category') ? ' has-error' : '' }}" required="" required  name="category">
  <option value="">PLEASE SELECT A PLAN</option>

@foreach(App\Category::cursor() as $cat)
                                        <option value="{{ $cat->id }}">{{strtoupper($cat->name)}} - <b>{{$cat->amount}} ₦</b></option>
    @endforeach

</select>


                            @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
</div>
</div>


<br /><br />


&nbsp;<INPUT TYPE="checkbox" NAME="terms"  VALUE="terms" required> I HAVE READ AND AGREED WITH THE <b>TERMS OF USE, PRIVACY POLICY & WARNING</b><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="submit" class="btn btn-primary">REGISTER</button>



</form>
<div class="alert alert-info" v-if="processing">
                        Your registration is being processed, Please wait...
</div>
</div>
 </div>
            </div>
        </div>
@endsection

@section('script')
<script>
//Vue.prototype.$http = axios;

// get csrf token
//Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({
el: '#app',

data() {
    return{
        oyashow: false,

        /*post: {
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            bank_name: '',
            acc_name: '',
            acc_number: '',
            password: '',
            password_confirmation: '',
            category: '',
            _token: document.querySelector('#csrf-token').getAttribute('value'),
        },*/

        submitted: false,
        processing: false,
        // array to hold form errors
        errors: [],
    }
    
  },
 /* methods:  {
    register: function(event) {
            //var post = this.post;
            this.processing = true;
            var csrfToken = document.querySelector('#csrf-token').getAttribute('value');
            console.log('this is the token: ' + csrfToken);
            var config = {
                headers: {'X-CSRF-TOKEN': csrfToken}
            };
            console.log('this is the token: ' + this.post);
            this.$http.post('register', this.post).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                this.post = {
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone: '',
                    bank_name: '',
                    acc_name: '',
                    acc_number: '',
                    password: '',
                    password_confirmation: '',
                    category: '',
                };

                // clear previous form errors
                //this.$set('errors', '');
                console.log('success: ' + response.data);
                this.submitted = true;
                this.processing = false;
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
               // this.$set('errors', response.data);
                this.processing = false;
            }); 
    }
  },*/
  

 });
</script>
@endsection
