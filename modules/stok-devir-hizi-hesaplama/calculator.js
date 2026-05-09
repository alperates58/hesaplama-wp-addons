function hcInvTurnoverHesapla() {
    const cogs = parseFloat(document.getElementById('hc-it-cogs').value) || 0;
    const avgInv = parseFloat(document.getElementById('hc-it-avg').value) || 1;

    const turnover = cogs / avgInv;
    const days = 365 / turnover;

    document.getElementById('hc-res-it-val').innerText = turnover.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kez/yıl';
    document.getElementById('hc-res-it-days').innerText = Math.round(days).toLocaleString('tr-TR') + ' gün';
    
    document.getElementById('hc-inv-turnover-result').classList.add('visible');
}
