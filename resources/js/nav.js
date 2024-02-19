$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    if ($("#mainListDiv").hasClass("show_list")) {
        $("#mainListDiv").slideUp(); // เมื่อคลิกและเมนูแสดงอยู่แล้ว ให้เลื่อนขึ้นไปบน
    } else {
        $("#mainListDiv").slideDown(); // เมื่อคลิกและเมนูซ่อนอยู่ ให้เลื่อนลงมาแสดง
    }
});

