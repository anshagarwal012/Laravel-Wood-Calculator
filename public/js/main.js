$(document).ready(async function () {
    //Boot
    ok_console_stamp()

    if (window.location.pathname == '/get') {
        read_data(window.location.origin + '/api/woodentry');
    }
    $('.circle_wood').hide();

    // Main Actions
    $('.cutsize .add_more').on('click', function () {
        var total = 1;
        var d = ['<tr>'];
        ['width', 'thick', 'length', 'quantity'].map(e => {
            l = parseFloat($('.' + e).val()) ? parseFloat($('.' + e).val()) : 1
            if (e == 'quantity') {
                total = (total / 144) * l
            } else {
                total = total * l
            }
            d.push(`<td>${$('.' + e).val() ? $('.' + e).val() : 0}</td>`)
            $('.' + e).val('')
        })
        d.push('<td>' + total.toFixed(2) + '</td><td><button class="btn delete btn-danger">Delete</button></td></tr>')
        $('table.cutsize').append(d.join(''))
    })
    $('.circle_wood .add_more').on('click', function () {
        var length = $(this).parent('div ').parent('div').find('.length').val();
        var perimeter = $(this).parent('div').parent('div').find('.perimeter').val();
        var quantity = $(this).parent('div').parent('div').find('.quantity').val();
        d = `<tr><td>${length}</td><td>${perimeter}</td><td>${quantity}</td><td>${((((perimeter / 4) ** 2) / 10000) * length * quantity).toFixed(3)}</td><td><button class="btn delete btn-danger">Delete</button></td></tr>`;
        $('table.circle_wood').append(d)
        $('.length').val('');
        $('.perimeter').val('');
        $('.quantity').val('');
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
            data = tableToJson($('table')[0])
        } else {
            data = tableToJson($('table')[1])
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


    // Universal Events
    $(document).on('click', '.delete', function () {
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

function tableToJson(table) {
    var data = [];
    for (var i = 1; i < table.rows.length; i++) {
        var tableRow = table.rows[i];
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
async function read_data(endpoint) {
    await fetch(endpoint)
        .then((response) => response.json())
        .then((data) => {
            const d = data.map((e, i) => {
                i++
                return `<tr><td>${i}</td><td>${e.created_at.split('T')[0]}</td><td>${e.CompanyName}</td><td>${e.Address}</td><td>${e.MobileNumber}</td><td>${e.type == 'cut_size' ? 'Cut Size' : 'Circle Wood'}</td><td>${e.DriverName}</td><td>${e.Residences}</td><td>${e.VehicleNumber}</td><td>${e.LicenseNumber}</td><td>${e.RTO}</td><td>${e.VehicleName}</td><td><a href="/get/${e.id}" class="btn delete btn-primary">View</a></td></tr>`;
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