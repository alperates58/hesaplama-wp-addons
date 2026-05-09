function hcStarterFeedHesapla() {
    const starter = parseFloat(document.getElementById('hc-sf-starter').value) || 0;
    const ratio = parseFloat(document.getElementById('hc-sf-ratio').value) || 1;

    const flour = starter * ratio;
    const water = starter * ratio;
    const total = starter + flour + water;

    document.getElementById('hc-res-sf-flour').innerText = Math.round(flour) + ' gr';
    document.getElementById('hc-res-sf-water').innerText = Math.round(water) + ' gr';
    document.getElementById('hc-res-sf-total').innerText = Math.round(total) + ' gr';
    
    document.getElementById('hc-starter-feed-result').classList.add('visible');
}
