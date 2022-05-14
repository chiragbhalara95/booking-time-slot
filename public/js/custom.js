$(document).ready(function () {

    $(".save-available-slots").click(function (event) {
        event.preventDefault();
        var _this = $(this);
        _this.text('saving').addClass('disabled');
        $.ajax({
            url: $("#save-available-slots-url").val(),
            type: "POST",
            data: {
                '1': {
                    'start': $(".ava_mon_start-input").val(),
                    'end': $(".ava_mon_end-input").val()
                },
                '2': {
                    'start': $(".ava_tue_start-input").val(),
                    'end': $(".ava_tue_end-input").val()
                },
                '3': {
                    'start': $(".ava_wed_start-input").val(),
                    'end': $(".ava_wed_end-input").val()
                },
                '4': {
                    'start': $(".ava_thu_start-input").val(),
                    'end': $(".ava_thu_end-input").val()
                },
                '5': {
                    'start': $(".ava_fri_start-input").val(),
                    'end': $(".ava_fri_end-input").val()
                },
                '6': {
                    'start': $(".ava_sat_start-input").val(),
                    'end': $(".ava_sat_end-input").val()
                },
                '7': {
                    'start': $(".ava_sun_start-input").val(),
                    'end': $(".ava_sun_end-input").val()
                },
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                _this.text('save').removeClass('disabled');
                if (response.code == 0) {
                    toastr.success(response.msg, 'Success Alert', {
                        timeOut: 5000
                    });
                } else {
                    toastr.error(response.msg, 'Error Alert', {
                        timeOut: 5000
                    });
                }

            }
        });

    });

    $(".save-unavailable-slots").click(function (event) {
        event.preventDefault();
        var _this = $(this);
        _this.text('saving').addClass('disabled');
        $.ajax({
            url: $("#save-unavailable-slots-url").val(),
            type: "POST",
            data: {
                '1': {
                    'start': $(".ava_mon_start-input").val(),
                    'end': $(".ava_mon_end-input").val()
                },
                '2': {
                    'start': $(".ava_tue_start-input").val(),
                    'end': $(".ava_tue_end-input").val()
                },
                '3': {
                    'start': $(".ava_wed_start-input").val(),
                    'end': $(".ava_wed_end-input").val()
                },
                '4': {
                    'start': $(".ava_thu_start-input").val(),
                    'end': $(".ava_thu_end-input").val()
                },
                '5': {
                    'start': $(".ava_fri_start-input").val(),
                    'end': $(".ava_fri_end-input").val()
                },
                '6': {
                    'start': $(".ava_sat_start-input").val(),
                    'end': $(".ava_sat_end-input").val()
                },
                '7': {
                    'start': $(".ava_sun_start-input").val(),
                    'end': $(".ava_sun_end-input").val()
                },
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                _this.text('save').removeClass('disabled');
                if (response.code == 0) {
                    toastr.success(response.msg, 'Success Alert', {
                        timeOut: 5000
                    });
                } else {
                    toastr.error(response.msg, 'Error Alert', {
                        timeOut: 5000
                    });
                }

            }
        });

    });

    $(".save-unavailable-date").click(function (event) {
        event.preventDefault();
        var _this = $(this);
        _this.text('saving').addClass('disabled');
        $.ajax({
            url: $("#save-unavailable-dates-url").val(),
            type: "POST",
            data: $("#unavailable-dates-frm").serializeArray(),
            success: function (response) {
                _this.text('save').removeClass('disabled');
                if (response.code == 0) {
                    toastr.success(response.msg, 'Success Alert', {
                        timeOut: 5000
                    });
                } else {
                    toastr.error(response.msg, 'Error Alert', {
                        timeOut: 5000
                    });
                }

            }
        });

    });

    $(document).on('click', '.time-slot', function () {
        //$('.time-slot-container .time-slot').removeClass('time-slot-active')
        if ($(this).hasClass('time-slot-active')) {
            $(this).removeClass('time-slot-active')
        } else {
            $(this).addClass('time-slot-active')
        }
    });


    $(".save-booking-slots").click(function (event) {
        event.preventDefault();
        var _this = $(this);
        _this.text('saving').addClass('disabled');
        var bookingSlots = [];
        $(".time-slot-active").get().forEach(function (entry, index, array) {
            bookingSlots.push($(entry).attr('data-slot'));
        });

        if (bookingSlots.length === 0) {
            toastr.error('Please select at least one time slot', 'Error Alert', {
                timeOut: 5000
            });
            _this.text('save').removeClass('disabled');

            return true;
        }

        $.ajax({
            url: $("#save-booking-slots-url").val(),
            type: "POST",
            data: {
                'time_slots': bookingSlots,
                'date': $("#booking_selected_date").val(),
                "_token": $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                _this.text('save').removeClass('disabled');
                if (response.code == 0) {
                    toastr.success(response.msg, 'Success Alert', {
                        timeOut: 5000
                    });
                    getBookableSlots($("#booking_selected_date").val())
                } else {
                    toastr.error(response.msg, 'Error Alert', {
                        timeOut: 5000
                    });
                }

            }
        });

    });


});


function getBookableSlots(date) {
    $.ajax({
        url: $("#get-bookable-slots-url").val(),
        type: "POST",
        data: {
            'date': date,
            "_token": $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.code == 0) {
                var detail = response.data;
                var slotsHtml = '';
                if (detail.length != 0) {
                    $.each(detail, function (e, v) {
                        slotsHtml += '<div class="col-md-2 col-4 px-2"><button type="button" class="time-slot" data-slot="' + e + '">' + v + '</div>';
                    })
                    $('.calendar-slot-selection').html(slotsHtml)
                } else {
                    $('.calendar-slot-selection').html('<label class="text text-danger">No slots available</label>')
                }

                toastr.success(response.msg, 'Success Alert', {
                    timeOut: 5000
                });
            } else {
                toastr.error(response.msg, 'Error Alert', {
                    timeOut: 5000
                });
            }

        }
    });
}