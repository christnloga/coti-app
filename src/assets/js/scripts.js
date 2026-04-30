$(document).ready(function() {
    $('#responsive2').lightSlider({
        item:5,
        loop:false,
        slideMove:2,
        pager:false,
        prevHtml:'<i class="fa fa-arrow-left"></i>',
        nextHtml:'<i class="fa fa-arrow-right"></i>',
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:4,
                    slideMove:1,
                    slideMargin:6,
                }
            },
            {
                breakpoint:480,
                settings: {
                    item:4,
                    slideMove:1
                }
            }
        ]
    });
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#item-popover').popover({
        trigger: 'hover',
        html: true,
        container: 'body',
        content: function() {
            return $('#item-content').html();
        }
    });
    $('#cart-popover').popover({
        html: true,
        container: 'body',
        content: function() {
            return $('#content').html();
        }
    });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}