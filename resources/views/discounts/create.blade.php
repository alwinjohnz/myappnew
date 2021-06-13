@extends('products.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <hr><h2>Apply Discount</h2><hr>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   



<form action="{{ route('discounts.update',$discount->discount_id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">
		 
			<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Discount Type:</strong>

                <select name="discount_type" class="form-control">
					<option value="1" name="discount_type" @if($discount->discount_type == '1') selected @endif>Flat</option>
					<option value="2" name="discount_type" @if($discount->discount_type == '2') selected @endif>Percentage</option>
					
				</select>

				</div>

			</div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Discount:</strong>

                    <input type="text" name="discount_value" value="{{$discount->discount_value}}" class="form-control" placeholder="Discount">

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

   

    </form>

@endsection