function hcIeltsHesapla() {
    const l = parseFloat(document.getElementById('hc-ielts-l').value) || 0;
    const r = parseFloat(document.getElementById('hc-ielts-r').value) || 0;
    const w = parseFloat(document.getElementById('hc-ielts-w').value) || 0;
    const s = parseFloat(document.getElementById('hc-ielts-s').value) || 0;

    const avg = (l + r + w + s) / 4;
    
    // IELTS Rounding Rules:
    // .25 rounds to .5
    // .75 rounds up to next whole
    let rounded = Math.round(avg * 2) / 2;
    if (avg % 1 >= 0.25 && avg % 1 < 0.5) rounded = Math.floor(avg) + 0.5;
    if (avg % 1 >= 0.75) rounded = Math.ceil(avg);

    document.getElementById('hc-ielts-val').innerText = rounded.toFixed(1);
    document.getElementById('hc-ielts-result').classList.add('visible');
}
