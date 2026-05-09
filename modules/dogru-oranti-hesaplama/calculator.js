function hcDogrusOrantiHesapla() {
    var a = parseFloat(document.getElementById('hc-doa-a').value);
    var b = parseFloat(document.getElementById('hc-doa-b').value);
    var c = parseFloat(document.getElementById('hc-doa-c').value);
    var sonuc = document.getElementById('hc-dogru-oranti-hesaplama-result');
    if (isNaN(a)||isNaN(b)||isNaN(c)) { alert('a, b ve c değerlerini girin.'); return; }
    if (a === 0) { alert('a sıfır olamaz.'); return; }
    var x = (b * c) / a;
    sonuc.innerHTML =
        '<p><strong>Doğru Orantı:</strong> ' + a + ' / ' + b + ' = ' + c + ' / x</p>' +
        '<p><strong>x = b × c / a = ' + b + ' × ' + c + ' / ' + a + '</strong></p>' +
        '<p class="hc-result-value">x = ' + x.toLocaleString('tr-TR', {maximumFractionDigits:6}) + '</p>' +
        '<p><strong>Oran sabiti (k):</strong> ' + (b/a).toLocaleString('tr-TR', {maximumFractionDigits:4}) + '</p>';
    sonuc.classList.add('visible');
}
