@extends('admin.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit Product</span> </h4>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">

                        </div>
                        <div class="card-body">
                            <form action="{{ route('updateProduct',$Productjoin[0]->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname" required>Product Name</label>
                                    <input type="text" name="name" class="form-control" id="basic-default-fullname" value="{{$Productjoin[0]->name}}"/>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Short Description</label>
                                    <textarea name="short_description" id="basic-default-message" required class="form-control"
                                        placeholder="Add text here...">{{$Productjoin[0]->short_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-message">Description</label>
                                    <textarea name="description" id="basic-default-message"  required class="form-control" placeholder="Add text here...">{{$Productjoin[0]->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Product image</label>
                                    <input class="form-control" name="image" type="file" id="formFile" />
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Price</label>
                                    <input class="form-control" name="price" type="number" id="formFile" step="0.1" value="{{$Productjoin[0]->regular_price}}"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Sale Price</label>
                                    <input class="form-control" name="sale_price" type="number" id="formFile" step="0.1" alue="{{$Productjoin[0]->sale_price}}"
                                         />
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Quantity</label>
                                    <input class="form-control" name="quantity" type="number" id="formFile" required value="{{$Productjoin[0]->quantity}}"/>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Category</label>
                                    <select name="category_id" class="form-control" required selected value="{{$Productjoin[0]->category_name}}">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->
    @endsection
