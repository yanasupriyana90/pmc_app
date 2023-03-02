// Validation Delete
$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are You Sure ?',
            text: "Delete This Data ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete It !'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })


    });

});

// Validation Change Status
$(function () {
  $(document).on('click', '#changeStatus', function (e) {
      e.preventDefault();
      var link = $(this).attr("href");


      Swal.fire({
          title: 'Are You Sure ?',
          text: "Change This Status ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Change It !'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = link
              Swal.fire(
                  'Updated !',
                  'Your file has been updated.',
                  'success'
              )
          }
      })


  });

});

// Revenue Of Sales / Ocean Freight
// Selling Rate
$(function () {
    $(document).ready(function () {
        var id = 0;
        $('#addButtonOceanFreight').click(function () {
            id++;
            $('#add_input_ocean_freight').append(`<div class="form-group row" id="formOceanFreight_SellingRate` + id + `" name="formOceanFreight_SellingRateName[` + id + `]">
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control form-control-sm select2"
                  style="width: 100%;">
                  <option selected="selected"></option>
                  <option>OCEAN FREIGHT ALL IN
                  </option>
                  <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                  </option>
                  <option>UNDERNAME
                  </option>
                  <option>LATE PAYMENT
                  </option>
                  <option>SEAL FEE
                  </option>
                  <option>TELEX / SWB FEE
                  </option>
              </select>
          </div>
      </div>
      <div class="col-sm-1">
          <input type="number"
              class="form-control form-control-sm text-uppercase"
              name="undername" id="undername" placeholder="">
      </div>
      <div class="col-sm-0">
          <p style="text-align: center">X</p>
      </div>
      <div class="col-sm-1">
          <div class="form-group">
              <select class="form-control form-control-sm select2"
                  style="width: 100%;">
                  <option selected="selected"></option>
                  <option>USD
                  </option>
                  <option>RP
                  </option>
              </select>
          </div>
      </div>
      <div class="col-sm-1">
          <input type="number" class="form-control form-control-sm"
              id="input#" placeholder="">
      </div>
      <div class="col-sm-0">
          <p style="text-align: center">=</p>
      </div>
      <div class="col-sm-2">
          <div class="input-group input-group-sm mb-3">
              <input type="text" class="form-control" placeholder=""
                  disabled>
          </div>
      </div>
  </div>
                                            `)
        })
        $('#removeButtonOceanFreight').click(function () {
            $('#formOceanFreight_SellingRate' + id).remove();
            id--
        });
    });
});

// Revenue Of Sales / EMKL
// Selling Rate
$(function () {
    $(document).ready(function () {
        var id = 0;
        $('#addButtonEmkl').click(function () {
            id++;
            $('#add_input_emkl').append(`<div class="form-group row" id="formEmkl_SellingRate` + id + `" name="formEmkl_SellingRateName[` + id + `]">
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control form-control-sm select2"
                  style="width: 100%;">
                  <option selected="selected"></option>
                  <option>OCEAN FREIGHT ALL IN
                  </option>
                  <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                  </option>
                  <option>UNDERNAME
                  </option>
                  <option>LATE PAYMENT
                  </option>
                  <option>SEAL FEE
                  </option>
                  <option>TELEX / SWB FEE
                  </option>
              </select>
          </div>
      </div>
      <div class="col-sm-1">
          <input type="number"
              class="form-control form-control-sm text-uppercase"
              name="undername" id="undername" placeholder="">
      </div>
      <div class="col-sm-0 mr-2">
          <p style="text-align: center">X</p>
      </div>
      <div class="col-sm-0 mr-4">
          <p style="text-align: center">VOLUME</p>
      </div>

      <div class="col-sm-0">
          <p style="text-align: center">=</p>
      </div>
      <div class="col-sm-2">
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text">IDR</span>
              </div>
              <input type="text" class="form-control" disabled>
          </div>
      </div>
  </div>
                                            `)
        })
        $('#removeButtonEmkl').click(function () {
            $('#formEmkl_SellingRate' + id).remove();
            id--
        });
    });
});

