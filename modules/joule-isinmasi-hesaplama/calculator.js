function hcJouleHeatHesapla() {
    const i = parseFloat(document.getElementById('hc-jh-i').value);
    const r = parseFloat(document.getElementById('hc-jh-r').value);
    const t = parseFloat(document.getElementById('hc-jh-t').value);

    if (isNaN(i) || isNaN(r) || isNaN(t) || i < 0 || r < 0 || t < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Q = I^2 * R * t
    const qJoule = Math.pow(i, 2) * r * t;
    const qCal = qJoule * 0.239006;

    document.getElementById('hc-jh-res-val').innerText = Math.round(qJoule).toLocaleString('tr-TR') + ' Joule';
    document.getElementById('hc-jh-res-cal').innerText = Math.round(qCal).toLocaleString('tr-TR') + ' kalori (cal)';
    
    document.getElementById('hc-jh-result').classList.add('visible');
}
