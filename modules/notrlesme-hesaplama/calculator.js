function hcNötrleşmeHesapla() {
    const ma = parseFloat(document.getElementById('hc-nu-ma').value);
    const va = parseFloat(document.getElementById('hc-nu-va').value);
    const na = parseFloat(document.getElementById('hc-nu-na').value);

    const mb = parseFloat(document.getElementById('hc-nu-mb').value);
    const vb = parseFloat(document.getElementById('hc-nu-vb').value);
    const nb = parseFloat(document.getElementById('hc-nu-nb').value);

    // Ma * Va * na = Mb * Vb * nb
    let result = 0;
    let label = "";

    if (isNaN(ma)) {
        result = (mb * vb * nb) / (va * na);
        label = "Asit Molaritesi (Ma): " + result.toFixed(4) + " M";
    } else if (isNaN(va)) {
        result = (mb * vb * nb) / (ma * na);
        label = "Asit Hacmi (Va): " + result.toFixed(2) + " mL";
    } else if (isNaN(mb)) {
        result = (ma * va * na) / (vb * nb);
        label = "Baz Molaritesi (Mb): " + result.toFixed(4) + " M";
    } else if (isNaN(vb)) {
        result = (ma * va * na) / (mb * nb);
        label = "Baz Hacmi (Vb): " + result.toFixed(2) + " mL";
    } else {
        // Hepsi doluysa kontrol et
        const acid = ma * va * na;
        const base = mb * vb * nb;
        if (Math.abs(acid - base) < 0.01) {
            label = "Tam Nötrleşme Sağlandı.";
        } else {
            label = acid > base ? "Asidik Ortam Artar" : "Bazik Ortam Artar";
        }
    }

    document.getElementById('hc-nu-val').innerText = label;
    document.getElementById('hc-nu-result').classList.add('visible');
}
