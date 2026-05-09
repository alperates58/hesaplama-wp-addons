function hcHWHesapla() {
    const p = parseFloat(document.getElementById('hc-hw-p').value);

    if (isNaN(p) || p < 0 || p > 1) {
        alert('Lütfen 0 ile 1 arasında geçerli bir p değeri giriniz.');
        return;
    }

    const q = 1 - p;
    const pp = p * p;
    const pq2 = 2 * p * q;
    const qq = q * q;

    document.getElementById('hc-hw-p-val').innerText = p.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hw-q-val').innerText = q.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hw-pp-val').innerText = pp.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hw-pq-val').innerText = pq2.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-hw-qq-val').innerText = qq.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-hw-result').classList.add('visible');
}
