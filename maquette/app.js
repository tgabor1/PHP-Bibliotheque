let s1 = document.getElementById("s1");
let s2 = document.getElementById("s2");
let s3 = document.getElementById("s3");

let e1 = document.getElementById("e1");
let e2 = document.getElementById("e2");
let e3 = document.getElementById("e3");

let theme1 = document.getElementById("theme1");
let theme2 = document.getElementById("theme2");

s1.addEventListener("change", test.bind(null, 1));
s2.addEventListener("change", test.bind(null, 2));
s3.addEventListener("change", test.bind(null, 3));

e1.addEventListener("change", test2.bind(null, 1));
e2.addEventListener("change", test2.bind(null, 2));
e3.addEventListener("change", test2.bind(null, 3));

theme1.addEventListener("click", test3.bind(null, 1));
theme2.addEventListener("click", test3.bind(null, 2));

function test(id) {
    let status = "";
    if (id === 1) {
        status = s1.options[s1.selectedIndex].value;
        if (status === "Dispo") {
            s1.className = "selectStatusD";
            e1.value = "";
        }
        if (status === "Prêté") {
            s1.className = "selectStatusE";
            e1.value = "?????";
            s1.value = "invalid";
        }
    }

    if (id === 2) {
        status = s2.options[s2.selectedIndex].value;
        if (status === "Dispo") {
            s2.className = "selectStatusD";
            e2.value = "";
        }
        if (status === "Prêté") {
            s2.className = "selectStatusE";
            e2.value = "?????";
            s2.value = "invalid";
        }
    }

    if (id === 3) {
        status = s3.options[s3.selectedIndex].value;
        if (status === "Dispo") {
            s3.className = "selectStatusD";
            e3.value = "";
        }
        if (status === "Prêté") {
            s3.className = "selectStatusE";
            e3.value = "?????";
            s3.value = "invalid";
        }
    }
}

function test2(id) {
    if (id === 1) {
        if (e1.value.length === 5) {
            s1.className = "selectStatusP";
            s1.value = "Prêté";
        }
        if (e1.value.length !== 5) {
            s1.className = "selectStatusE";
            s1.value = "invalid";
        }
        if (e1.value.length === 0) {
            s1.className = "selectStatusD";
            s1.value = "Dispo";
        }
    }
    if (id === 2) {
        if (e2.value.length === 5) {
            s2.className = "selectStatusP";
            s2.value = "Prêté";
        }
        if (e2.value.length !== 5) {
            s2.className = "selectStatusE";
            s2.value = "invalid";
        }
        if (e2.value.length === 0) {
            s2.className = "selectStatusD";
            s2.value = "Dispo";
        }
    }
    if (id === 3) {
        if (e3.value.length === 5) {
            s3.className = "selectStatusP";
            s3.value = "Prêté";
        }
        if (e3.value.length !== 5) {
            s3.className = "selectStatusE";
            s3.value = "invalid";
        }
        if (e3.value.length === 0) {
            s3.className = "selectStatusD";
            s3.value = "Dispo";
        }
    }

}

function test3(id) {
    if (id === 1) { // Dark Theme
        document.documentElement.style.setProperty("--color0", "rgb(0,0,0)");
        document.documentElement.style.setProperty("--color0b", "rgb(240, 248, 255)");
        document.documentElement.style.setProperty("--color0c", "rgba(42, 32, 42, 0.7)");
        document.documentElement.style.setProperty("--color1", "hsla(169, 100%, 21%, 0.3)");
        document.documentElement.style.setProperty("--color1Over", "hsla(169, 100%, 21%, 0.8)");
        document.documentElement.style.setProperty("--color2", "hsla(328, 100%, 21%, 0.3)");
        document.documentElement.style.setProperty("--color2Over", "hsla(328, 100%, 21%, 0.8)");
        document.documentElement.style.setProperty("--colorBg1", "rgba(200, 140, 160, 0.5)");
        document.documentElement.style.setProperty("--colorBg2", "rgba(0, 0, 64, 0.5)");
        document.documentElement.style.setProperty("--colorM1", "hsla(169, 100%, 75%, 0.6)");
        document.documentElement.style.setProperty("--colorM1Over", "hsla(169, 100%, 75%, 0.9)");
        document.documentElement.style.setProperty("--colorM2", "hsla(53, 100%, 75%, 0.6)");
        document.documentElement.style.setProperty("--colorM2Over", "hsla(53, 100%, 75%, 0.9)");
    }

    if (id === 2) { // Light Theme
        document.documentElement.style.setProperty("--color0", "rgb(240, 248, 255)");
        document.documentElement.style.setProperty("--color0b", "rgb(0, 0, 0)");
        document.documentElement.style.setProperty("--color0c", "rgba(255, 248, 240, 0.7)");
        document.documentElement.style.setProperty("--color1", "hsla(210, 100%, 64%, 0.3)");
        document.documentElement.style.setProperty("--color1Over", "hsla(210, 100%, 64%, 0.8)");
        document.documentElement.style.setProperty("--color2", "hsla(30, 100%, 64%, 0.3)");
        document.documentElement.style.setProperty("--color2Over", "hsla(30, 100%, 64%, 0.8)");
        document.documentElement.style.setProperty("--colorBg1", "rgba(200, 240, 255, 1.0)");
        document.documentElement.style.setProperty("--colorBg2", "rgba(255, 255, 240, 0.5)");
        document.documentElement.style.setProperty("--colorM1", "hsla(210, 100%, 33%, 0.6)");
        document.documentElement.style.setProperty("--colorM1Over", "hsla(210, 100%, 33%, 0.9)");
        document.documentElement.style.setProperty("--colorM2", "hsla(30, 100%, 33%, 0.6)");
        document.documentElement.style.setProperty("--colorM2Over", "hsla(30, 100%, 33%, 0.9)");
    }
}