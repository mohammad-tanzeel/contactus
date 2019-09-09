/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


    function submitEnquiry(){
        var contact_name = document.getElementById('contact_name').value;
        var company_name = document.getElementById('company_name').value;
        var address = document.getElementById('address').value;
        var email = document.getElementById('email').value;
        var mobile = document.getElementById('mobile').value;
        var requirement = document.getElementById('requirement').value;
        var attachmentV1 = document.getElementById('attachment1').value;
        var attachment1 = $('#attachment1').prop('files')[0];
         
        var formData = new FormData();
        formData.append("function", 'submit_validate');
        formData.append("contact_name", contact_name);
        formData.append("company_name", company_name);
        formData.append("address", address);
        formData.append("email", email);
        formData.append("mobile", mobile);
        formData.append("requirement", requirement);
        formData.append("attachment1", attachment1);
        
        var reg = /(.*?)\.(jpg|bmp|jpeg|png|JPG|BMP|JPEG|PNG)$/;
       
       if(attachmentV1!='')
       {
           if(!attachmentV1.match(reg)){
            alert("Invalid File");
    	    return false;
           } else {
              
              $.ajax({
                        url: 'submit.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
           }
    	   
       }
       else {
//        console.log(attachment1);
//        console.log(attachment1.name);
//        
            
       }
        alert('Hi');
    }
