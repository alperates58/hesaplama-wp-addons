function hcRetroHesapla() {
    const now = new Date();
    const retros2026 = [
        { start: new Date("2026-02-25"), end: new Date("2026-03-20"), burc: "Balık / Kova" },
        { start: new Date("2026-06-29"), end: new Date("2026-07-23"), burc: "Aslan / Yengeç" },
        { start: new Date("2026-10-24"), end: new Date("2026-11-13"), burc: "Akrep / Terazi" }
    ];

    let currentRetro = retros2026.find(r => now >= r.start && now <= r.end);
    let nextRetro = retros2026.find(r => now < r.start);

    let html = "";
    if (currentRetro) {
        html = `<div class='hc-retro-status active'>⚠️ Şu an Merkür Retrosu devrede! (${currentRetro.burc} burcunda)</div>
                <p>Bitiş Tarihi: ${currentRetro.end.toLocaleDateString('tr-TR')}</p>`;
    } else if (nextRetro) {
        html = `<div class='hc-retro-status'>✅ Şu an Merkür Retro değil.</div>
                <p>Bir sonraki Retro: <strong>${nextRetro.start.toLocaleDateString('tr-TR')}</strong> tarihinde başlıyor.</p>`;
    } else {
        html = `<p>2026 yılındaki tüm Merkür retroları tamamlandı.</p>`;
    }

    document.getElementById('hc-retro-val').innerHTML = html;
    document.getElementById('hc-retro-desc').innerHTML = `
        <h4>Merkür Retrosu Nedir?</h4>
        <p>Merkür geri hareketi başladığında iletişim, teknoloji, seyahat ve ticari konularda aksaklıklar yaşanabilir. Bu dönemde yeni sözleşmeler imzalamak, pahalı elektronik aletler almak veya önemli kararlar vermek yerine; yarım kalan işleri tamamlamak, eski dostlarla buluşmak ve içsel bir muhasebe yapmak çok daha verimlidir.</p>
    `;
    document.getElementById('hc-retro-result').classList.add('visible');
}
