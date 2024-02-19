$(document).ready(function(){
    $('.carousel-wrapper').click(function(){
        var characterId = $(this).data('id');
        var imgList = $(this).find('.img-list');
        imgList.empty();

        // For demonstration purposes, manually adding images
        imgList.append('<img src="path/to/image1.jpg" alt="Character Image">');
        imgList.append('<img src="path/to/image2.jpg" alt="Character Image">');

        // Show the img_list container
        imgList.show();
    });
});
