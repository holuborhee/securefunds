@extends('layouts.app')

@section('content')
<section id="services">
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
<b> YOUR ACCOUNT WILL BE BLOCKED IN
<span style='color:#ff5252; text-transform: uppercase;'>
<div id="rmv16011">{{$match->getExpiredDate()}}</div>
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

@elseif(Auth::user()->category_id !== NULL)
<div class="jumbotron">
<p>
    System is yet to match you for a donation, check back for matching details...
</p>
</div>

@elseif(!Auth::user()->isActiveTransactionOrDonation())
<div class="jumbotron">
<p>
You have no waiting transaction or donation, Click button to recycle
</p>
</div>


@endif

@include('component')


<uploadpayment :payment="payment"></uploadpayment>
<nopayment></nopayment>
</section>
@endsection

@section('script')
<script>
Vue.prototype.$http = axios;
Vue.component('uploadpayment', {
  template: '#uploadpayment-template',
  props: ['payment']
});

Vue.component('nopayment', {
  template: '#nopayment-template',
  props: ['payment']
});



new Vue({
el: '#app',

data() {
    return{
        oyashow: false,
        
        payment: {
            type: '',
            name: '',
            file: '',
            matchId: '',
            submit: this.submitPayment,
            setFile: this.fileSelected,
            updated: false,
            processing: false,
            token: document.querySelector('#csrf-token').getAttribute('value'),
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

        fileSelected: function(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length) {
                     return;
                }
                this.createImage(files[0]);
            },

            createImage(file) {
                this.payment.file = new Image();
                let reader = new FileReader();

                reader.onload = (e) => {
                    this.payment.file = e.target.result;
                };
                reader.readAsDataURL(file);
            },
    cancelPayment: function(event){
       // send a post request to cancelpayment url
       // and print out result to user
    },
    submitPayment: function(event) {
        this.payment.processing = true;
        var self = this;
       // var csrfToken = document.querySelector('#csrf-token').getAttribute('value');
        /*var config = {
                headers: {'X-CSRF-TOKEN': csrfToken}
            };*/
            
            this.$http.post('paymentmade', this.payment).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                //this.payment.errors = [];
                self.payment.processing = false;
                self.payment.updated = true;
                self.payment.errors = [];
                var data = response.data;
                console.log('success: ' + data.success + ' su: ' + data.su);
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
               // this.$set('errors', response.data);
                //this.payment.errors = [];
                self.payment.processing = false;
                self.payment.updated = false;
                self.payment.type = '';
                self.payment.name = '';
                self.payment.file = '';
                self.payment.errors = [];
                self.payment.errors = response.data;
            });  
    }
         /*   //var post = this.post;
            this.processing = true;
            
            console.log('this is the token: ' + csrfToken);
            
    }*/
  },
  

 });

</script>
@endsection
