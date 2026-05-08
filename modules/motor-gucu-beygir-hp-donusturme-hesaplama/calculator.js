function hcPwrConvert(source) {
    const hp = parseFloat(document.getElementById('hc-pwr-input-hp').value);

    if (isNaN(hp)) return;

    const kw = hp * 0.7457;
    const ps = hp * 1.0139;
    const bhp = hp * 0.9863; // Brake Horsepower

    document.getElementById('hc-pwr-kw').innerText = kw.toFixed(1) + " kW";
    document.getElementById('hc-pwr-ps').innerText = ps.toFixed(1) + " PS";
    document.getElementById('hc-pwr-bhp').innerText = bhp.toFixed(1) + " BHP";
}

window.addEventListener('load', () => hcPwrConvert('hp'));
