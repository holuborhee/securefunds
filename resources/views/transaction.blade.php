@extends('layouts.app')

@section('content')
<section id="services">
<center><h1>TRANSACTION HISTORY</h1><br>
  </center>
 <br><div class="row">
                <div class="col-sm-3 wow fadeInLeft">
                  <img class="img-responsive" src="{{ asset('images/happy.jpg') }}"  alt="">
                </div>

                <div class="col-sm-9 wow fadeInRight">
                    <h4 class="column-title"><p style="font-family:georgia,garamond,serif;" > <b>PARTICIPANT </b></p></h4>

                    <?php
                    	$nomatch = true;
                    ?>
                    <div class="table-responsive">

<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>

<tr>
<th> SL# </th>
<th> Participant's Name </th>
<th> Amount </th>
<th> Expiration Time </th>
<th> Payment </th>
</tr>
</thead>

<tbody>

@foreach($deals as $deal)

@foreach($deal->matches()->cursor() as $match)
<?php $nomatch = false; ?>
<tr>
<td>ffd</td>
<td><a href="#" @click="userdetails({{$match->user->id}})"  data-toggle="modal" data-target=".modal-details">{{$match->user->getName()}}</a></td>
<td>{{$match->deal->category->amount}}</td>
@if(time() > strtotime($match->getExpiredDate()))
<td>Expired</td>
@else
<td>{{$match->getExpiredDate()}}</td>
@endif


@if($match->confirmed_on !== NULL)
<td>Confirmed</td>
@elseif($match->url !== NULL)
<td v-if="!pdetails.confirmed"><button class="button button-xlarge button-rounded" data-toggle="modal" data-target=".modal-pdetails" @click="showPaymentDetails({{$match->id}})" class="btn btn-primary">Confirm Payment</button></td>
<td v-else=>Confirmed</td>
@elseif($match->cannot_pay)
<td>Cannot Pay</td>
@elseif($match->confirmed_on === NULL)
<td>Pending</td>
@endif



</tr>


@endforeach
@endforeach

</tbody>
</table></div>

@if($nomatch)
<div class="jumbotron">
<h2>NO ONE HAS BEEN MATCHED TO YOU YET</h2>
</div>
@endif
					<P style="font-family:georgia,garamond,serif;"></P></div></div>



@include('components.userdetails')
@include('components.paymentdetails')


<userdetails :details="details"></userdetails>
<paymentdetails :payment="pdetails"></paymentdetails>
</section>
@endsection


@section('script')
<script>
Vue.prototype.$http = axios;
Vue.component('paymentdetails', {
  template: '#paymentdetails-template',
  props: ['payment']
});

Vue.component('userdetails', {
  template: '#userdetails-template',
  props: ['details']
});



new Vue({
el: '#app',

data() {
    return{
        oyashow: false,
        details: '',
        matchId: '',
        pdetails: {
            confirmed: false,
            url: '',
            type: '',
            name: '',
            confirm: this.confirmPayment,
            id: '',

        },       
        
    
    }
    
  },
  methods:  {

    setMatch: function(id){
        this.matchId = id;
    },

    userdetails: function(id){
            var self = this;
            var data = {
                userid: id
            };
            
        this.$http.post('userdetails', data).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                //this.payment.errors = [];
                self.details = response.data;
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
            });

    },

    showPaymentDetails: function(id){
            var self = this;
            var data = {
                matchId: id
            }
            
        this.$http.post('paymentdetails', data).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                //this.payment.errors = [];
                self.pdetails.name = response.data.payment_name;
                self.pdetails.type = response.data.payment_type;
                self.pdetails.url = 'images/uploads/' + response.data.url;
                self.pdetails.id = response.data.id;

            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
            });

    },

    confirmPayment: function(){
            var self = this;
            var data = {
                matchId: self.pdetails.id,
                token: document.querySelector('#csrf-token').getAttribute('value'),
            }
           if(confirm('This process is irreversible, are you sure you want to continue')){
                this.$http.post('confirmpayment', data).then(function(response) {
                // form submission successful, reset post data and set submitted to true
                //this.payment.errors = [];
                self.pdetails.confirmed = true;
            }, function (response) {
                // form submission failed, pass form  errors to errors array
                console.log(response);
            });
           }else{
                console.log('didnt continue');
           } 
        

    }
         /*   //var post = this.post;
            this.processing = true;
            
            console.log('this is the token: ' + csrfToken);
            
    }*/
  },
  

 });

</script>
@endsection