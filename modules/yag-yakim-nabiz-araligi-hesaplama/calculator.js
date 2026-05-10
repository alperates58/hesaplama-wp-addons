function hcYağYakımNabızAralığıHesapla() {
    const age = parseFloat(document.getElementById('hc-fb-age').value);
    if (!age) return;

    const mhr = 220 - age;
    const low = Math.round(mhr * 0.6);
    const high = Math.round(mhr * 0.7);

    document.getElementById('hc-fb-val').innerText = low + ' - ' + high + ' bpm';
    document.getElementById('hc-fb-result').classList.add('visible');
}
