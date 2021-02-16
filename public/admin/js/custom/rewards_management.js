$(document).ready(function() {
  //Updating
  $('.edit-row').on('click', function(){
  	$('.modal').modal()
    $('#main-form')[0].reset() // reset the form
    const payload = $(this).data('payload')
    console.log(payload);

    $('input[name=name]').removeAttr('required')
    $('input[name=description]').removeAttr('required')
    $('input[name=points_need]').removeAttr('required')

    $('input[name=name]').val(payload.name)
    $('input[name=description]').val(payload.description)
    $('input[name=points_need]').val(payload.points_need)

    
    $('#main-form').attr('action', base_url + 'cms/admin/update/' + payload.id)
    $('.modal').modal()
  })

  // Adding
  $('.add-btn').on('click', function() {
  	$('.modal').modal()
    $('#main-form')[0].reset() // reset the form

    $('input[name=name]').attr('required', 'required')
    $('input[name=description]').attr("required", 'required')
    $('input[name=points_need]').attr("required", 'required')

    $('#main-form').attr('action', base_url + 'cms/admin/add')
    
  })

  //Deleting
  $('.btn-delete').on('click', function(){

    let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
    if (p === 'DELETE') {
      const id = $(this).data('id')
      console.log(id);

      invokeForm(base_url + 'cms/admin/delete', {id: id});
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
