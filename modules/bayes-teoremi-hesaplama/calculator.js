function hcBayesHesapla() {
    const pa = parseFloat(document.getElementById('hc-bayes-pa').value);
    const pba = parseFloat(document.getElementById('hc-bayes-pba').value);
    const pbna = parseFloat(document.getElementById('hc-bayes-pbna').value);

    if (isNaN(pa) || isNaN(pba) || isNaN(pbna) || pa < 0 || pa > 1 || pba < 0 || pba > 1 || pbna < 0 || pbna > 1) {
        alert('Lütfen tüm olasılıkları 0 ile 1 arasında girin.');
        return;
    }

    const pna = 1 - pa;
    const pb = (pba * pa) + (pbna * pna);
    
    if (pb === 0) {
        alert('P(B) sıfır olamaz.');
        return;
    }

    const pab = (pba * pa) / pb;

    const fmt = (val) => val.toLocaleString('tr-TR', { maximumFractionDigits: 6 });
    const percent = (val) => '%' + (val * 100).toLocaleString('tr-TR', { maximumFractionDigits: 2 });

    document.getElementById('hc-res-pab-val').innerText = `${fmt(pab)} (${percent(pab)})`;
    document.getElementById('hc-bayes-teoremi-hesaplama-result').classList.add('visible');
}
