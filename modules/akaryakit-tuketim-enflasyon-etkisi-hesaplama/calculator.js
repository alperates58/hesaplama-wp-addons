function hcFuelInflationHesapla() {
    var yol = parseFloat(document.getElementById('hc-ate-yol').value) || 0;
    var tuketim = parseFloat(document.getElementById('hc-ate-tuketim').value) || 6.0;
    var eskiFiyat = parseFloat(document.getElementById('hc-ate-eski-fiyat').value) || 0;
    var yeniFiyat = parseFloat(document.getElementById('hc-ate-yeni-fiyat').value) || 0;

    if (yol <= 0 || eskiFiyat <= 0 || yeniFiyat <= 0) {
        alert('Lütfen tüm değerleri doğru doldurunuz.');
        return;
    }

    var aylikLitre = (yol / 100) * tuketim;
    
    var eskiMasraf = aylikLitre * eskiFiyat;
    var yeniMasraf = aylikLitre * yeniFiyat;

    var artisOrani = ((yeniFiyat - eskiFiyat) / eskiFiyat) * 100;

    document.getElementById('hc-ate-res-litre').innerText = Math.round(aylikLitre) + ' Litre';
    document.getElementById('hc-ate-res-eski-masraf').innerText = eskiMasraf.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-ate-res-yeni-masraf').innerText = yeniMasraf.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
    document.getElementById('hc-ate-res-artis').innerText = '%' + artisOrani.toFixed(1);

    document.getElementById('hc-ate-result').classList.add('visible');
}