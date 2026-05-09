function hcDorduncuKokHesapla() {
    var x = parseFloat(document.getElementById('hc-ddk-sayi').value);
    var sonuc = document.getElementById('hc-dorduncu-dereceden-kok-hesaplama-result');
    if (isNaN(x) || x < 0) { alert('Lütfen negatif olmayan bir sayı girin.'); return; }
    var kok = Math.pow(x, 0.25);
    sonuc.innerHTML =
        '<p><strong>Sayı:</strong> ' + x.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>' +
        '<p><strong>Formül:</strong> ⁴√x = x^(1/4)</p>' +
        '<p class="hc-result-value">⁴√' + x.toLocaleString('tr-TR') + ' = ' + kok.toLocaleString('tr-TR', {maximumFractionDigits:8}) + '</p>' +
        '<p><strong>Doğrulama:</strong> ' + kok.toLocaleString('tr-TR', {maximumFractionDigits:4}) + '⁴ = ' + Math.pow(kok,4).toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>' +
        '<p><strong>Karşılaştırma:</strong> √x = ' + Math.sqrt(x).toLocaleString('tr-TR', {maximumFractionDigits:6}) + ' | ∛x = ' + Math.cbrt(x).toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>';
    sonuc.classList.add('visible');
}
