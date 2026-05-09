function hcCarpmaHesapla() {
    var a = parseFloat(document.getElementById('hc-cpm-a').value);
    var b = parseFloat(document.getElementById('hc-cpm-b').value);
    var sonuc = document.getElementById('hc-carpma-hesaplama-result');
    if (isNaN(a) || isNaN(b)) { alert('Lütfen her iki çarpanı da girin.'); return; }
    var carpim = a * b;
    sonuc.innerHTML =
        '<p><strong>İşlem:</strong> ' + a.toLocaleString('tr-TR') + ' × ' + b.toLocaleString('tr-TR') + '</p>' +
        '<p class="hc-result-value">' + carpim.toLocaleString('tr-TR', {maximumFractionDigits: 10}) + '</p>' +
        '<p><strong>Bilimsel Gösterim:</strong> ' + carpim.toExponential(4).replace('.', ',').replace('e', ' × 10^') + '</p>';
    sonuc.classList.add('visible');
}
