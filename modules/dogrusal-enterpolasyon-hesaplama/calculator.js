function hcDogrusalEnterpolasyonHesapla() {
    var x1 = parseFloat(document.getElementById('hc-dent-x1').value);
    var y1 = parseFloat(document.getElementById('hc-dent-y1').value);
    var x2 = parseFloat(document.getElementById('hc-dent-x2').value);
    var y2 = parseFloat(document.getElementById('hc-dent-y2').value);
    var x = parseFloat(document.getElementById('hc-dent-x').value);
    var sonuc = document.getElementById('hc-dogrusal-enterpolasyon-hesaplama-result');
    if ([x1,y1,x2,y2,x].some(isNaN)) { alert('Tüm değerleri girin.'); return; }
    if (x1 === x2) { alert('x₁ ve x₂ farklı olmalıdır.'); return; }
    var y = y1 + (x - x1) * (y2 - y1) / (x2 - x1);
    var oran = (x - x1) / (x2 - x1);
    sonuc.innerHTML =
        '<p><strong>Nokta 1:</strong> (' + x1 + ', ' + y1 + ') &nbsp;|&nbsp; <strong>Nokta 2:</strong> (' + x2 + ', ' + y2 + ')</p>' +
        '<p><strong>Aranan x:</strong> ' + x.toLocaleString('tr-TR') + '</p>' +
        '<p class="hc-result-value">y = ' + y.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>' +
        '<p><strong>Formül:</strong> y = y₁ + (x−x₁) × (y₂−y₁) / (x₂−x₁)</p>' +
        '<p><strong>İç bölüm oranı:</strong> %' + (oran*100).toLocaleString('tr-TR', {maximumFractionDigits:2}) + '</p>';
    sonuc.classList.add('visible');
}
