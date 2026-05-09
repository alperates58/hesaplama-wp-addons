function hcTaktTimeHesapla() {
    const timeMin = parseFloat(document.getElementById('hc-tt-time').value) || 0;
    const demand = parseFloat(document.getElementById('hc-tt-demand').value) || 1;

    const taktSec = (timeMin * 60) / demand;

    document.getElementById('hc-res-tt-val').innerText = taktSec.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' saniye/adet';
    document.getElementById('hc-takt-time-result').classList.add('visible');
}
