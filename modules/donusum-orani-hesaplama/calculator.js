function hcConvRateHesapla() {
    const visits = parseFloat(document.getElementById('hc-cr-visits').value);
    const conv = parseFloat(document.getElementById('hc-cr-conv').value);

    if (isNaN(visits) || isNaN(conv) || visits <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const rate = (conv / visits) * 100;

    document.getElementById('hc-cr-res-val').innerText = '%' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-cr-res-info').innerText = 'Her 100 kişiden ortalama ' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kişi hedeflenen eylemi gerçekleştirdi.';
    
    document.getElementById('hc-cr-result').classList.add('visible');
}
