function hcBilimselGosterimHesapla() {
    var mod = document.getElementById('hc-bgh-mod').value;
    var sonuc = document.getElementById('hc-bilimsel-gosterim-hesaplama-result');

    if (mod === 'normal2bilimsel') {
        var sayi = parseFloat(document.getElementById('hc-bgh-sayi').value);
        if (isNaN(sayi)) { alert('Lütfen geçerli bir sayı girin.'); return; }
        if (sayi === 0) {
            sonuc.innerHTML = '<p class="hc-result-value">0 = 0 × 10<sup>0</sup></p>';
            sonuc.classList.add('visible'); return;
        }
        var ust = Math.floor(Math.log10(Math.abs(sayi)));
        var katsayi = sayi / Math.pow(10, ust);
        katsayi = Math.round(katsayi * 1e10) / 1e10;
        sonuc.innerHTML =
            '<p><strong>Bilimsel Gösterim:</strong></p>' +
            '<p class="hc-result-value">' + katsayi.toLocaleString('tr-TR', {maximumFractionDigits: 10}) + ' × 10<sup>' + ust + '</sup></p>' +
            '<p><strong>Standart Form:</strong> ' + sayi.toLocaleString('tr-TR', {maximumFractionDigits: 15}) + '</p>' +
            '<p><strong>Üs (n):</strong> ' + ust + '</p>' +
            '<p><strong>Katsayı (a):</strong> ' + katsayi.toLocaleString('tr-TR', {maximumFractionDigits: 10}) + '</p>';
    } else {
        var katsayi2 = parseFloat(document.getElementById('hc-bgh-katsayi').value);
        var ust2 = parseInt(document.getElementById('hc-bgh-ust').value);
        if (isNaN(katsayi2) || isNaN(ust2)) { alert('Lütfen katsayı ve üs değerini girin.'); return; }
        var normal = katsayi2 * Math.pow(10, ust2);
        sonuc.innerHTML =
            '<p><strong>Ondalık Sayı:</strong></p>' +
            '<p class="hc-result-value">' + normal.toLocaleString('tr-TR', {maximumFractionDigits: 15}) + '</p>' +
            '<p><strong>Bilimsel Gösterim:</strong> ' + katsayi2.toLocaleString('tr-TR') + ' × 10<sup>' + ust2 + '</sup></p>';
    }
    sonuc.classList.add('visible');
}

document.getElementById('hc-bgh-mod').addEventListener('change', function() {
    var mod = this.value;
    document.getElementById('hc-bgh-grup-normal').style.display = (mod === 'normal2bilimsel') ? 'block' : 'none';
    document.getElementById('hc-bgh-grup-bilimsel').style.display = (mod === 'bilimsel2normal') ? 'block' : 'none';
});
