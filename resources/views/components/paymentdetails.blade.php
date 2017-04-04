<script type="text/x-template" id="paymentdetails-template">
<!-- MODAL   -->
<div class="modal fade modal-pdetails" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">PAYMENT INFO</h4>
</div>
<div class="modal-body">

<form v-if="!payment.confirmed" @submit.prevent="payment.confirm">

<div class="jumbotron">
<p>Method of Payment: <input class="form-control input-lg" v-model="payment.type" readonly="readonly" /> </p> 
<p>Name on Slip: <input class="form-control input-lg" v-model="payment.name" readonly="readonly" /></p>
<img :src="payment.url" class="img-responsive" />
</div>


<div class="row">
<div class="col-md-6">
<button type="button" class="btn btn-lg btn-block btn-danger" data-dismiss="modal" aria-hidden="true">NOT YET</button>
</div>

<div class="col-md-6">
<button class="btn btn-lg btn-block btn-success"> CONFIRM </button>
</div>
</div>

</form>
<div v-else class="jumbotron">
<p> You have confirmed the payment</p>
</div>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->
</script>