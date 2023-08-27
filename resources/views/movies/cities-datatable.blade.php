
{{--  dd($pageContentRequests) --}}
@extends('layouts.master')

@section('title', 'Cities Listing')

@section('content')
<div class="row">
  <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
    <h1 class="page-title txt-color-blueDark">
      <i class="fa fa-fw fa-university"></i> Cities
    </h1>
  </div>



</div>

<!-- widget grid -->
<section id="widget-grid" class="">
  <!-- row -->
  <div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <!-- Widget ID (each widget will need unique ID)-->
      <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-sortable="false" data-widget-deletebutton="false">
     
        <header>
          <h2> Cities List </h2>
        </header>
        <!-- widget div-->
        <div>
     
          <!-- widget content -->
        <div id="table_data" class="widget-body no-padding">
          <div class="table-responsive">
            <table id="dt_basic_cities" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                  <tr>
                      <th data-hide="phone">ID</th>
                      <th data-class="expand">
                          <i class="fa fa-fw fa-flag txt-color-blue hidden-md hidden-sm hidden-xs"></i> Name
                      </th>
                      <th data-class="expand">
                          <i class="fa fa-fw fa-flag txt-color-blue hidden-md hidden-sm hidden-xs"></i> State Name
                      </th>
                      <th data-class="expand">
                          <i class="fa fa-flag-checkered txt-color-blue hidden-md hidden-sm hidden-xs"></i> Country Name
                      </th>
                      <th data-hide="phone,tablet">
                        <i class="fa fa-lg fa-fw fa-globe txt-color-blue hidden-md hidden-sm hidden-xs"></i> Page Url
                      </th>
                      <th data-hide="phone,tablet">
                        <i class="fa fa-fw fa-pencil-square-o txt-color-blue hidden-md hidden-sm hidden-xs"></i> Action
                      </th>
                    
                  </tr>
              </thead>
               
            </table>
          </div>
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
  
  
  var dataTable = $('#dt_basic_cities').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('cities-pagination.getData') }}",
    columns: [
      { data: 'city_id', name: 'id' },
      { data: 'city_name', name: 'city_name' },
      { data: 'state_name', name: 'state_name' },
      { data: 'country_name', name: 'country_name' },
      { data: 'slug', name: 'slug' },
      { data: 'action', name: 'action', orderable: false }, // Disable sorting for the "Action" column

    ],
    order: [
        [0, 'desc'] // Sort by the first column (ID) in descending order
    ],
    pageLength: 25, // Set the default number of rows per page to 50
    language: { 
            searchPlaceholder: "Search by city or country name",
        },
        // initComplete: function () {
        //     // Clear the search input when the DataTable is initialized
        //     this.api().search('').draw();
        // },
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

  // Clear the search input field on page load
  dataTable.search('').draw();
     
// Clear the search input field when navigating back
window.addEventListener('pageshow', function(event) {
    var historyTraversal = event.persisted || 
                          (typeof window.performance != 'undefined' && 
                           window.performance.navigation.type === 2);
    if (historyTraversal) {
      dataTable.search('').draw();
    }
  });

  // Show the search input after the page is fully loaded
  // $('.dataTables_wrapper').addClass('loading');
  // dataTable.on('draw', function() {
  //   $('.dataTables_wrapper').removeClass('loading');
  // });

  // // Hide the search input on page load
  // $('.dataTables_wrapper select, #dt_basic_cities_filter').hide();
  
  // // Show the search input after the page is fully loaded
  // $(window).on('load', function() {
  //   $('.dataTables_wrapper select, #dt_basic_cities_filter').show();
  // });
            

});

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
  
  /* Hide the search input on page load */
/* .dataTables_wrapper select, #dt_basic_cities_filter {
  display: none;
} */

/* Show the search input after the page is fully loaded */
/* .dataTables_wrapper.loading select, .dataTables_wrapper.loading #dt_basic_cities_filter {
  display: inline-block;
} */
</style>


@endsection
