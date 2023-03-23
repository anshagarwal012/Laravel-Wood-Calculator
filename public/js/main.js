$(document).ready(async function () {
    //Boot
    ok_console_stamp()

    // Global Variable
    var tqty = $('.tqty').val() == '' ? 0 : $('.tqty').val();
    var tcuft = $('.tcuft').val() == '' ? 0 : $('.tcuft').val();

    // On Load
    $('.circle_wood').hide();
    if (window.location.pathname == '/get') {
        read_data(window.location.origin + '/api/woodentry');
    }
    if ($('[name="wood"]:checked').val() == 'cwood') {
        $('.cutsize').hide();
        $('.circle_wood').show();
    } else {
        $('.cutsize').show();
        $('.circle_wood').hide();
    }


    // Main Actions
    $('.cutsize .add_more').on('click', function () {
        var total = 1;
        var d = ['<tr>'];
        ['width', 'thick', 'length', 'quantity'].map(e => {
            l = parseFloat($('.' + e).val()) ? parseFloat($('.' + e).val()) : 1
            s = parseFloat($('.' + e).val()) ? parseFloat($('.' + e).val()) : 0
            if (e == 'quantity') {
                total = (total / 144) * l
                tqty += s
            } else {
                total = total * l
            }
            d.push(`<td class="${e}">${$('.' + e).val() ? $('.' + e).val() : 0}</td>`)
            if (!$('.' + e).siblings('input').is(':checked')) {
                $('.' + e).val('')
            }
        })
        d.push('<td class="cuft">' + total.toFixed(2) + '</td><td><button class="btn delete btn-danger">Delete</button></td></tr>')
        $('table .cutsize').siblings('tbody').append(d.join(''))
        tcuft += total
        $('.tqty').val(tqty)
        $('.tcuft').val(tcuft.toFixed(2))
    })
    $('.circle_wood .add_more').on('click', function () {
        var length = parseFloat($(this).parent('div ').parent('div').find('.length').val());
        var perimeter = parseFloat($(this).parent('div').parent('div').find('.perimeter').val());
        var quantity = parseInt($(this).parent('div').parent('div').find('.quantity').val());
        d = `<tr><td class="length">${length}</td><td class="perimeter">${perimeter}</td><td class="quantity">${quantity}</td><td class="cuft">${((((perimeter / 4) ** 2) / 10000) * length * quantity).toFixed(3)}</td><td><button class="btn delete btn-danger">Delete</button></td></tr>`;
        $('table .circle_wood').siblings('tbody').append(d)
        $('.length').val('');
        $('.perimeter').val('');
        $('.quantity').val('');
        tqty += parseInt(quantity)
        tcuft += ((((perimeter / 4) ** 2) / 10000) * length * quantity)
        $('.tqty').val(tqty)
        $('.tcuft').val(tcuft.toFixed(3))
    })
    $('.submit_value').on('click', async function () {
        var CompanyName = $('#CompanyName').val()
        var Address = $('#Address').val()
        var MobileNumber = $('#MobileNumber').val()
        var type = $('[name="wood"]:checked').val();
        var DriverName = $('.DriverName').val();
        var Residences = $('.Residences').val();
        var VehicleNumber = $('.VehicleNumber').val();
        var LicenseNumber = $('.LicenseNumber').val();
        var RTO = $('.RTO').val();
        var VehicleName = $('.VehicleName').val();
        var data
        if (type == 'cut_size') {
            data = tableToJson($('table'))
        } else {
            data = tableToJson($('table'))
        }
        b = {
            "CompanyName": CompanyName,
            "Address": Address,
            "MobileNumber": MobileNumber,
            "type": type,
            "data": data,
            "DriverName": DriverName,
            "Residences": Residences,
            "VehicleNumber": VehicleNumber,
            "LicenseNumber": LicenseNumber,
            "RTO": RTO,
            "VehicleName": VehicleName,
        }
        var url = window.location.origin + '/api/woodentry';
        $.post(url, JSON.stringify(b));
        toast()
        await sleep(1000)
        window.location.reload()
    })
    $('.update_value').on('click', async function () {
        var id = $('#id').val()
        var CompanyName = $('#CompanyName').val()
        var Address = $('#Address').val()
        var MobileNumber = $('#MobileNumber').val()
        var type = $('[name="wood"]:checked').val();
        var DriverName = $('.DriverName').val();
        var Residences = $('.Residences').val();
        var VehicleNumber = $('.VehicleNumber').val();
        var LicenseNumber = $('.LicenseNumber').val();
        var RTO = $('.RTO').val();
        var VehicleName = $('.VehicleName').val();
        var data
        if (type == 'cut_size') {
            data = tableToJson($('table'), 2)
        } else {
            data = tableToJson($('table'), 2)
        }
        b = {
            "CompanyName": CompanyName,
            "Address": Address,
            "MobileNumber": MobileNumber,
            "type": type,
            "data": data,
            "DriverName": DriverName,
            "Residences": Residences,
            "VehicleNumber": VehicleNumber,
            "LicenseNumber": LicenseNumber,
            "RTO": RTO,
            "VehicleName": VehicleName,
        }
        var url = window.location.origin + '/api/woodentry' + "/" + id;
        $.post(url, JSON.stringify(b));
        toast_c("Data Updated Successfully")
        await sleep(1000)
        window.location.href = "/get"
    })
    $('.fixed').on('click', function (e) {
        var da = $(this).siblings('input')
        if (da.val() == '') {
            e.preventDefault();
            toast_c("Value Can't Be Empty")
        } else {
            if ($('.fixed:checked').length > 2) {
                toast_c("You Can Only Fixed 2 Column")
                e.preventDefault();
            } else {
                if ($(this).is(':checked')) {
                    da.attr('disabled', true)
                } else {
                    da.removeAttr('disabled')
                }
            }
        }
    })


    // Universal Events
    $(document).on('click', '.delete', function () {
        var m = $(this).parent('td').parent('tr');
        tqty -= parseInt(m.find('.quantity').html())
        tcuft -= parseFloat(m.find('.cuft').html())
        $('.tqty').val(tqty)
        $('.tcuft').val(tcuft.toFixed(3))
        $(this).parent('td').parent('tr').remove();
    })

    $('[name="wood"]').on('change', function () {
        if ($(this).val() == 'cwood') {
            $('.cutsize').hide();
            $('.circle_wood').show();
        } else {
            $('.cutsize').show();
            $('.circle_wood').hide();
        }
    })

    await sleep(200)
    $('.loading').hide();

})
const sleep = m => new Promise(r => setTimeout(r, m))