// Cost Of Sales
// Buying Rate
$(function () {
    $(document).ready(function () {
        var id = 0;
        $('#addButtonCostOfSales').click(function () {
            id++;
            $('#add_input_cost_of_sales').append(`<div class="form-group row" id="formCostOfSales_BuyingRate` + id + `" name="formCostOfSales_BuyingRateName[` + id + `]">
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control form-control-sm select2"
                  style="width: 100%;">
                  <option selected="selected"></option>
                  <option>OCEAN FREIGHT ALL IN
                  </option>
                  <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                  </option>
                  <option>UNDERNAME
                  </option>
                  <option>LATE PAYMENT
                  </option>
                  <option>SEAL FEE
                  </option>
                  <option>TELEX / SWB FEE
                  </option>
              </select>
          </div>
      </div>
      <div class="col-sm-1">
          <input type="number"
              class="form-control form-control-sm text-uppercase"
              name="undername" id="undername" placeholder="">
      </div>
      <div class="col-sm-0">
          <p style="text-align: center">X</p>
      </div>
      <div class="col-sm-1">
          <div class="form-group">
              <select class="form-control form-control-sm select2"
                  style="width: 100%;">
                  <option selected="selected"></option>
                  <option>USD
                  </option>
                  <option>RP
                  </option>
              </select>
          </div>
      </div>
      <div class="col-sm-1">
          <input type="number" class="form-control form-control-sm"
              id="input#" placeholder="">
      </div>
      <div class="col-sm-0">
          <p style="text-align: center">=</p>
      </div>
      <div class="col-sm-2">
          <div class="input-group input-group-sm mb-3">
              <input type="text" class="form-control" placeholder=""
                  disabled>
          </div>
      </div>
  </div>
                                            `)
        })
        $('#removeButtonCostOfSales').click(function () {
            $('#formCostOfSales_BuyingRate' + id).remove();
            id--
        });
    });
});

// Revenue Of Sales / EMKL
// Buying Rate
$(function () {
    $(document).ready(function () {
        var id = 0;
        $('#addButtonHandling').click(function () {
            id++;
            $('#add_input_handling').append(`<div class="form-group row" id="formHandling_BuyingRate` + id + `" name="formHandling_BuyingRateName[` + id + `]">
      <div class="col-sm-3">
          <div class="form-group">
              <select class="form-control form-control-sm select2"
                  style="width: 100%;">
                  <option selected="selected"></option>
                  <option>OCEAN FREIGHT ALL IN
                  </option>
                  <option>EMKL / OVERNIGHT TRUCKING (ESPU)
                  </option>
                  <option>UNDERNAME
                  </option>
                  <option>LATE PAYMENT
                  </option>
                  <option>SEAL FEE
                  </option>
                  <option>TELEX / SWB FEE
                  </option>
              </select>
          </div>
      </div>
      <div class="col-sm-1">
          <input type="number"
              class="form-control form-control-sm text-uppercase"
              name="undername" id="undername" placeholder="">
      </div>
      <div class="col-sm-0 mr-2">
          <p style="text-align: center">X</p>
      </div>
      <div class="col-sm-0 mr-4">
          <p style="text-align: center">VOLUME</p>
      </div>

      <div class="col-sm-0">
          <p style="text-align: center">=</p>
      </div>
      <div class="col-sm-2">
          <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text">IDR</span>
              </div>
              <input type="text" class="form-control" disabled>
          </div>
      </div>
  </div>
                                            `)
        })
        $('#removeButtonHandling').click(function () {
            $('#formHandling_BuyingRate' + id).remove();
            id--
        });
    });
});


