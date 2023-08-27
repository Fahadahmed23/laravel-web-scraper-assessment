
{{--  dd($cities) --}}
@extends('layouts.master')

@section('title', 'City Template')

@section('content')
<div style="display: flex; align-items: center; width: 100%;">
  <a href="{{ $backUrl }}" class="btn btn-success">Back</a>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
    <h1 class="page-title txt-color-blueDark">
      <i class="fa fa-university fa-fw "></i> 
      <a href="/">Country</a> - <a href="{{ url('/get-cities/'.$country_id) }}">{{ $country_name }}</a> - City Templates - {{ $city_name }}
    </h1>
  </div>

</div>

@can('create-cities')
<div class="row">
  <div class="col-sm-12">

    <div class="well">
      <h1><span class="semi-bold">Create City Level</span> <i class="ultra-light">Templates ({{ $city_name }})</i> </h1>    
      <a href="/create-city-template/{{$city_id}}" class="btn btn-default"> <strong>Create</strong> <i>City Templates </i> </a>

    </div>

  </div>


</div>
@endcan

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
  <div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <!-- Widget ID (each widget will need unique ID)-->
      <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
     
        <header>
          <h2> City Templates List </h2>
        </header>
        <!-- widget div-->
        <div>
     
          <!-- widget content -->
          <div id="table_data" class="widget-body no-padding">
            <table id="dt_basic_city_templates" class="table table-striped table-bordered table-hover" width="100%">
              <thead>
                <tr>
                  <th data-hide="phone">ID</th>
                  <th data-class="expand">
                    <i class="fa fa-fw fa-user txt-color-blue hidden-md hidden-sm hidden-xs"></i> Name
                  </th>
                  <th data-class="expand">
                    <i class="fa fa-fw fa-globe txt-color-blue hidden-md hidden-sm hidden-xs"></i> ISO Name
                  </th>
                  <th data-hide="phone,tablet">
                    <i class="fa fa-fw fa-pencil-square-o txt-color-blue hidden-md hidden-sm hidden-xs"></i> Action
                  </th>
                </tr>
              </thead>
               
            </table>

          </div>
          <!-- end widget content -->
        </div>
        <!-- end widget div -->
      </div>
      <!-- end widget -->
    


    </article>
    <!-- WIDGET END -->
  </div>
  <!-- end row -->
  <!-- end row -->
</section>
<!-- end widget grid -->

@endsection

@section('footer')

<script>
   
$(document).ready(function() {
    

  // Get the country_id from the page's data attribute or any other source
  var city_id = {{ $city_id }}; 
  
  $('#dt_basic_city_templates').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('city-templates-pagination.getData') }}",
      data: {
        city_id: city_id // Send the city_id as part of the AJAX request
      }
    },
    columns: [
      { data: 'id', name: 'id' },
      { data: 'language', name: 'language' },
      { data: 'iso_code', name: 'iso_code' },
      { data: 'action', name: 'action', orderable: false }, // Disable sorting for the "Action" column

    ],
    order: [
        [0, 'desc'] // Sort by the first column (ID) in descending order
    ],
    pageLength: 25, // Set the default number of rows per page to 50
    language: { 
            searchPlaceholder: "Search by name or iso name",
        },
        drawCallback: function (settings) {
      // Get information about the DataTables API instance
      var api = this.api();
      var pageInfo = api.page.info();
      var currentPage = pageInfo.page + 1;

      // Add the 'disabled' class to the active page link
      $(api.table().container()).find('.paginate_button').removeClass('active');
      $(api.table().container()).find('.paginate_button a').each(function () {
        var pageNumber = parseInt($(this).text());
        if (pageNumber === currentPage) {
          $(this).parent().addClass('active disabled');
          $(this).removeAttr('href');
        }
      });

      // Unbind the click event for disabled current page links
      $(api.table().container())
        .find('.paginate_button.disabled a')
        .off('click');
    }
  });

  // Add event listener for delete buttons
  $(document).on('click', '.delete-button', function () {
        console.log('Delete button clicked');
        var cityId = $(this).data('city-id');
        var isoCode = $(this).data('iso-code');
        // console.log(cityId,isoCode);
        confirmDelete(cityId, isoCode);
    });

    // Function to display the confirmation modal before deleting a city template
    function confirmDelete(cityId, isoCode) {
        $('#deleteConfirmationModal').modal('show');
        // Set the city ID and isoCode in the modal's hidden inputs
        $('#delete_city_id').val(cityId);
        $('#delete_iso_code').val(isoCode);
    }

    

});

// Function to submit the delete form
function submitDeleteForm() {
        //console.log('submit delete form');
        $('#deleteForm').submit();
    }    
    
</script>


<style>
.search-container {
    display: flex;
    align-items: center;
  }

  #filter-input {
    flex: 1;
    padding: 6px;
    max-width: 200px;
    margin-right:3px;
  }

  button {
    background-color: #f2f2f2;
    border: none;
    color: #666;
    padding: 8px;
    cursor: pointer;
    transition: transform 0.3s;
  }

  button:hover {
    transform: scale(1.2); 
  }
  
</style>

<!-- Bootstrap Modal for delete confirmation -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete City Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this city template?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="submitDeleteForm()">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Form for handling delete -->
<form id="deleteForm" method="post" style="display: none;" action="/delete-city-template">
    @csrf
    @method('DELETE')
    <input type="hidden" id="delete_city_id" name="delete_city_id">
    <input type="hidden" id="delete_iso_code" name="delete_iso_code">
</form>

@endsection
