var HC_BURC_UYUM_HARITASI = {
    koc:     { ad: 'Koç',     element: 'ates', sembol: '♈', uyum: { aslan: 92, yay: 90, ikizler: 84, kova: 82, terazi: 72, koc: 70, boga: 52, basak: 49, oglak: 46, yengec: 42, akrep: 55, balik: 50 } },
    boga:    { ad: 'Boğa',    element: 'toprak', sembol: '♉', uyum: { basak: 90, oglak: 88, yengec: 80, balik: 83, boga: 74, terazi: 68, akrep: 72, koc: 52, ikizler: 50, aslan: 45, yay: 48, kova: 40 } },
    ikizler: { ad: 'İkizler', element: 'hava', sembol: '♊', uyum: { kova: 91, terazi: 88, koc: 84, aslan: 79, yay: 76, ikizler: 71, boga: 50, yengec: 44, basak: 56, akrep: 43, oglak: 51, balik: 46 } },
    yengec:  { ad: 'Yengeç',  element: 'su', sembol: '♋', uyum: { balik: 92, akrep: 89, boga: 80, basak: 70, oglak: 66, yengec: 73, terazi: 56, aslan: 51, ikizler: 44, yay: 47, koc: 42, kova: 46 } },
    aslan:   { ad: 'Aslan',   element: 'ates', sembol: '♌', uyum: { koc: 92, yay: 88, ikizler: 79, terazi: 81, aslan: 75, kova: 69, boga: 45, yengec: 51, basak: 52, akrep: 57, oglak: 47, balik: 49 } },
    basak:   { ad: 'Başak',   element: 'toprak', sembol: '♍', uyum: { boga: 90, oglak: 86, yengec: 70, akrep: 75, balik: 77, basak: 73, ikizler: 56, terazi: 58, aslan: 52, koc: 49, yay: 51, kova: 47 } },
    terazi:  { ad: 'Terazi',  element: 'hava', sembol: '♎', uyum: { ikizler: 88, kova: 86, aslan: 81, yay: 74, koc: 72, terazi: 73, boga: 68, yengec: 56, basak: 58, akrep: 50, oglak: 52, balik: 54 } },
    akrep:   { ad: 'Akrep',   element: 'su', sembol: '♏', uyum: { yengec: 89, balik: 87, basak: 75, oglak: 72, boga: 72, akrep: 78, koc: 55, ikizler: 43, aslan: 57, terazi: 50, yay: 53, kova: 45 } },
    yay:     { ad: 'Yay',     element: 'ates', sembol: '♐', uyum: { koc: 90, aslan: 88, terazi: 74, kova: 80, ikizler: 76, yay: 72, boga: 48, yengec: 47, basak: 51, akrep: 53, oglak: 54, balik: 52 } },
    oglak:   { ad: 'Oğlak',   element: 'toprak', sembol: '♑', uyum: { boga: 88, basak: 86, akrep: 72, balik: 79, yengec: 66, oglak: 75, koc: 46, ikizler: 51, aslan: 47, terazi: 52, yay: 54, kova: 57 } },
    kova:    { ad: 'Kova',    element: 'hava', sembol: '♒', uyum: { ikizler: 91, terazi: 86, koc: 82, yay: 80, aslan: 69, kova: 74, boga: 40, yengec: 46, basak: 47, akrep: 45, oglak: 57, balik: 55 } },
    balik:   { ad: 'Balık',   element: 'su', sembol: '♓', uyum: { yengec: 92, akrep: 87, boga: 83, oglak: 79, basak: 77, balik: 76, koc: 50, ikizler: 46, aslan: 49, terazi: 54, yay: 52, kova: 55 } }
};

function hcBurcUyumuSeviye(puan) {
    if (puan >= 85) return 'Mükemmel Uyum';
    if (puan >= 70) return 'Yüksek Uyum';
    if (puan >= 55) return 'Orta Uyum';
    return 'Geliştirilebilir Uyum';
}

function hcBurcUyumuYorum(puan) {
    if (puan >= 85) return 'Aranızdaki enerji çok güçlü. Doğal bir çekim ve akış yakalarsınız.';
    if (puan >= 70) return 'Genel olarak iyi anlaşırsınız. Küçük farklılıklar iletişimle kolayca dengelenir.';
    if (puan >= 55) return 'Uyum potansiyeli var. İlişkide sabır ve empati önemli rol oynar.';
    return 'Temel bakış açılarınız farklı olabilir. Açık iletişim ve karşılıklı anlayış ilişkinizi güçlendirir.';
}

function hcBurcUyumuHesapla() {
    var burc1 = document.getElementById('hc-burc-1').value;
    var burc2 = document.getElementById('hc-burc-2').value;

    if (!burc1 || !burc2) {
        alert('Lütfen iki burcu da seçin.');
        return;
    }

    var veri1 = HC_BURC_UYUM_HARITASI[burc1];
    var veri2 = HC_BURC_UYUM_HARITASI[burc2];
    var temelPuan = veri1.uyum[burc2];

    var elementBonus = 0;
    if (veri1.element === veri2.element) {
        elementBonus = 4;
    } else if (
        (veri1.element === 'ates' && veri2.element === 'hava') ||
        (veri1.element === 'hava' && veri2.element === 'ates') ||
        (veri1.element === 'toprak' && veri2.element === 'su') ||
        (veri1.element === 'su' && veri2.element === 'toprak')
    ) {
        elementBonus = 2;
    }

    var puan = Math.max(1, Math.min(99, temelPuan + elementBonus));
    var seviye = hcBurcUyumuSeviye(puan);
    var yorum = hcBurcUyumuYorum(puan);

    document.getElementById('hc-burc-uyumu-title').textContent =
        veri1.sembol + ' ' + veri1.ad + ' & ' + veri2.sembol + ' ' + veri2.ad;
    document.getElementById('hc-burc-uyumu-puan').textContent = '%' + puan.toLocaleString('tr-TR');
    document.getElementById('hc-burc-uyumu-seviye').textContent = seviye;
    document.getElementById('hc-burc-uyumu-yorum').textContent = yorum;

    document.getElementById('hc-burc-uyumu-hesaplama-result').classList.add('visible');
}
