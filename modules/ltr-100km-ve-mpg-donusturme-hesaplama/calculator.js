function hcFucConvert() {
    const l100 = parseFloat(document.getElementById('hc-fuc-input-l100').value);

    if (isNaN(l100) || l100 === 0) return;

    const mpgUs = 235.215 / l100;
    const mpgUk = 282.481 / l100;

    document.getElementById('hc-fuc-mpg-us').innerText = mpgUs.toFixed(1) + " MPG";
    document.getElementById('hc-fuc-mpg-uk').innerText = mpgUk.toFixed(1) + " MPG";
}

window.addEventListener('load', hcFucConvert);
