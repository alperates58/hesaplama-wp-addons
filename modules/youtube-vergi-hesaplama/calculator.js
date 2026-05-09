function hcYoutubeVergiHesapla() {
    const income = parseFloat(document.getElementById('hc-yt-income').value) || 0;
    const limit2026 = 5300000;

    if (income <= 0) {
        alert('Lütfen geçerli bir gelir giriniz.');
        return;
    }

    let status = "";
    let stopaj = income * 0.15;
    let extraTax = 0;
    const extraTaxRow = document.getElementById('hc-yt-extra-tax-row');

    if (income <= limit2026) {
        status = "Sosyal İçerik İstisnası (%15)";
        extraTaxRow.style.display = 'none';
    } else {
        status = "İstisna Sınırı Aşıldı";
        extraTaxRow.style.display = 'flex';
        
        let totalTax = 0;
        if (income <= 190000) totalTax = income * 0.15;
        else if (income <= 400000) totalTax = 28500 + (income - 190000) * 0.20;
        else if (income <= 1000000) totalTax = 70500 + (income - 400000) * 0.27;
        else if (income <= 4300000) totalTax = 232500 + (income - 1000000) * 0.35;
        else totalTax = 1387500 + (income - 4300000) * 0.40;

        extraTax = Math.max(0, totalTax - stopaj);
    }

    const net = income - stopaj - extraTax;

    document.getElementById('hc-yt-status').innerText = status;
    document.getElementById('hc-yt-stopaj').innerText = stopaj.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-yt-extra-tax').innerText = extraTax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-yt-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-youtube-result').classList.add('visible');
}
