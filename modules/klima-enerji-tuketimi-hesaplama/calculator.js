function hcKlimaEnerjiHesapla() {
    var btu = parseFloat(document.getElementById('hc-ket-btu').value) || 0;
    var seer = parseFloat(document.getElementById('hc-ket-verim').value) || 6.1;
    var saat = parseFloat(document.getElementById('hc-ket-saat').value) || 0;
    var gun = parseFloat(document.getElementById('hc-ket-gun').value) || 0;
    var birim = parseFloat(document.getElementById('hc-ket-birimfiyat').value) || 0;

    if (saat <= 0 || gun <= 0) {
        alert('Lütfen geçerli gün ve saat değerleri giriniz.');
        return;
    }

    // Klima gücü = BTU / SEER. (Örn 12000 BTU / 6.1 = 1967 Watt -> Kompresör sürekli çalışmadığı için ortalama yük ~%60 kabul edilir)
    var ortalamaYukOrani = 0.55; 
    var gucW = (btu / seer) * ortalamaYukOrani;
    var gucKw = gucW / 1000;

    var gunlukKwh = gucKw * saat;
    var toplamKwh = gunlukKwh * gun;
    var toplamMaliyet = toplamKwh * birim;

    document.getElementById('hc-ket-res-guc').innerText = gucKw.toFixed(2) + ' kW (' + Math.round(gucW) + ' Watt)';
    document.getElementById('hc-ket-res-gun-kwh').innerText = gunlukKwh.toFixed(2) + ' kWh';
    document.getElementById('hc-ket-res-top-kwh').innerText = toplamKwh.toFixed(2) + ' kWh';
    document.getElementById('hc-ket-res-maliyet').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-ket-result').classList.add('visible');
}