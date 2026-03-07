@extends('admin.layout')

@section('content')
<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Settings</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary card-outline card-tabs">

                <!-- Tabs -->
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="settings-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-front" data-toggle="pill" href="#front" role="tab">Front Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-admin" data-toggle="pill" href="#admin" role="tab">Admin Settings</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="card-body">
                    <div class="tab-content" id="settings-tabs-content">

                        <!-- Front Settings Tab -->
                        <div class="tab-pane fade show active" id="front" role="tabpanel">
                            <form id="frontSettingsForm">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="front_site_title">Site Title</label>
                                            <input type="text" class="form-control" id="front_site_title" placeholder="Enter site title">
                                        </div>

                                        <div class="form-group">
                                            <label for="front_meta_description">Meta Description</label>
                                            <textarea class="form-control" id="front_meta_description" rows="3" placeholder="Enter meta description"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="front_logo">Front Logo</label>
                                            <input type="file" class="form-control-file" id="front_logo">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="front_favicon">Favicon</label>
                                            <input type="file" class="form-control-file" id="front_favicon">
                                        </div>

                                        <div class="form-group">
                                            <label for="front_footer_text">Footer Text</label>
                                            <textarea class="form-control" id="front_footer_text" rows="6" placeholder="Enter footer text"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Save Front Settings</button>
                            </form>
                        </div>

                        <!-- Admin Settings Tab -->
                        <div class="tab-pane fade" id="admin" role="tabpanel">
                            <form id="adminSettingsForm">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_site_name">Site Name</label>
                                            <input type="text" class="form-control" id="admin_site_name" placeholder="Enter site name">
                                        </div>

                                        <div class="form-group">
                                            <label for="admin_email">Admin Email</label>
                                            <input type="email" class="form-control" id="admin_email" placeholder="Enter admin email">
                                        </div>

                                        <div class="form-group">
                                            <label for="admin_timezone">Timezone</label>
                                            <select class="form-control" id="admin_timezone">
                                                <option value="">Select Timezone</option>
                                                <option>UTC</option>
                                                <option>GMT</option>
                                                <option>Asia/Kolkata</option>
                                                <option>America/New_York</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_logo">Site Logo</label>
                                            <input type="file" class="form-control-file" id="admin_logo">
                                        </div>

                                        <div class="form-group">
                                            <label for="admin_footer_text">Footer Text</label>
                                            <textarea class="form-control" id="admin_footer_text" rows="6" placeholder="Enter footer text"></textarea>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input type="checkbox" class="form-check-input" id="admin_maintenance_mode">
                                            <label class="form-check-label" for="admin_maintenance_mode">Maintenance Mode</label>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Save Admin Settings</button>
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
$(document).ready(function() {
    // Initialize Select2 for admin timezone
    $('#admin_timezone').select2({ placeholder: 'Select Timezone', allowClear: true });
});
</script>
@endsection