function ok_console_stamp() {
    console.log('%c Developed By Ansh ', 'background: #E28564; color: #333; font-weight: bold; text-transform: uppercase;padding:2.5px 10px;border-radius:5px;');
}

function tableToJson(table, n = 1) {
    var data = [];
    for (var i = n; i < table[0].rows.length; i++) {
        var tableRow = table[0].rows[i];
        var rowData = [];
        for (var j = 0; j < tableRow.cells.length - 1; j++) {
            rowData.push(tableRow.cells[j].innerHTML);
        }
        data.push(rowData);
    }
    return data;
}
function toast() {
    NioApp.Toast("Data Inserted Successfully!", "success");
}
function toast_c(d) {
    NioApp.Toast(d, "success");
}
async function read_data(endpoint) {
    await fetch(endpoint)
        .then((response) => response.json())
        .then((data) => {
            const d = data.reverse().map((e, i) => {
                i++
                return `<tr><td>${i}</td><td>${e.created_at.split('T')[0]}</td><td><a target="_blank" href="/get/${e.id}" class="text-bold">${e.CompanyName}</a></td><td>${e.Address}</td><td>${e.MobileNumber}</td><td>${e.type == 'cut_size' ? 'Cut Size' : 'Circle Wood'}</td><td>${e.DriverName}</td><td>${e.Residences}</td><td>${e.VehicleNumber}</td><td>${e.LicenseNumber}</td><td>${e.RTO}</td><td>${e.VehicleName}</td><td><a href="/get/update/${e.id}" class="btn btn-primary">Edit</a><a href="/get/delete/${e.id}" class="btn btn-danger delete">Delete</a></td></tr>`;
            });
            $('table tbody').html(d)
            $('table').DataTable({
                columnDefs: [
                    {
                        target: 5,
                        visible: false,
                    }
                ],
            })
        });
}
function printPromot() {
    setTimeout(() => {
        window.print();
    }, 200);
}