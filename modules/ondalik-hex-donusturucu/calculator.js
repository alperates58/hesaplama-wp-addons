function hcDecToHex() {
    let dec = parseInt(document.getElementById('hc-hex-dec').value);
    if (!isNaN(dec)) {
        document.getElementById('hc-hex-str').value = (dec >>> 0).toString(16).toUpperCase();
    }
}

function hcHexToDec() {
    let hex = document.getElementById('hc-hex-str').value.replace(/[^0-9A-Fa-f]/g, '');
    document.getElementById('hc-hex-str').value = hex.toUpperCase();
    if (hex) {
        document.getElementById('hc-hex-dec').value = parseInt(hex, 16);
    }
}
