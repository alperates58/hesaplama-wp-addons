function hcCommuteZamanHesapla() {
    var tekYon = parseFloat(document.getElementById('hc-czm-tek-yon').value) || 0;
    var gun = parseFloat(document.getElementById('hc-czm-gun').value) || 5;
    var maas = parseFloat(document.getElementById('hc-czm-maas').value) || 0;
    var calismaSaati = parseFloat(document.getElementById('hc-czm-calisma-saat').value) || 180;

    if (tekYon <= 0 || maas <= 0) {
        alert('Lütfen tek yön yolculuk süresi ve maaş bilginizi giriniz.');
        return;
    }

    var gunlukToplamDakika = tekYon * 2;
    var haftalikToplamDakika = gunlukToplamDakika * gun;
    
    // Yılda 48 aktif çalışma haftası olduğunu varsayalım
    var yillikToplamDakika = haftalikToplamDakika * 48;
    var aylikToplamDakika = yillikToplamDakika / 12;

    var aylikSaat = aylikToplamDakika / 60;
    var yillikSaat = yillikToplamDakika / 60;

    var saatlikDeger = maas / calismaSaati;
    var yillikZamanMaliyeti = yillikSaat * saatlikDeger;

    document.getElementById('hc-czm-res-aylik-saat').innerText = Math.round(aylikSaat) + ' Saat';
    document.getElementById('hc-czm-res-yillik-saat').innerText = Math.round(yillikSaat) + ' Saat (' + Math.round(yillikSaat/24) + ' Gün)';
    document.getElementById('hc-czm-res-saatlik').innerText = saatlikDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-czm-res-yillik-maliyet').innerText = yillikZamanMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-czm-result').classList.add('visible');
}