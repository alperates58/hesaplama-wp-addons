function hcAdsenseGeliriHesapla() {
    const views = parseFloat(document.getElementById('hc-as-views').value);
    const ctr = parseFloat(document.getElementById('hc-as-ctr').value) / 100;
    const cpc = parseFloat(document.getElementById('hc-as-cpc').value);

    if (isNaN(views) || isNaN(ctr) || isNaN(cpc)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const daily = views * ctr * cpc;
    const monthly = daily * 30;
    const yearly = daily * 365;

    document.getElementById('hc-as-res-daily').innerText = daily.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-as-res-monthly').innerText = monthly.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-as-res-yearly').innerText = yearly.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-as-result').classList.add('visible');
}
