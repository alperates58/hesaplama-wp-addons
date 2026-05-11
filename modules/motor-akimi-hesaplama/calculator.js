function hcMotorAkimHesapla() {
    const type = parseInt(document.getElementById('hc-ma-type').value);
    const p = parseFloat(document.getElementById('hc-ma-power').value);
    const v = parseFloat(document.getElementById('hc-ma-voltage').value);
    const pf = parseFloat(document.getElementById('hc-ma-pf').value);
    const eff = parseFloat(document.getElementById('hc-ma-eff').value);

    if (isNaN(p) || isNaN(v) || isNaN(pf) || isNaN(eff) || v <= 0 || pf <= 0 || eff <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    let i = 0;
    if (type === 1) {
        i = p / (v * pf * eff);
    } else {
        i = p / (Math.sqrt(3) * v * pf * eff);
    }

    document.getElementById('hc-ma-res-total').innerText = i.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-ma-result').classList.add('visible');
}
