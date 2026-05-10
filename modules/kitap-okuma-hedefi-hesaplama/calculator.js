function hcKitapOkumaHedefiHesapla() {
    const pages = parseFloat(document.getElementById('hc-read-pages').value);
    const days = parseFloat(document.getElementById('hc-read-days').value);

    if (!pages || !days) return;

    const dailyPages = pages / days;
    // Ortalama okuma hızı: 1 sayfa / 2 dakika
    const dailyTime = Math.round(dailyPages * 2);

    document.getElementById('hc-read-val').innerText = Math.ceil(dailyPages) + ' Sayfa';
    document.getElementById('hc-read-time').innerText = `Bu hedef için günde yaklaşık ${dailyTime} dakika ayırmalısınız.`;
    document.getElementById('hc-read-result').classList.add('visible');
}
