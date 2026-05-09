function hcOlasilikHesapla() {
    const favorable = parseInt(document.getElementById('hc-bp-favorable').value);
    const total = parseInt(document.getElementById('hc-bp-total').value);

    if (isNaN(favorable) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli sayılar girin.');
        return;
    }

    if (favorable > total) {
        alert('İstenen durum sayısı toplam durum sayısından büyük olamaz.');
        return;
    }

    const prob = favorable / total;
    const perc = prob * 100;

    // GCD for fraction simplification
    const gcd = (a, b) => b === 0 ? a : gcd(b, a % b);
    const common = gcd(favorable, total);

    document.getElementById('hc-res-bp-val').innerText = prob.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    document.getElementById('hc-res-bp-perc').innerText = '%' + perc.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-res-bp-frac').innerText = `${favorable / common} / ${total / common}`;

    document.getElementById('hc-bp-result').classList.add('visible');
}
