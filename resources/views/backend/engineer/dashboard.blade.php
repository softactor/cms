@extends('cms.layouts.app')
@section('content')

<style>

    .ellipsis {
    max-width: 40px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

    .project-tab {
    padding: 10%;
    margin-top: -8%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid !important;
    font-size: 16px;
    font-weight: bold;
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: none;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;
}
</style>
  <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" >
<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><span id="myspan" class="badge badge-danger"></span>New </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Accpeted</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table id="mytable"class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Complain Type</th>
                                            <th>Complain Details</th>
                                            <th>DeadLine</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php
                    $Viewurl = url('admin/executive/viewComplains');
                    $accepted = url('engineer/accepted');
                    $updateComplainStatus = url('engineer/update_complain');
                    ?>
                                       @foreach($data as $list)
                                        
                                 
                                        <tr>
                                            <td>{{$list->complain_type_name}}</td>
                                            <td class="ellipsis">{{$list->complain_details}}</td>
                                            <td>{{$list->dead_line}}</td>
                                            <td><button type="button" class='btn btn-sm btn-info' onclick="ViewComplains('{{$Viewurl}}','{{$list->details_id}}');" >View</button>
                                                <button type="button" class='btn btn-sm btn-success'id="btnSubmit" onclick="accepted('{{$accepted}}','{{$list->assing_id}}','{{$updateComplainStatus}}');" >Accept</button>
                                            </td>
                          
                                            
                                        </tr>
                                      
                                  
                                     
                                
                                   
                              @endforeach
                                    </tbody>
                                </table>
                            </div>
                           
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Complain Type</th>
                                            <th>Complain Details</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dataAccepted as $data)
                                        <tr id="tr">
                                            <td >{{$data->complain_type_name}}</td>
                                            <td class="ellipsis">{{$data->complain_details}}</td>
                                            <td>{{$data->status}}</td>
                                        </tr>
                                        
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
<script type="text/javascript">
      var rowCount =  document.getElementById('tr').length;
  var span =   document.getElementById('myspan');
  span.valueOf(rowCount);
    </script>
