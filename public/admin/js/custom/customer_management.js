$(document).ready(function() {

  $('.view-row').on('click', function(){
    $('.modal').modal()
    $('.modal-footer').hide();
    $('#modal-header').text('View Customer Details')
    const payload = $(this).siblings('input[type=hidden]').data('payload')
    $('#main-form')[0].reset() // reset the form

    $('input[name=name]').attr('readonly', 'readonly').val(payload.name)
    $('input[name=email]').attr('readonly', 'readonly').val(payload.email)
    $('input[name=contact_num]').attr('readonly', 'readonly').val(payload.contact_num)

    $('input[name=address]').attr('readonly', 'readonly').val(payload.address)
    $('input[name=num_buckets]').attr('readonly', 'readonly').val(payload.num_buckets)
    $('input[name=total_points]').attr('readonly', 'readonly').val(payload.total_points)
    $('input[name=remarks]').attr('readonly', 'readonly').val(payload.remarks)

    $('select[name=customer_type] option').filter(function () { 
      return $(this).val() == payload.customer_type; }).attr('selected', 'selected')

    $('select#customer_type').attr('disabled', 'disabled')

    // $('input[name="card_type[]"]').each(function () {
    //   if (payload.card_type_arr.indexOf($(this).val()) !== -1) {
    //     $(this).prop('checked', true);
    //   }
    // })
    $('.password_panel').css('display', 'none')

    if (payload.profile_picture == null ) {
      $('#img_src').show().attr('src', base_url + 'public/admin/img/default.png')
      $('#img_link').show().attr('href', base_url + 'public/admin/img/default.png')
    } else {
      $('#img_src').show().attr('src', payload.profile_picture)
      $('#img_link').show().attr('href', payload.profile_picture)
    }

  })

  $('.modal').on('hidden.bs.modal', function () {
    $('select[name=promo_id] option:selected').removeAttr('selected');
  })

  $('.edit-row').on('click', function(){
    $('#modal-header').text('Edit member')
    const payload = $(this).siblings('input[type=hidden]').data('payload')
    $('#main-form')[0].reset() // reset the form
    $('select[name=promo_id] option').each(function() {
      $(this).removeAttr('selected')
    });

    $('input[name=name]').removeAttr('readonly', 'readonly').val(payload.name)
    $('input[name=email]').removeAttr('readonly', 'readonly').val(payload.email)
    $('input[name=contact_num]').removeAttr('readonly', 'readonly').val(payload.contact_num)

    $('input[name=address]').removeAttr('readonly', 'readonly').val(payload.address)
    $('input[name=num_buckets]').removeAttr('readonly', 'readonly').val(payload.num_buckets)
    $('input[name=total_points]').removeAttr('readonly', 'readonly').val(payload.total_points)
    $('input[name=remarks]').removeAttr('readonly', 'readonly').val(payload.remarks)

    $('select[name=customer_type] option').filter(function () { 
      return $(this).val() == payload.customer_type; }).attr('selected', 'selected')

    $('select#customer_type').removeAttr('disabled', 'disabled')

    $('.password_panel').css('display', 'block')

    if (payload.profile_picture == null ) {
      $('#img_src').show().attr('src', base_url + 'public/admin/img/default.png')
      $('#img_link').show().attr('href', base_url + 'public/admin/img/default.png')
    } else {
      $('#img_src').show().attr('src', payload.profile_picture)
      $('#img_link').show().attr('href', payload.profile_picture)
    }

    $('.modal-footer').show();
    $('#main-form').attr('action', base_url + 'cms/entries/update/' + payload.id)
    $('.modal').modal()
  })


})
