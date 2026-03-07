@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile text-center position-relative">
                            <div class="profile-img-wrapper mx-auto position-relative" style="width: 150px; height: 150px;">
                                <img class="profile-user-img img-fluid img-circle w-100 h-100 profile-user-img-round" src="{{ auth()->user()->profile_image ? url('storage/assets/images/profile/'.auth()->user()->profile_image) : asset('admin/dist/img/placeholder.jpg') }}" alt="User profile picture">
                                <label for="profile_image_input" class="profile-img-overlay">
                                    <i class="fas fa-camera"></i>
                                </label>

                                <form id="profileImageForm" action="{{ url('api/admin/upload-profile-picture') }}" method="POST" enctype="multipart/form-data" class="d-none">
                                    @csrf
                                    <input type="file" name="profile_image" id="profile_image_input" accept="image/*">
                                </form>
                            </div>

                            <h3 class="profile-username text-center mt-3">{{ $user->first_name }} {{ $user->last_name }}</h3>
                            <p class="text-muted text-center">{{ ucfirst(user_type($user->user_type)) }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                </li>
                                @if($user->phone)
                                <li class="list-group-item">
                                    <b>Phone</b> <a class="float-right">{{ $user->phone }}</a>
                                </li>
                                @endif
                                @if($user->gender)
                                <li class="list-group-item">
                                    <b>Gender</b> <a class="float-right">{{ ucfirst(gender($user->gender)) }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Profile Form -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <h3 class="card-title">Update Details</h3>
                        </div>
                        <div class="card-body">
                            <form id="updateProfileForm" action="{{ url('admin/profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Basic Info -->
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                </div>

                                <div class="form-group">
                                    <label for="address1">Address 1</label>
                                    <input type="text" class="form-control" id="address1" name="address1" value="{{ old('address1', $user->address1) }}">
                                </div>

                                <div class="form-group">
                                    <label for="address2">Address 2</label>
                                    <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2', $user->address2) }}">
                                </div>

                                <!-- Country -->
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control select2" id="country" name="country_id">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" 
                                                {{ old('country_id', $user->country_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- State -->
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select class="form-control select2" id="state" name="state_id">
                                        <option value="">Select State</option>
                                    </select>
                                </div>

                                <!-- Country -->
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <select class="form-control select2" id="nationality" name="nationality_id">
                                        <option value="">Select Nationality</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" 
                                                {{ old('country_id', $user->nationality_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Details</button>
                            </form>
                        </div>
                    </div>

                    <!-- Change Password -->
                    <div class="card">
                        <div class="card-header p-2">
                            <h3 class="card-title">Change Password</h3>
                        </div>
                        <div class="card-body">
                            <form id="changePasswordForm" action="{{ url('admin/profile/password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm New Password</label>
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-warning">Change Password</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('JS')
<script>
$(document).ready(function () {
    $('#country, #state, #nationality').select2({
        placeholder: function() { return $(this).data('placeholder') || "Select an option"; },
        allowClear: true
    }).on('change', function(){ $(this).valid(); });

    function loadStates(countryId, selectedStateId = null) {
        $('#state').empty().append('<option value="">Select State</option>');
        if (!countryId) return;
        $.ajax({
            url: "{{ url('api/admin/state-list') }}",
            type: "POST",
            data: {_token: "{{ csrf_token() }}", country_id: countryId},
            dataType: 'json',
            success: function(res) {
                if (res.status && res.data.length) {
                    res.data.forEach(function(state) {
                        let selected = selectedStateId && selectedStateId == state.id ? 'selected' : '';
                        $('#state').append('<option value="'+state.id+'" '+selected+'>'+state.name+'</option>');
                    });
                }
                $('#state').trigger('change');
            },
            error: function(err) { console.error('Error fetching states:', err); }
        });
    }

    let initialCountry = $('#country').val();
    let initialState = "{{ old('state_id', $user->state_id) }}";
    if (initialCountry) loadStates(initialCountry, initialState);

    $('#country').on('change', function() { loadStates($(this).val()); });

    $("#updateProfileForm").validate({
        ignore: [],
        errorElement: 'span',
        errorPlacement: function(error, element) {
            if (element.hasClass('select2-hidden-accessible')) error.addClass('invalid-feedback').insertAfter(element.next('.select2-container'));
            else error.addClass('invalid-feedback').appendTo(element.closest('.form-group'));
        },
        highlight: function(element) { $(element).addClass('is-invalid'); },
        unhighlight: function(element) { $(element).removeClass('is-invalid'); },
        rules: {
            first_name: { required: true, minlength: 2 },
            last_name: { required: true, minlength: 2 },
            phone: { required: true, digits: true, minlength: 10, maxlength: 15 },
            address1: { required: true, minlength: 3 },
            country_id: { required: true },
            state_id: { required: true },
            nationality_id: { required: true },
            password: { required: true, minlength: 6 },
        },
        messages: {
            first_name: { required: "First name is required", minlength: "At least 2 characters" },
            last_name: { required: "Last name is required", minlength: "At least 2 characters" },
            phone: { required: "Phone is required", digits: "Only numbers allowed", minlength: "Too short", maxlength: "Too long" },
            address1: { required: "Address 1 is required", minlength: "Too short" },
            country_id: { required: "Please select a country" },
            state_id: { required: "Please select a state" },
            nationality_id: { required: "Please select a nationality" },
            password: { required: "Password is required", minlength: "Too short" },
        },
        submitHandler: function(form) {
            let formData = new FormData(form);
            $.ajax({
                url: "{{ url('api/admin/update-profile') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    if(response.status) showMessage('success', response.message);
                    else showMessage('error', response.message);
                },
                error: function(xhr) {
                    let err = xhr.responseJSON?.message || 'Something went wrong!';
                    showMessage('error', err);
                }
            });
        }
    });

    $("#changePasswordForm").validate({
        errorElement: 'span',
        errorPlacement: function(error, element) { error.addClass('invalid-feedback').appendTo(element.closest('.form-group')); },
        highlight: function(element) { $(element).addClass('is-invalid'); },
        unhighlight: function(element) { $(element).removeClass('is-invalid'); },
        rules: {
            current_password: { required: true, minlength: 6 },
            new_password: { required: true, minlength: 6 },
            new_password_confirmation: { required: true, equalTo: "#new_password" }
        },
        messages: {
            current_password: { required: "Enter current password", minlength: "Minimum 6 characters" },
            new_password: { required: "Enter new password", minlength: "Minimum 6 characters" },
            new_password_confirmation: { required: "Confirm new password", equalTo: "Passwords must match" }
        },
        submitHandler: function(form) {
            $.ajax({
                url: "{{ url('api/admin/update-password') }}",
                type: "POST",
                data: $(form).serialize(),
                dataType: 'json',
                success: function(response) {
                    if(response.status) { showMessage('success', response.message); $(form)[0].reset(); }
                    else showMessage('error', response.message);
                },
                error: function(xhr) {
                    let err = xhr.responseJSON?.message || 'Something went wrong!';
                    showMessage('error', err);
                }
            });
        }
    });

    $('#profile_image_input').on('change', function() {
        let formData = new FormData();
        formData.append('profile_image', this.files[0]);
        $.ajax({
            url: "{{ url('api/admin/upload-profile-picture') }}",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if(response.status) {
                    showMessage('success', response.message);
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-user-img-round').attr('src', e.target.result);
                    }
                    reader.readAsDataURL($('#profile_image_input')[0].files[0]);
                } else {
                    showMessage('error', response.message);
                }
            },
            error: function(xhr) {
                let err = xhr.responseJSON?.message || 'Something went wrong!';
                showMessage('error', err);
            }
        });
    });
});
</script>
@endsection