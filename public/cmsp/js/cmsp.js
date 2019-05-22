/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function OpenComplainTypeEditModal(url, row_id) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: 'row_id=' + row_id,
        success: function (response) {
            console.log(response);
            $('#complainTypeEdit').modal('show');
            $('#modal_body_content').html(response.data);
        }
    });
}

function updateComplainTypes(url) {
    
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-Token': $('#csrf_token').val()
        },
        data: $('#complain_type_update_form').serialize(),
        success: function (response) {
            if (response.status === 'success') {
                $('.alert').hide();
                $('#success_alert').show();
                $('#success_alert').html(response.message);
//                setTimeout(function () {
//                    location.reload();
//                }, 3000);
            } else if (response.status === 'duplicate_error') {
                $('#danger_alert').show();
                $('#danger_alert').html(response.message);
            }
        }
    });
}

function confirmDeleteOp(url, row_id) {
    swal({
        title: "Are you sure?",
        text: "You want to delete it!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        closeOnConfirm: false
    },
            function () {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: 'id=' + row_id,
                    success: function (response) {
                        $('#table_row_id_' + row_id).hide();
                        swal('Deleted', response.message, 'success');
                    }
                });
            });

}

function OpenUserListViewModal(url, id) { 
    
          $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: 'id=' + id,
        success: function (response) {
            console.log(response.data);
           // console.log(response.data['email']); 
            $('#showmodal').modal('show');
            //$('#modal_body_content').html(response.data);
              $('#emails').html(response.data['email']);
              $('#created_at').html(response.data['created_at']);
              $('#role').html(response.data['role_name']);
        }
    });
 
 }
 
 function complainAssign(id) {
      $('#danger').hide();
                $('#success').hide();
         $('#nm').hide();
      $('#sp').hide();
      $('#em').hide();
           $('#complainAssign').modal('show');
            $('#cid').val(id);
         
           console.log(id);
    
}
function getval(sel,url)
{
  
  var id = sel.value;
 $('#p').hide();
         $('#nm').show();
      $('#sp').show();
      $('#em').show();
      
           $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: 'id=' + id,
        success: function (data) {
        
            $('#name').html(data['0']['name']);
            $('#special').html(data['0']['specialist']);
            $('#emails').html(data['0']['email']);
          
        }
    });
}
 function ViewComplains(url,id){
      $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        data: 'id=' + id,
        success: function (data) {
        $('#viewComplain').modal('show'); 
     console.log(data);
          $('#users').html(data['0']['email']);
          $('#type').html(data['0']['complain_type_name']);
          $('#ComplainDetails').html(data['0']['complain_details']);
        }
    });
     
       
 }
 

 function accepted(url,id){
   
     console.log(id);
         $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-Token': $('#csrf_token').val()
        },
        data:{
            'id':id,
        },
            
        success: function (response) {
           if (response.status === 'success') {
             setTimeout(function () {
                    alert('accepted');
                    location.reload();
              }, 1000);
            } 
       
        }
    });
     
 }
 
 
 
 function submitD (url,urls){
      var date = $('#datepicker').val();
   date = $('#datepicker').val().replace(/\//g, '-')
     $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-Token': $('#csrf_token').val()
        },
        data:{
            'complain_id':$('#cid').val(),
            'select':$('#mySelect').val(),
             'dead_line':date
        },
            
        success: function (response) {
            if (response.status === 'success') {
                $('#success').show();
              setTimeout(function () {
                    alert('assigned');
                    location.reload();
              }, 1000);
            }  
            
           
        }
    });
    
          $.ajax({
        url: urls,
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-Token': $('#csrf_token').val()
        },
        data:{
            'id':$('#cid').val(),            
        },
            
        success: function (response) {
            if (response.status === 'success') {
                $('#success').show();
                setTimeout(function () {
                    location.reload();
              }, 3000);
            }  
           
        }
    });
 }
 
 
 
 function deleteComplain(url,id){
         swal({
        title: "Are you sure?",
        text: "You want to delete it!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        closeOnConfirm: false
    },
            function () {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: 'details_id=' + id,
                    success: function (response) {
                        $('#table_row_id_' + id).hide();
                        swal('Deleted', response.message, 'success');
                    }
                });
            });
     
 }
 
 
 function userDel(url,id){
             swal({
        title: "Are you sure?",
        text: "You want to delete it!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        closeOnConfirm: false
    },
            function () {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: 'id=' + id,
                    success: function (response) {
                        $('#table_row_id_' + id).hide();
                        swal('Deleted', response.message, 'success');
                    }
                });
            });
     
 }