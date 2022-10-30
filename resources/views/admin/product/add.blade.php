@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header"><h4>Add Product</h4></div>
    <div class="card-body">
    <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
         @csrf
     <div class="row">
        <div class="col-md-12 mb-3">
         <select class="form-select" name="cate_id">
            <option value="">Select a Category</option>
            @foreach($category as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach 
          </select>
        </div>   
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Slug</label>
            <input type="text" class="form-control" name="slug">
        </div>
    </div>
       <div class="row">
          <div class="col-md-12">
            <label for="">Small Description</label>
            <textarea row="3" class="form-control" name="small_description"></textarea>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
            <label for="">Description</label>
            <textarea row="3" class="form-control" name="description"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Original Price</label>
            <input type="number" class="form-control" name="original_price">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Selling Price</label>
            <input type="number" class="form-control" name="selling_price">
        </div>
</div>
<div class="row">
        <div class="col-md-6 mb-3">
            <label for="">Qty</label>
            <input type="number" class="form-control" name="qty">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Tax</label>
            <input type="number" class="form-control" name="tax">
        </div>
</div>

<div class="row">      
        <div class="col-md-6 mb-3">
            <label for="">Status</label>
            <input type="checkbox"  name="status">
        </div>
        <div class="col-md-6 mb-3">
            <label for="">Trending</label>
            <input type="checkbox"  name="trending">
        </div>
</div>
<div class="row">
        <div class="col-md-12 mb-3">
            <label for="">Meta Title</label>
            <input type="text" class="form-control" name="meta_title">
        </div>
</div>
<div class="row">
        <div class="col-md-12 mb-3">
            <label for="">Meta Description</label>
            <input type="text" class="form-control" row="3" name="meta_description">
        </div>
</div>
<div class="row">
        <div class="col-md-12 mb-3">
            <label for="">Meta Keyword</label>
            <input type="text" class="form-control" row="3" name="meta_keywords">
        </div>
</div>
                    <div id="show_item">
                      <div class="row">
                        <div class="col-md-4 mb-3">
                            <!-- <input type="text" name="product_attribute_id[]" id="name" class="form-control" placeholder="Please Product Attribute Value like(Color)">
                            <span class="span"></span> -->
                        <select class="form-select" name="product_attribute_id[]">
                          <option value="">Select a Attribute</option>
                          <option value="Size">Size</option>
                          <option value="Color">Color</option>
                        </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="value[]" class="form-control" placeholder="Enter value of Attribute" >
                            <span class="span"></span>
                        </div>
                        <div class="col-md-2 mb-3 d-grid">
                            <button class="btn btn-success  add_item_btn">Add More</button>
                        </div>
                    </div>
</div>
<div class="row">
        <div class="col-md-12">
            <input type="file" name="image" class="form-control">
        </div>
</div>
<div class="row">
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
</div>
@endsection