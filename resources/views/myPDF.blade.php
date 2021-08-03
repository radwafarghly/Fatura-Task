<div class="container">
  <div class="card">
<div class="card-header">
Invoice
<strong>{{$code}}</strong> 
  <span class="float-right"> <strong>Status:</strong>{{$is_paid}}</span>
   

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<h6 class="mb-3">From:</h6>
<div>
<strong>Athar</strong>
</div>
<div>Kingdom Saudi Arabia - Riyadh</div>
<div>Email: info@athar.com</div>
<div>Phone:⁦0545956681⁩</div>
</div>

<div class="col-sm-6">
<h6 class="mb-3">To:</h6>
<div>
<strong>{{$client['firstname']}} </strong>
</div>
<div>Email: {{$client['email']}}</div>
<div>Phone: {{$client['phone']}}</div>
</div>



</div>

<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>

<th class="right">date</th>
<th class="center">time from</th>
<th class="right">time to</th>
<th class="right">type</th>
<th class="right">Session Price</th>

</tr>
</thead>
<tbody>
<tr>
@foreach ($times as $key=> $time)
<td class="center">{{ $loop->index +1 }}</td>
<td class="left strong">{{$time['date']}}</td>
<td class="left">{{$time['time_from']}}</td>

  <td class="center">{{$type}}</td>
  <td class="right">{{$session_price}}</td>

</tr>
@endforeach




</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>
<td class="left">
 <strong>SubTotal </strong>
</td>
<td class="right">{{$session_price * $no_of_class}}</td>
</tr>

<tr>
<td class="left">
 <strong>VAT (15%)</strong>
</td>
<td class="right">{{$vat}}</td>
</tr>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>{{$total_amount}}</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>