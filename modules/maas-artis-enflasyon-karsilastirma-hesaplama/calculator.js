function hcMaasEnflasyonHesapla() {
    var eski = parseFloat(document.getElementById('hc-mae-eski').value) || 0;
    var yeni = parseFloat(document.getElementById('hc-mae-yeni').value) || 0;
    var enflasyon = parseFloat(document.getElementById('hc-mae-enflasyon').value) || 0;

    if (eski <= 0 || yeni <= 0) {
        alert('Lütfen eski ve yeni maaşlarınızı giriniz.');
        return;
    }

    var nominalArtisOran = ((yeni - eski) / eski) * 100;
    var korunanMaas = eski * (1 + (enflasyon / 100));
    
    // Reel Değişim = ((1 + NominalArtis) / (1 + Enflasyon) - 1) * 100
    var nominalArtisKatsayi = (yeni - eski) / eski;
    var enflasyonKatsayi = enflasyon / 100;
    var reelDegisimOran = ((1 + nominalArtisKatsayi) / (1 + enflasyonKatsayi) - 1) * 100;
    
    // Alım gücü farkı net tutar
    var alimGucuFarki = yeni - korunanMaas;

    document.getElementById('hc-mae-res-artis').innerText = '%' + nominalArtisOran.toFixed(2);
    document.getElementById('hc-mae-res-korunan').innerText = korunanMaas.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    
    var reelEl = document.getElementById('hc-mae-res-reel');
    reelEl.innerText = (reelDegisimOran >= 0 ? '+' : '') + reelDegisimOran.toFixed(2) + '%';
    reelEl.style.color = reelDegisimOran >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    var tutarEl = document.getElementById('hc-mae-res-tutar');
    tutarEl.innerText = (alimGucuFarki >= 0 ? '+' : '') + alimGucuFarki.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    tutarEl.style.color = alimGucuFarki >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-mae-result').classList.add('visible');
}