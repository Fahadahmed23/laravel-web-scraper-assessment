{{--  dd($unusedLanguages) --}}
@extends('layouts.master')
@section('title', 'Create City Template')

<style>
  .md-editor>textarea {
    background: #fff !important;
    border: 1px solid !important;
    margin-bottom: 15px !important;
    width: 99% !important;
}
.jarviswidget-color-purple>header {
    border-color: #474544!important;
    background: #474544 !important;
    color: #fff !important;
}
.jarviswidget {
    margin: 6px 0 28px !important;
}
  .md-editor {
    padding-left: 12px !important;
}
/* Start Select Language Code Styling */
.form-group label.control-label.col-md-12 {
    font-size: 15px;
    color: #ffffff;
    background: #474544;
    padding: 12px;
}
/* Select Language Code Styling End */
select.form-control {
    width: 49%;
    height: 44px;
    margin: 15px 0;
}
</style>


@section('content')
    <!--
    <div style="display: flex; align-items: center; width: 100%;">
        <button type="submit" class="btn btn-success">Back</button>
    </div>
    -->
  <div style="display: flex; align-items: center; width: 100%;">
    <a href="{{ URL::previous() }}" class="btn btn-success">Back</a>
  </div>

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-university fa-fw "></i> Create City Template - {{ $city_name }}
            </h1>
        </div>


    </div>

    @if (session('success'))
        <div class="alert alert-block alert-success">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Success!</h4>
            <p>
                {{ session('success') }} </p>
        </div>
    @endif

<!-- widget grid -->

<section id="widget-grid" class="">
    
    <form method="POST" action="/create-city-template/{{ $city_id }}">
        @csrf
        
        <div class="row">

            <!-- NEW WIDGET START -->



            <div class="form-group">
                <label class="control-label col-md-12">Select Language Code</label>
                <div class="col-md-12">
                    <select name="iso_code" class="form-control" required>
                        @foreach ($unusedLanguages as $unusedLanguage)
                        <option value="{{ $unusedLanguage->iso_code }}" @if ($unusedLanguage->iso_code === 'en') selected @endif>{{ $unusedLanguage->language }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>


            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-6">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Browser Title</h2>
                    </header>
                </div>
                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <textarea id="browser_title" name="browser_title" class="custom-scroll page-templates-data" style="max-height:180px;">{{ old('browser_title') }}</textarea>

                        @error('browser_title')
                            <span>{{ $message }}</span>
                        @enderror



                    </div>
                    <!-- end widget content -->





                    <!-- end widget div -->
                </div>
                <!-- end widget -->

            </article>
            <!-- WIDGET END -->

            <!-- NEW WIDGET START -->
            <article class="col-sm-12 col-md-12 col-lg-6">

                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Meta Description</h2>
                    </header>
                </div>
                <!-- widget div-->
                <div>

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <textarea id="meta_description" name="meta_description" class="custom-scroll page-templates-data"
                            style="max-height:180px;">{{ old('meta_description') }}</textarea>

                        @error('meta_description')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>
                    <!-- end widget content -->



                </div>
                <!-- end widget -->
            </article>
            <!-- WIDGET END -->

        </div>
        

        <div class="row">


            <!-- NEW WIDGET START -->

            <article class="col-sm-12 col-md-12 col-lg-6">

                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Page Title</h2>
                    </header>
                    <!-- widget div-->
                </div>

                <div>


                    <!-- widget content -->
                    <div class="widget-body no-padding">

                        <textarea id="page_title" name="page_title" class="custom-scroll page-templates-data" style="max-height:180px;">{{ old('page_title') }}</textarea>

                        @error('page_title')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

                <!-- end widget -->
            </article>
            <!-- WIDGET END -->

            <!-- NEW WIDGET START -->
            <!-- <article class="col-sm-12 col-md-12 col-lg-6">

                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Top Summary</h2>
                    </header>
                </div>
               
                <div>
                
                    <div class="widget-body no-padding">
                        <textarea id="top_summary" name="top_summary" class="custom-scroll page-templates-data" style="max-height:180px;">{{ old('top_summary') }}</textarea>


                        @error('top_summary')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>
                    
                </div>
               
            </article> -->
            <!-- WIDGET END -->


        </div>

        <!-- <div class="row">


           

            <article class="col-sm-12 col-md-12 col-lg-6">

                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Bottom Description</h2>
                    </header>
                 
                </div>

                <div>


                    
                    <div class="widget-body no-padding">

                        <textarea id="bottom_description" name="bottom_description" class="custom-scroll page-templates-data" style="max-height:180px;">{{ old('bottom_description') }}</textarea>

                        @error('bottom_description')
                            <span>{{ $message }}</span>
                        @enderror

                    </div>
                    

                </div>
              

                
            </article>
           

        </div> -->

        <div class="row">
            <!-- CKEditor Text Area for Summary Top -->
            <div class="col-md-12 selectContainer has-feedback">
                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-1" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Summary Top</h2>
                    </header>
                </div>
                    <div class="widget-body">
                        <div class="form-group">
                            <textarea id="top_summary" name="top_summary" class="form-control" data-bv-field="top_summary" style="resize: vertical;" rows="8">{{ old('top_summary') }}</textarea>
                            <i class="form-control-feedback" data-bv-icon-for="top_summary" style="display: none;"></i>
                        </div>
                    </div>
            
            </div>
        </div>

        <div class="row">
            <!-- CKEditor Text Area for Summary Bottom -->
            <div class="col-md-12 selectContainer has-feedback">
                <div class="jarviswidget jarviswidget-color-purple" id="wid-id-2" data-widget-colorbutton="false"
                    data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false"
                    data-widget-sortable="false" data-widget-deletebutton="false">
                    <header>
                        <h2>Summary Bottom</h2>
                    </header>
                </div>
                    <div class="widget-body">
                        <div class="form-group">         
                            <textarea id="bottom_description" name="bottom_description" class="form-control" data-bv-field="bottom_description" style="resize: vertical;" rows="8">{{ old('bottom_description') }}</textarea>
                            <i class="form-control-feedback" data-bv-icon-for="bottom_description"></i>
                        </div>
                    </div>
            </div>
        </div>


    <div style="display: flex; align-items: center; width: 100%;">
        <button type="submit" class="btn btn-success">Create Template</button>
    </div>
        
    </form>

</section>
<!-- end widget grid -->

@endsection



@section('footer')

<script>

$(document).ready(function() {
    CKEDITOR.replace('top_summary', {
			removePlugins: 'image', // Remove the image plugin
			removeButtons: 'Save',
        });
        
        CKEDITOR.replace('bottom_description', {
			removePlugins: 'image', // Remove the image plugin
			removeButtons: 'Save',
        });
    });

</script>

@endsection
