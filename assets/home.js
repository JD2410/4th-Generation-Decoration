function loadScript(src, callback) {
    let script = document.createElement('script');
    script.src = src;
    script.onload = () => callback(null, script);
    script.error = () => callback(new Error(`Script Loading Error: ${src}`));

    document.head.appendChild(script);
}

function loadStyles(src, callback) {
    let script = document.createElement('link');
    script.href = src;
    script.rel = "stylesheet";
    script.onload = () => callback(null, script);
    script.error = () => callback(new Error(`Script Loading Error: ${src}`));

    document.head.appendChild(script);
}
let loadingScript = {
    script: "",
    style: "",
    init() {
        let loadingElement = document.getElementById('loading');
        this.script = loadingElement.dataset.script;
        this.style = loadingElement.dataset.style;
        this.scriptInit()
    },
    scriptInit() {
        console.log("Hello")

        loadScript(this.script, function(error, script) {
            if (error) {
                console.log(error)
            } else {
                loadingScript.styleInit()
            }
        })
    },
    styleInit() {
        loadStyles(this.style, function(error, script) {
            if (error) {
                console.log(error)
            } else {
                console.log("Done");
                document.body.classList.add('loading-complete')
            }
        })
    }
}

document.onreadystatechange = () => {
    if (document.readyState === "complete") {

        document.getElementById('loading').addEventListener('transitionend', function() {
            this.style.display = 'none'
            document.body.classList.add('loader-hidden');
        });


        loadingScript.init()

        const elements = document.querySelectorAll('.animate-scroll');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {entry.target.classList.add('visible');}
            });
        }, {
            //The amount of screen displayed before animated. 0 is as soon as it appears on the page. 1 is a bit. 2 is...
            threshold: 0.2
        });

        elements.forEach(element => {
            observer.observe(element);
        });
    }
}