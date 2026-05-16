function hcPlutonRetrosuHesapla() {
    const dateStr = document.getElementById('hc-pr-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getPlutoPos(n) {
        let L = (238.928 + 0.0039755 * n) % 360;
        let M = (14.882 + 0.0039755 * n) % 360;
        let lambda = L + 0.17 * Math.sin(M * Math.PI / 180);
        return (lambda + 360) % 360;
    }

    const pos1 = getPlutoPos(getJD(date) - 2451545.0);
    const pos2 = getPlutoPos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-pr-status');
    const descEl = document.getElementById('hc-pr-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Plüton Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-pr-status retro";
        descEl.innerHTML = "Plüton retrosu döneminde toplumsal yapılar, güç dengeleri ve derin psikolojik süreçler daha içsel bir boyutta sorgulanır. Kendi içsel gücümüzü keşfetmek, korkularımızla yüzleşmek ve artık bize hizmet etmeyen kalıpları yıkmak için uzun ve etkili bir süreçtir. Köklü bir yenilenme için içsel bir hazırlık evresidir.";
    } else {
        statusEl.innerHTML = "✅ Plüton Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-pr-status direct";
        descEl.innerHTML = "Dönüşümün, güç mücadelesinin ve rejenerasyonun dış dünyada daha görünür olduğu bir dönemdir. Büyük değişimleri gerçekleştirmek ve köklü kararlar almak için destekleyicidir.";
    }

    document.getElementById('hc-pluton-retro-result').classList.add('visible');
}
