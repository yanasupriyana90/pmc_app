// Search Bank Account
$(document).ready(function () {
  //Array of Values
  $("#name_bank").autocomplete({
    source: function (request, cb) {
      $.ajax({
        // url: '/jobSheetCreate/get-shippers/' + request.term,
        url: '/cashInBankCreate/get-bankAccounts/' + request.term,
        // url: '{{ route("getBankAccounts") }}' + request.term,
        method: 'GET',
        dataType: 'json',
        success: function (res) {
          var result;
          result = [
            {
              label: 'There Is No Matching Record Found For ' + request.term,
              value: ''
            }
          ];

          console.log(res);


          if (res.length) {
            result = $.map(res, function (obj) {
              return {
                label: obj.name_bank,
                value: obj.name_bank,
                data: obj
              };
            });
          }
          cb(result);
        }
      });
    },
    select: function (e, selectedData) {
      console.log(selectedData);

      if (selectedData && selectedData.item && selectedData.item.data) {
        var data = selectedData.item.data;

        $('#bank_account_id').val(data.id);
        $('#name_bank').val(data.name_bank);
        $('#no_account').val(data.no_account);
        $('#name_account').val(data.name_account);

      }
    }
  });
});

$(function () {

  //Date picker Transaction Date
  $('#date_trans').datetimepicker({
    // format: 'MM-DD-YYYY',
    format: 'YYYY-MM-DD',
    autoclose: true,
  });

});
