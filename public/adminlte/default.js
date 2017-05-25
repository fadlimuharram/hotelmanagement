var cekerroreditprofile = $('#erroreditprofile').text();
if (cekerroreditprofile > '0') {
  $('#editprofilemodal').modal('show');
}
$(document).ready(function() {

  $('#hex_color').colorpicker();
  $('.hex_color').colorpicker();

  $('.editiconupload').hide();
  $("input[name='pilihediticon']").on('change', function(event) {
    if ($(this).val()=='kosong') {
      $('.editiconupload').hide('slow');
    }else if ($(this).val()=='replace') {
      $('.editiconupload').show('slow');
    }
  });
});

function hapustype(id,token,type){
  var cnf = confirm('Are You Sure Want To Delete ' + type + ' ?');
  if (cnf) {
    $.ajax({
      url: urltypes + '/' + id,
      type: 'post',
      data: {
        id: id,
        _method: 'delete',
        _token: token
      },
      success: function(msg){
        location.reload();
      }
    });
  }
}

function hapusstatus(id,token,status){
  var conf = confirm('Are You Sure Want To Delete ' + status + ' ?');
  if (conf) {
    $.ajax({
      url: urlstatus + '/' + id,
      type: 'post',
      data: {
        id: id,
        _method: 'delete',
        _token:token
      },
      success: function(msg){
        location.reload();
      }
    });

  }
}

function acceptaccess(id,name,token){
  var conf = confirm('Are You Sure Want To Accept Access User ' + name + ' ? ');
  if (conf) {
    $.ajax({
      url: urlacceptaccess,
      type: 'post',
      data: {
        id: id,
        _token: token
      },
      success: function(){
        location.reload();
      }
    });

  }
}

function revokeaccess(id,name,token){
  var conf = confirm('Are You Sure Want To Revoke Access User ' + name + ' ? ');
  if (conf) {
    $.ajax({
      url: urlrevokeaccess,
      type: 'post',
      data: {
        id: id,
        _token: token
      },
      success: function(){
        location.reload();
      }
    });

  }
}
