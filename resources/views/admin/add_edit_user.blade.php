@extends('admin.layout')

@section('title', isset($user) ? 'Edit User' : 'Add User')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ isset($user) ? 'Edit User' : 'Add User' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                        <li class="breadcrumb-item active">{{ isset($user) ? 'Edit' : 'Add' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form id="addEditUserForm" onsubmit="return false;">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id ?? 0 }}">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username ?? '' }}" required>
                                <span id="usernameStatus" style="margin-left:10px;"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email ?? '' }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $user->first_name ?? '' }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" value="{{ $user->middle_name ?? '' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name ?? '' }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone ?? '' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>User Type</label>
                                <select name="user_type" class="form-control" required>
                                    <option value="">Select User Type</option>
                                    @foreach($user_types as $value => $label)
                                        <option value="{{ $value }}" @if(isset($user) && $user->user_type == $value) selected @endif>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control" required>
                                    <option value="">Select Gender</option>
                                    @foreach($genders as $value => $label)
                                        <option value="{{ $value }}" @if(isset($user) && $user->gender == $value) selected @endif>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" @if(!isset($user)) required @endif>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address 1</label>
                                <input type="text" name="address1" class="form-control" value="{{ $user->address1 ?? '' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address 2</label>
                                <input type="text" name="address2" class="form-control" value="{{ $user->address2 ?? '' }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select name="country_id" id="country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if(isset($user) && $user->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <select name="state_id" id="state" class="form-control">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nationality</label>
                                <select name="nationality_id" id="nationality" class="form-control">
                                    <option value="">Select Nationality</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" @if(isset($user) && $user->nationality_id == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1" @if(isset($user) && $user->is_active) selected @endif>Active</option>
                                    <option value="0" @if(isset($user) && !$user->is_active) selected @endif>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Create' }}</button>
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@section('JS')
<script>
const user = JSON.parse('@json($user)');
const userTypes = JSON.parse('@json($user_types)');
const genders = JSON.parse('@json($genders)');
const csrfToken = "{{ csrf_token() }}";

$(document).ready(function() {
    $('#country, #state, #nationality').select2({
        placeholder: function() { return $(this).data('placeholder') || "Select an option"; },
        allowClear: true
    }).on('change', function() {
        $(this).valid();
    });

    function loadStates(countryId, selected = null) {
        if (!countryId) return;
        $.post("{{ url('api/admin/state-list') }}", { _token: csrfToken, country_id: countryId }, function(res) {
            let options = '<option value="">Select State</option>';
            res.data.forEach(s => {
                options += `<option value="${s.id}" ${selected == s.id ? 'selected' : ''}>${s.name}</option>`;
            });
            $('select[name="state_id"]').html(options);
            if (selected) {
                $('select[name="state_id"]').valid();
            }
        });
    }

    if (user && user.country_id) {
        loadStates(user.country_id, user.state_id);
    }

    $('select[name="country_id"]').change(function() {
        loadStates($(this).val());
    });

    let usernameTimer;
    $('input[name="username"]').on('keyup change', function() {
        clearTimeout(usernameTimer);
        let input = $(this);
        usernameTimer = setTimeout(function() {
            let username = input.val().trim();
            let userId = $('input[name="id"]').val() || 0;

            if (username.length < 3) {
                $('#usernameStatus').html('<span class="text-danger"><i class="fas fa-exclamation-circle"></i> Too short</span>');
                return;
            }

            if (!/^[a-zA-Z0-9._-]+$/.test(username)) {
                $('#usernameStatus').html('<span class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid format</span>');
                return;
            }

            $.post("{{ url('api/admin/check-username') }}", { 
                _token: csrfToken, 
                username: username, 
                id: userId 
            }, function(res) {
                if (res.available) {
                    $('#usernameStatus').html('<span class="text-success" id="user-available"><i class="fas fa-check-circle"></i> Available</span>');
                } else {
                    $('#usernameStatus').html('<span class="text-danger" id="user-taken"><i class="fas fa-times-circle"></i> Taken, try: ' + res.suggestion + '</span>');
                }
            });
        }, 500);
    });

    $('#addEditUserForm').validate({
        ignore: [],
        rules: {
            username: {
                required: true,
                minlength: 3,
                maxlength: 50,
                pattern: /^[a-zA-Z0-9]+([._-][a-zA-Z0-9]+)*$/
            },
            email: { required: true, email: true },
            first_name: { required: true, maxlength: 50 },
            last_name: { required: true, maxlength: 50 },
            phone: { required: true, maxlength: 10, digits: true },
            address1: { required: true, maxlength: 150 },
            password: {
                required: function() {
                    return $('input[name="id"]').val() == "0" || $('input[name="id"]').val() == "";
                },
                minlength: 6
            },
            user_type: { required: true },
            gender: { required: true },
            country_id: { required: true },
            state_id: { required: true },
            nationality_id: { required: true },
            is_active: { required: true }
        },
        messages: {
            username: { pattern: "Letters, numbers, ., _, - only. Cannot start/end with symbols." }
        },
        errorElement: 'span',
        errorClass: 'text-danger',
        highlight: function(element) {
            $(element).addClass('is-invalid');
            if ($(element).hasClass('select2-hidden-accessible')) {
                $(element).next('.select2-container').find('.select2-selection').addClass('is-invalid');
            }
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
            if ($(element).hasClass('select2-hidden-accessible')) {
                $(element).next('.select2-container').find('.select2-selection').removeClass('is-invalid');
            }
        },
        errorPlacement: function(error, element) {
            if (element.hasClass('select2-hidden-accessible')) {
                error.insertAfter(element.next('.select2-container'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            if ($('#user-taken').length > 0) {
                showMessage('error', 'Please choose a valid username.');
                return false;
            }

            const btn = $(form).find('button[type="submit"]');
            btn.prop('disabled', true);

            $.post("{{ url('api/admin/add-edit-user') }}", $(form).serialize(), function(res) {
                if (res.status) {
                    showMessage('success', res.message);
                    setTimeout(() => window.location.href = "{{ url('admin/users') }}", 1000);
                } else {
                    showMessage('error', res.message);
                    btn.prop('disabled', false);
                }
            }).fail(function() {
                showMessage('error', 'Server error.');
                btn.prop('disabled', false);
            });
            return false;
        }
    });
});
</script>
@endsection