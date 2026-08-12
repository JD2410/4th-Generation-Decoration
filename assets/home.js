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
                console.log("Done")
            }
        })
    }
}

document.onreadystatechange = () => {
    if (document.readyState === "complete") {
        loadingScript.init()
    }
}