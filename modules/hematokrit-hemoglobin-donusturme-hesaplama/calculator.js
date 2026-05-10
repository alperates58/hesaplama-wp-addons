function hcHctHbDönüştürmeHesapla() {
    const val = parseFloat(document.getElementById('hc-hh-val').value);
    const type = document.getElementById('hc-hh-type').value;

    if (!val) return;

    let res = 0, label = "";

    if (type === 'hb_to_hct') {
        res = val * 3;
        label = "% " + res.toFixed(1);
    } else {
        res = val / 3;
        label = res.toFixed(1) + " g/dL";
    }

    document.getElementById('hc-hh-res').innerText = label;
    document.getElementById('hc-hh-result').classList.add('visible');
}
