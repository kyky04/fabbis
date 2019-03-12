function toggleSidebar() {
    if ($('.pusher').hasClass('first-shown')) {
        ('.pusher').removeClass('first-shown')
    }
    if ($('.ui.sidebar').sidebar('is hidden')) {
        $('.pusher').addClass('shown')
        $('.ui.sidebar')
            .sidebar({
                dimPage: false,
                closable: false
            })
            .sidebar('show');
    } else {
        $('.pusher').removeClass('shown')
        $('.ui.sidebar')
            .sidebar({
                dimPage: false,
                closable: false
            })
            .sidebar('hide');
    }
}

function openModal() {
    $('.ui.modal')
        .modal({
            observeChanges: true,
            closable: false,
            detachable: false,
            autofocus: false,
            onVisible: function () {
                // $('#dataForm').form({
                //   inline: true,
                //   fields: formRules
                // });

                $('.ui.dropdown').dropdown();
                // $('.date').calendar({
                //   type: 'date',
                //   text: {
                //     months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                //   },
                // });
            }
        })
        .modal('show')
        .modal("refresh");
}



$('.delete.button').on("click", function () {
    swal({
        title: 'Hapus Data',
        text: "Apakah Anda ingin menghapus data ini?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#999',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then(value => {
        if (value) {
            swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    }).catch(swal.noop)
})

$(document).ready(function () {
    $('.pusher').addClass('shown')
    $('.ui.sidebar')
        .sidebar({
            dimPage: false,
            closable: false
        })
        .sidebar('show');

    $('.ui.dropdown').dropdown({
        onChange: function (value) {
            var target = $(this).dropdown();
            if (value != "") {
                target
                    .find('.dropdown.icon')
                    .removeClass('dropdown')
                    .addClass('delete')
                    .on('click', function () {
                        target.dropdown('clear');
                        $(this).removeClass('delete').addClass('dropdown');
                        return false;
                    });
            }
        }
    });
    $('.ui.dropdown')
        .closest('.ui.selection')
        .find('.item.active').addClass('qwerty').end()
        .dropdown('clear')
        .find('.qwerty').removeClass('qwerty')
        .trigger('click');

    $('.message .close').on('click', function () {
        $(this).closest('.message').transition('fade');
    });

    $('.ui.accordion').accordion();

    $('.ui.sidebar > div').slimScroll({
        size: '5px',
        width: '220px',
        height: '100%'
    });
    setTimeout(function () {
        $('#cover').fadeOut('400');
    }, 500)
});

$(document).on('click', '.ui.file.input input:text, .ui.button.file', function (e) {
    $(e.target).parent().find('input:file').click();
});

$(document).on('change', '.ui.file.input input:file', function (e) {
    var file = $(e.target);
    var name = '';

    for (var i = 0; i < e.target.files.length; i++) {
        name += e.target.files[i].name + ', ';
    }
    name = name.replace(/,\s*$/, '');
    console.log(name);

    $('input:text', file.parent()).val(name);
});

$('.menu a').popup();
$('.menu .dropdown').popup();

// $(document).ready(function () {
//     $('.date').calendar({
//         type: 'date',
//         text: {
//             months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
//         },
//     });
// });
