$(document).ready(function () {
    var rowcount, addBtn, tableBody, imgPath;

    addBtn = $("#addNew");
    rowcount = $("#autocomplete_table tbody tr").length + 1;
    tableBody = $("#autocomplete_table tbody");
    imgPath = $("#imgPath").val();


    function formHtml() {
        html = '<tr id="row_' + rowcount + '">';
        html += '<th id="delete_' + rowcount + '" scope="row" class="delete_row"><img src="' + imgPath + '" alt=""></th>';
        html += '<td>';
        html += '<input type="text" name="contSeal[]" id="contSeal_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" name="qty[]" id="qty_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" name="typePackNameCont[]" data-field-name="name" id="typePackNameCont_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td hidden>';
        html += '<input type="text" name="typePackIdCont[]" data-field-name="id" id="typePackIdCont_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" name="grossWeight[]" id="grossWeight_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<select name="gross_type[]" id="gross_type_'+rowcount+'" class="form-control form-control-sm"><option selected="selected">KGS</option><option>LB/LBS</option><option>M/T (M PER T)</option></select>';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" name="netWeight[]" id="netWeight_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<select name="net_type[]" id="net_type_'+rowcount+'" class="form-control form-control-sm"><option selected="selected">KGS</option><option>LB/LBS</option><option>M/T (M PER T)</option></select>';
        html += '</td>';
        html += '<td>';
        html += '<input type="text" name="measurement[]" id="measurement_'+rowcount+'" class="form-control form-control-sm autocomplete_txt text-uppercase" autocomplete="off">';
        html += '</td>';
        html += '<td>';
        html += '<select name="measurement_type[]" id="measurement_type_'+rowcount+'" class="form-control form-control-sm"><option selected="selected">CBM</option><option>CBF</option></select>';
        html += '</td>';
        html += '</tr>';
        rowcount++;
        return html;
    }

    function addNewRow() {
        var html = formHtml();
        //console.log(html);
        tableBody.append(html);
    }

    function deleteRow() {
        // var  rowNo;
        // id = $(this).attr('id');
        // console.log(id);
        // idArr = id.split("_");
        // console.log(idArr);
        // rowNo = idArr[idArr.length - 1];
        // console.log(rowNo);
        // $("#row_"+rowNo).remove();

        console.log($(this).parent());
        $(this).parent().remove();
    }

    function getId(element) {
        var id, idArr;
        id = element.attr('id');
        idArr = id.split("_");
        return idArr[idArr.length - 1];
    }

    function handleAutocomplete() {
        var fieldName, currentEle;
        currentEle = $(this);
        fieldName = currentEle.data('field-name');

        if (typeof fieldName === 'undefined') {
            return false;
        }

        currentEle.autocomplete({
            source: function (data, cb) {
                console.log(data);

                $.ajax({
                    url: '/jobSheetCreate/get-typePackConts',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        name: data.term,
                        fieldName: fieldName
                    },
                    success: function (res) {
                        var result;
                        result = [
                            {
                                label: 'There is no matching record found for ' + data.term,
                                value: ''
                            }
                        ];

                        if (res.length) {
                            result = $.map(res, function (obj) {

                                return {
                                    label: obj[fieldName],
                                    value: obj[fieldName],
                                    data: obj
                                };
                            });
                        }
                        cb(result);
                    }
                });
            },
            autoFocus: true,
            minLength: 1,
            select: function (event, selectedData) {
                if (selectedData && selectedData.item && selectedData.item.data) {
                    console.log(selectedData);
                    var rowNo, data;
                    rowNo = getId(currentEle);
                    data = selectedData.item.data;
                    $('#typePackNameCont_' + rowNo).val(data.name);
                    $('#typePackIdCont_' + rowNo).val(data.id);
                    // $('#netTypeWeightName_' + rowNo).val(data.code_weight);
                    // $('#netTypeWeightId_' + rowNo).val(data.id);
                }
            }
        });
    }

    function registerEvents() {
        addBtn.on("click", addNewRow);
        $(document).on('click', '.delete_row', deleteRow);
        //register autocomplete events
        $(document).on('focus', '.autocomplete_txt', handleAutocomplete);
    }
    registerEvents();

});
