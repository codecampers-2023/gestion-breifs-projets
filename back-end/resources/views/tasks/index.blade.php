@extends('master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('message.title')}}</h1>
          </div>
        </div>
      </div>
    </section>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>{{__('message.task')}}</h2></div>

                </div>
                <div class="col-sm-12 d-flex justify-content-between p-3">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('task.create') }}" class="btn btn-primary">{{__('message.+add task')}}</a>


                        <select class="btn btn-secondary dropdown-toggle ml-2" name="filter" id="filter">
                            <option value="">{{__('message.all_briefs')}}</option>
                            @foreach ($brief as $value)
                            <option value="{{$value->id}}">{{$value->Nom_du_brief}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <input type="text" name="search" id="search" class="form-control" /> --}}

                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>

                </div>
            </div>

    <table class="table table-striped table-hover table-bordered">
      <thead>
          <tr>
              <th>{{__('message.name')}}</th>
              <th>{{__('message.duration')}}</th>
              <th>{{__('message.actions')}}</th>
          </tr>
      </thead>
      <tbody id="tbody">
        @include('tasks.pagination_data')
       </tbody>
  </table>
  <div class="d-flex justify-content-between">

      <div>
          <a href="{{route('generate')}}" class="btn btn-outline-secondary" >{{__('message.export_pdf')}}</a>
          <a href="/exportexcel" class="btn btn-outline-secondary" >{{__('message.export_excel')}}</a>
          <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
            {{__('message.import_excel')}}
            </button>
       </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('message.modal_title')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/importexcel" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="modal-body">
                      <div class="form-group">
                          <input type="file" name="file" required>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('message.close_btn')}}</button>
                <button type="submit" class="btn btn-primary">{{__('message.save')}}</button>
              </div>
            </div>
          </form>
          </div>
        </div>
  </div>
</div>
</div>
</div>


<script>
    $(document).ready(function(){
function fetch_data(page,query)
{
$.ajax({
 url:"/pagination/fetch_data?page="+page+"&query="+query,
 success:function(data)
 {
  // console.log(data);
  $('tbody').html('');
  $('tbody').html(data);
 }
})
}

$(document).on('keyup', '#search', function(){
var query = $('#search').val();
var page = $('#hidden_page').val();
fetch_data(page,query);
});


$(document).on('click', '.pagination a', function(event){
event.preventDefault();
var page = $(this).attr('href').split('page=')[1];
$('#hidden_page').val(page);
var query = $('#search').val();
console.log(page);
console.log(query);
fetch_data(page,query);

//  var str = '/pagination/fetch_data?page=3'
//   var array = str.split("page=")[0];
//   console.log(array);
});

});
</script>
@endsection
