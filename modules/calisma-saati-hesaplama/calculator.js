function hcCalismaSaatiHesapla() {
    const start = document.getElementById('hc-cs-start').value;
    const end = document.getElementById('hc-cs-end').value;
    const breakMins = parseInt(document.getElementById('hc-cs-break').value) || 0;

    if (!start || !end) {
        alert('Lütfen giriş ve çıkış saatlerini seçin.');
        return;
    }

    const [h1, m1] = start.split(':').map(Number);
    const [h2, m2] = end.split(':').map(Number);

    let diffMinutes = (h2 * 60 + m2) - (h1 * 60 + m1);
    if (diffMinutes < 0) diffMinutes += 1440;

    const netWorkMinutes = diffMinutes - breakMins;
    
    if (netWorkMinutes < 0) {
        document.getElementById('hc-cs-val').innerText = "Hata: Mola çalışma süresinden uzun.";
    } else {
        const h = Math.floor(netWorkMinutes / 60);
        const m = netWorkMinutes % 60;
        document.getElementById('hc-cs-val').innerText = `${h} saat ${m} dakika`;
    }

    document.getElementById('hc-cs-result').classList.add('visible');
}
