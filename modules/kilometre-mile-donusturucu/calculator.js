function hcKmToMi() {
    const km = parseFloat(document.getElementById('hc-kmmi-km').value);
    if (isNaN(km)) return;
    document.getElementById('hc-kmmi-mi').value = (km / 1.609344).toFixed(4);
}

function hcMiToKm() {
    const mi = parseFloat(document.getElementById('hc-kmmi-mi').value);
    if (isNaN(mi)) return;
    document.getElementById('hc-kmmi-km').value = (mi * 1.609344).toFixed(4);
}
