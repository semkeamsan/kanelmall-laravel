const Kanel = {
    init: function () {
        Kanel.image();
        Kanel.grid();


        $(`input`).prop("autocomplete", "off");
        if ($('.owl-carousel').length) {
            $('.owl-carousel').owlCarousel({
                items: 1,
                loop: false,
                video: true,
                lazyLoad: true
            });
        }

        Kanel.show_hide_password();
        Kanel.live_input();
        var forms = document.getElementsByClassName("needs-validation");
        Array.prototype.filter.call(forms, (form) => {
            Kanel.validation(form);
        });


        $(document).scroll(function () {
            Kanel.grid();
            Kanel.setview();
        });
        $(document).resize(function () {
            Kanel.grid();
            Kanel.setview();
        });
        $(document).ready(function () {
            Kanel.grid();
            Kanel.setview();
            $(`head`).append(`<style>.aui-product-text-content{height:${$(window).height() - 150}px}</style>`)

        });
      var $loading = $(`<div class="svg-loader">
                        <svg class="svg-container" height="50" width="50" viewBox="0 0 100 100">
                            <circle class="loader-svg bg" cx="50" cy="50" r="45"></circle>
                            <circle class="loader-svg animate" cx="50" cy="50" r="45"></circle>
                        </svg>
                    </div>`);
        $(window).on('scroll', function () {        
            if ($(window).scrollTop() >= $('.aui-content-box').offset().top + $('.aui-content-box').outerHeight() - window.innerHeight) {
               
                

                var page = $(`.aui-list-product:last`).data('page');
                if (page) {
                    $(`.aui-list-product:last`).after($loading);
                    $.get(`${ajaxroutes.home}/?page=${page+1}`).done(res => {
                        $(`.aui-list-product:last`).append($(res).html());
                            Kanel.grid();
                          setTimeout(() => {                              
                                Kanel.grid();
                                Kanel.image();
                            }, 2000);
                        }).fail(()=>{
                        $loading.remove();
                    
                    });
                }
            }
        });

        $(document).on('scroll', '.aui-scroll-content', function () {

            if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {

               
                var page = $(`.aui-list-product:last`).data('page');
                if (page) {
                    const urlSearchParams = new URLSearchParams(window.location.search);
                    const params = Object.fromEntries(urlSearchParams.entries());
                    var url = ajaxroutes.categoryby;
                    if (params.q) {
                        url += `?q=${params.q}&page=${page + 1}`;
                    } else {
                        url += `?page=${page + 1}`;
                    }
                    $.get(url).done(res => {
                        $(`.aui-list-product:last`).after(res);
                    });
                }
            }
        });

        $(document).on('click', `[data-toggle="muted"]`, function (e) {
            e.preventDefault();
            var $video = $(this).parents('.video').find('video');
            var muted = $(this).find('i').hasClass('fa-volume-mute');
            if (muted) {
                $video.get(0).muted = false;
                $video.get(0).play();
                $video.addClass('played');
                $(this).find('i').removeClass('fa-volume-mute').addClass('fa-volume');
            } else {
                $video.removeClass('played');
                $video.get(0).muted = true;
                $(this).find('i').removeClass('fa-volume').addClass('fa-volume-mute');
            }
        });
        $(document).on('input', `[name="email"]`, function () {
            var username = $(this).val();
            var filter =
                /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
            if (filter.test(username)) {
                $(this).parents('.input-group').find('#icon-mail').addClass('d-none');
                $(this).parents('.input-group').find('#icon-phone').removeClass('d-none');
            } else {
                $(this).parents('.input-group').find('#icon-mail').removeClass('d-none');
                $(this).parents('.input-group').find('#icon-phone').addClass('d-none');
            }
        });

        $(document).on('click', `[data-toggle="add-cart"]`, function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.get(url).done(res => {
                if (res && res.status) {
                    Swal.fire({
                        toast: true,
                        type: 'success',
                        html: `<span>${res.message}</span>`,
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    $(this).addClass('d-none');
                    if ($(this).next()) {
                        $(this).next().addClass('w-100');
                    }
                    $(`#cart-count`).text(res.count);
                }
            });
        });

        $(`[data-toggle="count-down"]`).each(function () {
            var t = $(this).data('date');
            var x = setInterval(() => {
                var countDownDate = new Date(t).getTime();
                var now = new Date().getTime();

                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                $(this).text(`${days} ${ window.languages.day?? (days>1?'days':'day')} ${hours} ${ window.languages.hour?? (hours>1?'hours':'hour')} ${minutes} ${ window.languages.minutes??(minutes>1?'minutes':'minute')} ${seconds} ${ window.languages.second??(seconds>1?'seconds':'second')}`);
                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    $(this).text('EXPIRED');
                    $(this).parent().find(`#cancel`).click();
                }
            }, 1000);
        });

        Kanel.otp($('.otp > *[id]'));
        Kanel.select2();


        setTimeout(() => {
            Kanel.grid();
        }, 2000);

    },
    show_hide_password: function () {
        var e = $(`[data-toggle="sh-password"]`);
        e.length && e.each(function () {
            var target = $(this).data('target');
            $(this).click(() => {
                if ($(target).attr('type') == 'password') {
                    $(target).attr('type', 'text');
                    $(this).find('i').removeClass().addClass('fal fa-eye-slash');
                } else {
                    $(target).attr('type', 'password');
                    $(this).find('i').removeClass().addClass('fal fa-eye');
                }
            });
        });
    },
    live_input: function () {
        $(document).on(`input`, `[data-toggle="live-input"],[live-input]`, function () {
            var val = $(this).val();
            var text = $(this).data('text');
            var target = $(this).data('target');
            if (val) {
                $(target).text(val);
            } else {
                $(target).text(text);
            }
        });
    },
    validation: function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                form.classList.add("was-validated");
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
            },
            false
        );
    },
    inview: function ($el) {
        var wTop = $(window).scrollTop();
        var wBot = wTop + $(window).height();
        var eTop = $el.offset().top;
        var eBot = eTop + $el.height();
        return ((eBot <= wBot) && (eTop >= wTop));
    },
    setview: function () {
        $('.aui-list-product-item').each(function () {
            var $zis = $(this);
            $zis.removeClass("inview");
            $zis.find('video').each((i, video) => {
                video.pause();
            });

            if (Kanel.inview($zis)) {
                $zis.find('video').each((i, video) => {
                    if (!$zis.find('video').hasClass('played')) {
                        video.muted = true;
                        $zis.find('.video').find('i').removeClass('fa-volume').addClass('fa-volume-mute');
                    }
                    video.loop = true;
                    video.play();
                });
                $zis.addClass("inview");
            }
        });
    },
    grid: function () {
        if ($('.aui-list-product').length) {
            new Masonry('.aui-list-product', {
                itemSelector: '.aui-list-product-item'
            });
        }
    },
    otp: function (inputs) {
        if (inputs.length) {
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function (event) {

                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0)
                            inputs[i - 1].focus();
                    } else {
                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            return true;
                        } else if (event.keyCode > 47 && event.keyCode < 58) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1)
                                inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1)
                                inputs[i + 1].focus();
                            event.preventDefault();
                        }
                    }
                    var code = '';
                    inputs.each(function () {
                        code += $(this).val();
                    });
                    $(`#code`).val(code);
                });
            }
        }

    },
    image: function () {
        if ($.Lazy) {
            $(`img`).attr(`draggable`, false)
                .Lazy({
                    afterLoad: function (element) {
                        element.addClass('loaded');
                    },
                    bind: "event",
                    delay: 0
                });
        }
    },
    select2: function (select = true) {
        $('.select2').each(function () {
            $(this).select2();
            if (select) {
                var selected = $(this).find(`option[selected]`);
                $(this).val(selected.val()).trigger('change');
            }
        });


        $('.select2').on('select2:select', function () {
            var id = $(this).parents(`#livewire`).attr(`wire:id`);
            var n = $(this).attr('wire:model');
            var v = $(this).val();
            if (id) {
                window.livewire.find(id).set(n, v);
            }
        });
    },
    select2Image: function (select = true) {
        var template = function (item) {
            if (!item.id) {
                return item.text;
            }

            var container = $("<span>").addClass("form-row p-0"),
                image = $("<span>").addClass("col-auto p-0"),
                text = $("<span>").addClass("col p-0 ml-2").html(" " + item.text),
                img = $("<img>").css({
                    width: 20,
                    height: 20,
                    objectFit: 'cover'
                });

            if ($(item.element).data("src")) {
                img.attr("src", $(item.element).data("src"));
                img.appendTo(image);
                image.appendTo(container);
            } else if ($.inArray("image", Object.keys(item)) != -1 && item.image) {
                img.attr("src", item.image);
                img.appendTo(image);
                image.appendTo(container);
            }

            text.appendTo(container);
            return container;
        }
        var template2 = function (item) {
            if (!item.id) {
                return item.text;
            }

            var container = $("<span>").addClass("form-row p-0"),
                image = $("<span>").addClass("col-auto p-0"),
                text = $("<span>").addClass("col p-0 ml-2").html(" " + item.text),
                img = $("<img>").css({
                    position: "relative",
                    top: -3,
                    width: 20,
                    height: 20,
                    objectFit: 'cover'
                });

            if ($(item.element).data("src")) {
                img.attr("src", $(item.element).data("src"));
                img.appendTo(image);
                image.appendTo(container);
            } else if ($.inArray("image", Object.keys(item)) != -1 && item.image) {
                img.attr("src", item.image);
                img.appendTo(image);
                image.appendTo(container);
            }

            text.appendTo(container);
            return container;
        }
        $('.select2-image').each(function () {
            $(this).select2({
                templateResult: template,
                templateSelection: template2,
            });
            if (select) {
                var selected = $(this).find(`option[selected]`);
                $(this).val(selected.val()).trigger('change');
            }
        });
        $('.select2-image').on('select2:select', function () {
            var id = $(this).parents(`#livewire`).attr(`wire:id`);
            var n = $(this).attr('wire:model');
            var v = $(this).val();
            if (id) {
                window.livewire.find(id).set(n, v);
            }
        });
    }
};
Kanel.init();
const datetime = () => {
    return (new Date()).getTime();
}
$(`.datepicker`).datepicker({
    todayHighlight: true,
    format: `${$(this).attr(`data-format`) ?? `yyyy-mm-dd`}`,
    disableTouchKeyboard: !0,
    autoclose: !1,
    language: `${$('html').attr('lang') ?? 'en'}`,
});
$(".datepicker").on('changeDate', function (e) {
    var id = $(this).parents('#livewire').attr(`wire:id`);
    var model = $(this).attr(`wire:model`);
    var val = e.format(0, `${$(this).attr(`data-format`) ?? `yyyy-mm-dd`}`);
    window.livewire.find(id).set(model, val);
});
