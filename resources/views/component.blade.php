<script type="text/x-template" id="uploadpayment-template">

<!-- MODAL   -->
<div class="modal fade modal-payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="myModalLabel">MADE PAYMENTS</h4>
</div>
<div class="modal-body">
<div v-if="payment.errors.length >= 1" class="alert alert-error">
            <p> Something went wrong, try again please. </p>
                        
</div>
<div v-else-if="payment.processing" class="alert alert-error">
            <p> Your request is being processed, please wait. Do not cancel. </p>
                        
</div>
<form v-if="!payment.updated" action="{{url('/paymentmade')}}" @submit.prevent="payment.submit" method="post" enctype="multipart/form-data">
<input type="hidden" name="iid" value="16011">
<input type="hidden" name="paid" value="16011">
<div class="row">
<div class="col-md-12">
<label>PAYMENT TYPE:</label>
<input name="payment_type" v-model="payment.type" class="form-control input-lg" type="text" required="">
</div>
</div>
<br>
<div class="row">
<div class="col-md-12">
<label>NAME ON PAY SLIP:</label>
<input name="payment_name" v-model="payment.name"  id="nm" class="form-control input-lg" type="text" required="">
</div>
</div>
<br>

<div class="row">
<div class="col-md-12 bottommargin">
<label>PAYMENT IMAGE:</label><br>
<input type="file" accept="image/*" id="file" @change="payment.setFile" name="payment_image" class="file-loading" data-allowed-file-extensions='["jpg", "jpeg", "png", "gif"]' required>
</div>
</div>



<div class="row">
<div class="col-md-12">
<button type="submit"  class="btn btn-primary">SUBMIT</button>

</div>
</div>

</form>

<div v-else class="alert alert-success">
            <p> Your Payment Info has been added, awaiting the receiver's confirmation. </p>
                        
</div>
</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->

</script>


<script type="text/x-template" id="nopayment-template">
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
</script> 