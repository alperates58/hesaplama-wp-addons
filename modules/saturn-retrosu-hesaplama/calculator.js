function hcSaturnRetrosuHesapla() {
    const dateStr = document.getElementById('hc-sr-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getSaturnPos(n) {
        let L = (49.944 + 0.0334597 * n) % 360;
        let M = (316.967 + 0.0334442 * n) % 360;
        let lambda = L + 6.39 * Math.sin(M * Math.PI / 180);
        return (lambda + 360) % 360;
    }

    const pos1 = getSaturnPos(getJD(date) - 2451545.0);
    const pos2 = getSaturnPos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-sr-status');
    const descEl = document.getElementById('hc-sr-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Satürn Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-sr-status retro";
        descEl.innerHTML = "Satürn retrosu döneminde sorumluluklar, kurallar, kariyer ve hayatımızdaki otorite figürleriyle ilgili konuları gözden geçirmek gerekebilir. Daha önce atılmış temellerin sağlamlığını test eden bir süreçtir. Sabırlı olmak, disiplini elden bırakmamak ve uzun vadeli hedefleri revize etmek için verimlidir.";
    } else {
        statusEl.innerHTML = "✅ Satürn Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-sr-status direct";
        descEl.innerHTML = "Disiplinli çalışma ve sorumluluk alma konularında daha kararlı bir dönemdir. Uzun vadeli hedefler inşa etmek, kariyer planlarını uygulamaya koymak ve kalıcı yapılar oluşturmak için uygundur.";
    }

    document.getElementById('hc-saturn-retro-result').classList.add('visible');
}
