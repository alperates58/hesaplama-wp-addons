function hcVenusRetrosuHesapla() {
    const dateStr = document.getElementById('hc-vr-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getVenusPos(n) {
        let Ls = (280.460 + 0.9856474 * n) % 360;
        let gs = (357.528 + 0.9856003 * n) % 360;
        let sunL = Ls + 1.915 * Math.sin(gs * Math.PI / 180);
        return (sunL + ( ( (181.979 + 1.6021302 * n) - sunL + 180) % 360 - 180 ) ) % 360;
    }

    const pos1 = getVenusPos(getJD(date) - 2451545.0);
    const pos2 = getVenusPos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-vr-status');
    const descEl = document.getElementById('hc-vr-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Venüs Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-vr-status retro";
        descEl.innerHTML = "Venüs retrosu döneminde ikili ilişkiler, ortaklıklar, maddi değerler ve estetik konularında yavaşlamalar veya geçmişe dönük sorgulamalar yaşanabilir. Yeni bir ilişkiye başlamak veya büyük finansal yatırımlar yapmak için beklemek, eski konuları gözden geçirmek tavsiye edilir.";
    } else {
        statusEl.innerHTML = "✅ Venüs Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-vr-status direct";
        descEl.innerHTML = "İlişkiler, finansal konular ve sosyal hayat normal akışında devam ediyor. Planlarınızı hayata geçirmek ve yeni başlangıçlar yapmak için uygun bir dönemdir.";
    }

    document.getElementById('hc-venus-retro-result').classList.add('visible');
}
