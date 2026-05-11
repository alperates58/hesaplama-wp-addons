function hcQcSampleHesapla() {
    const N = parseFloat(document.getElementById('hc-qc-lot').value);
    const e = parseFloat(document.getElementById('hc-qc-error').value);

    if (isNaN(N) || N <= 0) {
        alert('Lütfen geçerli bir parti büyüklüğü girin.');
        return;
    }

    // Slovin's Formula: n = N / (1 + N * e^2)
    const n = N / (1 + N * Math.pow(e, 2));

    document.getElementById('hc-qc-res-val').innerText = Math.ceil(n).toLocaleString('tr-TR');
    
    document.getElementById('hc-qc-result').classList.add('visible');
}
