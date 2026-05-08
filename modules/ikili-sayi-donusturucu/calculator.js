function hcDecToBin() {
    let dec = parseInt(document.getElementById('hc-bin-dec').value);
    if (!isNaN(dec)) {
        document.getElementById('hc-bin-str').value = (dec >>> 0).toString(2);
    }
}

function hcBinToDec() {
    let bin = document.getElementById('hc-bin-str').value.replace(/[^01]/g, '');
    document.getElementById('hc-bin-str').value = bin;
    if (bin) {
        document.getElementById('hc-bin-dec').value = parseInt(bin, 2);
    }
}
