     jQuery(document).ready(function($) {

          //1 - Variable declaration

          $('#term').on('change', function() {

               var classroom = $("#classroom").val();
               var subject = $("#subject").val();
               var term = $("#term").val();
               var chapter_content = $("#chapter_content");

               $.ajax({

                    url: 'fetchChapter.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                         classroom: classroom,
                         term: term,
                         subject: subject

                    },
                    success: function(response) {

                    	

                    	console.log(response['chapter_content']);

                    	chapter_content.val(response['chapter_content']);

                    },

               });

              

          });

     });