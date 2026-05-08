function hcCrHesapla() {
    const vd = parseFloat(document.getElementById('hc-cr-vd').value);
    const vc = parseFloat(document.getElementById('hc-cr-vc').value);

    if (isNaN(vd) || isNaN(vc) || vc === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const cr = (vd + vc) / vc;

    document.getElementById('hc-cr-val').innerText = cr.toFixed(1) + " : 1";
    document.getElementById('hc-cr-result').classList.add('visible');
}
