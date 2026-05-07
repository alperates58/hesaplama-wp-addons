function hcArtisHesapla() {
    const oldHP = parseFloat(document.getElementById('hc-old-hp').value);
    const oldTork = parseFloat(document.getElementById('hc-old-tork').value);
    const newHP = parseFloat(document.getElementById('hc-new-hp').value);
    const newTork = parseFloat(document.getElementById('hc-new-tork').value);

    if (isNaN(oldHP) || isNaN(newHP) || oldHP <= 0 || newHP <= 0) {
        alert('Lütfen güç değerlerini giriniz.');
        return;
    }

    // HP Hesaplama
    const hpDiff = newHP - oldHP;
    const hpPerc = (hpDiff / oldHP) * 100;

    document.getElementById('hc-res-hp-perc').innerText = (hpPerc > 0 ? "+" : "") + hpPerc.toFixed(1) + "%";
    document.getElementById('hc-res-hp-diff').innerText = (hpDiff > 0 ? "+" : "") + hpDiff.toFixed(0) + " HP";

    // Tork Hesaplama
    if (!isNaN(oldTork) && !isNaN(newTork) && oldTork > 0 && newTork > 0) {
        const torkDiff = newTork - oldTork;
        const torkPerc = (torkDiff / oldTork) * 100;
        document.getElementById('hc-res-tork-perc').innerText = (torkPerc > 0 ? "+" : "") + torkPerc.toFixed(1) + "%";
        document.getElementById('hc-res-tork-diff').innerText = (torkDiff > 0 ? "+" : "") + torkDiff.toFixed(0) + " Nm";
    }

    // Bar Animasyonu
    const bar = document.getElementById('hc-hp-bar');
    const clampedPerc = Math.min(Math.max(hpPerc, 0), 100);
    bar.style.width = clampedPerc + "%";

    // Görünür yap
    const resultDiv = document.getElementById('hc-artis-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
