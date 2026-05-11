function hcYoutubeGeliriHesapla() {
    const views = parseFloat(document.getElementById('hc-yt-views').value);
    const rpm = parseFloat(document.getElementById('hc-yt-rpm').value);
    const taxRate = parseFloat(document.getElementById('hc-yt-tax').value);

    if (isNaN(views) || isNaN(rpm) || views < 0) {
        alert('Lütfen geçerli izlenme ve RPM değerleri girin.');
        return;
    }

    const gross = (views / 1000) * rpm;
    const tax = gross * taxRate;
    const net = gross - tax;

    document.getElementById('hc-yt-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-yt-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-yt-result').classList.add('visible');
}
