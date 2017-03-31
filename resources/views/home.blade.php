@extends('layouts.app')

@section('testimonial')
<center><h1>DASHBOARD</h1><br>
  </center>
 <br><div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="{{ asset('images/happy.jpg') }}"  alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h4 class="column-title"><p style="font-family:georgia,garamond,serif;" > <b>PARTICIPANT </b></p></h4>

@if(Auth::user()->isToDonate())
<div class="promo promo-border promo-center bottommargin">
<h3><span style="text-transform: uppercase;"><b>You Are Merged To Donate</b></span></h3>
<span><b>Please Pay The Person Below To Get Paid</b></span>
<br><br><br>

<?php
    $match = Auth::user()->matches()->whereNull('confirmed_on')->first();
    //dd($match->deal->user->id);
    //$deal = App\Deal::findOrFail($match->deal()->id);
    //dd($deal->user());
    //dd($match);
?>
<h4 style='color:red;'>
<b> YOUR ACCOUNT WILL BLOCKED IN
<span style='color:#ff5252; text-transform: uppercase;'>
<div id="rmv16011">{{$match->expired_on}}</div>
</span>
PAY BEFORE THIS TIME TO ENJOY DONATIONS
</b>
</h4>
<br><br><br>

<hr>
<div class="panel panel-primary">
<div class="panel-heading">
<h4 class="panel-title"><b>AWAITING PAYMENT</b> </h4> </div>
<div class="panel-body" style="text-align: center;">
<h1 style="font-weight: bold;"> AMOUNT  <span>₦ {{$match->deal->category->amount}}</span></h1>


<h4 style="">Pay To Name: <span class="text-primary">{{$match->deal->user->getName()}}</span></h4>
<h4 style="">Bank Name: <span class="text-primary">{{$match->deal->user->bank_name}}</span></h4>
<h4 style="">Account Name: <span class="text-primary">{{$match->deal->user->acc_name}}</span></h4>
<h4 style="">Account Number: <span class="text-primary">{{$match->deal->user->acc_number}}</span></h4>
<h4 style="">Phone Number: <span class="text-primary">{{$match->deal->user->phone}}</span></h4>
<h4 style="">Email: <span class="text-primary">{{$match->deal->user->email}}</span></h4>
</div>
</div>

<button class="button button-xlarge button-rounded" data-toggle="modal" data-target=".modal-payment" @click="setData({{$match->id}})" class="btn btn-primary">MADE PAYMENT</button>

<button class="button button-red button-xlarge button-rounded" data-toggle="modal" data-target=".modal-cant">I CANNOT MAKE PAYMENT</button>

</div> 



</div></div>
@elseif(Auth::user()->isToRecieve())
<div class="jumbotron">
<p>
You are to recieve donation, <a href="{{url('/transactions')}}">click to go to transaction page</a> and check if you have been matched, and to perform action on the match.</p>
</div>

@elseif(Auth::user()->isActiveTransactionOrDonation())
<div class="jumbotron">
<p>
You have no waiting transaction or donation, Click button to recycle
</p>
</div>

@endif

@include('component')


<uploadpayment :payment="payment"></uploadpayment>
<!-- MODAL   -->
<div class="modal fade modal-cant" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">I CANNOT MAKE PAYMENTS</h4>
</div>
<div class="modal-body">

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="iid" value="16011">
<input type="hidden" name="cannot" value="16011">


<h3 style="text-align: center;">
<b>YOUR ACCOUNT WILL BE BLOCKED AND DELETED PERMANENTLY FOR THIS</b> <br> 
<span><b>ARE YOU SURE??</b></span>
</h3>


<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-info" data-dismiss="modal" aria-hidden="true">NO ! I WILL PAY</button>
</div>

<div class="col-md-6">
<button type="submit" class="btn btn-lg btn-block btn-danger"> OFCOURSE I AM </button>
</div>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  --> 
@endsection

@section('script')
<script>
Vue.component('uploadpayment', {
  template: '#uploadpayment-template',
  props: ['payment']
});



new Vue({
el: '#app',

data() {
    return{
        oyashow: false,
        id: '',
        payment: {
            type: '',
            name: '',
            file: '',
            matchId: '',
            submit: this.submitPayment,
            updated: false,
            processing: false,
            errors: [], // array to hold form errors

        },
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
        
        
    
    }
    
  },
  methods:  {

    setData: function(id){
        this.payment.matchId = id;
    },
    submitPayment: function(event) {
        alert('ffdfd');
    }
         /*   //var post = this.post;
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
    }*/
  },
  

 });

</script>
@endsection
