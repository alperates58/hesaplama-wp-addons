function hcTpUsageHesapla() {
    const people = parseInt(document.getElementById('hc-tp-people').value) || 1;
    const daily = parseInt(document.getElementById('hc-tp-daily').value) || 20;
    const rollSheets = parseInt(document.getElementById('hc-tp-roll').value);

    const totalDaily = people * daily;
    const totalYearly = totalDaily * 365;
    const rollsYearly = Math.ceil(totalYearly / rollSheets);

    document.getElementById('hc-res-tp-rolls').innerText = rollsYearly.toLocaleString('tr-TR') + ' Rulo';
    document.getElementById('hc-res-tp-total-sheets').innerText = `Toplam ${totalYearly.toLocaleString('tr-TR')} yaprak kağıt tüketimi.`;
    
    document.getElementById('hc-tp-usage-result').classList.add('visible');
}
