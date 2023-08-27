@extends('layouts.master')

@section('title', 'Update City Template')

@section('content')
  <div style="display: flex; align-items: center; width: 100%;">
    <a href="{{ $backUrl }}" class="btn btn-success">Back</a>
  </div>

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-table fa-fw "></i> City "{{ $city_name }}" <span> <b>"{{ $iso_code }}"</b></span>
            </h1>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-block alert-success">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading"><i class="fa fa-check-square-o"></i> Success!</h4>
        <p>
            {{ session('success') }}
        </p>
    </div>
    @elseif (session('failure'))
    <div class="alert alert-block alert-danger">
        <a class="close" data-dismiss="alert" href="#">×</a>
        <h4 class="alert-heading"><i class="fa fa-times-circle"></i> Failure!</h4>
        <p>
            {{ session('failure') }}
        </p>
    </div>
    @endif

    <!-- widget grid -->

    <section id="widget-grid" class="">

        <!-- row -->
        <form method="POST" action="/update-city-template/{{ $city_id }}/iso_code/{{ $iso_code }}">
            @csrf
            <div class="row">

                <div class="form-group">
                    <label class="control-label col-md-12">Select Language Code</label>
                    <div class="col-md-12">
                        <select name="language_code" class="form-control" required>
                            @foreach ($languages as $language)
                            <option value="{{ $language->iso_code }}" @if($language->iso_code === $iso_code) selected @endif>{{ $language->language }}</option>
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
                         
                            <textarea id="browser_title" name="browser_title" class="custom-scroll page-templates-data" style="max-height:180px;">
                                {{ isset($templateNames['browser_title']) ? $templateNames['browser_title'] : old('browser_title', '') }}
                            </textarea>


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
                            style="max-height:180px;">{{ isset($templateNames['meta_description']) ? $templateNames['meta_description'] : old('meta_description', '') }}</textarea>


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
                        
                            <textarea id="page_title" name="page_title" class="custom-scroll page-templates-data" style="max-height:180px;">{{ isset($templateNames['page_title']) ? $templateNames['page_title'] : old('page_title', '') }}</textarea>


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
                            
                            <textarea id="top_summary" name="top_summary" class="custom-scroll page-templates-data" style="max-height:180px;">{{ isset($templateNames['top_summary']) ? $templateNames['top_summary'] : old('top_summary', '') }}</textarea>

                            @error('top_summary')
                                <span>{{ $message }}</span>
                            @enderror

                        </div>
                       
                    </div>
                  
                </article> -->



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
                            
                            <textarea id="bottom_description" name="bottom_description" class="custom-scroll page-templates-data" style="max-height:180px;">{{ isset($templateNames['bottom_description']) ? $templateNames['bottom_description'] : old('bottom_description', '') }}</textarea>

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
                            <textarea id="top_summary" name="top_summary" class="form-control" data-bv-field="top_summary" style="resize: vertical;" rows="8">{{ isset($templateNames['top_summary']) ? $templateNames['top_summary'] : old('top_summary', '') }}</textarea>
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
                            <textarea id="bottom_description" name="bottom_description" class="form-control" data-bv-field="bottom_description" style="resize: vertical;" rows="8">{{ isset($templateNames['bottom_description']) ? $templateNames['bottom_description'] : old('bottom_description', '') }}</textarea>
                            <i class="form-control-feedback" data-bv-icon-for="bottom_description"></i>
                        </div>
                    </div>
                </div>
            </div>



            <!-- WIDGET END -->

            <div class="row">
              <div class="col-lg-2">
                <div style="display: flex; align-items: center; width: 100%;">
                  <button type="submit" class="btn btn-success">Update</button>
                </div>
              </div>
              <!-- <div class="col-lg-10">
                <button type="button" class="btn btn-danger delete-button" data-city-id="{{ $city_id }}"
                data-iso-code="{{ $iso_code }}">Delete </button>
                
              </div> -->
            </div>

            
        </form>

        <!-- end row -->

    </section>
    <!-- end widget grid -->
@endsection

@section('footer')
    <!-- Footer content goes here -->
    <script>
        // $(document).ready(function() {

        //     $('.delete-button').click(function() {
        //         var cityId = $(this).data('city-id');
        //         var isoCode = $(this).data('iso-code');

        //         if (confirm('Are you sure you want to delete this template?')) {
        //             // Proceed with the Ajax request
        //             $.ajax({
        //                 url: '/delete-city-template/' + cityId + '/iso_code/' + isoCode,
        //                 type: 'DELETE',
        //                 data: {
        //                     _token: '{{ csrf_token() }}'
        //                 },
        //                 success: function(response) {
        //                     // Handle success response
        //                     console.log(response);
        //                     console.log('Deletion successful!');

        //                     // Access the routes from the response
        //                     var getCityTemplatesRoute = response.routes;

        //                     // Show success message
        //                     alert('Deletion successful!');


        //                     // Redirect to the specified route
        //                     window.location.href = getCityTemplatesRoute;

        //                 },
        //                 error: function(xhr) {
        //                     // Handle error response
        //                     console.log('Deletion unsuccessful!');
        //                 }
        //             });
        //         }
        //     });


        // });

    $(document).ready(function() {
        CKEDITOR.replace('top_summary', {
            // format_tags: 'p;h1;h2;h3;h4;h5;h6',
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
