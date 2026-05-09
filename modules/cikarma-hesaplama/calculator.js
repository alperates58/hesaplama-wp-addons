function hcCikarmaHesapla() {
    var a = parseFloat(document.getElementById('hc-cik-a').value);
    var b = parseFloat(document.getElementById('hc-cik-b').value);
    var sonuc = document.getElementById('hc-cikarma-hesaplama-result');
    if (isNaN(a) || isNaN(b)) { alert('Lütfen her iki değeri de girin.'); return; }
    var fark = a - b;
    sonuc.innerHTML =
        '<p><strong>İşlem:</strong> ' + a.toLocaleString('tr-TR') + ' − ' + b.toLocaleString('tr-TR') + '</p>' +
        '<p class="hc-result-value">' + fark.toLocaleString('tr-TR', {maximumFractionDigits: 10}) + '</p>' +
        '<p><strong>Mutlak Fark:</strong> ' + Math.abs(fark).toLocaleString('tr-TR', {maximumFractionDigits: 10}) + '</p>';
    sonuc.classList.add('visible');
}
