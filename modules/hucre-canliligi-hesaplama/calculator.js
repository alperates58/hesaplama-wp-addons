function hcCanlilikHesapla() {
    const live = parseInt(document.getElementById('hc-viab-live').value) || 0;
    const dead = parseInt(document.getElementById('hc-viab-dead').value) || 0;

    const total = live + dead;

    if (total === 0) {
        alert('Lütfen hücre sayılarını giriniz.');
        return;
    }

    const viability = (live / total) * 100;

    document.getElementById('hc-viab-val').innerText = '%' + viability.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    document.getElementById('hc-viab-note').innerText = `Toplam ${total.toLocaleString('tr-TR')} hücreden ${live.toLocaleString('tr-TR')} tanesi canlıdır.`;
    document.getElementById('hc-viab-result').classList.add('visible');
}
