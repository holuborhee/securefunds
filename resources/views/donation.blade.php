@extends('layouts.app')

@section('testimonial')

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
@foreach($matches as $key => $value)
{{dd($key)}}
<tr>
<td> SL# </td>
<td> {{$match->deal->user->getName()}} </td>
<td> {{$match->deal->category->amount}} </td>
<td> {{$match->calculateExpiredOn}} </td>
<td> Made Payment </td>
<td> I can't pay </td>
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


@endsection