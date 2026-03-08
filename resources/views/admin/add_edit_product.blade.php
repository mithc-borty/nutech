@extends('admin.layout')

@section('title', isset($product) ? 'Edit Product' : 'Add Product')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/products') }}">Products</a></li>
                        <li class="breadcrumb-item active">{{ isset($product) ? 'Edit' : 'Add' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form id="addEditProductForm">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id ?? 0 }}">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $product->title ?? '' }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" @if(isset($product) && $product->category_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price ?? '' }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Status</label>
                                <select name="is_blocked" class="form-control">
                                    <option value="0" @if(isset($product) && !$product->is_blocked) selected @endif>Active</option>
                                    <option value="1" @if(isset($product) && $product->is_blocked) selected @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $product->description ?? '' }}</textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Features (JSON Array)</label>
                                <textarea name="features" class="form-control" placeholder='["Feature1","Feature2"]'>{{ isset($product) ? json_encode($product->features ?? []) : '' }}</textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Specifications (JSON Array)</label>
                                <textarea name="specifications" class="form-control" placeholder='["Spec1","Spec2"]'>{{ isset($product) ? json_encode($product->specifications ?? []) : '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update' : 'Create' }}</button>
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@section('JS')
<script>
const product = JSON.parse('@json($product)');
const csrfToken = "{{ csrf_token() }}";

$(document).ready(function() {

    $('#addEditProductForm').submit(function(e){
        e.preventDefault();
        let title = $('input[name="title"]').val().trim();
        let category = $('select[name="category_id"]').val();
        let price = $('input[name="price"]').val();

        if(!title || !category || !price){
            showMessage('error', 'Title, Category, and Price are required.');
            return;
        }

        let featuresText = $('textarea[name="features"]').val().trim();
        let specificationsText = $('textarea[name="specifications"]').val().trim();

        try {
            JSON.parse(featuresText || '[]');
            JSON.parse(specificationsText || '[]');
        } catch(e){
            showMessage('error', 'Features and Specifications must be valid JSON arrays.');
            return;
        }

        $.post("{{ url('api/admin/add-edit-product') }}", $(this).serialize() + "&_token=" + csrfToken, function(res){
            if(res.status){
                showMessage('success', res.message);
                setTimeout(() => window.location.href = "{{ url('admin/products') }}", 1000);
            } else {
                showMessage('error', res.message);
            }
        });

    });

});
</script>
@endsection