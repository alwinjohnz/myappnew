@extends('products.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <hr><h2>MULTIPLE LINE ITEMS</h2><hr>

            </div>

            <div class="pull-right">
			<hr>
			<a class="btn btn-info" href="#" onclick="generate_invoice();">Generate Invoice</a>
                <a class="btn btn-success" href="{{ route('products.create') }}"> Add New Item</a>
				<a class="btn btn-danger" href="{{ 'discounts/1' }}"> Apply Discount</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   <div  id="print_area">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <table class="table table-bordered" >

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>quantity</th>
			
			<th>Unit Price</th>
			
			<th>Sub Total</th>
			
			<th>Tax</th>
			
			<th>Sub Total(with tax)</th>
			
        </tr>
		
        @foreach ($products as $product)
		    
        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $product->product_name }}</td>

            <td>{{ $product->quantity }}</td>
			
			<td>${{ $product->unit_price }}</td>
			
			<td>${{ $product->quantity * $product->unit_price}}</td>
			
			<td>${{ $product->tax_amount }}({{$product->tax_perc}}%)</td>
			
			<td>${{ $product->quantity * $product->unit_price + $product->tax_amount}}</td>
            
        </tr>
		

        @endforeach
		
		<tr><td colspan="6" style="text-align:right;">Total:</td><td>${{$total_amount}}</td></tr>
		<tr><td colspan="6" style="text-align:right;">Discount:</td><td>-${{$discount_amount}}</td></tr>
		<tr><td colspan="6" style="text-align:right;">Grand Total:</td><td>${{$grand_total}}</td></tr>
		
    </table>

 </div> 

    {!! $products->links() !!}

      

@endsection

<script>
function generate_invoice() {
	var content = "<h3>INVOICE</h3>"
    var myPrintContent = document.getElementById('print_area');
	content += myPrintContent.innerHTML  
    var myPrintWindow = window.open("", "Print Report", 'left=300,top=100,width=700,height=500', '_blank');
	myPrintWindow.document.write(content);
    myPrintWindow.document.close();
    myPrintWindow.focus();
    myPrintWindow.print();
    myPrintWindow.close();
    return false;
}
</script>