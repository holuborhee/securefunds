@extends('layouts.app')

@section('content')
<section id="services">
<center><h1>MY DONATIONS</h1><br>
  </center>
 <br><div class="row">
                <div class="col-sm-3 wow fadeInLeft">
                  <img class="img-responsive" src="{{ asset('images/happy.jpg') }}"  alt="">
                </div>

                <div class="col-sm-9 wow fadeInRight">
                    <h4 class="column-title"><p style="font-family:georgia,garamond,serif;" > <b>PARTICIPANT </b></p></h4>
                    @if($matches->count())
                    <div class="table-responsive">

<table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>

<tr>
<th> SL# </th>
<th> Participant's Name </th>
<th> Amount </th>
<th> Expiration Time </th>
<th> Made Payment </th>
<th> I can't pay </th>
</tr>
</thead>

<tbody>
<?php $i = 1; ?>
@foreach($matches->cursor() as $match)
<tr>
<td> {{$i++}} </td>
<td><a href="#" @click="userdetails({{$match->deal->user->id}})"  data-toggle="modal" data-target=".modal-details"> {{$match->deal->user->getName()}} </a></td>
<td> {{$match->deal->category->amount}} </td>
<td> {{$match->getExpiredDate()}} </td>

@if($match->url === NULL)
<td v-if="!payment.updated"> <button class="button button-xlarge button-rounded" data-toggle="modal" data-target=".modal-payment" @click="setData({{$match->id}})" class="btn btn-primary">MADE PAYMENT</button> </td>
<td v-else> Awaiting Approval </td>
@elseif($match->confirmed_on === NULL)
<td> Awaiting Approval </td>
@elseif($match->confirmed_on !== NULL)
<td> Confirmed </td>
@else
<td> - </td>
@endif


@if($match->url === NULL)
<td v-if="!payment.updated"> <button class="button button-red button-xlarge button-rounded" data-toggle="modal" data-target=".modal-cant">I CANNOT MAKE PAYMENT</button> </td>
<td v-else> - </td>
@else
<td> - </td>
@endif
</tr>


@endforeach
</tbody>
</table></div>

@else
<div class="jumbotron">
<h2>
YOU HAVE NOT BEEN MATCHED TO ANYONE</h2>
</div>
@endif
					<P style="font-family:georgia,garamond,serif;"></P></div></div>
@include('component')


<uploadpayment :payment="payment"></uploadpayment>
<nopayment></nopayment>
<userdetails :details="details"></userdetails>
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

    }
         /*   //var post = this.post;
            this.processing = true;
            
            console.log('this is the token: ' + csrfToken);
            
    }*/
  },
  

 });

</script>
@endsection