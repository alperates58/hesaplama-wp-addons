function hcJupiterRetrosuHesapla() {
    const dateStr = document.getElementById('hc-jr-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getJupiterPos(n) {
        let L = (34.404 + 0.0830853 * n) % 360;
        let M = (19.388 + 0.0830853 * n) % 360;
        let lambda = L + 5.55 * Math.sin(M * Math.PI / 180);
        return (lambda + 360) % 360;
    }

    const pos1 = getJupiterPos(getJD(date) - 2451545.0);
    const pos2 = getJupiterPos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-jr-status');
    const descEl = document.getElementById('hc-jr-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Jüpiter Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-jr-status retro";
        descEl.innerHTML = "Jüpiter retrosu döneminde büyüme, bolluk ve şans enerjisi daha içsel bir boyuta çekilir. İnançlarımızı, etik değerlerimizi ve vizyonumuzu gözden geçirmek için mükemmel bir zamandır. Dış dünyada büyük bir genişleme yerine, içsel bir olgunlaşma ve ruhsal büyüme yaşanabilir.";
    } else {
        statusEl.innerHTML = "✅ Jüpiter Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-jr-status direct";
        descEl.innerHTML = "Şans, bolluk ve fırsatların dış dünyada daha görünür olduğu bir dönemdir. Yeni eğitimlere başlamak, seyahatler planlamak ve hedefleri büyütmek için destekleyici bir enerjidir.";
    }

    document.getElementById('hc-jupiter-retro-result').classList.add('visible');
}
