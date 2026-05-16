function hcUranusRetrosuHesapla() {
    const dateStr = document.getElementById('hc-ur-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    const dateNext = new Date(date.getTime() + 86400000);

    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    function getUranusPos(n) {
        let L = (313.232 + 0.0117258 * n) % 360;
        let M = (142.956 + 0.0117258 * n) % 360;
        let lambda = L + 0.52 * Math.sin(M * Math.PI / 180);
        return (lambda + 360) % 360;
    }

    const pos1 = getUranusPos(getJD(date) - 2451545.0);
    const pos2 = getUranusPos(getJD(dateNext) - 2451545.0);

    let diff = pos2 - pos1;
    if (diff < -180) diff += 360;
    if (diff > 180) diff -= 360;
    
    const isRetro = diff < 0;
    const statusEl = document.getElementById('hc-ur-status');
    const descEl = document.getElementById('hc-ur-desc');

    if (isRetro) {
        statusEl.innerHTML = "⚠️ Uranüs Şu An <strong>Retro (Geri)</strong> Hareketinde!";
        statusEl.className = "hc-ur-status retro";
        descEl.innerHTML = "Uranüs retrosu döneminde kolektif değişimler, teknolojik yenilikler ve bireysel özgürlük ihtiyacı daha içsel ve sessiz bir şekilde yaşanabilir. Dış dünyada aniden gerçekleşen isyanlar veya devrimler yerine, zihinsel ve içsel bir uyanış süreci devrededir. Değişime direnmemek ve eski kalıpları kırmak için içsel bir hazırlık dönemidir.";
    } else {
        statusEl.innerHTML = "✅ Uranüs Şu An <strong>İleri</strong> Hareketinde.";
        statusEl.className = "hc-ur-status direct";
        descEl.innerHTML = "Yeniliklerin, teknolojik atılımların ve ani değişimlerin dış dünyada daha hızlı ve görünür olduğu bir dönemdir. Özgürlük alanlarınızı genişletmek ve modern çözümler üretmek için uygundur.";
    }

    document.getElementById('hc-uranus-retro-result').classList.add('visible');
}
