@extends('admin.layout')

@section('title', 'Product Categories')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Product Categories</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">Category List</h3>
                    <div class="ml-auto">
                        <button id="addCategoryBtn" class="btn btn-success btn-sm" title="Add Category">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button id="deleteSelected" class="btn btn-danger btn-sm" title="Delete Selected">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="categoriesTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="categoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="categoryForm">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="category_id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Parent Category</label>
                        <select name="parent_id" class="form-control">
                            <option value="">None</option>
                            @foreach($parent_categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" name="icon" class="form-control" placeholder="fas fa-table">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn-save" class="btn btn-success btn-sm">Save</button>
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
                Are you sure you want to delete the selected category(s)?
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
                Please select at least one category to delete.
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
$(document).ready(function () {

    let idsToDelete = [];
    let categoryModal = $('#categoryModal');
    let deleteModal = $('#deleteConfirmModal');
    let selectAlertModal = $('#selectAlertModal');

    let table = $('#categoriesTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        pageLength: 25,
        ajax: {
            url: "{{ url('api/admin/product-categories') }}",
            type: "POST",
            data: { _token: "{{ csrf_token() }}" }
        },
        columns: [
            { data: 'id', orderable: false, searchable: false, render: id => `<input type="checkbox" class="rowCheckbox" value="${id}">` },
            { data: 'name' },
            { data: 'parent_name', render: data => data ?? '' },
            { data: 'description' },
            { data: 'icon', render: data => data ? `<i class="${data}"></i> ${data}` : '' },
            { data: 'id', orderable: false, searchable: false, render: function(id){
                return `
                    <button class="btn btn-info btn-sm editCategory" data-id="${id}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn btn-secondary btn-sm viewCategory" data-id="${id}">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button class="btn btn-danger btn-sm singleDelete" data-id="${id}">
                        <i class="fas fa-trash"></i>
                    </button>
                `;
            }}
        ],
        order: [[1,'asc']],
        columnDefs: [{ targets: 0, searchable: false, orderable: false }]
    });

    $('#addCategoryBtn').click(() => {
        $('#btn-save').css('display', 'block');
        $('#categoryForm')[0].reset();
        $('#categoryForm').validate().resetForm();
        $('#categoryForm').find('.is-invalid').removeClass('is-invalid');
        $('#category_id').val('');
        categoryModal.find('.modal-title').text('Add Category');
        $('input, textarea, select').prop('readonly', false).prop('disabled', false);
        categoryModal.modal('show');
    });

    $(document).on('click', '.editCategory', function(){
        $('#btn-save').css('display', 'block');
        let id = $(this).data('id');
        $('#categoryForm').validate().resetForm();
        $('#categoryForm').find('.is-invalid').removeClass('is-invalid');

        $.post("{{ url('api/admin/product-category-detail') }}", { _token: "{{ csrf_token() }}", id: id }, function(res){
            if(res.status){
                let cat = res.data;
                $('#category_id').val(cat.id);
                $('input[name=name]').val(cat.name);
                $('select[name=parent_id]').val(cat.parent_id);
                $('textarea[name=description]').val(cat.description);
                $('input[name=icon]').val(cat.icon);
                categoryModal.find('.modal-title').text('Edit Category');
                $('input, textarea, select').prop('readonly', false).prop('disabled', false);
                categoryModal.modal('show');
            } else {
                showMessage('error', res.message ?? 'Failed to fetch category');
            }
        });
    });

    $(document).on('click', '.viewCategory', function(){
        let id = $(this).data('id');
        $('#btn-save').css('display', 'none');
        $.post("{{ url('api/admin/product-category-detail') }}", { _token: "{{ csrf_token() }}", id: id }, function(res){
            if(res.status){
                let cat = res.data;
                $('#category_id').val(cat.id);
                $('input[name=name]').val(cat.name);
                $('select[name=parent_id]').val(cat.parent_id);
                $('textarea[name=description]').val(cat.description);
                $('input[name=icon]').val(cat.icon);
                categoryModal.find('.modal-title').text('View Category');
                $('input, textarea, select').prop('readonly', true).prop('disabled', true);
                categoryModal.modal('show');
            } else {
                showMessage('error', res.message ?? 'Failed to fetch category');
            }
        });
    });

    $('#categoryForm').validate({
        rules: {
            name: { required: true, maxlength: 150 },
            description: { maxlength: 500 },
            icon: { maxlength: 100 }
        },
        messages: {
            name: { required: "Category name is required", maxlength: "Maximum 150 characters allowed" },
            description: { maxlength: "Maximum 500 characters allowed" },
            icon: { maxlength: "Maximum 100 characters allowed" }
        },
        errorElement: 'span',
        errorClass: 'text-danger',
        highlight: function(element) {
            $(element).addClass('is-invalid');
            if($(element).hasClass('select2-hidden-accessible')) {
                $(element).next('.select2-container').addClass('is-invalid');
            }
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
            if($(element).hasClass('select2-hidden-accessible')) {
                $(element).next('.select2-container').removeClass('is-invalid');
            }
        },
        errorPlacement: function(error, element) {
            if(element.hasClass('select2-hidden-accessible')) {
                error.insertAfter(element.next('.select2-container'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form){
            $.ajax({
                url: "{{ url('api/admin/add-edit-product-category') }}",
                method: "POST",
                data: $(form).serialize() + "&_token={{ csrf_token() }}",
                success: function(res){
                    categoryModal.modal('hide');
                    if(res.status){
                        showMessage('success', res.message ?? 'Saved successfully');
                        table.ajax.reload();
                    } else {
                        showMessage('error', res.message ?? 'Something went wrong');
                    }
                },
                error: function(xhr){
                    showMessage('error', xhr.responseJSON?.message ?? 'Something went wrong');
                }
            });
        }
    });

    $('#selectAll').click(function() {
        $('.rowCheckbox').prop('checked', $(this).prop('checked'));
    });

    function openDeleteModal(ids){
        idsToDelete = ids;
        deleteModal.modal('show');
    }

    $('#deleteSelected').click(function(){
        let selectedIds = $('.rowCheckbox:checked').map(function(){ return $(this).val(); }).get();
        if(selectedIds.length === 0){ selectAlertModal.modal('show'); return; }
        openDeleteModal(selectedIds);
    });

    $(document).on('click', '.singleDelete', function(){
        openDeleteModal([$(this).data('id')]);
    });

    $('#confirmDeleteBtn').click(function(){
        if(idsToDelete.length === 0) return;
        $.ajax({
            url: "{{ url('api/admin/delete-product-categories') }}",
            method: "POST",
            data: { _token: "{{ csrf_token() }}", ids: idsToDelete },
            success: function(res){
                deleteModal.modal('hide');
                if(res.status){
                    showMessage('success', res.message ?? 'Deleted successfully');
                    $('#selectAll').prop('checked', false);
                    table.ajax.reload();
                } else {
                    showMessage('error', res.message ?? 'Something went wrong');
                }
            },
            error: function(xhr){
                showMessage('error', xhr.responseJSON?.message ?? 'Something went wrong');
            }
        });
    });

});
</script>
@endsection