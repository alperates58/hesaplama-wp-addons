function hcSatHesapla() {
    const rw = parseInt(document.getElementById('hc-sat-rw').value) || 0;
    const math = parseInt(document.getElementById('hc-sat-math').value) || 0;

    if (rw < 200 || rw > 800 || math < 200 || math > 800) {
        alert('Her bölüm puanı 200 ile 800 arasında olmalıdır.');
        return;
    }

    const total = rw + math;
    document.getElementById('hc-sat-val').innerText = total + " / 1600";
    document.getElementById('hc-sat-result').classList.add('visible');
}
