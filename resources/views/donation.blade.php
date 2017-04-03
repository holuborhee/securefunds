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
<td><a data-toggle="modal" data-target=".modal-payment"> {{$match->deal->user->getName()}} </a></td>
<td> {{$match->deal->category->amount}} </td>
<td> {{$match->getExpiredDate()}} </td>

@if($match->url === NULL)
<td> <button class="button button-xlarge button-rounded" data-toggle="modal" data-target=".modal-payment" @click="setData({{$match->id}})" class="btn btn-primary">MADE PAYMENT</button> </td>
@elseif($match->confirmed_on === NULL)
<td> Awaiting Approval </td>
@elseif($match->confirmed_on !== NULL)
<td> Confirmed </td>
@else
<td> - </td>
@endif


@if($match->url === NULL)
<td> <button class="button button-red button-xlarge button-rounded" data-toggle="modal" data-target=".modal-cant">I CANNOT MAKE PAYMENT</button> </td>
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

</section>
@endsection