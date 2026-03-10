@extends('admin.layout')

@section('content')
<div class="content-wrapper">
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

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="settings-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-front" data-toggle="pill" href="#front" role="tab">Front Settings</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="settings-tabs-content">
                        <div class="tab-pane fade show active" id="front" role="tabpanel">
                            <form id="frontSettingsForm" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-3 text-primary">General Settings</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Site Title</label>
                                            <input type="text" name="front_setting[site_title]" class="form-control" placeholder="Enter site title">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea name="front_setting[meta_description]" class="form-control" rows="3" placeholder="Enter meta description"></textarea>
                                        </div>
                                        <div class="form-group img-container">
                                            <label>Front Logo</label>
                                            <input type="file" name="front_setting[front_logo]" class="form-control-file image-input" data-preview="#frontLogoPreview" accept="image/*">
                                            <img id="frontLogoPreview" class="img-thumbnail mt-2" style="max-height:100px; display:none;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group img-container">
                                            <label>Favicon</label>
                                            <input type="file" name="front_setting[favicon]" class="form-control-file image-input" data-preview="#faviconPreview" accept="image/*">
                                            <img id="faviconPreview" class="img-thumbnail mt-2" style="max-height:50px; display:none;">
                                        </div>
                                        <div class="form-group">
                                            <label>Footer Text</label>
                                            <textarea name="front_setting[footer_text]" class="form-control" rows="6" placeholder="Enter footer text"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-3 text-primary">Homepage Sliders</h5>
                                <div id="sliderContainer" class="mb-4">
                                    <div class="slider-item border p-3 mb-3 rounded">
                                        <div class="row">
                                            <div class="col-md-4 img-container">
                                                <label>First Half Image</label>
                                                <input type="file" name="sliders[0][first_half_image]" class="form-control-file image-input" data-preview=".slider-first-half-preview" accept="image/*">
                                                <img class="slider-first-half-preview img-thumbnail mt-2" style="max-height:80px; display:none;">
                                            </div>
                                            <div class="col-md-4 img-container">
                                                <label>Second Half Image</label>
                                                <input type="file" name="sliders[0][second_half_image]" class="form-control-file image-input" data-preview=".slider-second-half-preview" accept="image/*">
                                                <img class="slider-second-half-preview img-thumbnail mt-2" style="max-height:80px; display:none;">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Title</label>
                                                <input type="text" name="sliders[0][title]" class="form-control" placeholder="Slider Title">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label>Subtitle</label>
                                                <input type="text" name="sliders[0][subtitle]" class="form-control" placeholder="Slider Subtitle">
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <label>Description</label>
                                                <textarea name="sliders[0][description]" class="form-control" rows="2" placeholder="Slider Description"></textarea>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-slider">Remove</button>
                                    </div>
                                </div>
                                <button type="button" id="addSlider" class="btn btn-secondary mb-4">Add Slider</button>

                                <h5 class="mb-3 text-primary">Services</h5>
                                <div id="servicesContainer" class="mb-4">
                                    <div class="service-item border p-3 mb-3 rounded">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Icon (FontAwesome)</label>
                                                <input type="text" name="services[0][icon]" class="form-control" placeholder="fa-th-large">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Title</label>
                                                <input type="text" name="services[0][title]" class="form-control" placeholder="Service Title">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                                <input type="text" name="services[0][description]" class="form-control" placeholder="Short description">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-service">Remove</button>
                                    </div>
                                </div>
                                <button type="button" id="addService" class="btn btn-secondary mb-4">Add Service</button>

                                <h5 class="mb-3 text-primary">Trusted Clients</h5>
                                <div id="clientsContainer" class="mb-4">
                                    <div class="client-item border p-3 mb-3 rounded">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Client Name</label>
                                                <input type="text" name="clients[0][client_name]" class="form-control" placeholder="Client Name">
                                            </div>
                                            <div class="col-md-4 img-container">
                                                <label>Logo</label>
                                                <input type="file" name="clients[0][logo]" class="form-control-file image-input" data-preview=".client-logo-preview" accept="image/*">
                                                <img class="client-logo-preview img-thumbnail mt-2" style="max-height:80px; display:none;">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Industry / Category</label>
                                                <input type="text" name="clients[0][industry]" class="form-control" placeholder="Industry">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-client">Remove</button>
                                    </div>
                                </div>
                                <button type="button" id="addClient" class="btn btn-secondary mb-4">Add Client</button>

                                <h5 class="mb-3 text-primary">About Section</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Heading</label>
                                            <input type="text" name="front_setting[about_heading]" class="form-control" placeholder="About Heading">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="front_setting[about_desc]" class="form-control" rows="4" placeholder="About Description"></textarea>
                                        </div>
                                        <div class="form-group img-container">
                                            <label>Image</label>
                                            <input type="file" name="front_setting[about_image]" class="form-control-file image-input" data-preview="#aboutImagePreview" accept="image/*">
                                            <img id="aboutImagePreview" class="img-thumbnail mt-2" style="max-height:100px; display:none;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Overlay Text / Stats</label>
                                            <textarea name="front_setting[about_stats]" class="form-control" rows="6" placeholder="Enter overlay text or stats here"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="mb-3 text-primary">CTA / Banner Section</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Heading</label>
                                            <input type="text" name="front_setting[cta_heading]" class="form-control" placeholder="CTA Heading">
                                        </div>
                                        <div class="form-group">
                                            <label>Subheading</label>
                                            <input type="text" name="front_setting[cta_subheading]" class="form-control" placeholder="CTA Subheading">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Button Text</label>
                                            <input type="text" name="front_setting[cta_btn_text]" class="form-control" placeholder="Button Text">
                                        </div>
                                        <div class="form-group">
                                            <label>Button URL</label>
                                            <input type="text" name="front_setting[cta_btn_url]" class="form-control" placeholder="Button URL">
                                        </div>
                                        <div class="form-group img-container">
                                            <label>Background Image</label>
                                            <input type="file" name="front_setting[cta_bg_image]" class="form-control-file image-input" data-preview="#ctaBgPreview" accept="image/*">
                                            <img id="ctaBgPreview" class="img-thumbnail mt-2" style="max-height:100px; display:none;">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Front Settings</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<div id="toastContainer"></div>
