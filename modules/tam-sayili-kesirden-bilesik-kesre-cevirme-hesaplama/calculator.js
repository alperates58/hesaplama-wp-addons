function hcMtiHesapla() {
    const w = parseInt(document.getElementById('hc-mti-w').value) || 0;
    const n = parseInt(document.getElementById('hc-mti-n').value) || 0;
    const d = parseInt(document.getElementById('hc-mti-d').value) || 1;

    if (d === 0) { alert('Payda 0 olamaz.'); return; }

    const num = (Math.abs(w) * d + n) * (w < 0 ? -1 : 1);
    
    document.getElementById('hc-mti-res-val').innerText = `${num} / ${d}`;
    document.getElementById('hc-mti-result').classList.add('visible');
}
