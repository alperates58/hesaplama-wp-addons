function hcKuvvetVeKütledenİvmeHesapla() {
    const f = parseFloat(document.getElementById('hc-fma-force').value);
    const m = parseFloat(document.getElementById('hc-fma-mass').value);

    if (isNaN(f) || isNaN(m) || m <= 0) {
        alert('Lütfen geçerli bir kuvvet girin ve kütleyi sıfırdan büyük bir sayı olarak girin.');
        return;
    }

    // a = F / m
    const accel = f / m;

    document.getElementById('hc-fma-accel-val').innerText = accel.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m/s²';
    document.getElementById('hc-kuvvet-ve-kutleden-ivme-result').classList.add('visible');
}
