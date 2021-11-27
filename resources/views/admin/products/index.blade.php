@extends('layouts.admin.app')

@section('content')
    
    <button type="button" class="btn btn-success mb-4 mt-4 float-right" onclick="addProduct()">
        Add product
    </button>

    <table class="table table-bordered">
        <thead>
          <tr class="bg-primary">
            <th scope="col" class="text-light">{{ __('Name') }}</th>
            <th scope="col" class="text-light">{{ __('Price') }}</th>
            <th scope="col" class="text-light">{{ __('Admin') }}</th>
          </tr>
        </thead>
        <tbody id="product-tbody">
            @foreach ($products as $product)
                <tr id="{{ 'product-row-'.$product->id }}">
                    <td><span id="{{ 'product-name-'.$product->id }}" class="text-capitalize">{{ $product->name }}</span></td>
                    <td><span id="{{ 'product-price-'.$product->id }}">{{ $product->price }}</span>{{ ' Kr.' }}</td>
                    <td>
                        <a href="#" onclick="editProduct({{$product->id,$product->name,$product->price}})" >{{ __('Edit') }}</a> 
                        |  
                        <a href="#" onclick="deleteProduct({{$product->id}})" >{{ __('Delete') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

      {{-- Templates to get code in javascript --}}
      <div class="d-none">
        <table id="template-row" class="table table-striped table-bordered">
          <tbody>
            <tr id="{{ 'product-row-#ID' }}">
                <td><span id="{{ 'product-name-#ID' }}" class="text-capitalize"></span></td>
                <td><span id="{{ 'product-price-#ID' }}"></span>{{ ' Kr.' }}</td>
                <td>
                    <a href="#" onclick="editProduct({{'#ID, \'#NAME\', #PRICE'}})" >{{ __('Edit') }}</a> 
                    |
                    <a href="#" onclick="deleteProduct({{'#ID'}})" >{{ __('Delete') }}</a>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
    @include('admin.products.partials.form')
    @section('custom-js')
      <script src={{ asset('products.js') }} ></script>
    @endsection
@endsection
