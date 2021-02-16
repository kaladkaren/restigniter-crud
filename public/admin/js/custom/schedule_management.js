$(document).ready(function() {
  //Updating
  $('.view-row').on('click', function(){
  	$('.modal').modal()
    $('#main-form')[0].reset() // reset the form
    $('h4.modal-title').text('View Details')
    $('.details').css('display', 'block')
    $('.tag-paid').css('display', 'none')

    const payload = $(this).data('payload')

    $('input[name=name]').removeAttr('required')
    $('input[name=email]').removeAttr('required')
    $('input[name=contact_num]').removeAttr('required')
    $('input[name=password]').removeAttr('required')
    $('input[id=confirm_password]').removeAttr('required')

    $('input[name=name]').val(payload.name)
    $('input[name=email]').val(payload.email)
    $('input[name=contact_num]').val(payload.contact_num)

    $('select[name=user_type] option').each(function() {
      $(this).removeAttr('selected')
    });
    $('select[name=user_type] option').filter(function () { return $(this).html() == payload.user_type; }).attr('selected', 'selected')

    $('#main-form').attr('action', base_url + 'cms/admin/update/' + payload.id)
    $('.modal').modal()
  })

  // adding 
  $('.add-btn').on('click', function(){
    $('.modal').modal()
    $('#main-form')[0].reset() // reset the form
    $('h4.modal-title').text('Add Schedule')
    $('.tag-paid').css('display', 'block')
    $('.details').css('display', 'none')
    
    const payload = $(this).data('payload')

  })

  //Deleting
  $('.tag-picked').on('click', function(){
    let p = prompt("Are you sure you want to tag this as picked up? Type YES to continue", "");
    if (p === 'YES') {
      const id = $(this).data('id')
      console.log(id);

      invokeForm(base_url + 'cms/schedule/tag_as_picked_up', {id: id});
    }

  })

  $('#main-form').on('submit', function (){

    let p = $('input[name=password]').val()
    let cp = $('input[id=confirm_password]').val()

    if (!(p === cp)) {
      alert('Passwords don\'t match')
      return false
    }

  })

})
