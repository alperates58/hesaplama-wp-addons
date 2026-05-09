function hcDogalLogaritmaHesapla() {
    var x = parseFloat(document.getElementById('hc-dlog-x').value);
    var sonuc = document.getElementById('hc-dogal-logaritma-hesaplama-result');
    if (isNaN(x) || x <= 0) { alert('Lütfen 0\'dan büyük bir sayı girin.'); return; }
    var ln = Math.log(x);
    var log10 = Math.log10(x);
    var log2 = Math.log2(x);
    sonuc.innerHTML =
        '<p><strong>x =</strong> ' + x.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>' +
        '<p class="hc-result-value">ln(' + x.toLocaleString('tr-TR') + ') = ' + ln.toLocaleString('tr-TR', {maximumFractionDigits:8}) + '</p>' +
        '<p><strong>log₁₀(x):</strong> ' + log10.toLocaleString('tr-TR', {maximumFractionDigits:8}) + '</p>' +
        '<p><strong>log₂(x):</strong> ' + log2.toLocaleString('tr-TR', {maximumFractionDigits:8}) + '</p>' +
        '<p><strong>eˡⁿ⁽ˣ⁾ = x kontrolü:</strong> ' + Math.exp(ln).toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>';
    sonuc.classList.add('visible');
}
