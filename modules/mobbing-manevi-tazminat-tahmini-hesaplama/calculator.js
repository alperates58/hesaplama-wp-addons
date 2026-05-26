function hcMobbingTazminatHesapla() {
    var sure = parseInt(document.getElementById('hc-mmt-sure').value) || 1;
    var psiko = parseFloat(document.getElementById('hc-mmt-psiko').value);
    var delil = parseFloat(document.getElementById('hc-mmt-delil').value);
    var sirket = parseFloat(document.getElementById('hc-mmt-sirket').value);

    var uyariDiv = document.getElementById('hc-mmt-uyari');
    uyariDiv.style.display = 'none';

    if (sure <= 0) {
        alert('Lütfen mobbing süresini giriniz.');
        return;
    }

    if (delil === 5) {
        uyariDiv.innerHTML = '<strong>Önemli Uyarı:</strong> Hukuk davalarında iddia sahibi iddiasını ispatla mükelleftir. Elinizde yazılı delil, şahit veya tıbbi rapor bulunmuyorsa davanın reddedilme olasılığı yüksektir. Mobbingi kanıtlamak için e-postaları saklamanız ve doktor raporu almanız tavsiye edilir.';
        uyariDiv.style.display = 'block';
    }

    // Puanlama modeli
    var surePuan = Math.min(sure * 2.5, 30); // Süre çarpanı max 30
    var toplamPuan = surePuan + psiko + delil;

    var minTazminat = toplamPuan * sirket * 250;
    var maxTazminat = minTazminat * 2.0;

    // Mutlak limitler (2026 yılı Yargıtay eğilimlerine göre)
    if (minTazminat < 15000) minTazminat = 15000;
    if (maxTazminat > 400000) maxTazminat = 400000;
    if (delil === 5) {
        minTazminat = minTazminat * 0.4;
        maxTazminat = maxTazminat * 0.4;
    }

    document.getElementById('hc-mmt-val').innerText = 
        Math.round(minTazminat).toLocaleString('tr-TR') + ' ₺ - ' + Math.round(maxTazminat).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-mmt-result').classList.add('visible');
}