$(document).ready(function() {
    var elements = $('h1');

    elements.click(function(){
        elements.css('background-color', 'teal');
    })

    var paragraphs = $('p');
    paragraphs.dblclick(function(){
        paragraphs.css('font-size', '18px');
    })

    var bullets = $('li');
    bullets.hover(
        function(){
            bullets.css('color','red');
        },
        function(){
            bullets.css('color', 'white');
        }

    );

});

