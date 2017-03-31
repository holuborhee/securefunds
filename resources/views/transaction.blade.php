@extends('layouts.app')

@section('testimonial')

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
<td>{{$match->user->getName()}}</td>
<td>{{$match->deal->category->amount}}</td>
@if(time() > strtotime($match->expired_on))
<td>Expired</td>
@else
<td>{{$match->expired_on}}</td>
@endif


@if($match->confirmed_on !== NULL)
<td>Confirmed</td>
@elseif($match->url !== NULL)
<td><button>Confirm Payment</button></td>
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


@endsection