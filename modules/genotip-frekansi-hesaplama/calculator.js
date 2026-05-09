function hcGenotipFrekansHesapla() {
    const aa = parseInt(document.getElementById('hc-gf-aa').value) || 0;
    const hetero = parseInt(document.getElementById('hc-gf-hetero').value) || 0;
    const reces = parseInt(document.getElementById('hc-gf-reces').value) || 0;

    const total = aa + hetero + reces;

    if (total === 0) {
        alert('Lütfen en az bir birey sayısı giriniz.');
        return;
    }

    const freqAA = aa / total;
    const freqAa = hetero / total;
    const freqaa = reces / total;

    document.getElementById('hc-gf-aa-val').innerText = freqAA.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-gf-hetero-val').innerText = freqAa.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-gf-reces-val').innerText = freqaa.toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    
    document.getElementById('hc-gf-note').innerText = `Toplam Popülasyon: ${total.toLocaleString('tr-TR')} birey.`;
    document.getElementById('hc-gf-result').classList.add('visible');
}
