$(document).ready(async function () {
  $('.nk-menu-item').removeClass('active');
  let page = window.location.pathname.slice(1) == '' ? 'Wood' : window.location.pathname.slice(1);
  $('.nk-menu-item.' + page).addClass('active')
  const endpoint = '/api/entry'
  const endpoint1 = '/api/circleentry'

  table = '';
  ok_console_stamp()
  if (window.location.pathname == '/Circle_Wood_List') {
    read_data_c(endpoint1)
    setTimeout(() => {
      table = $('table').DataTable(
        {
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'print',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
              customize: function (win) {

                $(win.document.body)
                  .prepend(
                    `<div class="print_page" style="height: 120px;">
                        <img src="https://wood.viralsawmill.in/img/logo.png">
                    </div>`
                  );
                $(win.document.body).find('h1').remove();
              }
            }
          ]
        }
      )
    }, 500);
    $(document).on('click', '.circle_l .delete', e => {
      const id = e.target.attributes[0].value;
      var settings = {
        "url": `${endpoint1}/${id}`,
        "method": "DELETE",
      };
      $.ajax(settings).done(async function (response) {
        toast_delete()
        await sleep(2000)
        location.reload()
      });
    })
    $('.circle_l .search').on('keyup', function () {
      console.log($('.custom-select').val());
      switch ($('.custom-select').val()) {
        case 'Total':
          table.column(5).search($(this).val()).draw();
          break;
        case 'Length':
          table.column(2).search($(this).val()).draw();
          break;
        case 'Perimeter':
          table.column(3).search($(this).val()).draw();
          break;
        case 'Qty':
          table.column(4).search($(this).val()).draw();
          break;
      }
    })
  } else if (window.location.pathname == '/Wood_List') {
    read_data(endpoint)
    setTimeout(() => {
      table = $('table').DataTable(
        {
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'print',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6],
              },
              customize: function (win) {

                $(win.document.body)
                  .prepend(
                    `<div class="print_page" style="height: 120px;">
                        <img src="https://wood.viralsawmill.in/img/logo.png">
                    </div>`
                  );
                $(win.document.body).find('h1').remove();
              }
            }
          ]
        }
      )
    }, 500);
  }

  $(document).on('click', '.l .delete', e => {
    const id = e.target.attributes[0].value;
    var settings = {
      "url": `${endpoint}/${id}`,
      "method": "DELETE",
    };
    $.ajax(settings).done(async function (response) {
      toast_delete()
      await sleep(2000)
      location.reload()
    });
  })
  $('.l .search').on('keyup', function () {
    switch ($('.custom-select').val()) {
      case 'Total':
        table.column(6).search($(this).val()).draw();
        break;
      case 'Length':
        table.column(2).search($(this).val()).draw();
        break;
      case 'Thick':
        table.column(3).search($(this).val()).draw();
        break;
      case 'Width':
        table.column(4).search($(this).val()).draw();
        break;
      case 'Qty':
        table.column(5).search($(this).val()).draw();
        break;
    }
  })


  $(document).on('click', '.add_circle', e => {
    const length = $('.circle input#length').val()
    const perimeter = $('.circle input#perimeter').val()
    const qty = $('.circle input#qty').val()
    var settings = {
      "url": endpoint1,
      "method": "POST",
      "headers": {
        "Content-Type": "application/json"
      },
      "data": JSON.stringify({
        "length": length,
        "perimeter": perimeter,
        "qty": qty
      }),
    };
    $('input#length').val('')
    $('input#perimeter').val('')
    $('input#qty').val('')
    $.ajax(settings).done(function (response) {
      toast();
    });
  })

  $(document).on('click', '.add', e => {
    const length = $('input#length').val()
    const breath = $('input#breath').val()
    const height = $('input#height').val()
    const qty = $('input#qty').val()
    var settings = {
      "url": endpoint,
      "method": "POST",
      "headers": {
        "Content-Type": "application/json"
      },
      "data": JSON.stringify({
        "length": length,
        "breath": breath,
        "height": height,
        "qty": qty
      }),
    };
    $('input#length').val('')
    $('input#breath').val('')
    $('input#height').val('')
    $('input#qty').val('')
    $.ajax(settings).done(function (response) {
      toast()
    });
  })

  await sleep(200)
  $('.loading').hide();
});

function ok_console_stamp() {
  console.log('%c Developed By Ansh ', 'background: #E28564; color: #333; font-weight: bold; text-transform: uppercase;padding:2.5px 10px;border-radius:5px;');
}

function read_data(endpoint) {
  fetch(endpoint)
    .then((response) => response.json())
    .then((data) => {
      const d = data.map((e, i) => {
        i++
        return `<tr><td>${i}</td><td>${date(e.created_at)}</td><td>${e.length}</td><td>${e.breath}</td><td>${e.height}</td><td>${e.qty}</td><td>${((parseFloat(e.length) * parseFloat(e.breath) * parseFloat(e.height)) / 144) * e.qty}</td><td><button data-id="${e.id}" class="btn delete btn-danger">Delete</button></td></tr>`;
      });
      $('table tbody').html(d)
    });
}

function read_data_c(endpoint) {
  fetch(endpoint)
    .then((response) => response.json())
    .then((data) => {
      const d = data.map((e, i) => {
        i++
        return `<tr><td>${i}</td><td>${date(e.created_at)}</td><td>${e.length}</td><td>${e.perimeter}</td><td>${e.qty}</td><td>${((parseInt(e.length) / 12) * 2 * parseInt(e.perimeter)) / 2304}</td><td><button data-id="${e.id}" class="btn delete btn-danger">Delete</button></td></tr>`;
      });
      $('table tbody').html(d)
    });
}

function date(d) {
  var date = d.split('T');
  var time = date[1].split('.')
  return date[0] + ' ' + time[0]
}

function toast() {
  NioApp.Toast("Data Inserted Successfully!", "success");
}
function toast_delete() {
  NioApp.Toast("Data Deleted Successfully!", "success");
}
const sleep = m => new Promise(r => setTimeout(r, m))