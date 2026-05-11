function hcRadiationHesapla() {
    const d1 = parseFloat(document.getElementById('hc-rd-dose1').value);
    const r1 = parseFloat(document.getElementById('hc-rd-dist1').value);
    const r2 = parseFloat(document.getElementById('hc-rd-dist2').value);

    if (isNaN(d1) || isNaN(r1) || isNaN(r2) || r1 <= 0 || r2 <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // D2 = D1 * (r1 / r2)^2
    const d2 = d1 * Math.pow(r1 / r2, 2);

    document.getElementById('hc-rd-res-total').innerText = d2.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-rd-result').classList.add('visible');
}
