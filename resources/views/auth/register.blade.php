@extends('layouts.app')

@section('testimonial')

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




<center><h1>REGISTER YOUR ACCOUNT NOW</h1><br>
 <b>Already Have An Account?</b> <a href="login funds.html">Login Now</a></center><br>
 <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="{{ asset('images/investment3.jpg') }}"  alt="">
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
                    <form align="middle" method="POST" action="{{ route('register')}}" >
                    {{ csrf_field() }}
<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}" >
&nbsp;<b>FIRSTNAME:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "TEXT"  NAME="first_name" ROW="10"  class="{{ $errors->has('first_name') ? ' has-error' : '' }}" MAXLENGTH="30" value="{{ old('first_name') }}" required></BR></BR>
                                
                                    @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                                

</div>

<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
&nbsp;<b>LASTNAME:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "TEXT" NAME="last_name"  ROW="8" MAXLENGTH="30" class="{{ $errors->has('last_name') ? ' has-error' : '' }}" value="{{ old('last_name') }}" required></BR></BR>
                               
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                                

</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
&nbsp;<b>EMAIL ADDRESS:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "email" NAME="email" ROW="10" class="{{ $errors->has('email') ? ' has-error' : '' }}" MAXLENGTH="50"  value="{{ old('email') }}" required></br></br>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

</div>
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
&nbsp;<b>PHONE NUMBER:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "TEXT" class="{{ $errors->has('phone') ? ' has-error' : '' }}" NAME="phone" ROW="10" MAXLENGTH="15" value="{{ old('phone') }}" required><br/><br/>
                                
                                   @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                                
</div>
<div class="form-group{{ $errors->has('bank_name') ? ' has-error' : '' }}">
&nbsp;<b>BANK NAME:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "TEXT" NAME="bank_name" ROW="10"  class="{{ $errors->has('bank_name') ? ' has-error' : '' }}" MAXLENGTH="50" value="{{ old('bank_name') }}"  required><br/><br/>
                                @if ($errors->has('bank_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                @endif

</div>

<div class="form-group{{ $errors->has('acc_name') ? ' has-error' : '' }}">
&nbsp;<b>ACCOUNT NAME:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "TEXT" NAME="acc_name" ROW="10" class="{{ $errors->has('acc_name') ? ' has-error' : '' }}" MAXLENGTH="50"  value="{{ old('acc_name') }}" required><br/><br/>
                                @if ($errors->has('acc_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_name') }}</strong>
                                    </span>
                                @endif

</div>

<div class="form-group{{ $errors->has('acc_number') ? ' has-error' : '' }}">
&nbsp;<b>ACCOUNT NUMBER:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "TEXT" NAME="acc_number" ROW="10" class="{{ $errors->has('acc_number') ? ' has-error' : '' }}" MAXLENGTH="10" value="{{ old('acc_number') }}" required><br/><br/>
                                @if ($errors->has('acc_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('acc_number') }}</strong>
                                    </span>
                                @endif
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
&nbsp;<b>PASSWORD:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "password" NAME="password" size="23" class="{{ $errors->has('password') ? ' has-error' : '' }}"  MAXLENGTH="15" required><br/><br/>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
</div>

<div class="form-group">
&nbsp;<b>RE-ENTER PASSWORD:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE= "password" NAME="password_confirmation" size="23"  MAXLENGTH="15" required><br/><br/>
</div>
<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                          <label for="category" class="col-md-5 col-md-offset-1 control-label ">SELECT A PLAN:</label>

                            <div class="col-md-4">
                                

                                <select class="form-control{{ $errors->has('category') ? ' has-error' : '' }}" required  name="category">
                                @foreach(App\Category::cursor() as $cat)
                                        <option value="{{ $cat->id }}">{{strtoupper($cat->name)}} - <b>{{$cat->amount}}</b></option>
                                @endforeach
                                </select>
                            </div>

                            @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                        </div>






<br/><br/>

&nbsp;<INPUT TYPE="checkbox" NAME="terms"  VALUE="terms" required> I HAVE READ AND AGREED WITH THE <b>TERMS OF USE, PRIVACY POLICY & WARNING</b><br>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" >



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
