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
<?php
    $match = Auth::user()->matches()->whereNull('confirmed_on')->first();
    //dd($match->deal->user->id);
    //$deal = App\Deal::findOrFail($match->deal()->id);
    //dd($deal->user());
    //dd($match);
?>
@if($match->url === NULL)
<div v-if="!payment.updated" class="promo promo-border promo-center bottommargin">
<h3><span style="text-transform: uppercase;"><b>You Are Merged To Donate</b></span></h3>
<span><b>Please Pay The Person Below To Get Paid</b></span>
<br><br><br>


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
</div>
</div>

<button class="button button-xlarge button-rounded" data-toggle="modal" data-target=".modal-payment" @click="setData({{$match->id}})" class="btn btn-primary">MADE PAYMENT</button>

<button class="button button-red button-xlarge button-rounded" @click="setMatch({{$match->id}})" data-toggle="modal" data-target=".modal-cant">I CANNOT MAKE PAYMENT</button>

</div>

<div v-else class="jumbotron">
    <p>You donation has been accepted, it will be confirmed by the user</p>

</div>
@else
<div class="jumbotron">
    <p>You donation has been accepted, it will be confirmed by the user</p>

</div>

@endif 




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
<p v-if="!recycling">
You have no waiting transaction or donation, <button @click="loadRecycle">Click to recycle</button>
</p>
<p v-else-if="recycled">
Recycled, your request for matching has been accepted <a href="{{url('/donations')}}">Click here to check if you have been matched</a>
</p>
<div v-else-if="recycling">
<h2>Select A Category</h2>
<select id="category" class="form-control input-lg" v-model="selectedCategory" required  name="category">
<option disabled value="">Please Select A Category</option>
    <option v-for="category in categories" :value="category.id">@{{category.name}} - <b>@{{category.amount}} ₦</b></option>

</select>
<br />
<button class="btn btn-primary" @click="performRecycle">Submit</button>
</div>
</div>


@endif
</div></div>
@include('components.payment')


<uploadpayment :payment="payment"></uploadpayment>
<nopayment :data="nopayment_data"></nopayment>
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
  props: ['data']
});



new Vue({
el: '#app',

data() {
    return{
        oyashow: false,
        matchId: '',
        recycling: false,
        recycled: false,
        categories: '',
        selectedCategory: '',
        
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

        nopayment_data: {
            deleted: false,
            
            cantpay: this.cantPay,
        },
        
        
        
    
    }
    
  },
  methods:  {

    setData: function(id){
        this.payment.matchId = id;
    },

    setMatch: function(id){
        this.matchId = id;
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
                console.log('success: ' + data.success);
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
    },

    cantPay: function(event){

        var self = this;
        


        this.$http.post('cantpay', {matchId: this.matchId}).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                self.nopayment_data.deleted = true;
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
            });
    },

    performRecycle: function(event){

        var self = this;

        this.$http.post('recycle', {catId: this.selectedCategory}).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                self.recycled = true;
                console.log('cat: ' + response.data.cat + ', user: ' + response.data.user);
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
            });
    },

    loadRecycle: function(event){

        var self = this;
        


        this.$http.get('allcategories').then(function(response) {
                // form submission successful, reset post data and set submitted to true
                self.categories = response.data;
                self.recycling = true;
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
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
