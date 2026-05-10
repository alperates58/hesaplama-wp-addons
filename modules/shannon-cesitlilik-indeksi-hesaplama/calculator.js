function hcShannonHesapla() {
    const input = document.getElementById('hc-si-counts').value;
    const counts = input.split(',').map(n => parseFloat(n.trim())).filter(n => !isNaN(n) && n > 0);

    if (counts.length < 1) {
        alert('Lütfen geçerli birey sayıları giriniz.');
        return;
    }

    const totalN = counts.reduce((a, b) => a + b, 0);
    let h = 0;

    counts.forEach(n => {
        const p = n / totalN;
        h += p * Math.log(p);
    });

    h = -h; // Shannon formula: H = -sum(pi * ln(pi))
    const evenness = h / Math.log(counts.length); // Pielou's evenness

    const resVal = document.getElementById('hc-si-res-val');
    const resEven = document.getElementById('hc-si-res-even');

    resVal.innerText = h.toFixed(3).toLocaleString('tr-TR');
    resEven.innerText = "Düzenlilik (Evenness - E): " + evenness.toFixed(3);

    document.getElementById('hc-shannon-calc-result').classList.add('visible');
}
