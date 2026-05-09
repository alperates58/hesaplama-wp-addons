function hcBiyocesitlilikHesapla() {
    const input = document.getElementById('hc-bio-counts').value;
    const counts = input.split(',').map(n => parseInt(n.trim())).filter(n => !isNaN(n) && n > 0);

    if (counts.length < 2) {
        alert('Lütfen en az iki farklı türün birey sayısını giriniz.');
        return;
    }

    const N = counts.reduce((a, b) => a + b, 0);
    if (N <= 1) {
        alert('Toplam birey sayısı 1\'den büyük olmalıdır.');
        return;
    }

    let sum_n_n_1 = 0;
    counts.forEach(n => {
        sum_n_n_1 += n * (n - 1);
    });

    const D = sum_n_n_1 / (N * (N - 1));
    const SimpsonIndex = 1 - D;

    document.getElementById('hc-bio-d').innerText = D.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-bio-idx').innerText = SimpsonIndex.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    
    document.getElementById('hc-bio-note').innerText = `Toplam Tür Sayısı: ${counts.length}, Toplam Birey Sayısı: ${N.toLocaleString('tr-TR')}`;
    document.getElementById('hc-bio-result').classList.add('visible');
}