@endsection

@section('JS')
<script>
$(document).ready(function(){
    function previewImage(input){
        let preview = $(input).data('preview');
        if(input.files && input.files[0]){
            let reader = new FileReader();
            reader.onload = function(e){
                let img = preview.startsWith('#') ? $(preview) : $(input).closest('.img-container').find(preview);
                img.attr('src', e.target.result).show();
                if(img.siblings('.remove-img').length===0) img.parent().append('<span class="remove-img">&times;</span>');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change', '.image-input', function(){ previewImage(this); });
    $(document).on('click', '.remove-img', function(){
        let img=$(this).siblings('img'), fileInput=$(this).parent().find('input[type="file"]');
        img.hide().attr('src','');
        fileInput.val('');
        $(this).remove();
    });

    function updateIndexes(container){
        $(container).children().each(function(index){
            $(this).find('input, textarea').each(function(){
                let name=$(this).attr('name');
                if(name) $(this).attr('name', name.replace(/\[\d+\]/, `[${index}]`));
            });
        });
    }

    $('#addSlider').click(function(){
        let html=$('.slider-item:first').clone();
        html.find('input, textarea').val('');
        html.find('img').hide();
        html.find('.remove-img').remove();
        $('#sliderContainer').append(html);
        updateIndexes('#sliderContainer');
    });
    $(document).on('click', '.remove-slider', function(){ $(this).closest('.slider-item').remove(); updateIndexes('#sliderContainer'); });

    $('#addService').click(function(){
        let html=$('.service-item:first').clone();
        html.find('input').val('');
        $('#servicesContainer').append(html);
        updateIndexes('#servicesContainer');
    });
    $(document).on('click', '.remove-service', function(){ $(this).closest('.service-item').remove(); updateIndexes('#servicesContainer'); });

    $('#addClient').click(function(){
        let html=$('.client-item:first').clone();
        html.find('input').val('');
        html.find('img').hide();
        html.find('.remove-img').remove();
        $('#clientsContainer').append(html);
        updateIndexes('#clientsContainer');
    });
    $(document).on('click', '.remove-client', function(){ $(this).closest('.client-item').remove(); updateIndexes('#clientsContainer'); });

    $('#frontSettingsForm').submit(function(e){
        e.preventDefault();
        let formData=new FormData(this);
        $.ajax({
            url:'{{ url("api/admin/update-front-setting") }}',
            method:'POST',
            data:formData,
            contentType:false,
            processData:false,
            success:function(res){ showMessage(res.status?'success':'error', res.message || "Updated successfully"); },
            error:function(xhr){ let msg=xhr.responseJSON?.message||"Something went wrong!"; showMessage('error', msg); }
        });
    });

    $.ajax({
        url:'{{ url("api/admin/front-setting-detail") }}',
        method:'POST',
        data:{_token:'{{ csrf_token() }}'},
        success:function(res){
            if(res.status && res.data){
                $('input[name="front_setting[site_title]"]').val(res.data.site_title||'');
                $('textarea[name="front_setting[meta_description]"]').val(res.data.meta_description||'');
                $('textarea[name="front_setting[footer_text]"]').val(res.data.footer_text||'');
                $('input[name="front_setting[about_heading]"]').val(res.data.about_heading||'');
                $('textarea[name="front_setting[about_desc]"]').val(res.data.about_desc||'');
                $('textarea[name="front_setting[about_stats]"]').val(res.data.about_stats||'');
                $('input[name="front_setting[cta_heading]"]').val(res.data.cta_heading||'');
                $('input[name="front_setting[cta_subheading]"]').val(res.data.cta_subheading||'');
                $('input[name="front_setting[cta_btn_text]"]').val(res.data.cta_btn_text||'');
                $('input[name="front_setting[cta_btn_url]"]').val(res.data.cta_btn_url||'');

                if(res.data.front_logo) $('#frontLogoPreview').attr('src',"{{ url('/') }}"+res.data.front_logo).show();
                if(res.data.favicon) $('#faviconPreview').attr('src',"{{ url('/') }}"+res.data.favicon).show();
                if(res.data.about_image) $('#aboutImagePreview').attr('src',"{{ url('/') }}"+res.data.about_image).show();
                if(res.data.cta_bg_image) $('#ctaBgPreview').attr('src',"{{ url('/') }}"+res.data.cta_bg_image).show();

                let sliderTemplate = $('.slider-item:first').clone();
                let serviceTemplate = $('.service-item:first').clone();
                let clientTemplate = $('.client-item:first').clone();

                let sliders = res.data.sliders || [];
                if(sliders.length){
                    $('#sliderContainer').html(''); 
                    sliders.forEach((s,i)=>{
                        let html = sliderTemplate.clone();
                        html.find('input[name*="[title]"]').val(s.title||'');
                        html.find('input[name*="[subtitle]"]').val(s.subtitle||'');
                        html.find('textarea[name*="[description]"]').val(s.description||'');
                        if(s.first_half_image) html.find('.slider-first-half-preview').attr('src',"{{ url('/') }}"+s.first_half_image).show();
                        if(s.second_half_image) html.find('.slider-second-half-preview').attr('src',"{{ url('/') }}"+s.second_half_image).show();
                        $('#sliderContainer').append(html);
                    });
                } else {
                    let html = sliderTemplate.clone();
                    html.find('input, textarea').val('');
                    html.find('img').hide();
                    $('#sliderContainer').html(html);
                }
                updateIndexes('#sliderContainer');

                let services = res.data.services || [];
                if(services.length){
                    $('#servicesContainer').html('');
                    services.forEach((s,i)=>{
                        let html = serviceTemplate.clone();
                        html.find('input[name*="[icon]"]').val(s.icon||'');
                        html.find('input[name*="[title]"]').val(s.title||'');
                        html.find('input[name*="[description]"]').val(s.description||'');
                        $('#servicesContainer').append(html);
                    });
                } else {
                    let html = serviceTemplate.clone();
                    html.find('input').val('');
                    $('#servicesContainer').html(html);
                }
                updateIndexes('#servicesContainer');

                let clients = res.data.clients || [];
                if(clients.length){
                    $('#clientsContainer').html('');
                    clients.forEach((c,i)=>{
                        let html = clientTemplate.clone();
                        html.find('input[name*="[client_name]"]').val(c.client_name||'');
                        html.find('input[name*="[industry]"]').val(c.industry||'');
                        if(c.logo) html.find('.client-logo-preview').attr('src',"{{ url('/') }}"+c.logo).show();
                        $('#clientsContainer').append(html);
                    });
                } else {
                    let html = clientTemplate.clone();
                    html.find('input').val('');
                    html.find('img').hide();
                    $('#clientsContainer').html(html);
                }
                updateIndexes('#clientsContainer');
            }
        }
    });
});
</script>
@endsection