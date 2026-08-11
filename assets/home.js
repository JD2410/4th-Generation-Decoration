function loadScript(src, callback) {
    let script = document.createElement('link');
    script.href = src;
    script.rel = "stylesheet";
    script.onload = () => callback(null, script);
    script.error = () => callback(new Error(`Script Loading Error: ${src}`));

    document.head.appendChild(script);
}

document.onreadystatechange = () => {
    if (document.readyState === "complete") {

        let loadingElement = document.getElementById('loading');
        let script = loadingElement.dataset.script;
        let style = loadingElement.dataset.style;
        console.log(style)

        loadScript(style, function(error, script) {
            if (error) {
                console.log(error)
            }
        })
    }
}

