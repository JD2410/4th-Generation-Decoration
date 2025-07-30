window.onload = (event) => {
    document.getElementById("mobile-menu").addEventListener("click", function() {
        document.getElementById("header").classList.toggle('open');
    })

    const bodyClass = document.body.classList;
    scr.textExtension();
    if (bodyClass.contains('home')) {
        scr.testimonials.init();
        scr.faq.init();
        scr.map.init();
        scr.navigation.init();
        scr.profileImages.init();
    } else if (bodyClass.contains('page-template-domestic')) {
        scr.domesticGallery.init();
    }
};
let scr = {
    navigation: {
        init: () => {
            const nav = document.querySelectorAll('.menu-item a')

            nav.forEach((ele) => (
                ele.addEventListener("click", () => {
                    document.getElementById("header").classList.remove("open")
                })
            ))
        }
    },
    profileImages: {
        init: () => {
            const imagesToHover = document.querySelectorAll("#profile-images div");
            const container = document.getElementById("profile-container");

            container.addEventListener("mouseenter", () => {
                container.classList.add("active")
            })
            container.addEventListener("mouseleave", () => {
                container.classList.remove("active")
            })

            imagesToHover.forEach((ele) => {
                ele.addEventListener("mouseenter", () => {
                    //container.classList.add(ele.dataset.conclass)
                    scr.profileImages.changeSelection(ele.dataset.conclass)
                })
            })
        },
        changeSelection: (ele) => {
            const container = document.getElementById("profile-images");
            container.removeAttribute("class");
            container.classList.add(ele)
        }
    },
    testimonials: {
        init: () => {
            if(document.querySelectorAll('.testimonial--card').length > 4) {
                setInterval(scr.testimonials.movingTestimonials, 2000)
            } else {
                document.getElementById("testimonials").classList.remove("animated")
            }
        },
        movingTestimonials: () => {

            let container = document.getElementById("testimonialsgroup")
            if (container.classList.contains("next")) {
                container.classList.remove('transition')
                container.classList.remove("next")
                container.appendChild(document.querySelectorAll('.testimonial--card')[0])
            } else {
                container.classList.add('transition')
                container.classList.add("next")
            }

        }
    },
    faq: {
        init: () => {
            let qa = document.querySelectorAll(".faq--qa")
            qa.forEach((element) => {
                element.onclick = () => {
                    let $answer = element.querySelector(".faq--answer .faq--answer-ele");
                    if (!element.classList.contains("open")) {
                        element.querySelector(".faq--answer").style.height = ($answer.offsetHeight + 24) + "px";
                        element.classList.add("open")
                    } else {
                        element.querySelector(".faq--answer").style.height = 0;
                        element.classList.remove("open")
                    }
                    
                }
            })
        }
    },
    map: {
        init: () => {

            const isMobile = window.innerWidth <= 768;
            const mapPos = isMobile ? [51.7900, 0.0082] : [51.7900, 0.7082] ;
            const zoom = 9;
            
            const londonLatLng = [51.7900, 0.0082];
            const map = L.map('map', {
                center: mapPos,
                zoom: zoom,
                dragging: false,
                scrollWheelZoom: false
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            }).addTo(map);

            const radiusInMeters = 30 * 1609.34;

            L.circle(londonLatLng, {
                color: '#00E539',
                fillColor: '#00E539',
                fillOpacity: 0.2,
                radius: radiusInMeters,
            }).addTo(map);

            L.marker(londonLatLng).addTo(map)
        }
    },
    domesticGallery: {
        init: () => {
            let thumbnails = document.querySelectorAll('.fg-thumb')

            thumbnails.forEach((ele) => {
                let captionCheck = ele.getAttribute('data-caption-title');

                if(captionCheck) {
                    if (captionCheck.toUpperCase().includes("BEFORE")) {
                        ele.classList.add("before-work")
                    }
                    if (captionCheck.toUpperCase().includes("AFTER")) {
                        ele.classList.add("after-work")
                        
                    }
                }
            })
        }
    },
    textExtension: () => {
        const textExtension = document.querySelectorAll(".more-text");
        textExtension.forEach((ele) => {
            const whichExtend = ele.dataset.extend
            ele.addEventListener("click", () => {
                if(document.getElementById(whichExtend).classList.contains("open")) {
                    ele.innerHTML = "more..."
                    document.getElementById(whichExtend).classList.remove('open')
                } else {
                    ele.innerHTML = "less..."
                    document.getElementById(whichExtend).classList.add('open')
                }
            })
        })
    }
}