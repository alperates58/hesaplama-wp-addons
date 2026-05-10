function hcTargetDateHesapla() {
    const current = parseFloat(document.getElementById('hc-td-current').value);
    const target = parseFloat(document.getElementById('hc-td-target').value);
    const deficit = parseFloat(document.getElementById('hc-td-deficit').value);

    if (!current || !target || !deficit || deficit <= 0) return;

    const totalLoss = Math.abs(current - target);
    const totalKcal = totalLoss * 7700;
    const days = Math.round(totalKcal / deficit);

    const finishDate = new Date();
    finishDate.setDate(finishDate.getDate() + days);

    const dateStr = finishDate.toLocaleDateString('tr-TR', { day: 'numeric', month: 'long', year: 'numeric' });
    
    document.getElementById('hc-td-res-date').innerText = dateStr;
    document.getElementById('hc-td-res-days').innerText = `Yaklaşık ${days} gün sonra hedefinize ulaşabilirsiniz.`;
    document.getElementById('hc-target-date-result').classList.add('visible');
}
