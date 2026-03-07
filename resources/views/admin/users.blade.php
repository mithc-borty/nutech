@extends('admin.layout')

@section('title', 'Users')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Users</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-header d-flex align-items-center">
                    <h3 class="card-title">User List</h3>
                    <div class="ml-auto">
                        <a href="{{ url('admin/add-edit-user/0') }}" class="btn btn-success btn-sm" title="Add User">
                            <i class="fas fa-plus"></i>
                        </a>
                        <button id="deleteSelected" class="btn btn-danger btn-sm" title="Delete Selected">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="usersTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>Username</th>
                                <th>User Type</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete the selected user(s)?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger btn-sm" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="selectAlertModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Attention</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        Please select at least one user to delete.
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

    let userTypes = JSON.parse('@json($user_types)');
    let genders   = JSON.parse('@json($genders)');
    let idsToDelete = [];
    let deleteModal = $('#deleteConfirmModal');
    let selectAlertModal = $('#selectAlertModal');

    function formatUserType(data) {
        return userTypes[data] ?? data ?? '';
    }

    function formatGender(data) {
        return genders[data] ?? '';
    }

    let table = $('#usersTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        pageLength: 25,
        ajax: {
            url: "{{ url('api/admin/users') }}",
            type: "POST",
            data: { _token: "{{ csrf_token() }}" }
        },
        columns: [
            { 
                data: 'id',
                orderable: false,
                searchable: false,
                render: function(id) {
                    return `<input type="checkbox" class="rowCheckbox" value="${id}">`;
                }
            },
            { data: 'username' },
            { 
                data: 'user_type',
                render: function(data) {
                    return `<span class="badge badge-primary">${formatUserType(data)}</span>`;
                }
            },
            { 
                data: null,
                render: function (data) {
                    let name = '';
                    if(data.first_name) name += data.first_name + ' ';
                    if(data.middle_name) name += data.middle_name + ' ';
                    if(data.last_name) name += data.last_name;
                    return name.trim();
                }
            },
            { data: 'email' },
            { data: 'phone' },
            { 
                data: 'gender',
                render: function(data) {
                    let genderText = formatGender(data);
                    if(!genderText) return '';
                    return `<span class="badge badge-info">${genderText}</span>`;
                }
            },
            { 
                data: 'status',
                render: function(data) {
                    return data == 1
                        ? '<span class="badge badge-success">Active</span>'
                        : '<span class="badge badge-secondary">Inactive</span>';
                }
            },
            { 
                data: 'id',
                orderable: false,
                searchable: false,
                render: function(id) {
                    return `
                        <a href="{{ url('admin/add-edit-user') }}/${id}" class="btn btn-info btn-sm editUser" data-id="${id}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm singleDelete" data-id="${id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    `;
                }
            }
        ],
        order: [[1, 'asc']],
        columnDefs: [
            { targets: 0, searchable: false, orderable: false }
        ]
    });

    $('#selectAll').click(function() {
        let checked = $(this).prop('checked');
        $('.rowCheckbox').prop('checked', checked);
    });

    function openDeleteModal(ids) {
        idsToDelete = ids;
        deleteModal.modal('show');
    }

    $('#deleteSelected').click(function() {
        let selectedIds = $('.rowCheckbox:checked').map(function(){ return $(this).val(); }).get();
        if(selectedIds.length === 0) {
            selectAlertModal.modal('show');
            return;
        }
        openDeleteModal(selectedIds);
    });

    $(document).on('click', '.singleDelete', function(){
        let id = $(this).data('id');
        openDeleteModal([id]);
    });

    $('#confirmDeleteBtn').click(function() {
        if(idsToDelete.length === 0) return;
        $.ajax({
            url: "{{ url('api/admin/delete-users') }}",
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
            error: function(xhr) {
                showMessage('error', xhr.responseJSON?.message ?? 'Something went wrong');
            }
        });
    });

});
</script>
@endsection