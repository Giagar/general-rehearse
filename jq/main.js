$(document).ready(function() {
    const images = [
        {
            title: "img1",
            url: "#",
        },
        {
            title: "img2",
            url: "#",
        },
        {
            title: "img3",
            url: "#",
        },
        {
            title: "img4",
            url: "#",
        },
        {
            title: "img5",
            url: "#",
        },
    ];
    
    images.forEach((obj, ix) => {
        document.querySelector(".carousel-img-container").innerHTML += `
        <div class="carousel-img ${ix === 0 ? 'first active' : ix === images.length - 1 ? 'last' : ''}">
        ${obj.title}
        </div>`;

        document.querySelector(".carousel-menu").innerHTML += `
        <div class="carousel-menu-item ${ix === 0 ? 'first active' : ix === images.length - 1 ? 'last' : ''}"></div>`
    });

    $(".next").click(function() {
        if($(".carousel-img.active, .carousel-menu-item.active").hasClass("last")) {
            $(".carousel-img.last, .carousel-menu-item.last").removeClass("active")
            $(".carousel-img.first, .carousel-menu-item.first").addClass("active")
        } else {
            $(".carousel-img.active, .carousel-menu-item.active")
            .removeClass("active")
            .next()
            .addClass("active");
        }
    });

    $(".prev").click(function() {
        if($(".carousel-img.active, .carousel-menu-item.active").hasClass("first")) {
            $(".carousel-img.first, .carousel-menu-item.first").removeClass("active")
            $(".carousel-img.last, .carousel-menu-item.last").addClass("active")
        } else {
            $(".carousel-img.active, .carousel-menu-item.active")
            .removeClass("active")
            .prev()
            .addClass("active")
        }
    });

    $(".carousel-menu-item").click(function() {
        $(".carousel-menu-item.active").removeClass("active");
        $(this).addClass("active"); 

        var i = $(this).index() + 1;
        $(".carousel-img.active").removeClass("active");
        $(".carousel-img:nth-child(" + i + ")").addClass("active");
    })

})