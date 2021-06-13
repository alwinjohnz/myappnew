<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	/**

	* Display a listing of the resource.

	*

	* @return \Illuminate\Http\Response

	*/

	public function index()

	{

		$products = Product::first()->paginate(5);
		$discount = Discount::first();
		$total_amount = Product::first()->sum('total');
		if($discount['discount_type']== '1')
		{
			$discount_amount = $discount['discount_value'];
		}
		else
		{
			$discount_amount = $discount['discount_value']/100* $total_amount;
		}

		$grand_total = 0;

		if($total_amount > $discount_amount)	
		{
			$grand_total = $total_amount - $discount_amount;
		}		
		

		return view('products.index',compact('products','total_amount','discount_amount','grand_total'))

		->with('i', (request()->input('page', 1) - 1) * 5);

	}



	/**

	* Show the form for creating a new resource.

	*

	* @return \Illuminate\Http\Response

	*/

	public function create()

	{

		return view('products.create');

	}



	/**

	* Store a newly created resource in storage.

	*

	* @param  \Illuminate\Http\Request  $request

	* @return \Illuminate\Http\Response

	*/

	public function store(Request $request)

	{

		$request->validate([

		'product_name' => 'required',
		'quantity' => 'required|numeric|min:1',
		'unit_price' => 'required|numeric',
		'tax_perc' => 'required|numeric',

		]);

		$sub_total = $request['quantity']*$request['unit_price'];
		$tax_amount = $request['tax_perc']/100*$sub_total;
		$total = $sub_total+$tax_amount;
		
		Product::create($request->all()+['tax_amount'=>$tax_amount,'total'=>$total]);



		return redirect()->route('products.index')

		->with('success','Item added successfully.');

	}



	/**

	* Display the specified resource.

	*

	* @param  \App\Product  $product

	* @return \Illuminate\Http\Response

	*/

	public function show(Product $product)

	{

	return view('products.show',compact('product'));

	} 



	/**

	* Show the form for editing the specified resource.

	*

	* @param  \App\Product  $product

	* @return \Illuminate\Http\Response

	*/

	public function edit(Product $product)

	{

		return view('products.edit',compact('product'));

	}



	/**

	* Update the specified resource in storage.

	*

	* @param  \Illuminate\Http\Request  $request

	* @param  \App\Product  $product

	* @return \Illuminate\Http\Response

	*/

	public function update(Request $request, Product $product)

	{

		$request->validate([

		'name' => 'required',

		'detail' => 'required',

		]);



		$product->update($request->all());



		return redirect()->route('products.index')

		->with('success','Product updated successfully');

	}



	/**

	* Remove the specified resource from storage.

	*

	* @param  \App\Product  $product

	* @return \Illuminate\Http\Response

	*/

	public function destroy(Product $product)

	{

		$product->delete();

		return redirect()->route('products.index')

		->with('success','Product deleted successfully');

	}
}