// Jobsheet Date
$(function () {

    //Date picker ETD
    $('#etd').datetimepicker({
        // format: 'MM-DD-YYYY',
        format: 'YYYY-MM-DD',
        autoclose: true,
    });

    //Date picker Stuffing Date
    $('#stuffing_date').datetimepicker({
        // format: 'MM-DD-YYYY',
        format: 'YYYY-MM-DD',
        autoclose: true,
    });

    $('#issue_date').datetimepicker({
        // format: 'MM-DD-YYYY',
        format: 'YYYY-MM-DD',
        autoclose: true,
    });

    $('#due_date').datetimepicker({
        // format: 'MM-DD-YYYY',
        format: 'YYYY-MM-DD',
        autoclose: true,
    });

    //Date and time picker Open CY
    $('#open_cy').datetimepicker({
        // format: 'MM-DD-YYYY HH:mm',
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: 'far fa-clock'
        },
        autoclose: true,
    });

    //Date and time picker Open CY
    $('#closing_doc').datetimepicker({
        // format: 'MM-DD-YYYY HH:mm',
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: 'far fa-clock'
        },
        autoclose: true,
    });

    // Date and time picker Open CY
    $('#closing_cy').datetimepicker({
        // format: 'MM-DD-YYYY HH:mm',
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: 'far fa-clock'
        },
        autoclose: true,
    });

    //Date picker ETD
    $('#date_report').datetimepicker({
      // format: 'MM-DD-YYYY',
      format: 'YYYY-MM-DD',
      autoclose: true,
  });


});


// Search Shipper
$(document).ready(function () {
    //Array of Values
    $("#name_ship").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: '/jobSheetCreate/get-shippers/' + request.term,
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
                                label: obj.name,
                                value: obj.name,
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

                $('#shipper_id').val(data.id);
                $('#name_ship').val(data.name);
                $('#address_ship').val(data.address);
                $('#phone_1_ship').val(data.phone_1);
                $('#phone_2_ship').val(data.phone_2);
                $('#fax_ship').val(data.fax);
                $('#email_ship').val(data.email);
                $('#mandatory_tax_id_ship').val(data.mandatory_tax.name);
                $('#tax_id_ship').val(data.tax_id);

            }
        }
    });
});


// Search Undername M-BL
$(document).ready(function () {
    //Array of Values
    $("#name_und_mbl").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: '/jobSheetCreate/get-undernameMbl/' + request.term,
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
                                label: obj.name,
                                value: obj.name,
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

                $('#undername_mbl_id').val(data.id);
                $('#name_und_mbl').val(data.name);
                $('#address_und_mbl').val(data.address);
                $('#phone_1_und_mbl').val(data.phone_1);
                $('#phone_2_und_mbl').val(data.phone_2);
                $('#fax_und_mbl').val(data.fax);
                $('#email_und_mbl').val(data.email);
                $('#mandatory_tax_id_und_mbl').val(data.mandatory_tax.name);
                $('#tax_id_und_mbl').val(data.tax_id);

            }
        }
    });
});


// Search Undername H-BL
$(document).ready(function () {
    //Array of Values
    $("#name_und_hbl").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: '/jobSheetCreate/get-undernameHbl/' + request.term,
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
                                label: obj.name,
                                value: obj.name,
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

                $('#undername_hbl_id').val(data.id);
                $('#name_und_hbl').val(data.name);
                $('#address_und_hbl').val(data.address);
                $('#phone_1_und_hbl').val(data.phone_1);
                $('#phone_2_und_hbl').val(data.phone_2);
                $('#fax_und_hbl').val(data.fax);
                $('#email_und_hbl').val(data.email);
                $('#mandatory_tax_id_und_hbl').val(data.mandatory_tax.name);
                $('#tax_id_und_hbl').val(data.tax_id);

            }
        }
    });
});

// Search Container Size Type
$(document).ready(function () {
    //Array of Values
    $("#name_cont_size_type").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: '/jobSheetCreate/get-sizeTypeCont/' + request.term,
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
                                label: obj.name,
                                value: obj.name,
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

                $('#cont_size_type_id').val(data.id);
                $('#name_cont_size_type').val(data.name);

            }
        }
    });
});

// Search Type Packaging
$(document).ready(function () {
    //Array of Values
    $("#name_type_pack").autocomplete({
        source: function (request, cb) {
            $.ajax({
                url: '/jobSheetCreate/get-typePack/' + request.term,
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
                                label: obj.name,
                                value: obj.name,
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

                $('#type_packaging_id').val(data.id);
                $('#name_type_pack').val(data.name);

            }
        }
    });
});
