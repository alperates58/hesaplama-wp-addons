function hcDenklemKokuHesapla() {
    var a = parseFloat(document.getElementById('hc-dkk-a').value);
    var b = parseFloat(document.getElementById('hc-dkk-b').value);
    var c = parseFloat(document.getElementById('hc-dkk-c').value);
    var sonuc = document.getElementById('hc-denklem-koku-hesaplama-result');
    if (isNaN(a) || isNaN(b) || isNaN(c)) { alert('Lütfen a, b ve c katsayılarını girin.'); return; }
    if (a === 0) { alert('a katsayısı sıfır olamaz (birinci derece denklem olur).'); return; }
    var delta = b * b - 4 * a * c;
    var html = '<p><strong>Denklem:</strong> ' + a + 'x² ' + (b >= 0 ? '+ ' + b : '− ' + Math.abs(b)) + 'x ' + (c >= 0 ? '+ ' + c : '− ' + Math.abs(c)) + ' = 0</p>';
    html += '<p><strong>Diskriminant (Δ = b² − 4ac):</strong> ' + delta.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>';
    if (delta > 0) {
        var x1 = (-b + Math.sqrt(delta)) / (2 * a);
        var x2 = (-b - Math.sqrt(delta)) / (2 * a);
        html += '<p><strong>İki farklı gerçel kök:</strong></p>' +
            '<p class="hc-result-value">x₁ = ' + x1.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>' +
            '<p class="hc-result-value">x₂ = ' + x2.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>';
    } else if (delta === 0) {
        var x0 = -b / (2 * a);
        html += '<p class="hc-result-value">Çift kök: x = ' + x0.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>';
    } else {
        var r = -b / (2 * a);
        var im = Math.sqrt(-delta) / (2 * a);
        html += '<p><strong>Gerçel kök yok (Karmaşık kökler):</strong></p>' +
            '<p class="hc-result-value">x₁ = ' + r.toLocaleString('tr-TR', {maximumFractionDigits:4}) + ' + ' + im.toLocaleString('tr-TR', {maximumFractionDigits:4}) + 'i</p>' +
            '<p class="hc-result-value">x₂ = ' + r.toLocaleString('tr-TR', {maximumFractionDigits:4}) + ' − ' + im.toLocaleString('tr-TR', {maximumFractionDigits:4}) + 'i</p>';
    }
    sonuc.innerHTML = html;
    sonuc.classList.add('visible');
}
