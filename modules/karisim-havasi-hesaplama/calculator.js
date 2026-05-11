function hcAirMixHesapla() {
    const q1 = parseFloat(document.getElementById('hc-am-q1').value);
    const q2 = parseFloat(document.getElementById('hc-am-q2').value);

    if (isNaN(q1) || isNaN(q2) || (q1 + q2) <= 0) {
        alert('Lütfen geçerli debi değerleri girin.');
        return;
    }

    const total = q1 + q2;
    const p1 = (q1 / total) * 100;
    const p2 = (q2 / total) * 100;

    document.getElementById('hc-am-res-val').innerText = total.toLocaleString('tr-TR') + ' m³/h';
    document.getElementById('hc-am-res-p1').innerText = '%' + p1.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-am-res-p2').innerText = '%' + p2.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    
    document.getElementById('hc-am-result').classList.add('visible');
}
