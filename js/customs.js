let globals = {
    notesFile:'/data/notes.xml',
    ajax_load:"<img src='/img/loading.gif' alt='...loading...' />",
    ajaxLoadURL:'/core/http_req.php',
    text: '',
};

$(document).ready(function() {
    // jQuery.log = function(message) { if(window.console) { console.debug(message); } else { alert(message); } }
    jQuery.log = function(message) { if(window.console) { console.log(message); } else { alert(message); } }

    function isAlphaNumeric(value) { return (value.match(/^[a-zA-Z0-9]+$/)) ? true : false;  }
    function checkLength(check,min,max) {
        if ( (check.length >= min) && (check.length <= max) ) { return true; } else { return false; }
    }

    function checkMail (value) {
        return (value.match(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i)) ? true : false;
    }

    $('.save_result').click(function(e) {
        let dataArray={};
        const Id = $(this).last().attr("data-id");
        const TrId = 'tr#'+Id;

        // iterate over each of td's in the current tr
        // collect the values and put it into result json data
        $(TrId+" > td").each(function() {
            let ItemName = $(this).attr('id');
            if (ItemName == null) { return } else {
                if ( ItemName.localeCompare('link') == 0 ) {
                    dataArray['title'] = $(this).text();
                    let href = $(this).html();
                    dataArray['link'] = $(href).attr('href');
                    return;
                } else {
                    let ItemValue = $(this).text();
                    dataArray[ItemName] = ItemValue;
                }
            }
        });

        $.log(dataArray);
        // $.log(ItemName +' = '+ ItemValue);
        // $.log(Id);
        // e.preventDefault();
        // $.ajax({
        //     type: "POST",
        //     url: 'login.php',
        //     data: $(this).serialize(),
        //     success: function(response) {
        //         var jsonData = JSON.parse(response);
        //
        //         // user is logged in successfully in the back-end
        //         // let's redirect
        //         if (jsonData.success == "1") {
        //             location.href = 'my_profile.php';
        //         } else {
        //             alert('Invalid Credentials!');
        //         }
        //     }
        // });
    });


});
