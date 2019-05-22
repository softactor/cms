<div class="modal fade" id="viewComplain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true" style="width:30%; margin-left:35%;margin-top: 5%">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal_body_content">
               
           
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
    @if (Auth::user()->role_id==('4'))
                      <label style="margin-left: 15%" ><strong>Sender User:</strong> <label id="users">   </label></label> <br>
                      @endif
       <label style="margin-left: 15%" > <strong>Complain Type:</strong> <label id="type">   </label></label> <br>
       <label style="margin-left: 15%" ><strong> Complain Details: </strong><label id="ComplainDetails">   </label></label> <br>
      
              

      
            </div>
        </div>
    </div>
</div>
