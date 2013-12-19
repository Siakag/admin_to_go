$(function ()
{
  $('#contactMe > #submit').click(function(event)
  {
    if( checkFields('#contactMe') && pNumValidLength('#pnumber0', '#pnumber1', '#pnumber2') )
    {
      $('#formError').html('');
      submitContactForm('#contactMe');
      $('#contactMe').hide();
      $('#underForm, #loader').show();
    }
  });

  autoAdvance('.tels');
})


// submit contact form
function submitContactForm(form)
{
  var f = $(form);
  var u = f.attr('action');
  var t = f.attr('method');
  var d = f.serialize();
  var fields = f.find('input, textarea');
  fields.prop('disabled', true);

  $.post(u, d, function(data)
    {
      $('#contactMe').fadeOut();
    })
    .done(function()
    {
      console.log('success');
    })
    .fail(function()
    {
      console.log('failed');
    })
    .always(function(data)
    {
      $('#loader').hide();
      $('#formMessage').html(data).fadeIn();
      console.log('always');
      setTimeout(function()
        {
          $('#contactMe').find('input[type=text], input[type=tel], textarea').val('');
          $('#refreshForm').fadeIn();
          fields.prop('disabled', false);
        }, 5000);
    });
}


// check for empty fields
function checkFields(form)
{
  var f = $(form);
  var fields = f.serializeArray();
  var i;
  var err = '';
  var pass = true;

  for(i = 0; i < fields.length; i++ )
  {
    var labelName = '#' + fields[i].name + 'label';
    var labelText = $(labelName).text();

    if(fields[i].value === '' || fields[i].value === null)
    {
      if(labelName === '#pnumber0label' || labelName === '#pnumber1label' || labelName === '#pnumber2label')
      {
        labelText = 'Phone number';
        err += labelText + " is invalid. Please enter a complete phone number including area code.";
        pass = false;
        $('#formError').html(err);
        return pass;
      }
      else
      {
        pass = false;
        err += labelText + " field is required.";
        $('#formError').html(err);
        return pass;
      }
    }
  }
  return pass;
}


// numeric input only
function isNum(e)
{
  var charCode = e.which || event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;

  return true;
}

// auto advance input
function autoAdvance(els)
{
  var e = els;
  $(e).keyup(function(event)
  {
    if($(this).val().length === $(this).prop('maxlength'))
    {
      if(event.keyCode === 16 || event.keyCode === 9) return;

      $(this).next().focus();
    }
  })
}


// phone number length checks
function pNumValidLength(area, prefix, last)
{
  a = $.trim( $(area).val() ).length;
  p = $.trim( $(prefix).val() ).length;
  l = $.trim( $(last).val() ).length;
  goodNums = (a === 3 && p === 3 && l === 4) ? true : false;

  if(goodNums)
  {
    return true;
  }

  err = "Phone number is invalid. Please enter a complete phone number including area code.";
  $('#formError').show().html(err);
  return false;
}

(function refreshFormTag()
{
  $('#refreshFormTag').click(function(event)
  {
    $('#contactMe').fadeIn();
    $('#underForm, #formMessage, #refreshForm').hide();
    event.preventDefault();
  })
})()