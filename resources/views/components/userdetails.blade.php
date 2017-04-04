<script type="text/x-template" id="userdetails-template">
<!-- MODAL   -->
<div class="modal fade modal-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-body">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" style="color: red" id="myModalLabel">@{{details.first_name + " " + details.last_name}}</h4>
</div>
<div class="modal-body">

<form >

<div class="row">
<div class="col-md-12">
<label>Phone Number:</label>
<input v-model="details.phone" readonly="readonly" class="form-control input-lg" type="text" >
</div>
</div>
<br>

<div class="row">
<div class="col-md-12">
<label>Bank Name:</label>
<input v-model="details.bank_name" readonly="readonly" class="form-control input-lg" type="text" >
</div>
</div>
<br>

<div class="row">
<div class="col-md-12">
<label>Account Name:</label>
<input v-model="details.acc_name" readonly="readonly" class="form-control input-lg" type="text" >
</div>
</div>
<br>

<div class="row">
<div class="col-md-12">
<label>Account Number:</label>
<input v-model="details.acc_number" readonly="readonly" class="form-control input-lg" type="text" >
</div>
</div>
<br>

</form>

</div>
</div>
</div>
</div>
</div>
<!-- MODAL END  -->
</script>