$.strength = function( element, password ) {
    var desc = [{'width':'0px'}, {'width':'20%'}, {'width':'40%'}, {'width':'60%'}, {'width':'80%'}, {'width':'100%'}];
    var score = 0;

    if( password.length > 3 ) {
        score++;
    }

    if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) {
        score++;
    }

    if ( password.match(/\d+/) ) {
        score++;
    }

    if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
        score++;
    }

    if ( password.length > 7 ) {
        score++;
    }

    element.css( desc[score] );
};

$(function() {
$( "#pwd" ).keyup(function() {
                $.strength( $( "#progress-bar" ), $( this ).val() );
            });
});