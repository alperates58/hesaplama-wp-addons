function hcNeptunRetrosuHesapla() {
    const dateStr = document.getElementById('hc-nr-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getNeptunePos(n) {
        let L = (304.880 + 0.0059735 * n) % 360;
        let M = (260.247 + 0.0059735 * n) % 360;
        let lambda = L + 0.23 * Math.sin(M * Math.PI / 180);
        return (lambda + 360) % 360;
    }

    const pos1 = getNeptunePos(getJD(date) - 2451545.0);
    const pos2 = getNeptunePos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-nr-status');
    const descEl = document.getElementById('hc-nr-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Neptün Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-nr-status retro";
        descEl.innerHTML = "Neptün retrosu döneminde hayaller, idealler ve ruhsal konular daha derin ve belki de kafa karıştırıcı olabilir. Kendimizi kandırdığımız noktaları fark etmek ve ruhsal uyanış yaşamak için bir fırsattır. Gerçeklerle hayaller arasındaki çizgiyi netleştirmek ve içsel bir arınma yaşamak için idealdir.";
    } else {
        statusEl.innerHTML = "✅ Neptün Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-nr-status direct";
        descEl.innerHTML = "Sanatsal ilhamın, sezgilerin ve ruhsal bağların dış dünyada daha akışkan olduğu bir dönemdir. Yaratıcı projeler ve yardım faaliyetleri için destekleyicidir.";
    }

    document.getElementById('hc-neptun-retro-result').classList.add('visible');
}
