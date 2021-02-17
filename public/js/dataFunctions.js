  function numberValidator()
  {
    var div = $(this).parent().parent();
    if(frm.amount.value=="")
    {
      event.preventDefault()
      alert("Amount can not be empty");
      frm.amount.focus();
    }
    if(isNaN(frm.amount.value))
    {
      event.preventDefault()
      alert("Invalid Amount");
      frm.amount.focus();
      return false;
    }
    if(frm.amount.value < 1)
    {
      event.preventDefault()
      alert("Invalid Amount");
      frm.amount.focus();
      return false;
    }
    if(frm.year.value=="")
    {
      event.preventDefault()
      alert("Please select year");
      frm.year.focus();
      return false;
    }
    if(frm.months_count.value=="")
    {
      event.preventDefault()
      alert("Please select at least one month");
      frm.months_count.focus();
      return false;
    }
    if(isNaN(frm.number.value))
    {
      event.preventDefault()
      alert("Invalid Phone Number");
      frm.number.focus();
      return false;
    }
    if(frm.number.value=="")
    {
      event.preventDefault()
      alert("Phone number can not be empty");
      frm.number.focus();
    }
    if((frm.number.value).length != 12)
    {
      event.preventDefault()
      alert("Phone number length does not meet criteria");
      frm.number.focus();
      return false;
    }
    $('#loader').show();
    return true;
  }

  function numberValidator_2()
  {
    var div = $(this).parent().parent();
    if(frm_2.account_id_2.value=="")
    {
      event.preventDefault()
      alert("Please Select an account");
      frm_2.account_id_2.focus();
      return false;
    }
    if(frm_2.amount_2.value=="")
    {
      event.preventDefault()
      alert("Amount can not be empty");
      frm_2.amount_2.focus();
      return false;
    }
    if(isNaN(frm_2.amount_2.value))
    {
      event.preventDefault()
      alert("Invalid Amount");
      frm_2.amount_2.focus();
      return false;
    }
    if(frm_2.amount_2.value < 1)
    {
      event.preventDefault()
      alert("Invalid Amount");
      frm_2.amount_2.focus();
      return false;
    }
    if(frm_2.year_2.value=="")
    {
      event.preventDefault()
      alert("Please select year");
      frm_2.year_2.focus();
      return false;
    }
    if(frm_2.months_count_2.value=="")
    {
      event.preventDefault()
      alert("Please select at least one month");
      frm_2.months_count_2.focus();
      return false;
    }
    if(isNaN(frm_2.number_2.value))
    {
      event.preventDefault()
      alert("Invalid Phone Number");
      frm_2.number_2.focus();
      return false;
    }
    if(frm_2.number_2.value=="")
    {
      event.preventDefault()
      alert("Phone number can not be empty");
      frm_2.number_2.focus();
    }
    if((frm_2.number_2.value).length != 12)
    {
      event.preventDefault()
      alert("Phone number length does not meet criteria");
      frm_2.number_2.focus();
      return false;
    }
    $('#loader_2').show();
    return true;
  }


function complete()
{
  var CheckoutID = document.getElementById('CheckoutRequestID').value;
  var data = document.getElementById('data').value;

        $.ajax({
            type:'get',
            url:'{!!URL::to("admin/payments/confirmpayment")!!}',
            data:{'id':CheckoutID,'data':data},

            beforeSend: function(){
              $('#first').hide();
              $('#maq').hide();
              $('#loader').show();
            },
            complete: function(){
              $('#loader').hide();
            },
            success: function(data4){
             if(Object.keys(data4).length === 0)
             {
                  var output = ""; 
                      output += ` <div class="alert alert-warning alert-dismissible" >
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-info"></i> Alert</h5>
                                  No Payment received yet ! Please keep clicking the complete button if you have received an M-PESA message.
                                 </div>`;

                  $("#results").html(output);
             }
             else
             {
              if(data4.ResultCode == 0)
                {
                      var output = ""; 
                          output += ` <div class="alert alert-success alert-dismissible" >
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fas fa-check"></i> Success</h5>
                                      Payment received successfully
                                    </div>`;

                      $("#results").html(output);
                      $('#finish').show();
                      $('#validate').hide();
                }
                else
                {
                      var output = ""; 
                          output += '<div class="alert alert-danger alert-dismissible">';
                          output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                          output += '<h5><i class="icon fas fa-info"></i> Alert</h5>';
                          output +=  data4.ResultDesc;       
                          output +=  '</div>';

                      $("#results").html(output);
                }
             }
             
             
            },
            error:function()
            {
              $("#results").html("error");
            }
        });
  }


  function complete_2()
{
  var CheckoutID = document.getElementById('CheckoutRequestID_2').value;
  var data = document.getElementById('data_2').value;

        $.ajax({
            type:'get',
            url:'{!!URL::to("admin/payments/confirmpayment")!!}',
            data:{'id':CheckoutID,'data':data},

            beforeSend: function(){
              $('#first_2').hide();
              $('#maq_2').hide();
              $('#loader_2').show();
            },
            complete: function(){
              $('#loader_2').hide();
            },
            success: function(data4){
             if(Object.keys(data4).length === 0)
             {
                  var output = ""; 
                      output += ` <div class="alert alert-warning alert-dismissible" >
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                  <h5><i class="icon fas fa-info"></i> Alert</h5>
                                  No Payment received yet ! Please keep clicking the complete button if you have received an M-PESA message.
                                 </div>`;

                  $("#results_2").html(output);
             }
             else
             {
              if(data4.ResultCode == 0)
                {
                      var output = ""; 
                          output += ` <div class="alert alert-success alert-dismissible" >
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fas fa-check"></i> Success</h5>
                                      Payment received successfully
                                    </div>`;

                      $("#results_2").html(output);
                      $('#finish_2').show();
                      $('#validate_2').hide();
                }
                else
                {
                      var output = ""; 
                          output += '<div class="alert alert-danger alert-dismissible">';
                          output += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                          output += '<h5><i class="icon fas fa-info"></i> Alert</h5>';
                          output +=  data4.ResultDesc;       
                          output +=  '</div>';

                      $("#results_2").html(output);
                }
             }
             
             
            },
            error:function()
            {
              $("#results_2").html("error");
            }
        });
  }

