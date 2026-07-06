function hcKiraArtisYasalSinirHesapla() {
    var kira = parseFloat(document.getElementById('hc-kay-kira').value) || 0;
    var oran = parseFloat(document.getElementById('hc-kay-ay').value) || 0.25;
    
    if (kira <= 0) {
        alert('Lütfen mevcut kira bedelini giriniz.');
        return;
    }

    var artis = kira * oran;
    var yeniKira = kira + artis;

    if (typeof window.HC !== 'undefined' && typeof window.HC.ResultEngine !== 'undefined' && window.HC.ResultEngine.render('kira-artis-orani-yasal-sinir-hesaplama', {
        kira: kira.toLocaleString('tr-TR'),
        oran: '%' + (oran * 100).toFixed(2),
        artis: Math.round(artis).toLocaleString('tr-TR'),
        yeniKira: Math.round(yeniKira).toLocaleString('tr-TR'),
        metadata: {
            badges: ['Hukuk & Mevzuat', 'Konut / Kira'],
            severity: 'info'
        }
    })) {
        return;
    }

    document.getElementById('hc-kay-res-eski').innerText = kira.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kay-res-oran').innerText = '%' + (oran * 100).toFixed(2);
    document.getElementById('hc-kay-res-artis').innerText = '+' + Math.round(artis).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kay-res-yeni').innerText = Math.round(yeniKira).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-kay-result').classList.add('visible');
}