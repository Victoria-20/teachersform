<footer>




</footer>
<!-- Footer end -->

</div>
<!-- Document Wrapper end -->

<!-- Back to Top
============================================= -->


<!-- Script -->
<script src="frontend/vendor/jquery/jquery.min.js"></script>
<script src="frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="frontend/vendor/DT/jquery.dataTables.js"></script>
<script src="frontend/js/theme.js"></script>
<script src="frontend/js/editor.js"></script>
<script src="fetchChapter.js"></script>
<script src="frontend/vendor/tinymce/tinymce.min.js"></script>


<script>
$('#table').DataTable();
$(function() {


    $('#teach').on('change', function() {


        var teacher = $('#teach').val();

        $.ajax({
            url: 'fetchTeacher.php',
            type: 'POST',
            dataType: 'json',
            data: {
                teacher: teacher
            },
            success: function(data) {

                var cc = $('.civility').val();

                if (cc == data[1]) {

                    $('.civility').prop('checked', true);
                }

                $('#fullname').val(data[2]);
                $('#email').val(data[3]);




            },

        });








    })



})
</script>


<script>    

jQuery(document).ready(function() {


    var getAnswer = $("input[name='getAnswer']");

    var optionstext = $("input[name='optionstext']");


    getAnswer.on('keyup', function(event) {

        optionstext.val(getAnswer.val());
       
    });













    
});









</script>






<script>
$(document).ready(function() {
    if ($(".tiny").length > 0) {
        tinymce.init({
            selector: "textarea.tiny",
            theme: "modern",
            height: 100,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{
                    title: 'Bold text',
                    inline: 'b'
                },
                {
                    title: 'Red text',
                    inline: 'span',
                    styles: {
                        color: '#ff0000'
                    }
                },
                {
                    title: 'Red header',
                    block: 'h1',
                    styles: {
                        color: '#ff0000'
                    }
                },
                {
                    title: 'Example 1',
                    inline: 'span',
                    classes: 'example1'
                },
                {
                    title: 'Example 2',
                    inline: 'span',
                    classes: 'example2'
                },
                {
                    title: 'Table styles'
                },
                {
                    title: 'Table row 1',
                    selector: 'tr',
                    classes: 'tablerow1'
                }
            ]
        });
    }
});
</script>


</body>

</html>