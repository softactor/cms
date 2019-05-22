       <!-- Modal -->
       <?php
       use Illuminate\Support\Facades\DB;
         $eng = DB::table('users')->Join('roles', 'role_id', '=', 'roles.roles_id')->where('role_name','=','engineer')->get();
       ?>
      <meta name="csrf-token" content="{{ csrf_token() }}">
<div id="complainAssign" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title"> Assign to Enginner</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id='modal_body_content'>
                 <div class="alert alert-danger" id="danger">Error! try again </div>
                <div class="alert alert-success" id="success" > Assigned Succesfuly</div>
                 <?php 
                    $url = url('admin/executive/eng_data');
                    $assingUrl = url('admin/executive/assign_complains');
                    $updateStatusUrl = url('admin/executive/update_complains');
                    ?>
                    <form class="form-group" action="{{$assingUrl}}" method="post" style="margin-left:0% " id="assignform">
                         
                    <label >
                        <strong>Select Enginner</strong>
                    </label><br>
                   
                    <select class="custom-select" id="mySelect" name="select" onchange="getval( this ,'{{$url}}');">
                        
                        <option value="">please select one</option>
                        <?php 
                        
                               foreach ($eng as $data){
                        ?>
                        
                        <option id="option"  value="{{$data->id}}">{{$data->name}} </option>
                            <?php
                               }
                               ?>
   

                    </select><br>
                    <label id="nm"><strong>
                            Name:   </strong><label id="name" style="font-style: oblique ;">
                                
                            </label>
                        </label><br>
                        <p id="p"><span style="margin-left: 30%"> ** No user selected **</span></p>
                    <label id="sp"><strong>
                            Specialist:  </strong>  <label  id="special" style="font-style: oblique" >
                                
                            </label>
                            
                        </label><br>
                        
                         <label id="em"><strong>
                            Email:  </strong><label id="emails" style="font-style: oblique">                               
                            </label>                            
                        </label><br>
                  
                        <input type="hidden" name="complain_id" id="cid" style="font-style: oblique" value="" /> 
                         <input type="hidden" id="csrf_token" value="{{ csrf_token() }}" >
                        
                        <label><strong>Dead line</strong></label><br>
                       
  <br/>
  <input class="date form-control" name="dead_line" type="text" id="datepicker"><br>

  <button class="btn btn-success" type="button" onclick="submitD('{{$assingUrl}}','{{$updateStatusUrl}}');"> Assign </button>
                       
                       
                </form>
                
                
                
                
                
                
            </div>
        </div>

    </div>
</div>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
         dateFormat: "yy-mm-dd"
    });
 
  } );
  </script>
 