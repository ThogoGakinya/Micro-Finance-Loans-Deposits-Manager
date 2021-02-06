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
  function complete()
{
  var CheckoutID = document.getElementById('CheckoutRequestID').value;

        $.ajax({
            type:'get',
            url:'{!!URL::to("confirmpayment")!!}',
            data:{'id':CheckoutID},

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
                  $('#finish').show();
                  $('#validate').hide();
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