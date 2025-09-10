$(document).ready(function () {

    $('#show-password').click(function () {
        $(this).toggleClass('fa-eye fa-eye-slash')
        if ($(this).hasClass('fa-eye-slash')) {
            $(this).parent().find('input').attr('type', 'text')
        } else {
            $(this).parent().find('input').attr('type', 'password')
        }
    })

    $('.sidebar ul li a').each(function () {
        let href = $(this).attr('href').split('/')
        let url = window.location.pathname.split('/')
        if (href[3] == url[1])
            $(this).addClass('active')
        else
            $(this).removeClass('active')
    })

    let delete_item

    $('a[href="#delete"]').click(function () {
        delete_item = $(this).next()
        console.log(delete_item)
    })

    $('.modal .modal-dialog .modal-content .modal-footer .modal-footer-confirm').click(function () {
        delete_item.submit()
    })

    function change_select(select, option, data) {
        $(`select[name="${select}"]`).change(function () {
            $(`select[name="${option}"]`).val('')
            let id = $(this).val()
            $(`select[name="${option}"] option`).each(function () {
                if ($(this).data(`${data}`) == id)
                    $(this).removeClass('d-none')
                else
                    $(this).addClass('d-none')
            })
        })
    }

    change_select('university_id', 'section_id', 'university')
    change_select('section_id', 'level_id', 'section')
    change_select('level_id', 'group_id', 'level')

    function select_value(option, data) {
        $(`select[name="${option}"] option`).each(function () {
            if ($(this).parent().val() == $(this).data(data)) {
                $(this).removeClass('d-none')
            }
        })
    }

    select_value('section_id', 'university')
    select_value('level_id', 'section')
    select_value('group_id', 'level')

    $('a[href="#search"]').click(function () {
        $('input#search').slideToggle(300)
    })

    $('input#search').on('input', function () {
        let value = $(this).val()
        $('.row > div, table tbody tr').each(function () {
            if ($(this).text().indexOf(value) >= 0)
                $(this).show()
            else
                $(this).hide()
        })
    })
})