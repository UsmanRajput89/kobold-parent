// jQuery(document).ready( function ($) {
//     // Ajax functions for infinite scroll
//     $(document).on('click', '.load_more_button', function () {
        
//         // Save the .load_more as a variable in order to to update the "data-page" number  

//         // var that = $(this);
//         var page = $(this).data('page');
//         // var newPage = page+1;
//         // var ajaxurl = $(this).data('page');

//         console.log(page);

//         // $.ajax({

//         //     url : ajaxurl, 
//         //     type : 'post',
//         //     data : {
//         //         page : page,
//         //         action : 'load_more'
//         //     },
            
//         //     // the response data will be set by the load_more funciton in the ajax.php file 
//         //     error : function( response ){
//         //         console.log(response);
//         //     },

//         //     success : function( response ){

//         //         // that.data('page', newPage);
//         //         $('.post-roll').append( response );

//         //     }
            
//         // }); // end $.ajax
//     }); // end on click
// }); // end opening function