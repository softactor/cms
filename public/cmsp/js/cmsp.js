/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function OpenComplainTypeEditModal(url, row_id){
    $.ajax({
        url         :   url,
        type        :   'GET',
        dataType    :  'json',
        data        : 'row_id='+row_id,
        success     : function(response){
            console.log(response);
            $('#complainTypeEdit').modal('show');
            $('#modal_body_content').html(response.data);
        }
    });
}

