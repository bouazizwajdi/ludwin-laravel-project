
$( ".getreport" ).on("change", function() {
        var id= $(this).val();

$.ajax({
  type: 'POST',
  url: ENDPOINT + prefix +"/users/getreport",
  data: {
    "_token": token,
    id: id,
        },
        dataType: 'json',

  success: function(data) {
    console.log(data);
    var group_reports =data.group_reports;
    var html='';
    var checked='';

html+='<div class="row mb-6">   <label class="col-lg-3 col-form-label required fw-semibold fs-6">'+data.list+'</label>    <div class="col-lg-8 fv-row row">';
  $.each(data.reports, function(id, item) {
    checked='';
    if( $.inArray(item.id, group_reports) !== -1 ) {
        checked='checked';
    }
html+='<div class="col-lg-4 form-check form-check-custom  align-items-start pt-4">';
html+='<input class="form-check-input me-3" type="checkbox" name="reports[]" value="'+item.id+'" id="report'+item.id+'" '+checked+'>';
html+='<span class="form-check-label d-flex flex-column align-items-start"><label class="form-check-label text-dark fw-bold fs-5 mb-0" for="report'+item.id+'"> '+item.name+'</label> </span></div>';
  });
  html+='</div></div>';
$("#reports").html(html);
  }
});
    });


$(function() {
    $("#kt_datatable_dom_positioning").DataTable({

      "language": {
        "lengthMenu": "Show _MENU_",
      },

      "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
    });
    });

    setTimeout(() => {
       $(".alert").addClass("alert-close");
      }, "5000");

$( "#role" ).on("change", function() {
        var role= $(this).val();
if(role=='admin')
$(".role").hide();
else
{
$(".role").show();
$(".role").removeClass('d-none');
}
    });
