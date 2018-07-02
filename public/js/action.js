$(document).ready(function(){
    $('.title').delay(300).animate({'opacity':'1'},700);
    $('.form').delay(500).animate({'opacity':'1'},700);
});

$(function(){
    $('#profile .menu-item .sub-menu').hide();
    $('#profile').hover(
        function(){
            $(this).find(".sub-menu").slideDown();
        },
        function(){
            $(this).find('.sub-menu').slideUp('fast');
        }
    );
});

window.onload = function() {

    var editor = ace.edit("editor");
    var textarea = $('textarea[name="editor"]').hide();
    editor.getSession().setValue(textarea.val());
    editor.getSession().on('change', function(){
       textarea.val(editor.getSession().getValue());
    });
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode({path:"ace/mode/php", inline:true});
    document.getElementById('editor').style.fontSize='15px';


}
