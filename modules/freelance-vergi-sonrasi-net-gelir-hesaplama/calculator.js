function hcFreelanceVergiNetHesapla() {
    var ciro = parseFloat(document.getElementById('hc-fvn-ciro').value) || 0;
    var gider = parseFloat(document.getElementById('hc-fvn-gider').value) || 0;
    var bagkurAylik = parseFloat(document.getElementById('hc-fvn-bagkur').value) || 0;
    var genc = document.getElementById('hc-fvn-genc').value;

    if (ciro <= 0) {
        alert('Lütfen brüt ciro tutarını giriniz.');
        return;
    }

    var yillikSigorta = bagkurAylik * 12;
    var vergiMatrahi = ciro - gider - yillikSigorta;
    if (vergiMatrahi < 0) vergiMatrahi = 0;

    // Genç Girişimci İstisnası 2026 yılı için yaklaşık 230.000 TL'dir.
    if (genc === 'evet') {
        vergiMatrahi = Math.max(0, vergiMatrahi - 230000);
    }

    // 2026 Gelir Vergisi Dilimleri (Şahıs Şirketi Kademeli Tarife Projeksiyonu)
    // Dilimler: 
    // 158.000 TL'ye kadar %15
    // 380.000 TL'nin 158.000 TL'si için 23.700 TL, fazlası %20
    // 970.000 TL'nin 380.000 TL'si için 68.100 TL, fazlası %27
    // 3.000.000 TL'nin 970.000 TL'si için 227.400 TL, fazlası %35
    // Fazlası %40
    var matrah = vergiMatrahi;
    var vergi = 0;

    if (matrah <= 158000) {
        vergi = matrah * 0.15;
    } else if (matrah <= 380000) {
        vergi = 23700 + (matrah - 158000) * 0.20;
    } else if (matrah <= 970000) {
        vergi = 68100 + (matrah - 380000) * 0.27;
    } else if (matrah <= 3000000) {
        vergi = 227400 + (matrah - 970000) * 0.35;
    } else {
        vergi = 937900 + (matrah - 3000000) * 0.40;
    }

    var ticariKazanc = ciro - gider;
    var netYillik = ciro - gider - yillikSigorta - vergi;
    var netAylik = netYillik / 12;

    document.getElementById('hc-fvn-res-ticari').innerText = ticariKazanc.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-fvn-res-sigorta').innerText = yillikSigorta.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-fvn-res-vergi').innerText = vergi.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-fvn-res-net').innerText = netYillik.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-fvn-res-aylik-net').innerText = netAylik.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-fvn-result').classList.add('visible');
}