function hcEldivenBedeniHesapla() {
    const circ = parseFloat(document.getElementById('hc-gv-circ').value);

    if (!circ) return;

    let size = "M";
    if (circ <= 17) size = "XS";
    else if (circ <= 19) size = "S";
    else if (circ <= 22) size = "M";
    else if (circ <= 24) size = "L";
    else if (circ <= 27) size = "XL";
    else size = "XXL";

    document.getElementById('hc-gv-val').innerText = size;
    document.getElementById('hc-gv-result').classList.add('visible');
}
