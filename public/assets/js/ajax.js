$(function () {

    $('.status-attendance').click(function () {
        $('.loading').css('display', 'flex')
        let status = null
        if ($(this).find('i').hasClass('fa-minus')) {
            $(this).find('i').toggleClass('fa-minus fa-check')
            status = 1
        } else if ($(this).find('i').hasClass('fa-check')) {
            $(this).find('i').toggleClass('fa-check fa-xmark')
            status = 0
        } else {
            $(this).find('i').toggleClass('fa-xmark fa-minus')
            status = null
        }
        $.ajax({
            url: $(this).find('span').data('url'),
            method: 'POST',
            data: {
                _token: $(this).find('span').data('token'),
                lecture: $(this).find('span').data('lecture'),
                student_id: $(this).find('span').data('student'),
                university_id: $(this).find('span').data('university'),
                section_id: $(this).find('span').data('section'),
                level_id: $(this).find('span').data('level'),
                group_id: $(this).find('span').data('group'),
                status: status
            }
        })
        $('.loading').css('display', 'none')
    })

})