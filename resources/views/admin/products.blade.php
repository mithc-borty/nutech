@extends('admin.layout')

@section('title','Products')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Products</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Product List</h3>
                    <div class="ml-auto">
                        <button id="addProductBtn" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                        <button id="deleteSelected" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="productsTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th width="140">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="productForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="product_id">

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Features (one per line)</label>
                        <textarea name="features" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Specifications (one per line)</label>
                        <textarea name="specifications" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" id="productImages" name="images[]" class="form-control" multiple accept="image/*">
                        <div id="imagePreviewContainer" class="mt-2 d-flex flex-wrap"></div>
                        <div id="existingImages" class="mt-2 d-flex flex-wrap"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete the selected product(s)?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="selectAlertModal" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Attention</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Please select at least one product to delete.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('JS')
<script>
$(document).ready(function(){
    let idsToDelete=[];
    let productModal=$('#productModal');
    let deleteModal=$('#deleteConfirmModal');
    let selectAlertModal=$('#selectAlertModal');

    let table=$('#productsTable').DataTable({
        processing:true,
        serverSide:true,
        responsive:true,
        autoWidth:false,
        pageLength:25,
        ajax:{
            url:"{{ url('api/admin/products') }}",
            type:"POST",
            data:{_token:"{{ csrf_token() }}"}
        },
        columns:[
            {data:'id',orderable:false,searchable:false,render:id=>`<input type="checkbox" class="rowCheckbox" value="${id}">`},
            {data:'title'},
            {data:'category',render:data=>data??''},
            {data:'price'},
            {data:'image',orderable:false,searchable:false,render:i=>i?`<img src="${i}" class="img-thumbnail" style="height:40px">`:''},
            {data:'id',orderable:false,searchable:false,render:id=>`
                <button class="btn btn-info btn-sm editProduct" data-id="${id}"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm singleDelete" data-id="${id}"><i class="fas fa-trash"></i></button>
            `}
        ],
        order:[[1,'asc']],
        columnDefs:[{targets:0,searchable:false,orderable:false}]
    });

    $('#addProductBtn').click(()=>{
        $('#productForm')[0].reset();
        $('#product_id').val('');
        $('#existingImages').html('');
        $('#imagePreviewContainer').html('');
        productModal.find('.modal-title').text('Add Product');
        productModal.modal('show');
    });

    $('#productImages').on('change',function(){
        let preview=$('#imagePreviewContainer');
        preview.html('');
        let files=this.files;
        if(!files.length) return;
        $.each(files,function(index,file){
            let reader=new FileReader();
            reader.onload=function(e){
                preview.append(`<div class="mr-2 mb-2 position-relative">
                    <img src="${e.target.result}" class="img-thumbnail" style="height:70px;width:70px;object-fit:cover">
                    <input type="radio" name="default_image" value="${index}" class="position-absolute" style="top:0;left:0">
                </div>`);
            };
            reader.readAsDataURL(file);
        });
    });

    $(document).on('click','.editProduct',function(){
        let id = $(this).data('id');
        $.post("{{ url('api/admin/product-detail') }}", {_token:"{{ csrf_token() }}", id:id}, function(res){
            if(res.status){
                let p = res.data;
                $('#product_id').val(p.id);
                $('input[name=title]').val(p.title);
                $('select[name=category_id]').val(p.category_id);
                $('input[name=price]').val(p.price);
                $('textarea[name=description]').val(p.description);
                $('textarea[name=features]').val(Array.isArray(p.features) ? p.features.join("\n") : '');
                $('textarea[name=specifications]').val(Array.isArray(p.specifications) ? p.specifications.join("\n") : '');
                
                $('#imagePreviewContainer').html('');
                $('#existingImages').html('');

                if(p.images && Array.isArray(p.images)){
                    p.images.forEach((img, index) => {
                        let checked = img.is_default ? 'checked' : '';
                        $('#existingImages').append(`
                            <div class="mr-2 mb-2 position-relative">
                                <img src="${img.url}" class="img-thumbnail" style="height:70px;width:70px;object-fit:cover">
                                <input type="radio" name="default_image" value="${index}" class="position-absolute" style="top:0;left:0" ${checked}>
                            </div>
                        `);
                    });
                }

                productModal.find('.modal-title').text('Edit Product');
                productModal.modal('show');
            } else {
                showMessage('error', res.message ?? 'Failed to fetch product');
            }
        });
    });

    $('#productForm').submit(function(e){
        e.preventDefault();
        let formData=new FormData(this);
        formData.append('_token',"{{ csrf_token() }}");
        $.ajax({
            url:"{{ url('api/admin/add-edit-product') }}",
            method:"POST",
            data:formData,
            processData:false,
            contentType:false,
            success:function(res){
                productModal.modal('hide');
                if(res.status){
                    showMessage('success',res.message??'Saved successfully');
                    table.ajax.reload();
                }else showMessage('error',res.message??'Something went wrong');
            },
            error:function(xhr){
                showMessage('error',xhr.responseJSON?.message??'Something went wrong');
            }
        });
    });

    $('#selectAll').click(function(){
        $('.rowCheckbox').prop('checked',$(this).prop('checked'));
    });

    function openDeleteModal(ids){ idsToDelete=ids; deleteModal.modal('show'); }

    $('#deleteSelected').click(function(){
        let selectedIds=$('.rowCheckbox:checked').map(function(){return $(this).val();}).get();
        if(!selectedIds.length){ selectAlertModal.modal('show'); return; }
        openDeleteModal(selectedIds);
    });

    $(document).on('click','.singleDelete',function(){ openDeleteModal([$(this).data('id')]); });

    $('#confirmDeleteBtn').click(function(){
        if(!idsToDelete.length) return;
        $.ajax({
            url:"{{ url('api/admin/delete-products') }}",
            method:"POST",
            data:{_token:"{{ csrf_token() }}",ids:idsToDelete},
            success:function(res){
                deleteModal.modal('hide');
                if(res.status){
                    showMessage('success',res.message??'Deleted successfully');
                    $('#selectAll').prop('checked',false);
                    table.ajax.reload();
                }else showMessage('error',res.message??'Something went wrong');
            },
            error:function(xhr){ showMessage('error',xhr.responseJSON?.message??'Something went wrong'); }
        });
    });
});
</script>
@endsection