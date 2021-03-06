$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {


        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'answer': $('input[name=answer]').val(),
            'date': $('input[name=date]').val(),
            'time': $('input[name=time]').val(),
            'stud_reg': $('input[name=stud_reg]').val(),
            'tutor_id': $('input[name=tutor_id]').val(),
            'subject': $('input[name=subject]').val(),
            'topic': $('input[name=topic]').val(),
            'class': $('input[name=class]').val(),
        };

        // process the form
        $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'functions/process.php', // the url where we want to POST
                data: formData, // our data object
                dataType: 'json' // what type of data do we expect back from the server
            })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {

                    // handle errors for name ---------------
                    // if (data.errors.name) {
                    //     $('#name-group').addClass('has-error'); // add the error class to show red input
                    //     $('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                    // }

                    // // handle errors for email ---------------
                    // if (data.errors.email) {
                    //     $('#email-group').addClass('has-error'); // add the error class to show red input
                    //     $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                    // }

                    // // handle errors for superhero alias ---------------
                    // if (data.errors.superheroAlias) {
                    //     $('#superhero-group').addClass('has-error'); // add the error class to show red input
                    //     $('#superhero-group').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
                    // }

                } else {
                    // ALL GOOD! just show the success message!
                    $('form').html('<div class="alert alert-success">' + data.message + '</div>');
                }

            })

        // using the fail promise callback
        .fail(function(data) {
            //Server failed to respond - Show an error message
            $('form').html('<div class="alert alert-danger">Could not reach server, please try again later.</div>');
        });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});