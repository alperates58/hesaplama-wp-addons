function hcMarsRetrosuHesapla() {
    const dateStr = document.getElementById('hc-mr-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getMarsPos(n) {
        let L = (355.453 + 0.5240248 * n) % 360;
        let M = (19.387 + 0.5240208 * n) % 360;
        let lambda = L + 10.70 * Math.sin(M * Math.PI / 180);
        return (lambda + 360) % 360;
    }

    const pos1 = getMarsPos(getJD(date) - 2451545.0);
    const pos2 = getMarsPos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-mr-status');
    const descEl = document.getElementById('hc-mr-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Mars Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-mr-status retro";
        descEl.innerHTML = "Mars retrosu döneminde enerji, motivasyon ve eylem tarzımızda yavaşlamalar görülebilir. Öfke kontrolü zorlaşabilir, projelerde aksaklıklar yaşanabilir. Yeni büyük projelere başlamak yerine, yarım kalan işleri tamamlamak ve strateji geliştirmek için uygundur.";
    } else {
        statusEl.innerHTML = "✅ Mars Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-mr-status direct";
        descEl.innerHTML = "Enerji ve motivasyon yüksek, eylemlerinizde doğrudan sonuç alabileceğiniz bir dönemdir. Yeni girişimler ve fiziksel aktiviteler için destekleyici bir enerjidir.";
    }

    document.getElementById('hc-mars-retro-result').classList.add('visible');
}
